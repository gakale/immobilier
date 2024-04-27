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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->foreignId('property_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('rent_amount');
            $table->integer('security_deposit');
            $table->string('status')->default('pending');
            $table->string('slug')->unique();
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
