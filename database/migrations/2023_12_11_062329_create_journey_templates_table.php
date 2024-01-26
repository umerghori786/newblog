<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourneyTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journey_templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('journey_id')->nullable();
            $table->string('email_subject')->nullable();
            $table->string('template_title')->nullable();
            $table->text('template_description')->nullable();
            $table->string('filename')->nullable();
            $table->string('image_url')->nullable();
            $table->string('btn_text')->nullable();
            $table->string('btn_link')->nullable();
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
        Schema::dropIfExists('journey_templates');
    }
}
