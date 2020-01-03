<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_item_info', function (Blueprint $table) {
            $table->bigIncrements('Item_id');
            $table->string('Item_name');
            $table->string('Item_price');
            $table->string('Item_ingredients');
            $table->string('Item_recipe');
            $table->string('Item_quantity');
            $table->string('Item_total_cost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_item_info');
    }
}
