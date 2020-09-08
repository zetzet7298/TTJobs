<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->text('job')->nullable();
            $table->bigInteger('salary_id')->unsigned()->nullable();
            $table->text('qualification')->nullable();
            $table->bigInteger('work_time_id')->unsigned()->nullable();
            $table->bigInteger('experience_id')->unsigned()->nullable();
            $table->text('job_position')->nullable();
            $table->text('workplace')->nullable();
            $table->text('degree')->nullable();
            $table->text('intro')->nullable();
            $table->smallInteger('status')->default('1');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('salary_id')->references('id')->on('salary');
            $table->foreign('work_time_id')->references('id')->on('work_time');
            $table->foreign('experience_id')->references('id')->on('experience');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cv');
    }
}
