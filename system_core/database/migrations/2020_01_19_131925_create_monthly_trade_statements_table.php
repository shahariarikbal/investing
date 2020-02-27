<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyTradeStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_trade_statements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('service');
            $table->date('date');
            $table->bigInteger('package_id')->nullable();
            $table->mediumInteger('member_id')->length(8)->nullable();
            $table->bigInteger('payment_id')->nullable();
            $table->boolean('profit')->default(true);
            $table->double('amount', 16,6);
            $table->double('growth', 5,2);
            $table->string('attachment');
            $table->boolean('is_notified')->default(false);
            $table->boolean('status')->default(true);
            $table->json('meta')->nullable();
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
        Schema::dropIfExists('monthly_trade_statements');
    }
}
