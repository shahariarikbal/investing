<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrokerRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('broker_ratings')) {
            Schema::create('broker_ratings', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title')->nullable();
                $table->text('comment')->nullable();
                $table->enum('status', ['pending', 'published', 'canceled', 'inreview'])->default('pending');

                $table->morphs('model');
                $table->morphs('rateable');

                $table->decimal('value', 2, 1);
                $table->ipAddress('ip')->nullable();
                $table->timestamps();
            });
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('broker_ratings')) {
            Schema::drop('broker_ratings');
        }
    }
}
