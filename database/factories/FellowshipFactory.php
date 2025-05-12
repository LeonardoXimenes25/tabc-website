<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fellowship>
 */
class FellowshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fellowshipTypes = [
            'prayer_fellowship',
            'youth_fellowship',
            'family_fellowship',
            'sunday_school',
        ];
                
        return [
            'date' => now()->startOfMonth()->addDays(fake()->numberBetween(0, 27))->format('Y-m-d'),
            'fellowship_type' => fake()->randomElement($fellowshipTypes),
            'theme' => fake()->sentence(3),
            'bible_verse' => fake()->word . ' ' . 
                             fake()->numberBetween(1, 150) . ':' . 
                             fake()->numberBetween(1, 30),
            'preacher' => fake()->name(),
            'mc' => fake()->name(),
            'musician' => fake()->name(),
        ];
    }
}
