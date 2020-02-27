<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id')->index();
            $table->string('plan_id')->nullable()->index();
            $table->string('payment_id')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->string('service')->index();
            $table->string('payment_method')->nullable();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('ends_at')->nullable()->index();
            $table->timestamp('trial_ends_at')->nullable();
            $table->boolean('cancellable')->default(false);
            $table->json('meta')->nullable();
            $table->timestamps();

            // $table->unique(['member_id', 'plan_id']);

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
        Schema::dropIfExists('subscriptions');
    }
}
