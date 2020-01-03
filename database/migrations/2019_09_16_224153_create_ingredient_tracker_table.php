<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientTrackerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_ingredient_tracker', function (Blueprint $table) {
            $table->bigIncrements('ingredientTracker_id');
            $table->string('Ingredient_name');
            $table->string('Ingredient_quantity');
            //Join other tables (foreign keys)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_ingredient_tracker');
    }
}
