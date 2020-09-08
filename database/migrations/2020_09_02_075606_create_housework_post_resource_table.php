<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseworkPostResourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('housework_post_resource', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('housework_post_id')->unsigned()->nullable();
            $table->string('type',50)->nullable();
            $table->text('content')->nullable();
            $table->smallInteger('status')->default('1');
            $table->timestamps();
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
        Schema::dropIfExists('housework_post_resource');
    }
}
