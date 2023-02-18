<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapterSentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_sents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mind_map_chapters')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('sent_to_teacher')->nullable();
            $table->integer('teacher_check')->nullable();
            $table->integer('sent_to_student')->nullable();
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
        Schema::dropIfExists('chapter_sents');
    }
}
