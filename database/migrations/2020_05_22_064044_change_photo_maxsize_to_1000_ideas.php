<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePhotoMaxsizeTo1000Ideas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ideas', function (Blueprint $table) {
            // 画像サイズを1MBまでに変更
            $table->string('photo1', 1000)->change();
            $table->string('photo2', 1000)->nullable()->change();
            $table->string('photo3', 1000)->nullable()->change();
            $table->string('photo4', 1000)->nullable()->change();
            $table->string('photo5', 1000)->nullable()->change();
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
            
            $table->string('photo1')->change();
            $table->string('photo2')->nullable()->change();
            $table->string('photo3')->nullable()->change();
            $table->string('photo4')->nullable()->change();
            $table->string('photo5')->nullable()->change();
        });
    }
}
