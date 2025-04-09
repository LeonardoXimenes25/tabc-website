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
        Schema::create('incoming_mails', function (Blueprint $table) {
            $table->id();
            $table->string('letter_number'); // Letter Number
            $table->date('received_date'); // Date of Receipt
            $table->string('sender'); // Sender of the letter
            $table->string('subject'); // Subject of the letter
            $table->string('attachment')->nullable(); // Attachment (nullable if there is no attachment)
            $table->string('receiver'); // Receiver of the letter
            $table->enum('status', ['accepted', 'in progress', 'pending'])->default('accepted'); // Status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_mails');
    }
};
