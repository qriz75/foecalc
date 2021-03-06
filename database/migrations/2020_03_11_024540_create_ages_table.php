<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('short');
            $table->mediumText('description');
            $table->mediumText('image')->nullable();
            $table->timestamps();
        });

        /* Schema::create('age_level_data', function (Blueprint $table) {

            $table->integer('level');

            $table->integer('fpCost');

            $table->integer('fp1st');

            $table->integer('medal1st');


            $table->unsignedBigInteger('ageID');
            $table->string('age_level_data')->unique();

            $table->timestamps();

            $table->foreign('ageID')->references('ageID')->on('ages')->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ages');
    }
}
