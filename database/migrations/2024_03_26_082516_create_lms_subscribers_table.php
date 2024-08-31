<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLmsSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lms_subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('unsubscribe_at')->nullable();
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
        Schema::dropIfExists('lms_subscribers');
    }
}
