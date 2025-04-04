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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            // Kolom biasa
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            
            // Kolom nullable (boleh kosong)
            $table->string('image')->nullable();
            
            // Kolom enum (pilihan tetap)
            $table->enum('status', ['draft', 'published'])->default('draft');
            
            // Relasi foreign key
            $table->foreignId('user_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
