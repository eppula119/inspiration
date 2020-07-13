<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdIdeaIdForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('favorites', function (Blueprint $table) {
            //user_idとusersテーブルのid, idea_idとideasテーブルのidを紐付け
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('idea_id')->references('id')->on('ideas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favorites', function (Blueprint $table) {
            $table->dropForeign('favorites_user_id_foreign');
        });
        Schema::table('favorites', function (Blueprint $table) {
            $table->dropForeign('favorites_idea_id_foreign');
        });
    }
}
