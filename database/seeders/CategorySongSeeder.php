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
            'name' => 'Gospel',
            'slug' => 'gospel'
        ]);

        CategorySong::create([
            'name' => 'Pop',
            'slug' => 'pop'
        ]);

        CategorySong::create([
            'name' => 'Kidung Jemaat',
            'slug' => 'kidung-jemaat'
        ]);
    }
}
