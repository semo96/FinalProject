<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalespersonAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('salesperson_addresses', function (Blueprint $table) {
            $table->bigIncrements('Address_ID');
            $table->bigInteger('SP_ID')->unsigned();
            $table->string('SP_Add_name');
            $table->foreign('SP_ID')->references('SP_ID')->on('salespeoples')->onDelete('cascade');
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
        Schema::dropIfExists('salesperson_addresses');
    }
}
