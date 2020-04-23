<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasCoordinatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 
    public function up()
    {
        Schema::create('areas_coordinates', function (Blueprint $table) {
            $table->bigIncrements('Coordinate_ID');
            $table->double('lng');
            $table->double('lat');
            $table->bigInteger('AreaID')->unsigned();
            $table->foreign('AreaID')->references('Area_ID')->on('areas')->onDelete('cascade');
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
        Schema::dropIfExists('areas_coordinates');
    }
}
