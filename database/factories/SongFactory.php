<?php

// database/factories/SongFactory.php

namespace Database\Factories;

use App\Models\CategorySong;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => Str::limit(fake()->sentence(), 60),
            'author_id' => User::factory(),
            'categorysong_id' => CategorySong::factory(),
            'slug' => Str::limit(Str::slug(fake()->sentence()), 60, ''),
            'body' => fake()->text(),
            'image_url' => 'images/church-hero.jpg?rand=' . fake()->numberBetween(1, 1000),
            'artist' => Str::limit(fake()->name(), 15),
            'album' => Str::limit(fake()->sentence(), 50),
            'year' => fake()->year(),
            'youtube_embed' => Str::limit(fake()->sentence(), 100),
        ];
    }
}
