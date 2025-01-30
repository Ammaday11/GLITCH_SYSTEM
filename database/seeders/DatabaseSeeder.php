<?php

namespace Database\Seeders;

use App\Models\{
    Glitch,
    User,
    Guest,
    Staff,
    GlitchType,
    GuestSatisfaction,
};

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Glitch::truncate();
        // Employee::truncate();
        // Holiday::truncate();
        User::truncate();
        Staff::truncate();
        GlitchType::truncate();
        GuestSatisfaction::truncate();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Staff::create([
            'name' => 'Adam'
        ]);
        Staff::create([
            'name' => 'Asel'
        ]);
        Staff::create([
            'name' => 'Azeeza'
        ]);
        Staff::create([
            'name' => 'Hawwa'
        ]);
        Staff::create([
            'name' => 'Juan'
        ]);
        Staff::create([
            'name' => 'KB'
        ]);
        Staff::create([
            'name' => 'Saaidh'
        ]);
        Staff::create([
            'name' => 'Zarenna'
        ]);


        User::create([
            'username' => 'BWLM0156',
            'name' => 'Ahmed Shafeeu',
            'password' => '$2y$10$gZvWXkf8C8J6e9rUad9To.Tj4dfVvHsiQF6UAm2YxWB/2f.RVpNZe'
        ]);
        User::create([
            'username' => 'BWLM0155',
            'name' => 'Adam Shakeel',
            'password' => '$2y$10$gZvWXkf8C8J6e9rUad9To.Tj4dfVvHsiQF6UAm2YxWB/2f.RVpNZe'
        ]);

        GlitchType::create([
            'type' => 'AC'
        ]);
        GlitchType::create([
            'type' => 'Room Amenities on RQ'
        ]);
        GlitchType::create([
            'type' => 'Medical'
        ]);
        GlitchType::create([
            'type' => 'Smell'
        ]);
        GlitchType::create([
            'type' => 'Wi-Fi'
        ]);
        GlitchType::create([
            'type' => 'Buggy Request'
        ]);
        GlitchType::create([
            'type' => 'TV'
        ]);
        GlitchType::create([
            'type' => 'Cleaning'
        ]);
        GlitchType::create([
            'type' => 'Mini Bar'
        ]);
        GlitchType::create([
            'type' => 'Room Amenities'
        ]);
        GlitchType::create([
            'type' => 'Lost'
        ]);
        GlitchType::create([
            'type' => 'Assistance'
        ]);
        GlitchType::create([
            'type' => 'Maintenance'
        ]);
        GlitchType::create([
            'type' => 'Clearance'
        ]);
        GlitchType::create([
            'type' => 'Key Card'
        ]);
        

        
        GuestSatisfaction::create([
            'guest_satisfaction' => 'Happy'
        ]);
        GuestSatisfaction::create([
            'guest_satisfaction' => 'Very Happy'
        ]);
        GuestSatisfaction::create([
            'guest_satisfaction' => 'Not Satisfied'
        ]);
        GuestSatisfaction::create([
            'guest_satisfaction' => 'Complaint'
        ]);



        // $designation = Designation::factory(10)->create();
        $glitch = Glitch::factory(20)->create();
        //$holiday = Holiday::factory(5)->create();
        $this->call([
            PermissionsSeeder::class,
            GuestsSeeder::Class,
        ]);
    }
}
