<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id')->integer()->primarykey()->nullable(false)->unsigned()->comment('ID');

            $table->integer('pref_id')->unsigned()->nullable(false)->comment('都道府県ID');
            $table->foreign('pref_id')->references('id')->on('prefs');

            $table->string('name',128)->nullabe(false)->comment('市区町村名');
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
        Schema::dropIfExists('cities');
    }
}
