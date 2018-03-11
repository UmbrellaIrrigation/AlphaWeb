<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->text('description');
            $table->string('email')->unique();
            $table->integer('permission')->default(1); //1: guest 2: employee 3: admin
            $table->string('password');
            $table->tinyInteger('notification_preference')->default(0); //0:none 1:app 2:email
            $table->boolean('verified')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('employee_to_guest', function (Blueprint $table){
            $table->string('employee_id');
            $table->string('guest_id');
        });
        Schema::create('guest_to_employee', function (Blueprint $table){
            $table->string('guest_id');
            $table->string('employee_id');
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
