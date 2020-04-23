<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('product_prices', function (Blueprint $table) {
            $table->bigIncrements('Price_ID');
            $table->double('Unite_price')->nullable();
            $table->double('Retail_price')->nullable();
            $table->double('Whole_price')->nullable();
            $table->double('Yemeni_price')->nullable();
            $table->double('Dolar_price')->nullable();
            $table->boolean('Price_status');
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
        Schema::dropIfExists('product_prices');
    }
}
