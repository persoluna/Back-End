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
        Schema::create('user_locations', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->nullable();
            $table->string('countryName')->nullable();
            $table->string('currencyCode')->nullable();
            $table->string('countryCode')->nullable();
            $table->string('regionCode')->nullable();
            $table->string('regionName')->nullable();
            $table->string('cityName')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('isoCode')->nullable();
            $table->string('postalCode')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('metroCode')->nullable();
            $table->string('areaCode')->nullable();
            $table->string('timezone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_locations');
    }
};