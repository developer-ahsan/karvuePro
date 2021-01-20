<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrinterServiceHrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printer_service_hrs', function (Blueprint $table) {
            $table->id();
            $table->string('week_day');
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('holiday')->default(0);
            $table->string('printer_id');
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
        Schema::dropIfExists('printer_service_hrs');
    }
}
