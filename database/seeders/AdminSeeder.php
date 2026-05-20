<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@salon.com'],
            [
                'name' => 'Admin Salon',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'no_hp' => '081234567890',
                'email_verified_at' => now(),
            ]
        );
    }
}
