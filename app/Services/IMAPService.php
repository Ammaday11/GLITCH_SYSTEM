<?php
namespace App\Services;

use Illuminate\Support\Facades\Log;

class IMAPService
{
    public function fetchEmailDetails($imapStream, $firstEmail)
    {
        try {
            $structure = imap_fetchstructure($imapStream, $firstEmail);
            return $this->extractAttachments($imapStream, $firstEmail, $structure->parts ?? []);
        } catch (\Exception $e) {
            Log::error("Failed to process email: " . $e->getMessage());
            return [];
        }
    }

    private function extractAttachments($imapStream, $emailNumber, $parts, $partNumberPrefix = '') {
        $attachments = [];

        foreach ($parts as $index => $part) {
            $currentPartNumber = $partNumberPrefix . ($index + 1);

            // Check for disposition and treat both 'attachment' and 'inline' content as relevant
            if (isset($part->ifdisposition) && isset($part->disposition)) {
                $disposition = strtolower($part->disposition);
                if ($disposition === 'attachment' || $disposition === 'inline') {
                    // Get the attachment name (if available)
                    $fileName = '';
                    if (isset($part->parameters)) {
                        foreach ($part->parameters as $parameter) {
                            if (strtolower($parameter->attribute) === 'name') {
                                $fileName = $parameter->value;
                                break;
                            }
                        }
                    }

                    // Fetch and decode the content
                    $attachmentContent = imap_fetchbody($imapStream, $emailNumber, $currentPartNumber);
                    if (isset($part->encoding)) {
                        if ($part->encoding == ENCBASE64) {
                            $attachmentContent = base64_decode($attachmentContent);
                        } elseif ($part->encoding == ENCQUOTEDPRINTABLE) {
                            $attachmentContent = quoted_printable_decode($attachmentContent);
                        }
                    }

                    // Store the attachment details
                    $attachments[] = [
                        'filename'  => $fileName ?: '(Unnamed Attachment)',
                        'content'   => $attachmentContent,
                        'mime_type' => $part->subtype ?? 'application/octet-stream',
                        'disposition' => $disposition, // Could be 'attachment' or 'inline'
                    ];
                }
            }

            // Recursively check for attachments in nested parts (if present)
            if (isset($part->parts)) {
                $attachments = array_merge(
                    $attachments,
                    $this->extractAttachments($imapStream, $emailNumber, $part->parts, $currentPartNumber . '.')
                );
            }
        }

        return $attachments;
    }
}
