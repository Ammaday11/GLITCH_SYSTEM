<?php

namespace App\Jobs;

use Webklex\PHPIMAP\ClientManager;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\{
    User,
    Glitch,
    Guest,
};

class UpdateGuestList implements ShouldQueue
{
    use Dispatchable, Queueable, SerializesModels;
    /**
     * Handle the job logic.
     */
    public function handle()
    {
        // Connect to the Gmail account
        $clientManager = new ClientManager();
        $client = $clientManager->make([
            'host'          => 'imap.gmail.com',
            'port'          => 993,
            'encryption'    => 'ssl',
            'validate_cert' => true,
            'username'      => env('IMAP_USERNAME', 'your-email@gmail.com'),
            'password'      => env('IMAP_PASSWORD', 'your-app-password'),
            'protocol'      => 'imap',
        ]);

        $client->connect();

        // Access the INBOX
        $folder = $client->getFolder('INBOX');

        // Fetch the latest email matching the criteria
        $messages = $folder->query()
            ->from('whalelagoon@barcelo.com') // Replace with the specific sender email
            ->subject('Guest List') // Replace with the part of the subject to match
            ->get();

        if ($messages->isEmpty()) {
            logger()->info('No matching email found.');
            $client->disconnect();
            return;
        }

        // Process the latest matching email
        $message = $messages->first();
        dd($message);

        

        if ($message->hasAttachments()) {
            foreach ($message->getAttachments() as $attachment) {
                if ($attachment->getExtension() === 'xml') {
                    // Get the XML content
                    $xmlContent = $attachment->getContent();
                    $this->processXml($xmlContent);

                    // Mark email as seen
                    $message->setFlag('Seen');
                    break;
                }
            }
        } else {
            logger()->info('No XML attachment found in the email.');
        }

        $client->disconnect();
    }

    /**
     * Process the XML content.
     *
     * @param string $xmlContent
     */
    protected function processXml(string $xmlContent)
    {
        try {
            // Set up IMAP connection string for Gmail
            $imapHost = '{imap.gmail.com:993/imap/ssl}';
            $username = env('IMAP_USERNAME', 'your-email@gmail.com');
            $password = env('IMAP_PASSWORD', 'your-app-password');
            
            // Open the IMAP stream
            $imapStream = imap_open($imapHost, $username, $password);
        
            // Specify the folder to search in (e.g., INBOX)
            $folder = $imapHost . 'INBOX';
            
            // Search emails with a specific subject
            $subjectToSearch = 'Inhouse Guest';
            $emails = imap_search($imapStream, 'SUBJECT "' . $subjectToSearch . '"');
        
            if ($emails === false) {
                return response()->json(['status' => 'error', 'message' => 'No emails found with the specified subject.']);
            }
        
            $emailsWithAttachments = [];
        
            foreach ($emails as $emailNumber) {
                $structure = imap_fetchstructure($imapStream, $emailNumber);
        
                if (isset($structure->parts) && count($structure->parts)) {
                    foreach ($structure->parts as $partNumber => $part) {
                        // Check if the part is an attachment
                        if (isset($part->ifdisposition) && strtolower($part->disposition) === 'attachment') {
                            $fileName = $part->parameters[0]->value ?? 'unknown';
                            
                            // Check if it's an XML file
                            if (str_ends_with(strtolower($fileName), '.xml')) {
                                $attachment = imap_fetchbody($imapStream, $emailNumber, $partNumber + 1);
                                
                                // Decode the attachment if it's base64 encoded
                                if ($part->encoding == ENCBASE64) {
                                    $attachment = base64_decode($attachment);
                                }
        
                                // Pass the XML to processXml method
                                $this->processXml($attachment);
        
                                // Add to results for reference
                                $emailsWithAttachments[] = [
                                    'subject' => imap_fetch_overview($imapStream, $emailNumber, 0)[0]->subject ?? '(No Subject)',
                                    'from'    => imap_fetch_overview($imapStream, $emailNumber, 0)[0]->from ?? '(Unknown Sender)',
                                    'date'    => imap_fetch_overview($imapStream, $emailNumber, 0)[0]->date ?? '(Unknown Date)',
                                    'filename' => $fileName,
                                ];
                            }
                        }
                    }
                }
            }
        
            // Close the connection
            imap_close($imapStream);
        
            return response()->json([
                'status'  => 'success',
                'emails'  => $emailsWithAttachments,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to connect to inbox: ' . $e->getMessage(),
            ]);
        }
    }
}
