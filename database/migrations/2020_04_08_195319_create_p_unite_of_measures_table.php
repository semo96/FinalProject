<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePUniteOfMeasuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_unite_of_measures', function (Blueprint $table) {
            $table->bigIncrements('p_unite_of_measure_id');
            $table->bigInteger('Products_id')->unsigned();
            $table->bigInteger('product_unite_of_measure_id')->unsigned();
            $table->foreign('product_unite_of_measure_id')->references('product_unite_of_measure_id')->on('product_unite_of_measures')->onDelete('cascade');
            $table->foreign('Products_id')->references('Product_ID')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('p_unite_of_measures');
    }
}
