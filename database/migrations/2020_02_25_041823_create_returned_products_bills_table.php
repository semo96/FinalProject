<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnedProductsBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  
    public function up()
    {
        Schema::create('returned_products_bills', function (Blueprint $table) {
            $table->bigIncrements('Bill_ID');
            $table->bigInteger('Sale_Bill_ID')->unsigned();
            $table->date('Bill_Date');
            $table->string('Return_type')->nullable();
            $table->string('Return_Reason')->nullable();
            $table->string('Notes')->nullable();
            $table->string('Bill_Status')->nullable();
            $table->boolean('Remove_status')->default(true);
            $table->foreign('Sale_Bill_ID')->references('Bill_ID')->on('sales_bills')->onDelete('cascade');
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
        Schema::dropIfExists('returned_products_bills');
    }
}
