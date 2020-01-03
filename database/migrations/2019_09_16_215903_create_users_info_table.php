<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('First_name')->nullable($value = true);
            $table->string('Last_name')->nullable($value = true);
            $table->timestamp('email_verified_at')->nullable($value = true);
            $table->string('Phone_number')->nullable($value = true);
            $table->string('Premium_status')->nullable($value = true);
            $table->string('Member_since')->nullable($value = true);
            $table->string('Orders_total')->nullable($value = true);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
