<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Sistem dimulai kosong. Hanya akun admin yang dibuat.
        User::updateOrCreate(
            ['email' => 'admin@gorenganku.test'],
            [
                'name' => 'Admin Gorenganku',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
    }
}
