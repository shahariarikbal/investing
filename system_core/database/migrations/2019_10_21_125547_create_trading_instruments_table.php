<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradingInstrumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trading_instruments', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->boolean('quick_display')->default(false);
            $table->tinyInteger('order')->unsigned()->default(0);
        });

        Schema::create('broker_trading_instrument', function (Blueprint $table) {
            $table->smallInteger('broker_id')->unsigned();
            $table->tinyInteger('trading_instrument_id')->unsigned();

            $table->unique(['broker_id', 'trading_instrument_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trading_instruments');
        Schema::dropIfExists('broker_trading_instrument');
    }
}
