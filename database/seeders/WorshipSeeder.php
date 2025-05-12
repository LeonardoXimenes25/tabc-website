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
      // Create 50 random worship services
      Worship::factory()->count(5)->create();
        
      // Or create specific worship services for important dates
      Worship::create([
          'date' => now()->format('Y') . '-5-25',
          'worship_type' => 'sunday_service',
          'theme' => 'Kelahiran Juru Selamat',
          'bible_verse' => 'Lukas 2:10-11',
          'preacher' => 'Pdt. John Doe',
          'liturgist' => 'Sdr. Michael Smith',
          'singer' => 'Kelompok Paduan Suara',
          'musician' => 'Tim Musik Gereja',
          'greeter' => 'Tim Penyambut',
          'collector' => 'Sdr. David Johnson',
          'offering_prayer' => 'Pdt. Jane Doe',
          'lcd_operator' => 'Sdr. Robert Brown'
      ]);
    }
}
