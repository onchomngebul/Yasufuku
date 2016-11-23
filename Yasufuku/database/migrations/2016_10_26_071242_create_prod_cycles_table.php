<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProdCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_cycles', function(Blueprint $table) {
            $table->increments('idprod_cycle');
            $table->string('machine_no');
            $table->integer('shot');
            $table->time('start');
            $table->time('end');
            $table->time('duration');
            $table->text('note');
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
        Schema::drop('prod_cycles');
    }
}
