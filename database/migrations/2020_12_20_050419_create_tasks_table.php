<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('r_user_id');
            $table->datetime('task_date');
            $table->double('dep_lat',20,15);
            $table->double('dep_lon',20,15);
            $table->double('des_lat',20,15);
            $table->double('des_lon',20,15);
            $table->text('desc')->nullable()->default(null);
            $table->integer('r_charge');
            $table->integer('u_reward');
            $table->integer('o_fee');
            $table->integer('u_user_id')->nullable()->default(null);
            $table->timestamp('r_time')->nullable()->default(null);
            $table->timestamp('u_time')->nullable()->default(null);
            $table->integer('task_status_id');
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
        Schema::dropIfExists('tasks');
    }
}
