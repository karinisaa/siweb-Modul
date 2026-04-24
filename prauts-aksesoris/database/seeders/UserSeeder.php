<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    public function run(): void {
        User::firstOrCreate(
            ['email' => 'admin@aksesoris.com'],
            [
                'name'     => 'Admin Aksesoris',
                'password' => bcrypt('password123'),
                'role'     => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'user@aksesoris.com'],
            [
                'name'     => 'Putri Cantika',
                'password' => bcrypt('password123'),
                'role'     => 'user',
            ]
        );
    }
}