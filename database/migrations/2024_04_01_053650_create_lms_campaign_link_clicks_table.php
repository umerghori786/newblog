<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLmsCampaignLinkClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lms_campaign_link_clicks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->string('recipient_email')->nullable();
            $table->text('click_url')->nullable();
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
        Schema::dropIfExists('lms_campaign_link_clicks');
    }
}
