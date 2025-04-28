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
            ]);

            User::create(
                [
                    'name' => 'Frederico',
                    'username' => 'Ariko',
                    'email' => 'Frederico@gmail.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 'sekretaris',
                ]);

                User::create(
                    [
                        'name' => 'Naterciano',
                        'username' => 'Nater',
                        'email' => 'naterciano@gmail.com',
                        'email_verified_at' => now(),
                        'password' => Hash::make('password'),
                        'role' => 'user',
                    ]);
    }
}
