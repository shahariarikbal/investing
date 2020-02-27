<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrokerTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broker_types', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->boolean('quick_display')->default(false);
            $table->tinyInteger('order')->unsigned()->default(0);
        });

        Schema::create('broker_broker_type', function (Blueprint $table) {
            $table->smallInteger('broker_id')->unsigned();
            $table->tinyInteger('broker_type_id')->unsigned();

            $table->unique(['broker_id', 'broker_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('broker_types');
        Schema::dropIfExists('broker_broker_type');
    }
}
