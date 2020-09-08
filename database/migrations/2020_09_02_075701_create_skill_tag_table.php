<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('field_id')->unsigned()->nullable();
            $table->string('name',255)->nullable();
            $table->string('slug',255)->nullable();
            $table->smallInteger('status')->default('1');
            $table->timestamps();
            $table->foreign('field_id')->references('id')->on('field');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skill_tag');
    }
}
