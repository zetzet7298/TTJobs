<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHouseworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_housework', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('business_id')->unsigned()->nullable();
            $table->bigInteger('housework_id')->unsigned()->nullable();
            $table->smallInteger('status')->default('1');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('business_id')->references('id')->on('business');
            $table->foreign('housework_id')->references('id')->on('housework');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_housework');
    }
}
