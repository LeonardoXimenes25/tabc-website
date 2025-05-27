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
            'name' => 'Devosaun loro-loron',
            'slug' => 'devosaun-loro-loron'
        ]);

        Category::create([
            'name' => 'Historia biblia',
            'slug' => 'historia-biblia'
        ]);

        Category::create([
            'name' => 'Historia igreja no figura fe',
            'slug' => 'historia-igreja-no-figura-fe'
        ]);
    }
}
