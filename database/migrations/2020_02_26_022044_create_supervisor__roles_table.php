<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisor__roles', function (Blueprint $table) {
            $table->bigIncrements('User_role_ID');
            $table->bigInteger('RoleID')->unsigned();
            $table->bigInteger('SupervisorID')->unsigned();
            $table->foreign('RoleID')->references('Role_ID')->on('roles')->onDelete('cascade');
            $table->foreign('SupervisorID')->references('id')->on('supervisors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supervisor__roles');
    }
}
