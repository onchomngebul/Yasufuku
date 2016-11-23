<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProdActualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_actuals', function(Blueprint $table) {
            $table->increments('idprod_actual');
            $table->integer('idprod_plans');
            $table->integer('aplan_qty');
            $table->integer('aplan_shot');
            $table->integer('aplan_time');
            $table->integer('aprod_qty');
            $table->integer('aprod_shot');
            $table->float('performance');
            $table->integer('stop_loss');
            $table->float('ot_ratio');
            $table->float('ql_ratio');
            $table->integer('ng');
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
        Schema::drop('prod_actuals');
    }
}
