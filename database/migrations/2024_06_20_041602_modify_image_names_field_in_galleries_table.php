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
        Schema::table('galleries', function (Blueprint $table) {
            $table->string('image')->nullable(); // Add the new column
            $table->dropColumn('image_names'); // Drop the old column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->json('image_names')->nullable(); // Add the old column back
            $table->dropColumn('image'); // Drop the new column
        });
    }
};
