<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->bigIncrements('SalesOrders_id');
            $table->bigInteger('Customerid')->unsigned();
            $table->bigInteger('Unreg_Customerid')->unsigned()->nullable();
            $table->boolean('Remove_status')->default(true);
            $table->string('Order_status')->nullable();
            $table->date('Order_Date');
            $table->string('Created_By');
            $table->foreign('Customerid')->references('Customer_ID')->on('registered_customeres');
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
        Schema::dropIfExists('sales_orders');
    }
}
