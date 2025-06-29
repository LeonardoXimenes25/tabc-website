<?php

namespace Database\Seeders;

use App\Models\Worship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Worship::factory()->count(10)->create();
    }
}
