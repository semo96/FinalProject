<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalespeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('salespeoples', function (Blueprint $table) {
            $table->bigIncrements('SP_ID');
            $table->string('SP_first_name');
            $table->string('SP_last_name')->nullable();
            $table->string('SP_username');
            $table->string('SP_Password');
            $table->boolean('SP_status')->nullable();
            $table->string('SP_Type')->nullable();
            $table->string('SP_image')->nullable();
            $table->double('SP_max_indebtedness')->nullable();
            $table->bigInteger('supervisorID')->unsigned();
            $table->foreign('supervisorID')->references('id')->on('supervisors')->onDelete('cascade');
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
        Schema::dropIfExists('salespeople');
    }
}
