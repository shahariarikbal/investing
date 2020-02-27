<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id');
            $table->unsignedTinyInteger('balance_type');
            $table->string('action');
            $table->uuid('invoice')->nullable();
            $table->float('amount', 8, 2);
            $table->nullableMorphs('resource');
            $table->string('currency')->default('usd');
            $table->float('balance', 8, 2)->default(0);
            $table->unsignedTinyInteger('type');
            $table->json('meta');
            $table->timestamps();

            $table->unique(['balance_type', 'action', 'resource_id', 'resource_type'], 'unique_transaction');

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
        Schema::dropIfExists('transactions');
    }
}
