<?php

namespace App\Http\Controllers;
use App\Services\IMAPService;
use Illuminate\Support\Facades\Log;
use App\Models\{
    Guest,
};

class RoomController extends Controller
{
    protected $imapService;

    public function __construct(IMAPService $imapService)
    {
        $this->imapService = $imapService;
    }

    public function fetchEmailDetails()
    {
        try {
            // Set up IMAP connection and fetch emails
            $imapHost = '{imap.gmail.com:993/imap/ssl}';
            $username = env('IMAP_USERNAME', 'your-email@gmail.com');
            $password = env('IMAP_PASSWORD', 'your-app-password');
            
            $imapStream = imap_open($imapHost, $username, $password);
            $subjectToSearch = 'Inhouse Guest';
            $emails = imap_search($imapStream, 'SUBJECT "' . $subjectToSearch . '"');
            
            if (!$emails) {
                return response()->json(['status' => 'error', 'message' => 'No emails found with the specified subject.']);
            }
            
            // Call the service to fetch email details and attachments
            $lastEmail = end($emails);
            $emailDetails = $this->imapService->fetchEmailDetails($imapStream, $lastEmail);
            //dd($emailDetails);
            // Process attachment if exists (assuming the attachment is XML)
            foreach ($emailDetails as $attachment) {
                // Check if the attachment is XML
                if (strpos($attachment['filename'], '.xml') !== false || $attachment['filename'] === "(Unnamed Attachment)") {
                    
                    $xmlContent = $attachment['content'];
            
                    // Attempt to load the XML content
                    libxml_use_internal_errors(true); // Suppress libxml errors for better error handling
                    $xml = simplexml_load_string($xmlContent);
            
                    if ($xml === false) {
                        // Log the error for invalid XML
                        Log::error('Invalid XML content in attachment: ' . $attachment['filename']);
                        foreach(libxml_get_errors() as $error) {
                            Log::error($error->message);
                        }
            
                        // Return error response
                        return response()->json(['status' => 'error', 'message' => 'Invalid XML content in the attachment.']);
                    }
            
                    // Log the successful processing of XML
                    Log::info('Successfully loaded XML from attachment: ' . $attachment['filename']);
            
                    // Process the XML data here
                    // For example, extract data from <G_C6> elements
                    // Prepare a data structure to handle room numbers and their corresponding guests
                    $roomGuestMap = [];

                    // Collect guests for each room number
                    foreach ($xml->LIST_G_C6->G_C6 as $guestData) {
                        $roomNumber = (string) $guestData->C6;
                        $guestName = trim((string) $guestData->C9, '*'); // Remove leading '*'
                        $guestArrDate = (string) $guestData->C12;
                        $guestDepDate = (string) $guestData->C15;

                         // Add the guest data to the roomGuestMap
                        if (!isset($roomGuestMap[$roomNumber])) {
                            $roomGuestMap[$roomNumber] = [
                                'guestNames' => [],
                                'arrivals' => [],
                                'departures' => []
                            ];
                        }

                        // Store guest information
                        $roomGuestMap[$roomNumber]['guestNames'][] = $guestName;
                        $roomGuestMap[$roomNumber]['arrivals'][] = $guestArrDate;
                        $roomGuestMap[$roomNumber]['departures'][] = $guestDepDate;
                    }


                    foreach ($roomGuestMap as $roomNumber => $guestData) {
                        $finalGuestName = "TBA"; // Default fallback guest name
                        
                        // Find the first valid guest name that does not contain 'yrs)' or 'YRS)'
                        foreach ($guestData['guestNames'] as $name) {
                            if (!preg_match('/\d/', $name) ) {
                                $cleanName = str_replace(',', '', $name); // Remove commas from the name
                                $finalGuestName = count($guestData['guestNames']) > 1
                                    ? $cleanName . ' & Family'
                                    : $cleanName;
                                break; // Stop once a valid name is found
                            }
                        }
                        // Combine the arrival and departure dates into a string or pick the relevant one for updating
                        // Here, we're using the first arrival and departure date (you could customize this)
                        $finalArrDate = $guestData['arrivals'][0];
                        $finalDepDate = $guestData['departures'][0];
                    
                        // Update the guest name, arrival date, and departure date in the database
                        Guest::where('room_No', $roomNumber)->update([
                            'guest_name' => $finalGuestName,
                            'arrival_date' => $finalArrDate,
                            'departure_date' => $finalDepDate
                        ]);
                    }


                }
            }
            
            return redirect()->route('home')->with('success', 'Guest list updated successfully!');

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to connect to inbox: ' . $e->getMessage()]);
        }
    }

    /**
     * Process the XML content from the attachment
     *
     * @param string $xmlContent
     * @return void
     */
    private function processXml($xmlContent)
    {
        try {
            // Assuming the attachment is XML, process the XML content
            $xml = simplexml_load_string($xmlContent);

            // Example: Handle the XML data
            // For instance, loop through XML data
            foreach ($xml->children() as $item) {
                // Process each item based on your logic
                Log::info('Processing item: ' . (string)$item->name);
            }

        } catch (\Exception $e) {
            Log::error('Error processing XML: ' . $e->getMessage());
        }
    }
    
}
