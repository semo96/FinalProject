<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstalmentsBondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('instalments_bonds', function (Blueprint $table) {
            $table->bigIncrements('Bond_ID');
            $table->bigInteger('SalesBillID')->unsigned();
            $table->date('Bond_Date');
            $table->string('Bill_Type')->nullable();
            $table->double('Total_indebtednes');
            $table->double('Paid');
            $table->double('Remaining');
            $table->boolean('Remove_status')->default(true);
            $table->string('Notes')->nullable();
            $table->foreign('SalesBillID')->references('Bill_ID')->on('sales_bills')->onDelete('cascade');
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
        Schema::dropIfExists('instalments_bonds');
    }
}
