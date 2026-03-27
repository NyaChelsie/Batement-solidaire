<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\DonationCenter;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Admin User
        User::firstOrCreate(
            ['email' => 'admin@hgd.com'],
            [
                'name' => 'Dr. Sang',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'phone' => '+237 600000001',
            ]
        );

        // 2. Create Nurse User
        User::firstOrCreate(
            ['email' => 'infirmier@hgd.com'],
            [
                'name' => 'Infirmière Claire',
                'password' => Hash::make('password123'),
                'role' => 'infirmier',
                'phone' => '+237 600000002',
            ]
        );

        // 3. Create Donation Centers
        $centers = [
            [
                'name' => 'Hôpital Général de Douala',
                'address' => 'Route de Japoma',
                'city' => 'Douala',
                'latitude' => 4.0511,
                'longitude' => 9.7679,
                'operating_hours' => ['Mon-Fri' => '08:00-18:00', 'Sat' => '08:00-14:00']
            ],
            [
                'name' => 'Hôpital Laquintinie',
                'address' => 'Akwa',
                'city' => 'Douala',
                'latitude' => 4.0450,
                'longitude' => 9.7020,
                'operating_hours' => ['Mon-Fri' => '07:30-17:00', 'Sat' => '08:00-12:00']
            ],
            [
                'name' => 'Hôpital Central de Yaoundé',
                'address' => 'Quartier du Lac',
                'city' => 'Yaoundé',
                'latitude' => 3.8667,
                'longitude' => 11.5167,
                'operating_hours' => ['Mon-Sun' => '08:00-18:00']
            ]
        ];

        foreach ($centers as $center) {
            DonationCenter::firstOrCreate(
                ['name' => $center['name']],
                $center
            );
        }
    }
}
