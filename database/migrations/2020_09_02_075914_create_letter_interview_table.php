<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLetterInterviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_interview', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('work_post-cv_id')->unsigned()->nullable();
            $table->date('date')->nullable();
            $table->smallInteger('method')->nullable();
            $table->text('content')->nullable();
            $table->smallInteger('status')->default('1');
            $table->timestamps();
            $table->foreign('work_post-cv_id')->references('id')->on('work_post-cv');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('letter_interview');
    }
}
