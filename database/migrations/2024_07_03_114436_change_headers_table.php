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
        Schema::table('headers', function (Blueprint $table) {
            // Remove specific meta fields
            $table->dropColumn([
                'meta_title',
                'meta_description',
                'meta_keyword',
                'meta_canonical'
            ]);

            // Add a new column for all meta tags
            $table->text('meta_tags')->nullable();

            // Add four favicon fields
            $table->string('favicon_1')->nullable();
            $table->string('favicon_2')->nullable();
            $table->string('favicon_3')->nullable();
            $table->string('favicon_4')->nullable();
            $table->string('icon1_alt_tag')->nullable();
            $table->string('icon2_alt_tag')->nullable();
            $table->string('icon3_alt_tag')->nullable();
            $table->string('icon4_alt_tag')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('headers', function (Blueprint $table) {
            // Remove the new meta_tags column
            $table->dropColumn([
                'meta_tags',
                'favicon_1',
                'favicon_2',
                'favicon_3',
                'favicon_4',
                'icon1_alt_tag',
                'icon2_alt_tag',
                'icon3_alt_tag',
                'icon4_alt_tag',
            ]);

            // Re-add the specific meta fields
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_canonical')->nullable();
        });
    }
};
