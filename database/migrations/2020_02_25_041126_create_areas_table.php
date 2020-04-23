<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 
        
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->bigIncrements('Area_ID');
            $table->string('city_name_Eng')->nullable();
            $table->string('city_name_Ar')->nullable();
            $table->string('AreaName_Eng')->nullable();
            $table->string('AreaName_Ar')->nullable();
            $table->text('City_Coordinates')->nullable();
            $table->double('lng')->nullable();
            $table->double('lat')->nullable();
            $table->string('AreaColor')->nullable();
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
        Schema::dropIfExists('areas');
    }
}
