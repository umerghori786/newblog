<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->id();
            $table->text('mainHeading')->nullable();
            $table->text('subHeading')->nullable();
            $table->string('conditionOne')->nullable();
            $table->string('conditionTwo')->nullable();
            $table->string('conditionThree')->nullable();
            $table->text('valid_date');
            $table->text('buttonOne')->nullable();
            $table->text('buttonTwo')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->text('popupheadingOne')->nullable();
            $table->text('popupheadingTwo')->nullable();
            $table->text('popupheadingThree')->nullable();
            $table->text('prizeonetext')->nullable();
            $table->text('prizetwotext')->nullable();
            $table->text('prizethreetext')->nullable();
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
        Schema::dropIfExists('contests');
    }
}
