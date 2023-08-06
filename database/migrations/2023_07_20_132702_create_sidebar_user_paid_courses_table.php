<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidebarUserPaidCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidebar_user_paid_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('automation_id')->nullable();
            $table->unsignedBigInteger('target_id')->nullable();
            $table->unsignedBigInteger('paidcourse_id')->nullable();
            $table->integer('move_out_course_complete')->nullable();
            $table->integer('move_out_not_course_complete')->nullable();
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
        Schema::dropIfExists('sidebar_user_paid_courses');
    }
}
