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
        Schema::create('financial_reports', function (Blueprint $table) {
            $table->id();
            $table->string('month'); // e.g., "July"
            $table->integer('year'); // e.g., 2025
            $table->decimal('total_income', 15, 2)->default(0);
            $table->decimal('total_expense', 15, 2)->default(0);
            $table->decimal('final_balance', 15, 2)->default(0);
            $table->enum('status', ['draft', 'submitted', 'approved'])->default('draft');
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'transactions_author_id'
            );
            $table->foreignId('approved_by')->nullable()->constrained(
                table: 'users',
                indexName: 'transactions_approved_id'
            );
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_reports');
    }
};
