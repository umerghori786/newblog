<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmazonBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amazon_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('title')->nullable();
            $table->text('filename')->nullable();
            $table->text('image_url')->nullable();
            $table->string('author_name')->nullable();
            $table->string('slogan')->nullable();
            $table->text('description')->nullable();
            $table->integer('is_amazon_account')->nullable();
            $table->text('amazon_email')->nullable();
            $table->text('amazon_password')->nullable();
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
        Schema::dropIfExists('amazon_books');
    }
}
