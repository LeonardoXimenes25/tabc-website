<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 30);
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'songs_author_id'
            );
            $table->foreignId('categorysong_id')->constrained(
                table: 'category_songs',
                indexName: 'songs_category_id'
            );
            $table->string('slug', 40)->unique();
            $table->text('body');
            $table->string('image_url')->nullable();
            $table->string('artist', 15)->nullable();
            $table->string('album', 20)->nullable();
            $table->year('year')->nullable();
            $table->string('youtube_embed', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
