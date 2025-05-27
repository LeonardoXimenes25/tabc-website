<?php

namespace Database\Seeders;

use App\Models\Fellowship;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FellowshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Fellowship::factory()->count(10)->create();
    }
}
