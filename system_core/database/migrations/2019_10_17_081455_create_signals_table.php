<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('category_id')->unsigned();
            $table->tinyInteger('currency_id')->unsigned();
            $table->tinyInteger('type')->unsigned()->comment("0 => buy, 1 => sell, 2 => buy limit, 3 => sell limit, 4 => buy stop, 5 => sell stop");
            $table->timestamp('signal_time');
            $table->timestamp('valid_till')->nullable();
            $table->double('price', 16,6);
            $table->double('take_profit', 16,6);
            $table->double('stop_loss', 16,6);
            $table->string('attachment', 40)->nullable();
            $table->tinyInteger('status')->default(1)->comment('1 => active, 2 => filled, 3 => cencel, 4 => expired');
            $table->smallInteger('pips')->length(4)->nullable();
            $table->boolean('profit')->default(false);
            $table->boolean('free')->default(false);
            $table->boolean('premium')->default(false);
            $table->string('package_id')->nullable();
            $table->text('notes')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('signals');
    }
}
