<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoplossRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stoploss_records', function(Blueprint $table) {
            $table->increments('idsl_record');
            $table->integer('idsl_master');
            $table->integer('idprod_actual');
            $table->integer('sl_duration');
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
        Schema::drop('stoploss_records');
    }
}
