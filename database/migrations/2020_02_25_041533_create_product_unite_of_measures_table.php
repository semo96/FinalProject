<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductUniteOfMeasuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('product_unite_of_measures', function (Blueprint $table) {
            $table->bigIncrements('product_unite_of_measure_id');
            $table->string('Primary_unite');
            $table->string('Secondary_unite')->nullable();
            $table->string('Mid_unite')->nullable();
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
        Schema::dropIfExists('product_unite_of_measures');
    }
}
