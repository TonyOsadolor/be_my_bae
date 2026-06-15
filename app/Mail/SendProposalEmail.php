<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use App\Models\Proposal;
use Livewire\Component;
use Dompdf\Options;

class SendProposalEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Proposal $proposal, public $pdf, public $outPutName)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $first_name = explode(' ', $this->proposal->name)[0] ?? 'Dear';
        return new Envelope(
            from: new Address(config('proposal.host_email'), config('proposal.host_full_name')),
            replyTo: [
                new Address(config('proposal.host_email'), config('proposal.host_full_name')),
            ],
            subject: $first_name . ', Our Journey has been Certified',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'email.certificate',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(fn() => $this->pdf->output(), $this->outPutName)
                ->withMime('application/pdf'),
        ];
    }
}
