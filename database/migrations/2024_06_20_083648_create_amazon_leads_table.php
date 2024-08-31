<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmazonLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amazon_leads', function (Blueprint $table) {
            $table->id();
            $table->text('email')->nullable();
            $table->text('name')->nullable();
            $table->text('filename')->nullable();
            $table->text('amaozn_url')->nullable();
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
        Schema::dropIfExists('amazon_leads');
    }
}
