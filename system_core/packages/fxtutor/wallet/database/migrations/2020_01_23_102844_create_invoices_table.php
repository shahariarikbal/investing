<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('member_id');
            $table->morphs('resource');
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->json('items');
            $table->json('meta')->nullable(); 
            $table->timestamp('due_date')->nullable();
            $table->timestamp('paid_date')->nullable()->index();
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
        Schema::dropIfExists('invoices');
    }
}
