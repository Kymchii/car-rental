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
        Schema::create('vehicle', function (Blueprint $table) {
            $table->string('vehicle_number')->unique();
            $table->string('machine_number')->unique();
            $table->enum('car_type', ['MVP', 'City', 'SUV']);
            $table->string('car_name');
            $table->enum('brand', ['Honda', 'Toyota', 'Daihatsu']);
            $table->string('capacity');
            $table->unsignedBigInteger('rates');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle');
    }
};
