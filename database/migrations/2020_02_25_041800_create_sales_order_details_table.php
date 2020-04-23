<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('sales_order_details', function (Blueprint $table) {
            $table->bigIncrements('Detail_ID');
            $table->bigInteger('OrderID')->unsigned();
            $table->bigInteger('ProductID')->unsigned();
            $table->integer('Quantity');
            $table->string('Unit_of_measure');
            $table->foreign('OrderID')->references('SalesOrders_id')->on('sales_orders')->onDelete('cascade');
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
        Schema::dropIfExists('sales_order_details');
    }
}
