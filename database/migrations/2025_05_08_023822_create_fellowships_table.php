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
        Schema::create('fellowships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'fellowship_author_id'
            );
            $table->date('date')->nullable(); // tanggal
            $table->enum('fellowship_type', [
               'prayer_fellowship', // Persekutuan Doa
                'youth_fellowship', // Persekutuan Remaja
                'family_fellowship', // Persekutuan Keluarga
                'sunday_school'
            ]);
            $table->string('theme'); // Tema Persekutuan
            $table->string('bible_verse'); // Nats
            $table->string('preacher'); // Pengkhotbah
            $table->string('mc'); // Mc
            $table->string('musician'); // Pemusik
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fellowships');
    }
};
