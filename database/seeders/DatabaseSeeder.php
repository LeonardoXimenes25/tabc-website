<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Songs;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\CategorySong;
use App\Models\CategorySongs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([CategorySeeder::class, UserSeeder::class]);
        Article::factory(100)->recycle([
            Category::all(),
            User::all()
        ])->create();

        $this->call(CategorySongSeeder::class);
        Songs::factory(10)->recycle([
            CategorySong::all(),
        ])->create();
    }
}
