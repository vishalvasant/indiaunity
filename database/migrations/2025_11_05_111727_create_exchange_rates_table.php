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
        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->id();
            $table->string('from_currency', 3); // e.g., 'USD'
            $table->string('to_currency', 3);   // e.g., 'INR'
            $table->decimal('rate', 15, 8);     // Exchange rate with high precision
            $table->timestamp('fetched_at');    // When this rate was fetched from API
            $table->timestamps();
            
            // Indexes for fast lookups
            $table->index(['from_currency', 'to_currency']);
            $table->unique(['from_currency', 'to_currency']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchange_rates');
    }
};
