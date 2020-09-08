<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user-housework_id')->unsigned()->nullable();
            $table->bigInteger('housework_post_id')->unsigned()->nullable();
            $table->date('start_date')->nullable();
            $table->float('price')->nullable();
            $table->text('note')->nullable();
            $table->smallInteger('status')->default('1');
            $table->timestamps();
            $table->foreign('user-housework_id')->references('id')->on('user_housework');
            $table->foreign('housework_post_id')->references('id')->on('housework_post');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quote');
    }
}
