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
        Schema::create('rent', function (Blueprint $table) {
            $table->unsignedBigInteger('rent_id')->unique()->autoIncrement();
            $table->string('vehicle_number');
            $table->foreign('vehicle_number')->references('vehicle_number')->on('vehicle');
            $table->unsignedBigInteger('tenant_id');
            $table->foreign('tenant_id')->references('tenant_id')->on('tenant');
            $table->unsignedBigInteger('receipt_id');
            $table->foreign('receipt_id')->references('receipt_id')->on('receipt');
            $table->date('completion_date');
            $table->string('city');
            $table->unsignedBigInteger('number_of_passengers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent');
    }
};
