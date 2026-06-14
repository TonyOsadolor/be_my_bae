<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Proposal;
use Livewire\Component;
use Dompdf\Options;

class ProposalComponent extends Component
{
    public ?Proposal $proposal = null;
    public ?int $proposalId = null;
    public Request $request;
    public string $token;

    public function mount(Request $request)
    {
        $this->token = $request->query('token');

        $this->proposal = Proposal::where('uuid', $this->token)->first();

        if (!$this->proposal) {
            abort(404, 'This safe harbor invitation could not be verified.');
        }

        if ($this->proposal) {
            $this->proposalId = $this->proposal->id;

            if ($this->proposal->status === 'accepted') {
            $this->step = 'final';

            if ($this->proposal->outing_location) {
                $this->outingLocation = $this->proposal->outing_location;
                $this->selectedDate = $this->proposal->selected_date;
                $this->selectedTime = $this->proposal->selected_time;
                $this->herNote = $this->proposal->her_note;
                $this->schedulerSubmitted = true;
            }
            }

            $this->currentMessage = $this->proposal->welcome_message ?? $this->proposal->message ?? $this->getWelcomeFallBackMessage();
        } else {
            $this->currentMessage = $this->getWelcomeFallBackMessage();
        }
    }

    public $step = 'proposal';
    public $currentMessage = '';
    public $noButtonText = "No";

    // Scheduler Fields
    public $selectedDate = '';
    public $selectedTime = '';
    public $outingLocation = '';
    public $herNote = '';
    public $schedulerSubmitted = false;
    public $email = '';

    // Track the created record ID
    public ?int $proposalRecordId = null;

    protected $mobilePrompts = [
        "Wait... did you actually mean to click YES? Let's try that again! 😉",
        "Error 404: 'No' option not found in my database. Try the green one! 🤖",
        "I know you're busy, but you aren't too busy for a lifetime of premium spoiling. Just Tap Yes!",
        "Nice try! But I'm persistent. We're going to make a solid team, trust me. Click Yes! ✨",
        "Are you sure? I promise no multitasking required. Just focus on being loved. Try Yes! 🧡",
        "The system has locked the 'No' route. Please proceed to the 'Yes' destination. 🧭"
    ];

    protected $noTexts = [
        "Wrong button",
        "Try again",
        "Nope",
        "Error",
        "Click the other one"
    ];

    /**
     * Handle the "No" button click events
     */
    public function handleNoClick()
    {
        $this->proposal->update(['status' => 'rejected', 'rejected_at' => now()]);
        $this->currentMessage = $this->mobilePrompts[array_rand($this->mobilePrompts)];
        $this->noButtonText = $this->noTexts[array_rand($this->noTexts)];
    }

    /**
     * Handle the "Yes" button click events
     */
    public function startConfirmation()
    {
        $this->step = 'confirm';
    }

    /**
     * Handle the final acceptance of the proposal
     */
    public function finalAccept()
    {
        $this->step = 'final';

        $this->proposal->update(['status' => 'accepted', 'accepted_at' => now()]);

        $this->proposalRecordId = $this->proposal->id;
    }

    /**
     * Save the outing details submitted by the user
     */
    public function saveOuting()
    {
        $this->validate([
            'outingLocation' => 'required|string|max:100',
            'selectedDate' => 'required|date',
            'selectedTime' => 'required',
            'herNote' => 'nullable|string|max:500',
            'email' => 'required|email',
        ]);

        if ($this->proposalRecordId) {
            $record = Proposal::find($this->proposalRecordId);

            DB::transaction(function () use ($record) {
                if ($record) {
                    $record->update([
                        'outing_location' => $this->outingLocation,
                        'selected_date' => $this->selectedDate,
                        'selected_time' => $this->selectedTime,
                        'her_note' => $this->herNote,
                        'email' => $this->email ? $this->email : ($record->email ? $record->email : null),
                        'updated_at' => now(),
                    ]);
                }

                $record->refresh();
                $this->sendNotifications($record);
            });
        }

        $this->schedulerSubmitted = true;
    }

    public function render()
    {
        return view('livewire.proposal-component', ['proposal' => $this->proposal]);
    }

    /**
     * Get the fallback welcome message if no proposal is found.
     */
    protected function getWelcomeFallBackMessage()
    {
        return "Hey there! I have a question for you. Are you ready to be spoiled and loved like never before? 💖";
    }

    /**
     * Send Notification via Email and SMS when the proposal is accepted.
     */
    protected function sendNotifications(Proposal $proposal)
    {
        if ($proposal->email && $proposal->email !== '') {

            try {

                $data = [
                    'proposal' => $proposal,
                    'selectedDate' => $this->selectedDate,
                ];

                $options = new Options();
                $options->set('isRemoteEnabled', true);
                $pdf = Pdf::loadView('pdf.certificate', $data)
                    ->setPaper('a4', 'landscape');
                $pdf->getDomPDF()->setOptions($options);
                $formattedName = str_replace(' ', '_', $proposal->name);
                $outPutName = "{$formattedName}_{$proposal->selected_date}_certificate.pdf";

                Mail::to($proposal->email)->send(new \App\Mail\SendProposalEmail($proposal, $pdf, $outPutName));
            } catch (\Exception $e) {
                Log::error('Error preparing PDF data: ' . $e->getMessage());
                $this->currentMessage = "There was an error preparing your certificate. Please try again later.";
            }
        }

        if ($proposal->phone && $proposal->phone !== '') {

            $smsbody = "Hello, {$proposal->name}! Thank you for starting this journey with me. I am exicting about the good memories we are going to create together!";
            $smsphone =  "234" . substr($proposal->phone, -10);

            $url = config('ebulksms.url');
            $params = [
                'username' => config('ebulksms.username'),
                'apikey' => config('ebulksms.api'),
                'sender' => config('ebulksms.sender'),
                'messagetext' => $smsbody,
                'recipients' => $smsphone,
                'flash' => config('ebulksms.flash'),
                'dndsender' => config('ebulksms.dndsender'),
            ];

            try {
                $response = Http::get($url, $params);

                if ($response->successful()) {
                    $res = $response->body();
                    $split_response = explode('|', $res);
                    $status = $response->getStatusCode();

                    Log::info($split_response[1] . ' was successfully sent to: ' . $proposal->phone . ' via EbulkSMS');
                } else {
                    Log::info('Failed to send SMS to ' . $proposal->phone . ': ' . $response->body());
                }
            } catch (\Exception $e) {
                Log::info('Failed to send SMS to ' . $proposal->phone . ': ' . $e->getMessage());
            }
        }
    }
}
