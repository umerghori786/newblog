<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_stories', function (Blueprint $table) {
            $table->id();
            $table->text('mainHeading')->nullable();
            $table->text('subHeading')->nullable();
            $table->string('conditionOne')->nullable();
            $table->string('conditionTwo')->nullable();
            $table->string('conditionThree')->nullable();
            $table->text('valid_date');
            $table->text('buttonOne')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
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
        Schema::dropIfExists('contest_stories');
    }
}
