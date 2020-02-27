<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketSentimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_sentiments', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->tinyInteger('currency_id')->length(3)->unique();
            $table->tinyInteger('buy')->length(3);
            $table->tinyInteger('sell')->length(3);
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('market_sentiments');
    }
}
