<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmazonBookBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amazon_book_blogs', function (Blueprint $table) {
            $table->id();
            $table->text('email')->nullable();
            $table->text('objective')->nullable();
            $table->integer('no_of_books')->nullable();
            $table->text('books_url_1')->nullable();
            $table->text('books_url_2')->nullable();
            $table->text('books_url_3')->nullable();
            $table->text('books_url_4')->nullable();
            $table->text('books_url_5')->nullable();
            $table->text('books_url_6')->nullable();
            $table->text('books_url_7')->nullable();
            $table->text('books_url_8')->nullable();
            $table->text('books_url_9')->nullable();
            $table->text('books_url_10')->nullable();
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
        Schema::dropIfExists('amazon_book_blogs');
    }
}
