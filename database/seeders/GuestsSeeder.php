<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guest;

class GuestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        foreach ($this->rooms as $room) {
            if (isset($room['room_number']) && is_array($room['room_number'])) {
                foreach ($room['room_number'] as $roomNumber) {
                    // Check if the room already exists
                    $existingRoom = Guest::where('room_No', $roomNumber)->first();
                    if (!$existingRoom) {
                        // Create a new Guest or related entry
                        Guest::create([
                            'room_No' => $roomNumber,
                            'guest_name' => 'TBA' // Example additional data
                        ]);
                    }
                }
            }
        }

    }





    protected $rooms = [
        [
            'room_number' => 
            [
                101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 114, 115, 116, 117, 
                118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 
                134, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, 212, 214, 215, 216, 217, 
                218, 219, 220, 221, 222, 223, 224, 225, 226, 227, 228, 229, 230, 231, 232, 233, 
                234, 235, 236, 237, 238, 301, 302, 303, 304, 305, 306, 307, 308, 309, 310, 311, 312, 314, 315, 316, 317, 318, 
                319, 320, 321, 322, 323, 324, 325, 327, 329, 331, 333, 335,337
            ]
        ]
    ];
}


