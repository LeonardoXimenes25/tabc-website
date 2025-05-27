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
        Schema::create('worships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'worship_author_id'
            );
            $table->date('date')->nullable();
            $table->enum('worship_type', [
                'sunday_service',
                'good_friday',
                'christmas',
                'easter',
            ]);
            $table->string('theme'); // Judul Ibadah
            $table->string('bible_verse'); // Nats
            $table->string('preacher'); // Pengkhotbah
            $table->string('liturgist'); // Liturgis
            $table->string('singer')->nullable(); // Singer
            $table->string('musician'); // Pemusik
            $table->string('greeter')->nullable(); // Penyambut
            $table->string('collector'); // Persembahan
            $table->string('offering_prayer'); // Doa Persembahan
            $table->string('lcd_operator'); // Operator LCD
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worships');
    }
};
