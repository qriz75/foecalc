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
            $table->bigIncrements('ageID');
            $table->string('ageName');
            $table->timestamps();
        });
      
        Schema::create('age_level_data', function (Blueprint $table) {    
            
            $table->integer('level');
          
            $table->integer('fp1st');
            $table->integer('fp2nd');
            $table->integer('fp3rd');
            $table->integer('fp4th');
            $table->integer('fp5th');

            $table->integer('medal1st');
            $table->integer('medal2nd');
            $table->integer('medal3rd');
            $table->integer('medal4th');
            $table->integer('medal5th');          

            $table->integer('bp1st');
            $table->integer('bp2nd');
            $table->integer('bp3rd');
            $table->integer('bp4th');
            $table->integer('bp5th');     
            
            $table->unsignedBigInteger('ageID');
            $table->string('age_level_data')->unique();
          
            $table->timestamps();            
          
            $table->foreign('ageID')->references('ageID')->on('ages')->onDelete('cascade');
        });
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
