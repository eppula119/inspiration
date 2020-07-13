<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            //　レビューテーブル作成
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('idea_id');
            $table->integer('star');
            $table->string('title', 100);
            $table->string('content', 1000);
            $table->dateTime('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->boolean('delete_flg');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
