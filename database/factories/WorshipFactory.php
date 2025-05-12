<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worship>
 */
class WorshipFactory extends Factory
{
    public function definition(): array
    {
        $worshipTypes = [
            'sunday_service',
            'school_service',
            'good_friday',
            'christmas',
            'easter',
        ];

        return [
            'date' => fake()->dateTimeBetween('now', '+1 year'),
            'worship_type' => fake()->randomElement($worshipTypes),
            'theme' => fake()->sentence(3),
            'bible_verse' => fake()->word . ' ' . 
                             fake()->numberBetween(1, 150) . ':' . 
                             fake()->numberBetween(1, 30),
            'preacher' => fake()->name,
            'liturgist' => fake()->name,
            'singer' => fake()->name,
            'musician' => fake()->name,
            'greeter' => fake()->name,
            'collector' => fake()->name,
            'offering_prayer' => fake()->name,
            'lcd_operator' => fake()->name,
        ];
    }
}
