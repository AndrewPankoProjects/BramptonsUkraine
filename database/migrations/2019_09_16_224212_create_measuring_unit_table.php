<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasuringUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_measuring_unit', function (Blueprint $table) {
            $table->bigIncrements('Measuring_unit_id');
            $table->string('Teaspoon');
            $table->string('Cups');
            $table->string('Tablespoon');
            $table->string('Size');
            $table->string('Heads');
            $table->string('Pounds');
            $table->string('Grams');
            $table->string('Litres');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_measuring_unit');
    }
}
