<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateERPBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_r_p__bill__details', function (Blueprint $table) {
            $table->bigIncrements(' Detail_ID');
            $table->bigInteger('ERP_Bill_ID')->unsigned();
            $table->bigInteger('ProductID')->unsigned();
            $table->integer('Product_lot_num')->nullable();
            $table->integer('Quantity');
            $table->double('Price');
            $table->foreign('ERP_Bill_ID')->references('Bill_ID')->on('e_r_p__bills')->onDelete('cascade');
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
        Schema::dropIfExists('e_r_p__bill__details');
    }
}
