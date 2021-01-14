<?php

namespace App\Database\Migrations;
use App\Core\Blueprint;
class M_20210114002744_createUserTable{
    public function up(Blueprint $table){
        $table->start('users');
        $table->id();
        $table->string('name',[[Blueprint::DEFAULT,'Hatem'],Blueprint::NULLABLE]);
        $table->string('email',[Blueprint::UNIQUE]);
        $table->string('emaisd');
        $table->string('password');
        $table->integer('passwsord');
        $table->decimal('salary',10,2);
        $table->enum('gender',['male','female']);
        $table->created_at();
        $table->end();
    }
    public function down(Blueprint $table){
        $table->dropTable('users');
    }
}