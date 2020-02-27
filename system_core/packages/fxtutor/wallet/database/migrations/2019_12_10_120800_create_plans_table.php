<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('service')->index();
            $table->tinyInteger('duration')->unsigned();
            $table->float('price', 8, 2)->default(0);
            $table->boolean('recursive')->default(true)->index();
            $table->json('settings');
            $table->text('note')->nullable();
            $table->json('details');
            $table->tinyInteger('orders')->unsigned()->default(0);
            $table->string('icon')->nullable();
            $table->boolean('status')->default(false);
            $table->tinyInteger('created_by');
            $table->tinyInteger('updated_by')->nullable();
            $table->tinyInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['name', 'service']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
