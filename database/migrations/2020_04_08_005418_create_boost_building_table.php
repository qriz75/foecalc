<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoostBuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boost_building', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('boost_id');
            $table->unsignedBigInteger('building_id');


            //$table->float('value')->nullable();
            //$table->integer('level')->nullable();

            $table->timestamps();

            $table->unique(['boost_id', 'building_id']);

            $table->foreign('boost_id')->references('id')->on('boosts')->onDelete('cascade');
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boost_building');
    }
}
