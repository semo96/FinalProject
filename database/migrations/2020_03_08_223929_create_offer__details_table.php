<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer__details', function (Blueprint $table) {
            $table->bigIncrements('Offer_Detais_ID');
            $table->integer('Quantity');
            $table->float('discount');
            $table->text('Offer_desc')->nullable();
            $table->bigInteger('OfferID')->unsigned();
            $table->bigInteger('ProductID')->unsigned();
            $table->text('product_unite_of_measure');
            $table->bigInteger('CategoryID')->unsigned();
            $table->bigInteger('PriceID')->unsigned();
            $table->foreign('OfferID')->references('Offer_ID')->on('offers')->onDelete('cascade');
            $table->foreign('ProductID')->references('Product_ID')->on('products');
//            $table->foreign('Unite_of_measure_id')->references('Unite_of_measure_id')->on('products_unite_of_measures');
            $table->foreign('CategoryID')->references('Category_ID')->on('product_categories');
            $table->foreign('PriceID')->references('Price_ID')->on('product_prices');
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
        Schema::dropIfExists('offer__details');
    }
}
