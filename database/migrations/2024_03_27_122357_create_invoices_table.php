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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->date('date')->nullable();
            $table->string('email')->nullable();
            $table->decimal('amount')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('total_amount')->nullable();
            $table->integer('percentage')->default(0);
            $table->decimal('tax_amount')->default(0);
            $table->decimal('net_amount')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
