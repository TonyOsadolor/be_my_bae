<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Seeder;

class ProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = config('proposal.names') ? explode(',', config('proposal.names')) 
            : ['Alice Darwin', 'Bob Smith', 'Charlie Johnson'];
        $messages = config('proposal.message') ?? null;
        $welcomeMessages = config('proposal.welcome_message') ?? null;

        $logMessage = [];

        foreach ($names as $name) {
            $envSlug = strtoupper(str_replace(' ', '_', trim($name)));
            $phone = env($envSlug . '_PHONE', '0000000000');
            $email = env($envSlug . '_EMAIL', null);
            $proposal = \App\Models\Proposal::updateOrCreate(
                [
                    'name' => trim($name),
                ],
                [
                    'uuid' => \Illuminate\Support\Str::uuid(),
                    'phone' => $phone,
                    'email' => $email,
                    'message' => $messages,
                    'status' => 'pending',
                    'welcome_message' => $welcomeMessages,
                ]
            );
            if ($proposal) {
                $proposal->url = config('app.url') .'/'. $this->generateUniqueUrl($proposal);
                $proposal->save();
            }
            $logMessage[] = "Seeded proposal for $name with phone " . $phone;
        }

        Log::info('ProposalSeeder Details: ' . implode('; ', $logMessage));
    }

    /**
     * Generate a unique URL for the proposal.
     */
    private function generateUniqueUrl(\App\Models\Proposal $proposal): string
    {
        return strtolower(str_replace(' ', '-', $proposal->name)) . '?token=' . $proposal->uuid;
    }
}
