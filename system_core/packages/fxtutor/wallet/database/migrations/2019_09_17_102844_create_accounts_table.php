<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id');
            $table->float('balance', 8, 2)->default(0);
            $table->float('restricted', 8, 2)->default(0);
            $table->float('inreview', 8, 2)->default(0);
            $table->float('pending', 8, 2)->default(0);
            $table->float('security', 8, 2)->default(0);
            $table->string('currency')->default('usd');
            $table->tinyInteger('status')->index()->default(1);
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
        Schema::dropIfExists('accounts');
    }
}
