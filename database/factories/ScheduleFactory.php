<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    protected $model = Schedule::class;

    public function definition()
    {
        $categories = [
            'Regular Service',
            'Sunday School',
            'Wednesday Prayer Meeting',
            'Regular Service (Special Communion)'
        ];

        return [
            'author_id' => User::factory(),
            'date' => $this->faker->dateTimeBetween('now', '+3 months'),
            'category' => $this->faker->randomElement($categories),
            'theme' => $this->faker->sentence(4),
            'bible_verse' => $this->faker->optional(0.7)->passthrough(
                $this->faker->randomElement(['John 3:16', 'Psalm 23:1', 'Philippians 4:13']) . 
                ' - ' . 
                $this->faker->sentence(3)
            ),
            'preacher' => $this->faker->optional(0.8)->name,
            'liturgist' => $this->faker->optional(0.6)->name,
            'singer' => $this->faker->optional(0.5)->name,
            'musician' => $this->faker->optional(0.5)->name,
            'greeter' => $this->faker->optional(0.4)->name,
            'offering_collector' => $this->faker->optional(0.4)->name,
            'offering_prayer' => $this->faker->optional(0.4)->name,
            'lcd_operator' => $this->faker->optional(0.3)->name,
            'mc' => $this->faker->optional(0.5)->name,
        ];
    }

    // State untuk kategori khusus
    public function regularService()
    {
        return $this->state([
            'category' => 'Regular Service',
            'preacher' => $this->faker->name,
            'liturgist' => $this->faker->name,
        ]);
    }

    public function specialCommunion()
    {
        return $this->state([
            'category' => 'Regular Service (Special Communion)',
            'bible_verse' => '1 Corinthians 11:23-26',
        ]);
    }

    // State untuk tanggal spesifik
    public function upcoming()
    {
        return $this->state([
            'date' => $this->faker->dateTimeBetween('now', '+2 weeks'),
        ]);
    }

    public function past()
    {
        return $this->state([
            'date' => $this->faker->dateTimeBetween('-6 months', '-1 day'),
        ]);
    }
}