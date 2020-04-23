<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisteredCustomeresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('registered_customeres', function (Blueprint $table) {
            $table->bigIncrements('Customer_ID');
            $table->string('Cust_first_name');
            $table->string('Cust_last_name')->nullable();
            $table->integer('Cust_group_ID')->nullable();
            $table->string('Cust_category')->nullable();
            $table->double('Maximum_credit')->nullable();
            $table->bigInteger('Activation_code')->unsigned()->nullable();
            $table->bigInteger('SalespersonID')->unsigned();
            $table->foreign('SalespersonID')->references('SP_ID')->on('salespeoples');
            $table->date('Cus_Created_At')->nullable();
            $table->date('Cus_Deleted_At')->nullable();
            $table->boolean('Cus_remove_status')->nullable()->default(1);
            $table->string('Customer_photo')->nullable();
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
        Schema::dropIfExists('registered_customeres');
    }
}
