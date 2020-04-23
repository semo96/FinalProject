<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('sales_bills', function (Blueprint $table) {
            $table->bigIncrements('Bill_ID');
            $table->date('Bill_Date');
            $table->string('Bill_Type')->nullable();
            $table->string('Bill_status')->nullable();
            $table->boolean('Bill_RemovalStatus')->default(true);
            $table->string('Notes')->nullable;
            $table->bigInteger('SalespersonID')->unsigned();
            $table->bigInteger('CustomerID')->unsigned();
            $table->foreign('SalespersonID')->references('SP_ID')->on('salespeoples');
            $table->foreign('CustomerID')->references('Customer_ID')->on('registered_customeres');
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
        Schema::dropIfExists('sales_bills');
    }
}
