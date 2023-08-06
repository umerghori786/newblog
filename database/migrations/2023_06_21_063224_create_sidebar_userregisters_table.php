<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidebarUserregistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidebar_userregisters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('automation_id')->nullable();
            $table->unsignedBigInteger('target_id')->nullable();
            $table->unsignedBigInteger('freecourse_id')->nullable();
            $table->text('time')->nullable();
            $table->unsignedBigInteger('extraassignment_id')->nullable();
            $table->unsignedBigInteger('extralesson_id')->nullable();
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
        Schema::dropIfExists('sidebar_userregisters');
    }
}
