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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->string('income_invoice_number')->unique();
            $table->foreignId('account_number_id')->constrained()->onDelete('cascade');
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->string('income_name');
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('cascade');
            $table->bigInteger('total')->nullable();
            $table->enum('payment_type', ['cash', 'credit'])->default('cash');
            $table->bigInteger('nominal')->nullable();
            $table->date('payment_due_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
