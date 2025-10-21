<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // --- ADMINS ---
        $admins = [
            [
                'name' => 'Daniele',
                'email' => 'Daniele@ethica.holdings',
                'password' => 'T!ger9^Storm@2025!',
            ],
            [
                'name' => 'Admin User',
                'email' => 'admins@ethica.holdings',
                'password' => '12345678',
            ],
            [
                'name' => 'Kashan',
                'email' => 'abbaskashan234@gmail.com',
                'password' => 'kashan123',
            ],
        ];

        foreach ($admins as $admin) {
            User::updateOrCreate(
                ['email' => $admin['email']],
                [
                    'name' => $admin['name'],
                    'password' => Hash::make($admin['password']),
                    'role' => 'admin',
                ]
            );
        }

        // --- INVESTORS ---
        $investors = [
            [
                'name' => 'BIGLIARDI SABRINA',
                'email' => 'sabrina.bigliardi@ethica.holding',
                'password' => 'r4!Vt9#QpZ7@Lk8w3',
            ],
            [
                'name' => 'Second Investor',
                'email' => 'second.investor@ethica.holding',
                'password' => 'T!ger9^Storm@2025!',
            ],
        ];

        foreach ($investors as $investor) {
            User::updateOrCreate(
                ['email' => $investor['email']],
                [
                    'name' => $investor['name'],
                    'password' => Hash::make($investor['password']),
                    'role' => 'investor',
                ]
            );
        }
    }
}
