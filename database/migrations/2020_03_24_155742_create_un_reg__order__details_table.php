<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnRegOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('un_reg__order__details', function (Blueprint $table) {
            $table->bigIncrements('OrderDetail_ID');
            $table->bigInteger('OrderID')->unsigned();
            $table->bigInteger('ProductID')->unsigned();
            $table->integer('Quantity');
            $table->string('Unit_of_measure');
            $table->foreign('OrderID')->references('UnRegOrders_id')->on('un_reg__orders')->onDelete('cascade');
            $table->foreign('ProductID')->references('Product_ID')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('un_reg__order__details');
    }
}
