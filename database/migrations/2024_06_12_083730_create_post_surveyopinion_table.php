<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostSurveyopinionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_surveyopinion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('newblog_id')->nullable();
            $table->unsignedBigInteger('post_opinion_id')->nullable();
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
        Schema::dropIfExists('post_surveyopinion');
    }
}
