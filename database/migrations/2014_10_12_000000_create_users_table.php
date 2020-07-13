<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //　usersテーブル作成
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('group');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile',300);
            $table->string('user_photo');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
