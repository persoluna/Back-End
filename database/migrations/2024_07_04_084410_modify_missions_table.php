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
        Schema::table('missions', function (Blueprint $table) {
            // Remove core fields
            $table->dropColumn(['Core_title', 'Core_description', 'Core_image', 'Core_alt_tag']);

            // Make other fields nullable
            $table->string('Mission_title')->nullable()->change();
            $table->text('Mission_description')->nullable()->change();
            $table->string('Mission_image')->nullable()->change();
            $table->string('Mission_alt_tag')->nullable()->change();
            $table->string('vision_title')->nullable()->change();
            $table->text('vision_description')->nullable()->change();
            $table->string('vision_image')->nullable()->change();
            $table->string('vision_alt_tag')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('missions', function (Blueprint $table) {
            // Re-add core fields
            $table->string('Core_title');
            $table->text('Core_description');
            $table->string('Core_image');
            $table->string('Core_alt_tag');

            // Revert other fields to non-nullable
            $table->string('Mission_title')->nullable(false)->change();
            $table->text('Mission_description')->nullable(false)->change();
            $table->string('Mission_image')->nullable(false)->change();
            $table->string('Mission_alt_tag')->nullable(false)->change();
            $table->string('vision_title')->nullable(false)->change();
            $table->text('vision_description')->nullable(false)->change();
            $table->string('vision_image')->nullable(false)->change();
            $table->string('vision_alt_tag')->nullable(false)->change();
        });
    }
};
