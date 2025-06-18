<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'), // Gunakan hash bcrypt untuk password
                'nomor_induk' => null,
            ]
        );
        $admin->assignRole('admin'); // Assign role admin
        $guru = User::firstOrCreate(
            ['email' => 'guru@example.com'],
            [
                'name' => 'Guru',
                'password' => bcrypt('password'), // Gunakan hash bcrypt untuk password
                'nomor_induk' => '0123456789',
            ]
        );
        $guru->assignRole('teacher'); 
    }
}
