<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('code', 2);
            $table->string('name', 50);
            $table->string('capital', 20);
            $table->string('phone', 12);
            $table->string('currency_code', 3);
            $table->string('postal_code_regex', 147);

            $table->unique('code');
        });

        Schema::create('country_parameters', function (Blueprint $table) {
            $table->string('country_code', 2);
            $table->boolean('quick_display')->default(false);

            $table->index('country_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
        Schema::dropIfExists('country_parameters');
    }
}
