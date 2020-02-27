<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrokersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brokers', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('country_code', 2);
            $table->string('logo');
            $table->string('screenshot');
            $table->string('website_title');
            $table->string('website_url');
            $table->text('headquarter');
            $table->year('founded_in');
            $table->boolean('premium')->default(false);
            $table->boolean('us_client');
            $table->double('min_deposit', 8,2);
            $table->boolean('deposit_bonus');
            $table->boolean('first_deposit_bonus');
            $table->boolean('ecn_deposit');
            $table->double('ecn_deposit_amount', 8,2)->nullable();
            $table->boolean('islamic_acc');
            $table->boolean('free_vps');
            $table->tinyInteger('pamm_mam')->length(1)->nullable();
            $table->boolean('scalping');
            $table->boolean('hedging');
            $table->boolean('expert_advisors');
            $table->boolean('carousal')->default(false);
            $table->text('review')->nullable();
            $table->text('pros')->nullable();
            $table->text('cons')->nullable();
            $table->text('meta');
            $table->smallInteger('order')->default(0);
            $table->boolean('status')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('brokers');
    }
}
