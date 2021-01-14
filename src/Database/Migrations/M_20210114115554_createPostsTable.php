<?php

namespace App\Database\Migrations;
use App\Core\Blueprint;
class M_20210114115554_createPostsTable{
    public function up(Blueprint $table,$tableName='posts'){
        $table->start($tableName);
        $table->id();
        $table->string('title',[Blueprint::UNIQUE]);
        $table->longText('content');
        $table->string('image');
        $table->integer('views',[[Blueprint::DEFAULT,0]]);
        $table->created_at();
        $table->end();
    }
    public function down(Blueprint $table,$tableName='posts'){
        $table->dropTable($tableName);
    }
}