<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignalDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signal_destinations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('subscription_id')->length(20)->unique();
            $table->string('email', 100);
            $table->string('contact');
            $table->string('whatsapp')->nullable();
            $table->string('telegram')->nullable();
            $table->string('skype')->nullable();
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
        Schema::dropIfExists('signal_destinations');
    }
}
