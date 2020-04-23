<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer__offers', function (Blueprint $table) {
            $table->bigIncrements('Customer_Offer_ID');
            $table->bigInteger('OfferID')->unsigned();
            $table->bigInteger('CustomerID')->unsigned();
            $table->foreign('OfferID')->references('Offer_ID')->on('offers')->onDelete('cascade');
            $table->foreign('CustomerID')->references('Customer_ID')->on('registered_customeres')->onDelete('cascade');
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
        Schema::dropIfExists('customer__offers');
    }
}
