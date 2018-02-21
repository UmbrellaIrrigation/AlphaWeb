<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValveGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valve_groups', function (Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->string('parent_id')->nullable();
            $table->timestamps();
        });

        Schema::create('valve_to_group', function (Blueprint $table) {
            $table->string('valve_group_id');
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
        Schema::dropIfExists('valve_groups');
        Schema::dropIfExists('valve_to_group');
    }
    // public function down()
    // {
    //     Schema::dropIfExists('valve_group', function(Blueprint $table) {
    //         $table->string('valve_group_id')
    //         $table->string('valve_id')
    //         $table->timestamps();

    //     });
    // }
}
