<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrokerVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broker_videos', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->smallInteger('broker_id')->unsigned();
            $table->string('code', 11);
            $table->text('description');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->index('broker_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('broker_videos');
    }
}
