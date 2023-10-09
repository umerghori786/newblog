<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFutureEventEmailConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('future_event_email_confirmations', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('yes_token')->nullable();
            $table->string('No_token')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('future_event_email_confirmations');
    }
}
