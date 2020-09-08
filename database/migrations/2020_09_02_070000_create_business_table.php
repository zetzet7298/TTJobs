<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('type_business_id')->unsigned()->nullable();
            $table->string('name',255)->nullable();
            $table->integer('type_id')->nullable();
            $table->string('address',255)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('tax_code',10)->nullable();
            $table->smallInteger('status')->default('1');
            $table->timestamps();
            $table->foreign('type_business_id')->references('id')->on('type_business');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business');
    }
}
