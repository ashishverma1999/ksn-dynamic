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
            ['email' => 'admin@happymodelpublicschool.in'],
            [
                'name' => 'HMPS Administrator',
                'password' => Hash::make('Admin@HMPS2026'),
                'email_verified_at' => now(),
            ]
        );
    }
}
