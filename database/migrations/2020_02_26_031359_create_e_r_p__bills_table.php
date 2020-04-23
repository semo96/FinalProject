<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateERPBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_r_p__bills', function (Blueprint $table) {
            $table->bigIncrements('Bill_ID');
            $table->bigInteger('SalespersonID')->unsigned();
            $table->date('Bill_Issuing_Date');
            $table->boolean('Removal_status')->default(true);
            $table->string('Bill_Type')->nullable();
            $table->boolean('Bill_Status')->nullable();
            $table->string('Notes')->nullable();
            $table->foreign('SalespersonID')->references('SP_ID')->on('salespeoples')->onDelete('cascade');
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
        Schema::dropIfExists('e_r_p__bills');
    }
}
