<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ksnpublicschool.edu.in'],
            [
                'name' => 'KSN Administrator',
                'password' => Hash::make('Admin@KSN2026'),
                'email_verified_at' => now(),
            ]
        );

        // Also ensure a quick login alias if preferred
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'School Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
    }
}
