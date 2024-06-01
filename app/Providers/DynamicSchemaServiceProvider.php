<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class DynamicSchemaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Fetch all table names from the current database
        $tables = DB::select('SHOW TABLES');

        // Extract table names from the query result
        $tableNames = array_map('current', $tables);

        // Set the 'schema.tables' configuration dynamically
        Config::set('database.schema.tables', $tableNames);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
