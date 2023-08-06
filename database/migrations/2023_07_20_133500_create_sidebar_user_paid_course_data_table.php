<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidebarUserPaidCourseDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidebar_user_paid_course_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sidebar_user_paid_course_id')->nullable();
            $table->unsignedBigInteger('lesson_id')->nullable();
            $table->unsignedBigInteger('pill_course_id')->nullable();
            $table->unsignedBigInteger('pill_extralesson_id')->nullable();
            $table->unsignedBigInteger('pill_extraassignment_id')->nullable();
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
        Schema::dropIfExists('sidebar_user_paid_course_data');
    }
}
