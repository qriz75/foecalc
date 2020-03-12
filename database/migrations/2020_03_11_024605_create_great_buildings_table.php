<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGreatBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gbs', function (Blueprint $table) {
            $table->bigIncrements('gbID');
            $table->unsignedBigInteger('ageID');
            $table->string('gbName');
            $table->timestamps();

            $table->foreign('ageID')->references('ageID')->on('ages')->onDelete('cascade');
        });
      
        Schema::create('boost_gb', function (Blueprint $table) {
            
            $table->unsignedBigInteger('boostID');
            $table->unsignedBigInteger('gbID');
          
            
            $table->float('value');
            $table->integer('level');
     
            $table->timestamps();
          
            $table->unique(['boostID', 'gbID']);
          
            $table->foreign('boostID')->references('boostID')->on('boosts')->onDelete('cascade');
            $table->foreign('gbID')->references('gbID')->on('gbs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('great_buildings');
    }
}
