<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->mediumInteger('member_id')->unsigned()->primary();
            $table->string('avater', 40)->nullable();
            $table->boolean('sex')->nullable();
            $table->string('country_code', 2)->nullable();
            $table->smallInteger('city_code')->length(5)->nullable();
            $table->string('zip')->nullable();
            $table->text('address')->nullable();
            $table->string('contact')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
