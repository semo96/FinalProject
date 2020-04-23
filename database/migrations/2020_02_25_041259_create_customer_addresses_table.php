<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->bigIncrements('Address_ID');
            $table->bigInteger('Customerid')->unsigned();
            $table->string('location_name')->nullable();
            $table->string('city')->default('صنعاء');
            $table->string('Area')->nullable();
            $table->string('country')->default('اليمن');;
            $table->double('lat')->nullable();
            $table->double('lng')->nullable(); 
            $table->foreign('Customerid')->references('Customer_ID')->on('registered_customeres')->onDelete('cascade');
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
        Schema::dropIfExists('customer_addresses');
    }
}
