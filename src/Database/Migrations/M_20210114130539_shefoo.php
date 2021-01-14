<?php

namespace App\Database\Migrations;
use App\Core\Blueprint;
class M_20210114130539_shefoo{
    public function up(Blueprint $table,$tableName='shefoo'){
        $table->start($tableName);
        $table->id();
        // your table here ..
        $table->created_at();
        $table->end();
    }
    public function down(Blueprint $table,$tableName='shefoo'){
        $table->dropTable($tableName);
    }
}