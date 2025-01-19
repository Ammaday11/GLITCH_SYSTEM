<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\{
    User,
    Glitch,
    Guest,
};

class GuestController extends Controller
{
    public function upload()
    {
        if(!Auth::user()->can('update_guestlist')) {
            return redirect()->route('home')->with('error', 'You are not authorized to update guest list.');
        }
        return view('Guest.uploadxml');
    }


    public function update(Request $request)
    {
        if(!Auth::user()->can('update_guestlist')) {
            return redirect()->route('home')->with('error', 'You are not authorized to update guest list.');
        }

        // Validate the uploaded file
    $request->validate([
        'xml_file' => 'required|file|mimes:xml',
    ]);

    // Load the XML file
    $xml = simplexml_load_file($request->file('xml_file')->getPathname());

    // Prepare a data structure to handle room numbers and their corresponding guests
    $roomGuestMap = [];

    // Collect guests for each room number
    foreach ($xml->LIST_G_C6->G_C6 as $guestData) {
        $roomNumber = (string) $guestData->C6;
        $guestName = trim((string) $guestData->C9, '*'); // Remove leading '*'

        // Add the guest name to the roomGuestMap
        if (!isset($roomGuestMap[$roomNumber])) {
            $roomGuestMap[$roomNumber] = [];
        }
        $roomGuestMap[$roomNumber][] = $guestName;
    }

    // Update the Guest table
    foreach ($roomGuestMap as $roomNumber => $guestNames) {
        // Use the first guest name and append "& Family" if there are multiple guests
        $finalGuestName = count($guestNames) > 1
            ? $guestNames[0] . ' & Family'
            : $guestNames[0];

        // Update the guest name in the database
        Guest::where('room_No', $roomNumber)->update(['guest_name' => $finalGuestName]);
    }

        return redirect()->route('home')->with('success', 'Guest list updated successfully.');
    }
}
