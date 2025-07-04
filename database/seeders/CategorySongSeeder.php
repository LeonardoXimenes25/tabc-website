<?php

namespace Database\Seeders;

use App\Models\CategorySong;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategorySong::create([
            'name' => 'Eskola Dominika',
            'slug' => 'sekolah-minggu'
        ]);

        CategorySong::create([
            'name' => 'Natal',
            'slug' => 'natal'
        ]);

        CategorySong::create([
            'name' => 'Paskua',
            'slug' => 'paskua'
        ]);
    }
}
