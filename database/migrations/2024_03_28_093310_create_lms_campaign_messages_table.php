<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLmsCampaignMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lms_campaign_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->string('recipient_email')->nullable();
            $table->string('subject')->nullable();
            $table->integer('open_count')->default(0);
            $table->integer('click_count')->default(0);
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
        Schema::dropIfExists('lms_campaign_messages');
    }
}
