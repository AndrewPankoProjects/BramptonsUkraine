<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_address_info', function (Blueprint $table) {
            $table->bigIncrements('Address_id');
            $table->string('Address');
            $table->string('City');
            $table->string('Postal_code');
            $table->string('Province');
            $table->string('Country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_address_info');
    }
}
