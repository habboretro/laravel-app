<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CoreSqlFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ini_set('memory_limit', '-1');

        if (!Schema::hasTable('users')) {
            DB::unprepared(file_get_contents(database_path('migrations/sqls/default.sql')));
        }
    }
}
