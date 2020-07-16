<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaterIntakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_intakes', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('user_id');
            $table->bigInteger('weight');
            $table->bigInteger('height');
            $table->string('result','100');
            $table->string('age','50')->nullable();
            $table->string('gender','20');
            $table->string('date','50');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('water_intakes');
    }
}
