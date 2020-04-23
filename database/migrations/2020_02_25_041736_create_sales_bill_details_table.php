<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('sales_bill_details', function (Blueprint $table) {
            $table->bigIncrements('Detail_ID');
            $table->bigInteger('Sale_Bill_ID')->unsigned();
            $table->bigInteger('ProductID')->unsigned();
            $table->bigInteger('Product_lot_num')->nullable();
            $table->integer('Quantity');
            $table->double('Price');
            $table->foreign('Sale_Bill_ID')->references('Bill_ID')->on('sales_bills')->onDelete('cascade');
            $table->foreign('ProductID')->references('Product_ID')->on('products');
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
        Schema::dropIfExists('sales_bill_details');
    }
}
