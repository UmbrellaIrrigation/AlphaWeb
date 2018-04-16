<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeeklyScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_schedule', function (Blueprint $table) {
            $table->string('id');
            $table->string('valve_id');
            //each day_time entry is in the format "XX:XX AM/PM - XX:XX AM/PM"
            $table->string('monday_times');
            $table->string('tuesday_times');
            $table->string('wednesday_times');
            $table->string('thursday_times');
            $table->string('friday_times');
            $table->string('saturday_times');
            $table->string('sunday_times');
            //each date in the format "DD/MM/YYYY"
            $table->string('start_date');
            $table->string('end_date');
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
        Schema::dropIfExists('weekly_schedule');
    }
}
