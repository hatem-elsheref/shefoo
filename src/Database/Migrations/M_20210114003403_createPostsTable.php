<?php

namespace App\Database\Migrations;
use App\Core\Blueprint;
class M_20210114003403_createPostsTable{
    public function up(Blueprint $table){
        $table->start('posts');
        $table->id();
        // your table here ..
        $table->created_at();
        $table->end();
    }
    public function down(Blueprint $table){
        $table->dropTable('posts');
    }
}