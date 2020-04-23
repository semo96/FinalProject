<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnedProductsBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  
    public function up()
    {
        Schema::create('returned_products_bill_details', function (Blueprint $table) {
            $table->bigIncrements('Detail_ID');
            $table->bigInteger('Return_Bill_ID')->unsigned();
            $table->double('Product_lot_num')->nullable();
            $table->integer('Quantity');
            $table->foreign('Return_Bill_ID')->references('Bill_ID')->on('returned_products_bills')->onDelete('cascade');
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
        Schema::dropIfExists('returned_products_bill_details');
    }
}
