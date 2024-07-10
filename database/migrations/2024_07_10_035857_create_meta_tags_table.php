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
        Schema::create('meta_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('metatagable_id');
            $table->string('metatagable_type');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('canonical')->nullable();
            $table->string('author')->nullable();
            $table->string('language')->nullable();
            $table->string('copyright')->nullable();
            $table->string('content_type')->nullable();
            $table->string('rating')->nullable();
            $table->string('robots')->nullable();
            $table->string('googlebot')->nullable();
            $table->string('distribution')->nullable();
            $table->string('schema')->nullable();
            $table->string('viewport')->nullable();
            $table->string('keywords')->nullable();
            $table->string('revisit_after')->nullable();
            $table->string('refresh')->nullable();
            $table->string('og_title')->nullable();
            $table->string('og_type')->nullable();
            $table->string('og_url')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_description')->nullable();
            $table->string('twitter_card')->nullable();
            $table->string('twitter_site')->nullable();
            $table->string('twitter_title')->nullable();
            $table->string('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();
            $table->timestamps();

            $table->index(['metatagable_id', 'metatagable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meta_tags');
    }
};
