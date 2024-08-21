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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->dateTime('saleDate')->nullable(false);
            $table->decimal('totalAmount', 10, 2)->nullable(false);
            //$table->string('paymentType')->nullable();
            $table->foreignId('customer_id')
            ->nullable()
            ->constrained()
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->foreignId('employee_id')
            ->nullable()
            ->constrained()
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
