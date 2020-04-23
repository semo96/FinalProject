<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /*->nullable(false)->change();*/
    /* usertype 1:m supervisors*/
    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sup_first_name');
            $table->string('sup_last_name')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('confirm_pass')->nullable();
            $table->string('address')->nullable();
           // $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('job_title')->default('Admin_Supervisor');
            $table->boolean('sup_status')->nullable();
            $table->boolean('is_admin')->nullable();
            $table->rememberToken();
            $table->string('sup_image')->nullable();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::create('supervisors', function (Blueprint $table) {
            $table->dropForeign(['usertype_ID']);

        });*/
        Schema::dropIfExists('supervisors');
    }
}
