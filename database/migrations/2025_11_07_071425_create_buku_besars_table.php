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
        Schema::create('buku_besars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_number_id')->constrained('account_numbers')->onDelete('cascade');
            $table->foreignId('income_id')->constrained('incomes')->onDelete('cascade');
            $table->foreignId('pihutang_id')->nullable()->constrained('pihutangs')->onDelete('cascade');
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onDelete('cascade');
            $table->string('name');
            $table->bigInteger('debit')->nullable();
            $table->bigInteger('credit')->nullable();
            $table->bigInteger('saldo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku_besars');
    }
};
