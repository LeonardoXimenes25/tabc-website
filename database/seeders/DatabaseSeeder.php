<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        // Category::create(
        //     [
        //         'name' => 'Santapan-Rohanes',
        //         'slug' => 'santapan-rohani'
        //     ]);

        // Article::create(
        //     [
        //         'title' => 'Judul Artike 1',
        //         'author_id' => 1,
        //         'category_id' => 1,
        //         'slug' => 'judul-artikel-1',
        //         'body' => 'Running Seeders You may execute the db:seed Artisan command to seed your database. By default, the db:seed command runs the Database\Seeders\DatabaseSeeder class, which may in turn invoke other seed classes. However, you may use the --class option to specify a specific seeder class to run individually:',
        //         'image_url' => 'images/church-hero.jpg'
        //     ]);

        $this->call([CategorySeeder::class, UserSeeder::class]);
        Article::factory(100)->recycle([
            Category::all(),
            User::all()
        ])->create();
    }
}
