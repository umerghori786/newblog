<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdfGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdf_guides', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('filename')->nullable();
            $table->text('pdf_url')->nullable();
            $table->integer('seconds')->nullable();
            $table->integer('no_of_users')->nullable();
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
        Schema::dropIfExists('pdf_guides');
    }
}
