<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidepopupablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guideables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pdf_guide_id')->nullable();
            $table->unsignedBigInteger('guideable_id')->nullable();
            $table->string('guideable_type')->nullable();
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
        Schema::dropIfExists('=Guideables');
    }
}
