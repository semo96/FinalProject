<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnRegOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('un_reg__orders', function (Blueprint $table) {
            $table->bigIncrements('UnRegOrders_id');
            $table->bigInteger('Unreg_Customerid')->unsigned();
            $table->boolean('Remove_status')->default(true);
            $table->string('Order_status')->nullable();
            $table->date('Order_Date');
            $table->string('Created_By');
            $table->foreign('Unreg_Customerid')->references('Unreg_Customer_ID')->on('unreg_customeres');
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
        Schema::dropIfExists('un_reg__orders');
    }
}
