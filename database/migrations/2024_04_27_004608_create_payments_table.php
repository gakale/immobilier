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
            $table->foreignId('property_id')->constrained();
            $table->foreignId('tenant_id')->constrained();
            $table->string('type_of_payment');
            $table->integer('amount');
            $table->date('payment_date');
            $table->string('reference');
            $table->date('due_date');
            $table->string('status')->default('pending');
            $table->string('slug')->unique();
            $table->date('paid_through')->nullable();
            $table->timestamps();
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
