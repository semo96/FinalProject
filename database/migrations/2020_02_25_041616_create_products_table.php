<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('Product_ID');
            $table->string('Product_name');
            $table->boolean('Product_status')->nullable();
            $table->string('Product_Description')->nullable();
            $table->bigInteger('Long_num')->nullable();
            $table->bigInteger('Lot_num')->nullable();
//            $table->bigInteger('Unite_of_measure_id')->unsigned();
            $table->bigInteger('CategoryID')->unsigned();
//            $table->bigInteger('PriceID')->unsigned();
            $table->string('Product_image')->nullable();
//            $table->foreign('Unite_of_measure_id')->references('Unite_of_measure_id')->on('products_unite_of_measures')->onDelete('cascade');
            $table->foreign('CategoryID')->references('Category_ID')->on('product_categories')->onDelete('cascade');
//            $table->foreign('PriceID')->references('Price_ID')->on('product_prices')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
