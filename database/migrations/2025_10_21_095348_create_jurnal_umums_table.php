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
        Schema::create('jurnal_umums', function (Blueprint $table) {
            $table->id();
            $table->string('account_number_id');
            $table->foreignId('income_id')->constrained()->onDelete('cascade');
            $table->foreignId('pihutang_id')->nullable()->change();
            $table->string('name');
            $table->bigInteger('debit')->nullable();
            $table->bigInteger('credit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal_umums');
    }
};
