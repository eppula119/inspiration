<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNameProfileUserPhotoNotNullToNullChangeGroupDeleteFlgDefaultOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // NULLを許容、groupとdelete_flgカラムにデフォルト値設定。
            $table->string('name')->nullable()->change();
            $table->string('profile',300)->nullable()->change();
            $table->string('user_photo')->nullable()->change();  
            $table->unsignedInteger('group')->nullable()->default(1)->change();
            $table->boolean('delete_flg')->nullable()->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // NULL制約追加、groupとdelete_flgカラムのデフォルト値をなし。
            $table->string('name')->nullable(false)->change();
            $table->string('profile',300)->nullable(false)->change();
            $table->string('user_photo')->nullable(false)->change();
            $table->unsignedInteger('group')->nullable(false)->default(null)->change();
            $table->boolean('delete_flg')->nullable(false)->default(null)->change();
        });
    }
}
