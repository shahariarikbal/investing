<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_replies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ticket_id')->length(20)->unsigned();
            $table->text('message');
            $table->string('attachment')->length(40)->nullable();
            $table->tinyInteger('admin_id')->unsigned()->nullable();
            $table->mediumInteger('member_id')->unsigned()->nullable();
            $table->timestamps();

            $table->index('ticket_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_replies');
    }
}
