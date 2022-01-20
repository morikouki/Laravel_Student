<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class People2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schmeクラスのcreteメソッドを使用している。第1引数にテーブル名、第2引数にテーブル作成のための処理をまとめたクロージャを指定する
        Schema::create('people', function (Blueprint $table) {

            //プライマリキーの設定。incrementでオートインクリメントとなり、自動採番もつく。->primary()メソッドでもプライマリー指定可能
            $table->increments('id');
            $table->string('name');
            $table->string('mail');
            $table->integer('age');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //下記はテーブルがあれば削除される。drop('')メソッドは、テーブル削除
        Schema::dropIfExists('people');
    }
}
