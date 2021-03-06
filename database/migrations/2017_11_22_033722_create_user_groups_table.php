<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_groups', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('parent_id')->nullable();
            $table->timestamps();
        });
        Schema::create('user_to_group', function (Blueprint $table) {
            $table->string('user_id');
            $table->string('user_group_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_groups');
        Schema::dropIfExists('user_to_group');

    }
}
