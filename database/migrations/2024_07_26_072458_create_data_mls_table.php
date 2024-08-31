<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataMlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_mls', function (Blueprint $table) {
            $table->id();
            $table->string('cookie')->nullable();
            $table->string('email')->nullable();
            $table->string('url')->nullable();
            $table->string('time_spent')->nullable();
            $table->string('device_type')->nullable();
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
        Schema::dropIfExists('data_mls');
    }
}
