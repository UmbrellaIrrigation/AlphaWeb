<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valves', function (Blueprint $table) {
            $table->string('id');
            $table->string('parent_id')->nullable();
            $table->string('name');
            $table->text('description');
            $table->double('latitude');
            $table->double('longitude');
            $table->double('min_flow');
            $table->double('max_flow');
            $table->double('current_flow');
            $table->double('min_voltage');
            $table->double('max_voltage');
            $table->double('current_voltage');
            $table->boolean('normally_open');
            $table->boolean('is_parent');
            $table->boolean('supressed');
            $table->boolean('postponed');
            $table->boolean('shutdown');
            $table->boolean('alert');
            $table->boolean('overriden');
            $table->timestamps();
        });

        Schema::create('valve_to_user', function (Blueprint $table) {
            $table->string('user_id');
            $table->string('valve_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valves');
        Schema::dropIfExists('valve_to_user');
    }

}
