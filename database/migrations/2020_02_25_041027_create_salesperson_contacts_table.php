<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalespersonContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('salesperson_contacts', function (Blueprint $table) {
            $table->bigIncrements('contact_ID');
            $table->bigInteger('SalespersonID')->unsigned();
            $table->integer('phone_number');
            $table->string('email_address')->nullable();
            $table->foreign('SalespersonID')->references('SP_ID')->on('salespeoples')->onDelete('cascade');
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
        Schema::dropIfExists('salesperson_contacts');
    }
}
