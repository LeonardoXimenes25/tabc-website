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
        Fellowship::factory()->count(50)->create();
        
        Fellowship::create([
            'date' => now()->format('Y') . '-12-25',
            'fellowship_type' => 'prayer_fellowship',
            'theme' => 'Kasih Bapa',
            'bible_verse' => 'Yohanes 3:16',
            'preacher' => 'Pdt. Asiana',
            'mc' => 'Bapa Tino',
            'musician' => 'Pdt. Timotius',
        ]);
    }
}
