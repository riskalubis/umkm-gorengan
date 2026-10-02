<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin utama
        User::updateOrCreate(
            ['email' => 'admin@gorenganku.test'],
            [
                'name' => 'Admin Gorenganku',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Admin Riskadinda
        User::updateOrCreate(
            ['email' => 'riskadinda267@gmail.com'],
            [
                'name' => 'Riskadinda',
                'password' => Hash::make('riskadinda'),
                'email_verified_at' => now(),
            ]
        );
    }
}