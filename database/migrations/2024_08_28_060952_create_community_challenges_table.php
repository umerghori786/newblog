<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_challenges', function (Blueprint $table) {
            $table->id();
            $table->text('click_url')->nullable();
            $table->string('video_url')->nullable();
            $table->string('video_filename')->nullable();
            $table->integer('is_video')->nullable();
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
        Schema::dropIfExists('community_challenges');
    }
}
