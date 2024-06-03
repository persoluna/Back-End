<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TruncateTablesController extends Controller
{
    public function truncateAllTables()
    {
        // Fetch all table names from the current database
        $tables = DB::select('SHOW TABLES');

        // Loop through each table and truncate it
        foreach ($tables as $table) {
            // Extract the table name
            $tableName = $table->{'Tables_in_Back-end'};

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table($tableName)->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        return redirect()->back()->with('success', 'All tables have been truncated.');
    }
}
