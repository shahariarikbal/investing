<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpreadTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spread_types', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->boolean('quick_display')->default(false);
            $table->tinyInteger('order')->unsigned()->default(0);
        });

        Schema::create('broker_spread_type', function (Blueprint $table) {
            $table->smallInteger('broker_id')->unsigned();
            $table->tinyInteger('spread_type_id')->unsigned();

            $table->unique(['broker_id', 'spread_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spread_types');
        Schema::dropIfExists('broker_spread_type');
    }
}
