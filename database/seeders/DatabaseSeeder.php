<?php

namespace Database\Seeders;

use App\Models\{
    Glitch,
    User,
    Guest,
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Department::create([
        //     'name' => 'HR'
        // ]);

        User::create([
            'bwlmNo' => 'BWLM0156',
            'name' => 'Ahmed Shafeeu',
            'password' => '$2y$10$gZvWXkf8C8J6e9rUad9To.Tj4dfVvHsiQF6UAm2YxWB/2f.RVpNZe'
        ]);
        User::create([
            'bwlmNo' => 'BWLM0155',
            'name' => 'Adam Shakeel',
            'password' => '$2y$10$gZvWXkf8C8J6e9rUad9To.Tj4dfVvHsiQF6UAm2YxWB/2f.RVpNZe'
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
