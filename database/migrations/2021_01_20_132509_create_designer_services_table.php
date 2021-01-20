<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignerServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designer_services', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->text('detail');
            $table->string('price');
            $table->string('revisions');
            $table->string('number_of_designs');
            $table->string('designer_id');
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
        Schema::dropIfExists('designer_services');
    }
}
