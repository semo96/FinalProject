<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnregCustomeresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unreg_customeres', function (Blueprint $table) {
            $table->bigIncrements('Unreg_Customer_ID');
            $table->string('Unreg_Cust_fname');
            $table->string('Unreg_Cust_lname')->nullable();
            $table->string('Unreg_Cust_category')->nullable();
            $table->date('Unreg_Cus_Created_At')->nullable();
            $table->date('Unreg_Cus_Deleted_At')->nullable();
            $table->boolean('Unreg_Cus_remove_status')->nullable()->default(1);
            $table->string('Unreg_Customer_photo')->nullable();
            $table->string('cus_area')->nullable();
            $table->string('cus_address')->nullable();
            $table->integer('cus_phone')->nullable();
            $table->string('cus_email')->nullable();
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
        Schema::dropIfExists('unreg_customeres');
    }
}
