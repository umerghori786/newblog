<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterUserTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_user_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('automation_id')->nullable();
            $table->unsignedBigInteger('extraassignment_id')->nullable();
            $table->string('extraassignment_subject')->nullable();
            $table->longText('extraassignment_body')->nullable();
            $table->unsignedBigInteger('extralesson_id')->nullable();
            $table->string('extralesson_subject')->nullable();
            $table->longText('extralesson_body')->nullable();
            $table->time('extralesson_time')->nullable();
            $table->time('extralesson_hour')->nullable();
            $table->unsignedBigInteger('freecourse_id')->nullable();
            $table->string('frercourse_subject')->nullable();
            $table->longText('freecourse_body')->nullable();
            $table->time('freecourse_time')->nullable();
            $table->time('freecourse_hour')->nullable();
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
        Schema::dropIfExists('register_user_tasks');
    }
}
