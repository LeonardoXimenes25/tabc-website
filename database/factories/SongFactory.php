<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\CategorySong;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Songs>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'author_id' => User::factory(),
            'categorysong_id' => CategorySong::factory(),
            'slug' => Str::slug(fake()->sentence()),
            'body' => fake()->text(),
            'image_url' => 'images/church-hero.jpg?rand=' . fake()->numberBetween(1, 1000),
            'artist' => fake()->name(),
            'album' => fake()->sentence(),
            'year' => fake()->year(),
            'youtube_embed' => fake()->sentence(),
        ];
    }
}
