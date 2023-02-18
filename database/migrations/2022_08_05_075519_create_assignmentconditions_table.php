<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentconditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignmentconditions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('automation_id')->nullable();
            $table->unsignedBigInteger('extraassignment_one_id')->nullable();
            $table->unsignedBigInteger('segment_one_id')->nullable();
            $table->unsignedBigInteger('newlist_one_id')->nullable();
            $table->unsignedBigInteger('newgroup_one_id')->nullable();
            $table->unsignedBigInteger('extraassignment_two_id')->nullable();
            $table->unsignedBigInteger('segment_two_id')->nullable();
            $table->unsignedBigInteger('newlist_two_id')->nullable();
            $table->unsignedBigInteger('newgroup_two_id')->nullable();
            $table->integer('hour_two_go')->nullable();
            $table->integer('time_two_go')->nullable();
            $table->unsignedBigInteger('extraassignment_not_two_id')->nullable();
            $table->unsignedBigInteger('segment_not_two_id')->nullable();
            $table->unsignedBigInteger('newlist_not_two_id')->nullable();
            $table->unsignedBigInteger('newgroup_not_two_id')->nullable();
            $table->integer('hour_two_notgo')->nullable();
            $table->integer('time_two_notgo')->nullable();
            $table->unsignedBigInteger('extraassignment_three_id')->nullable();
            $table->unsignedBigInteger('segment_three_id')->nullable();
            $table->unsignedBigInteger('newlist_three_id')->nullable();
            $table->unsignedBigInteger('newgroup_three_id')->nullable();
            $table->integer('hour_three_go')->nullable();
            $table->integer('time_three_go')->nullable();
            $table->unsignedBigInteger('extraassignment_three_not_id')->nullable();
            $table->unsignedBigInteger('segment_three_not_id')->nullable();
            $table->unsignedBigInteger('newlist_three_not_id')->nullable();
            $table->unsignedBigInteger('newgroup_three_not_id')->nullable();
            $table->integer('hour_three_notgo')->nullable();
            $table->integer('time_three_notgo')->nullable();
            $table->unsignedBigInteger('extraassignment_one_not_id')->nullable();
            $table->unsignedBigInteger('segment_one_not_id')->nullable();
            $table->unsignedBigInteger('newlist_one_not_id')->nullable();
            $table->unsignedBigInteger('newgroup_one_not_id')->nullable();
            $table->integer('hour_one_notgo')->nullable();
            $table->integer('time_one_notgo')->nullable();

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
        Schema::dropIfExists('assignmentconditions');
    }
}
