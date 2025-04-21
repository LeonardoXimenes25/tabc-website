<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Santapan Rohani',
            'slug' => 'santapan-rohani'
        ]);

        Category::create([
            'name' => 'Sejarah Alkitab',
            'slug' => 'sejarah-alkitab'
        ]);

        Category::create([
            'name' => 'Renungan',
            'slug' => 'renungan'
        ]);
    }
}
