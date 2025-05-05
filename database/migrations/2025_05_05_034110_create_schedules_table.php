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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            // Required fields
            $table->foreignId('author_id')
                ->constrained('users')
                ->index('schedule_author_id');
            
            $table->date('date');
            
            $table->enum('category', [
                'Regular Service', 
                'Sunday School', 
                'Wednesday Prayer Meeting', 
                'Regular Service (Special Communion)'
            ])->default('Regular Service');
            
            $table->string('theme'); // Required
            
            // Optional fields
            $table->string('bible_verse')->nullable();
            $table->string('preacher')->nullable();
            $table->string('liturgist')->nullable();
            $table->string('singer')->nullable();
            $table->string('musician')->nullable();
            $table->string('greeter')->nullable();
            $table->string('offering_collector')->nullable();
            $table->string('offering_prayer')->nullable();
            $table->string('lcd_operator')->nullable();
            $table->string('mc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
