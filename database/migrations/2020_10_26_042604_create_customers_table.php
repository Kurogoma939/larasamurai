<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->biginteger('id')->primarykey()->autoIncrement()->nullable(false)->unsigned()->comment('ID');
            $table->string('last_name',255)->nullable(false)->comment('姓');
            $table->string('first_name',255)->nullable(false)->comment('名');
            $table->string('last_kana',255)->nullable(false)->comment('姓かな');
            $table->string('first_kana',255)->nullable(false)->comment('名かな');
            $table->integer('gender')->nullable(false)->unsigned()->comment('性別');
            $table->datetime('birthday')->nullable(false)->format('Y-m-d')->comment('生年月日');
            $table->string('post_code',255)->nullable(false)->comment('郵便番号');

            $table->integer('pref_id')->unsigned()->nullable(false)->comment('都道府県ID');
            $table->foreign('pref_id')->references('id')->on('prefs');

            $table->integer('city_id')->unsigned()->nullable(false)->comment('市区町村名');
            $table->foreign('city_id')->references('id')->on('cities');

            $table->string('address',255)->nullable(false)->comment('住所');
            $table->string('building',255)->nullable(true)->comment('建物名');
            $table->string('tel',255)->nullable(false)->comment('電話番号');
            $table->string('mobile',255)->nullable(false)->comment('携帯番号');
            $table->string('email',255)->nullable(false)->unique('email')->comment('メールアドレス');
            $table->text('remarks')->nullable(true)->comment('備考');
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
        Schema::dropIfExists('customers');
    }

}

