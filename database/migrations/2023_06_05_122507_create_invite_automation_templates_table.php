<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInviteAutomationTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invite_automation_templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invitation_automation_id')->nullable();
            $table->unsignedBigInteger('template_id')->nullable();
            $table->text('sent_at')->nullable();
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
        Schema::dropIfExists('invite_automation_templates');
    }
}
