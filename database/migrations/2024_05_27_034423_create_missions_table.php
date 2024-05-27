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
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->string('Mission_title');
            $table->text('Mission_description');
            $table->string('Mission_image');
            $table->string('Mission_alt_tag');
            $table->string('vision_title');
            $table->text('vision_description');
            $table->string('vision_image');
            $table->string('vision_alt_tag');
            $table->string('Core_title');
            $table->text('Core_description');
            $table->string('Core_image');
            $table->string('Core_alt_tag');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};
