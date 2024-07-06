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
        Schema::create('approved_urls', function (Blueprint $table) {
            $table->id();
            $table->text('original_url');
            $table->text('editable_url')->nullable();
            $table->string('priority')->default('0.5')->nullable();
            $table->string('frequency')->default('weekly')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approved_urls');
    }
};
