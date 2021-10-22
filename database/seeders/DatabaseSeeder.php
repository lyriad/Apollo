<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Patient;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (!UserRepository::existsByEmail('nurse1@apollo.com')) {
            UserRepository::create([
                'name' => 'Test Nurse 1',
                'email' => 'nurse1@apollo.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10)
            ]);
        }

        $start = now();
        echo "\nStarted seeding patients at {$start}.\n";
        Patient::factory(50000)->create();
        $end = now();
        echo "Finished seeding patients at {$end}.\n";
        echo "Total time: {$end->diffForHumans($start)}.\n";

        // 1st Run: 18 minutes
        // 2nd Run: 19 minutes
        // 3rd Run: 16 minutes
    }
}
