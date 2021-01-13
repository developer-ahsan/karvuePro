<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercialfleetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercialfleets', function (Blueprint $table) {
            $table->id();
            $table->string('c_name');
            $table->string('c_phone');
            $table->string('locationField');
            $table->string('administrative_area_level_1');
            $table->string('locality');
            $table->date('date');
            $table->string('time');
            $table->string('insure_status');
            $table->string('status')->default(0);
            $table->string('image');
            $table->string('source');
            $table->string('destination');
            $table->string('user_id');
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
        Schema::dropIfExists('commercialfleets');
    }
}
