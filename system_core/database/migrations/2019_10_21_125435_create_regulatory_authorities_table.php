<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulatoryAuthoritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulatory_authorities', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->boolean('quick_display')->default(false);
            $table->tinyInteger('order')->unsigned()->default(0);
        });

        Schema::create('broker_regulatory_authority', function (Blueprint $table) {
            $table->smallInteger('broker_id')->unsigned();
            $table->tinyInteger('regulatory_authority_id')->unsigned();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regulatory_authorities');
        Schema::dropIfExists('broker_regulatory_authority');
    }
}
