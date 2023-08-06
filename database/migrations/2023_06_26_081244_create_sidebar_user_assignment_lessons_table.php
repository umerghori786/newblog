<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidebarUserAssignmentLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidebar_user_assignment_lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('automation_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('extraassignment_id')->nullable();
            $table->integer('extraassignment_status')->nullable();
            $table->integer('extralesson_id')->nullable();
            $table->integer('extralesson_status')->nullable();
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
        Schema::dropIfExists('sidebar_user_assignment_lessons');
    }
}
