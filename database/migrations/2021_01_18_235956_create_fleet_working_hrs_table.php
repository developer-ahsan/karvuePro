<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFleetWorkingHrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleet_working_hrs', function (Blueprint $table) {
            $table->id();
            $table->string('week_day');
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('holiday')->default(0);
            $table->string('fleet_id');
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
        Schema::dropIfExists('fleet_working_hrs');
    }
}
