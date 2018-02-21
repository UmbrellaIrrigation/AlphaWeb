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
            $table->text('description')->nullable()->default(null);
            $table->double('latitude')->nullable()->default(null);
            $table->double('longitude')->nullable()->default(null);
            $table->double('min_flow_limit')->nullable()->default(null);
            $table->double('max_flow_limit')->nullable()->default(null);
            $table->double('nominal_flow_limit')->nullable()->default(null);
            // $table->double('max_curr_limit');
            // $table->double('min_curr_limit');
            $table->double('curr_flow')->nullable()->default(null);
            $table->double('max_gpm')->nullable()->default(null);
            $table->double('min_voltage')->nullable()->default(null);
            $table->double('max_voltage')->nullable()->default(null);
            $table->double('curr_voltage')->nullable()->default(null);
            $table->boolean('normally_open')->default(false);
            $table->boolean('is_parent')->default(false);
            $table->boolean('suppressed')->default(false);
            $table->boolean('postponed')->default(false);
            $table->boolean('shutdown')->default(false);
            $table->boolean('alert')->default(false);
            $table->boolean('overriden')->default(false);
            $table->time('last_run_time')->nullable()->default(null);
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
