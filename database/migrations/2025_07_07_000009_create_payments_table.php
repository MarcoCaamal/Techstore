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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->enum('method', ['credit_card', 'debit_card', 'paypal', 'oxxo', 'bank_transfer', 'cash'])
                  ->default('credit_card');
            $table->enum('status', ['pending', 'approved', 'failed', 'cancelled', 'refunded'])
                  ->default('pending');
            $table->decimal('amount', 10, 2);
            $table->string('transaction_id')->nullable();
            $table->string('gateway')->nullable(); // stripe, paypal, etc.
            $table->json('gateway_response')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();

            $table->index(['order_id', 'status']);
            $table->index('transaction_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
