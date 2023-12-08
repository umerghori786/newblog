<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFalshMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('falsh_messages', function (Blueprint $table) {
            $table->id();
            $table->integer('layer_one_points')->nullable();
            $table->string('title_layer_one')->nullable();
            $table->integer('layer_two_points')->nullable();
            $table->string('title_layer_two')->nullable();
            $table->integer('layer_three_points')->nullable();
            $table->string('title_layer_three')->nullable();
            $table->integer('layer_four_points')->nullable();
            $table->string('title_layer_four')->nullable();
            $table->integer('layer_five_points')->nullable();
            $table->string('title_layer_five')->nullable();
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
        Schema::dropIfExists('falsh_messages');
    }
}
