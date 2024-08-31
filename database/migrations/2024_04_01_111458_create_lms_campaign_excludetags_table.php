<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLmsCampaignExcludetagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lms_campaign_excludetags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->unsignedBigInteger('campaign_id')->nullable();
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
        Schema::dropIfExists('lms_campaign_excludetags');
    }
}
