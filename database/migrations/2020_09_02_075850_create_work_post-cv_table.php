<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkPostCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('work_post-cv', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cv_id')->unsigned()->nullable();
            $table->bigInteger('work_post_id')->unsigned()->nullable();
            $table->smallInteger('method')->nullable();
            $table->smallInteger('status')->default('1');
            $table->timestamps();
            $table->foreign('cv_id')->references('id')->on('cv');
            $table->foreign('work_post_id')->references('id')->on('work_post');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('work_post-cv');
    }
}
