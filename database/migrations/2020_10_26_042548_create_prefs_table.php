<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prefs', function (Blueprint $table) {
            $table->increments('id')->integer()->primarykey()->nullable(false)->unsigned()->comment('ID');
            $table->string('name',128)->nullabe(false)->comment('都道府県名');
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
        Schema::dropIfExists('prefs');
    }
}
