<?php
namespace App\Helpers;

use Cache;

class AppHelper
{
    public static function instance()
    {
        return new AppHelper();
    }

    public function getRoomList()
    {
        $rooms = [
            'TBA' => 'TBA',
        ];
        foreach($this->rooms as $item) {
            foreach($item['rooms'] as $room) {
                $rooms[$room] = $room;
            }
        }

        return $rooms;
    }

    public function getWeekDays()
    {
        $days = [
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
        ];
        
        return $days;
    }

    
    protected $rooms = [
        [
            'type' => '100 Series',
            'rooms' => 
            [
                101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 114, 115, 116, 117, 
                118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 
                134
            ]
        ],
        [
            'type' => '200 Series',
            'rooms' =>
            [
                201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, 212, 214, 215, 216, 217, 
                218, 219, 220, 221, 222, 223, 224, 225, 226, 227, 228, 229, 230, 231, 232, 233, 
                234, 235, 236, 237, 238
            ]
        ],
        [
            'type' => '300 Series',
            'rooms' => 
            [
                301, 302, 303, 304, 305, 306, 307, 308, 309, 310, 311, 312, 314, 315, 316, 317, 318, 
                319, 320, 321, 322, 323, 324, 325, 327, 329, 331, 333, 335,337
            ]
        ]
    ];
}