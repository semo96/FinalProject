<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('Offer_ID');
            $table->date('start_date');
            $table->date('finish_date');
            $table->boolean('Offer_status')->nullable();
            $table->string('Offer_Type')->nullable();
            $table->string('Offer_image')->nullable();
            $table->date('offer_Deleted_At')->nullable();
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
        Schema::dropIfExists('offers');
    }
}
