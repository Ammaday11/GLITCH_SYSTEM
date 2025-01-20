<?php

namespace App\Console\Commands;

use App\Models\Glitch;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\UnresolvedGlitchesReminderEmail;
use Carbon\Carbon;

class SendReminderEmailForUnresolvedGlitches extends Command
{
    protected $signature = 'glitches:send-unresolved-email';
    protected $description = 'Send email for unresolved glitches older than 20 minutes';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Find glitches that are unresolved and older than 20 minutes
        $unresolvedGlitches = Glitch::where('status', '!=', 'Resolved')
            ->where('created_at', '<', Carbon::now()->subMinutes(20)) // Only glitches older than 20 minutes
            ->get();

        // Check if there are any unresolved glitches older than 20 minutes
        if ($unresolvedGlitches->count() > 0) {
            // Get the list of recipient emails from the .env file
            $recipients = explode(',', env('MAIL_RECIPIENT_ADDRESS'));

            // Send the email to each recipient

            foreach ($recipients as $recipient) {
                Mail::to(trim($recipient))->send(new UnresolvedGlitchesReminderEmail($unresolvedGlitches, $recipients));
            }

            $this->info('Reminder email sent successfully for unresolved glitches older than 20 minutes!');
        } else {
            $this->info('No unresolved glitches older than 20 minutes found.');
        }
    }
}
