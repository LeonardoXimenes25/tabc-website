<?php

namespace Database\Seeders;

use App\Models\Song;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Schedule;
use Illuminate\Support\Str;
use App\Models\CategorySong;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
            CategorySongSeeder::class,
        ]);
    
        Article::factory(10)->recycle([
            Category::all(),
            User::all()
        ])->create();
    
        Song::factory(10)->recycle([
            CategorySong::all(),
            User::all()
        ])->create();

        Schedule::factory(10)->recycle([
            User::all()
        ])->create();
    }
}
