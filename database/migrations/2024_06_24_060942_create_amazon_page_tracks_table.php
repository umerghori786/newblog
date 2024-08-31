<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmazonPageTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amazon_page_tracks', function (Blueprint $table) {
            $table->id();
            $table->text('email')->nullable();
            $table->text('name')->nullable();
            $table->text('btn_title')->nullable();
            $table->integer('click')->default(1);
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
        Schema::dropIfExists('amazon_page_tracks');
    }
}
