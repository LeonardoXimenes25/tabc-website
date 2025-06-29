<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'Leonardo Ximenes',
                'username' => 'Leonardo',
                'email' => 'leonardoximenes050201@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'admin',
                'position' => 'sarani'
            ]);

        User::create(
            [
                'name' => 'Givson',
                'username' => 'Sony',
                'email' => 'givson@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'majelis',
                'position' => 'xefe majelis'
            ]);

        User::create(
            [
                'name' => 'Sergio',
                'username' => 'Akui',
                'email' => 'sergio@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'majelis',
                'position' => 'vice majelis'
            ]);

        User::create(
            [
                'name' => 'Sarah',
                'username' => 'Sarah',
                'email' => 'sarah@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'user',
                'position' => 'sarani',
            ]);
    }
}
