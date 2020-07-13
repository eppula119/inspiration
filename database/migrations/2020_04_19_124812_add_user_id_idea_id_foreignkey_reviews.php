<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdIdeaIdForeignkeyReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
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
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign('reviews_user_id_foreign');
            $table->dropIndex('reviews_user_id_foreign');
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign('reviews_idea_id_foreign');
            $table->dropIndex('reviews_idea_id_foreign');
        });

    }
}
