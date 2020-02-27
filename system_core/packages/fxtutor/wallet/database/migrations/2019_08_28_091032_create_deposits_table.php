<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("method");
            $table->unsignedBigInteger('member_id');
            $table->float('amount', 8, 2);
            $table->float('process_fee', 8, 2);
            $table->float('tax', 8, 2)->default(0);
            $table->float('total', 8, 2);
            $table->string('currency')->default('usd');
            $table->string('payment_id')->nullable();
            $table->json('meta')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();

            // $table->foreign(config('member.foreign_key'))
            //         ->references(config('member.primary_key'))->on(config('member.table'))
            //         ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposits');
    }
}
