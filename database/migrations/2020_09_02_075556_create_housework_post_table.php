<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseworkPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('housework_post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_housework_id')->unsigned()->nullable();
            $table->bigInteger('housework_id')->unsigned()->nullable();
            $table->string('address',255)->nullable();
            $table->text('describe')->nullable();
            $table->string('friends')->nullable();
            $table->boolean('search_method')->nullable();
            $table->smallInteger('status')->default('1');
            $table->timestamps();
            $table->foreign('user_housework_id')->references('id')->on('user_housework');
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
        Schema::dropIfExists('housework_post');
    }
}
