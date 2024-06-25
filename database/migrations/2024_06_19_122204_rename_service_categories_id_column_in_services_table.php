<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->renameColumn('service_categories_id', 'category_id');
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->renameColumn('category_id', 'service_categories_id');
        });
    }
};
