<?php

namespace App\Database\Migrations;
use App\Core\Blueprint;
class M_20210114002744_createUserTable{
    public function up(Blueprint $table,$tableName='users'){
        $table->start($tableName,'InnoDB');
        $table->id();
        $table->string('name');
        $table->string('email',[Blueprint::UNIQUE]);
        $table->string('password');
        $table->created_at();
        $table->end();
    }
    public function down(Blueprint $table,$tableName='users'){
        $table->dropTable($tableName);
    }
}