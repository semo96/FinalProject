<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisor_contacts', function (Blueprint $table) {
            $table->bigIncrements('contact_Id');
            $table->integer('phone_number');
            $table->string('email_address')->nullable();
            $table->bigInteger('supervisorID')->unsigned();
            $table->foreign('supervisorID')->references('id')->on('supervisors')->onDelete('cascade');
            $table->timestamps();
            $table->dropTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('supervisor_contacts');
    }
}
