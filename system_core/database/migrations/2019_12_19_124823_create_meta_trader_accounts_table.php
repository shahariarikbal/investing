<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaTraderAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_trader_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('subscription_id')->length(20)->unique();
            $table->tinyInteger('platform_type')->length(3)->comment('1 => mt4, 2 => mt5');
            $table->smallInteger('broker_id')->length(5)->nullable();
            $table->string('broker_name')->nullable();
            $table->string('broker_server_name');
            $table->string('account_number');
            $table->string('password');
            $table->tinyInteger('risk_preferance')->length(3)->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('meta_trader_accounts');
    }
}
