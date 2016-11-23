<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('role')->nullable();
            $table->string('login_session')->nullable();
            $table->string('active')->nullable();
            $table->string('employee_no')->nullable();
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
            //
            $table->dropColumn('role');
            $table->dropColumn('login_session');
            $table->dropColumn('active');
            $table->dropColumn('employee_no');
        });
    }
}
