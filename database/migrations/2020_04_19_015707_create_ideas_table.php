<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            //　アイディアテーブル作成
            $table->increments('id');
            $table->string('name');
            $table->string('photo1');
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
            $table->string('photo4')->nullable();
            $table->string('photo5')->nullable();
            $table->string('outline',300);
            $table->text('content');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('price');
            $table->decimal('review_star', 2, 1);
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
        Schema::dropIfExists('ideas');
    }
}
