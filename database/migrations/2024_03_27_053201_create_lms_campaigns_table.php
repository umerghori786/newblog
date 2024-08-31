<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLmsCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lms_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('email_subject')->nullable();
            $table->text('email_description')->nullable();
            $table->string('btn_text')->nullable();
            $table->string('btn_link')->nullable();
            $table->string('filename')->nullable();
            $table->string('image_url')->nullable();
            $table->integer('sent_count')->default(0);
            $table->integer('open_count')->default(0);
            $table->integer('click_count')->default(0);
            $table->integer('send_to_all')->default(0);
            $table->integer('save_as_draft')->default(0);
            $table->integer('scheduled_at')->default(0);
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
        Schema::dropIfExists('lms_campaigns');
    }
}
