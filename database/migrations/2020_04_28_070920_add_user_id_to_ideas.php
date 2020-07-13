<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToIdeas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ideas', function (Blueprint $table) {
            // usersテーブルのidに紐づく[user_id]カラム追加
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ideas', function (Blueprint $table) {
            // 外部キーを外し、[user_id]カラム削除
            $table->dropForeign('ideas_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
