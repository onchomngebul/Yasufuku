<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProdPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_plans', function(Blueprint $table) {
            $table->increments('idprod_plans');
            $table->date('pp_date');
            $table->string('shift');
            $table->string('machine_no');
            $table->string('employee_no');
            $table->string('part_no');
            $table->integer('schedule_tm');
            $table->integer('cycle_tm');
            $table->integer('cav_no');
            $table->integer('pp_qty');
            $table->integer('pp_shot');
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
        Schema::drop('prod_plans');
    }
}
