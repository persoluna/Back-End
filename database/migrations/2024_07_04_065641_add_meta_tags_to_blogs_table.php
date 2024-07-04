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
        Schema::table('blogs', function (Blueprint $table) {
            $table->longText('meta_tags')->nullable();
            $table->string('blog_title')->nullable()->change();
            $table->string('blog_slug')->nullable()->change();
            $table->text('short_description')->nullable()->change();
            $table->text('long_description')->nullable()->change();
            $table->string('blog_image')->nullable()->change();
            $table->string('alt_tag')->nullable()->change();
            $table->string('banner_image')->nullable()->change();
            $table->string('banner_alt_tag')->nullable()->change();
            $table->string('posted_by')->nullable()->change();
            $table->string('meta_title')->nullable()->change();
            $table->string('meta_description')->nullable()->change();
            $table->string('meta_keywords')->nullable()->change();
            $table->string('meta_canonical')->nullable()->change();
            $table->integer('user_visits')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('meta_tags')->nullable();
            $table->string('blog_title')->nullable(false)->change();
            $table->string('blog_slug')->nullable(false)->change();
            $table->text('short_description')->nullable(false)->change();
            $table->text('long_description')->nullable(false)->change();
            $table->string('blog_image')->nullable(false)->change();
            $table->string('alt_tag')->nullable(false)->change();
            $table->string('banner_image')->nullable(false)->change();
            $table->string('banner_alt_tag')->nullable(false)->change();
            $table->string('posted_by')->nullable(false)->change();
            $table->string('meta_title')->nullable(false)->change();
            $table->string('meta_description')->nullable(false)->change();
            $table->string('meta_keywords')->nullable(false)->change();
            $table->string('meta_canonical')->nullable(false)->change();
            $table->integer('user_visits')->nullable(false)->change();
        });
    }
};
