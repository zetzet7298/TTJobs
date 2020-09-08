<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_business_id')->unsigned()->nullable();
            $table->bigInteger('work_time_id')->unsigned()->nullable();
            $table->bigInteger('salary_id')->unsigned()->nullable();
            $table->bigInteger('age_id')->unsigned()->nullable();
            $table->bigInteger('degree_id')->unsigned()->nullable();
            $table->bigInteger('experience_id')->unsigned()->nullable();
            $table->smallInteger('quantity')->nullable();
            $table->smallInteger('sex')->nullable();
            $table->date('deadline')->nullable();
            $table->text('addresses')->nullable();
            $table->text('position')->nullable();
            $table->text('fields')->nullable();
            $table->text('skills')->nullable();
            $table->text('require_content')->nullable();
            $table->text('benefit_content')->nullable();
            $table->smallInteger('status')->default('1');
            $table->timestamps();
            $table->foreign('user_business_id')->references('id')->on('user_business');
            $table->foreign('salary_id')->references('id')->on('salary');
            $table->foreign('experience_id')->references('id')->on('experience');
            $table->foreign('work_time_id')->references('id')->on('work_time');
            $table->foreign('age_id')->references('id')->on('age');
            $table->foreign('degree_id')->references('id')->on('degree');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_post');
    }
}
