<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('Task_ID');
            $table->date('Task_Start_date');
            $table->date('Task_End_date');
            $table->boolean('Remove_Status')->default(1);
            $table->double('Task_sales_target')->nullable();
            $table->bigInteger('Task_Area_ID')->unsigned();
            $table->bigInteger('SalespersonID')->unsigned();
            $table->bigInteger('supervisorID')->unsigned();
            $table->date('Task_Deleted_At')->nullable();
            $table->foreign('Task_Area_ID')->references('Area_ID')->on('areas');
            $table->foreign('SalespersonID')->references('SP_ID')->on('salespeoples');
            $table->foreign('supervisorID')->references('id')->on('supervisors');
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
        Schema::dropIfExists('tasks');
    }
}
