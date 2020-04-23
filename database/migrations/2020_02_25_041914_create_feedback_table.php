<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->bigIncrements('Feedback_ID');
            $table->string('Feedback_Type')->nullable();
            $table->string('Feedback_Subject')->nullable();
            $table->text('Feedback_Message');
            $table->date('Feedback_Date')->nullable();
            $table->string('Feedback_Status')->nullable();
            $table->boolean('Remove_Status')->default(true);
            $table->bigInteger('Cus_ID')->unsigned();
            $table->foreign('Cus_ID')->references('Customer_ID')->on('registered_customeres')->onDelete('cascade');
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
        Schema::dropIfExists('feedback');
    }
}
