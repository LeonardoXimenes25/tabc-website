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
        Schema::create('outcoming_mails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'outcomingmain_author_id'
            );
            $table->date('sent_date'); // Date of Receipt
            $table->string('letter_number', 30); // Letter Number
            $table->string('recipient', 12); // Recipient of the letter
            $table->string('subject', 100); // Subject of the letter
            $table->string('attachment')->nullable(); // Attachment (nullable if there is no attachment)
            $table->string('responsible_person', 15); // Responsible Person of the letter
            $table->enum('status', ['draft', 'pending_review', 'approved', 'rejected'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outcoming_mails');
    }
};
