<?php

namespace App\Database\Migrations;
use App\Core\Blueprint;
class M_20210114135005_hatem{
    public function up(Blueprint $table,$tableName='hatem'){
        $table->start($tableName);
        $table->id();
        // your table here ..
        $table->created_at();
        $table->end();
    }
    public function down(Blueprint $table,$tableName='hatem'){
        $table->dropTable($tableName);
    }
}