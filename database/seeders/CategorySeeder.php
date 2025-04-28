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
            'name' => 'Renungan Harian',
            'slug' => 'renungan-harian'
        ]);

        Category::create([
            'name' => 'Pengajaran Alkitab',
            'slug' => 'pengajaran-alkitab'
        ]);

        Category::create([
            'name' => 'Sejarah Gereja dan Tokoh Iman',
            'slug' => 'sejarah-gereja-dan-tokoh-iman'
        ]);
    }
}
