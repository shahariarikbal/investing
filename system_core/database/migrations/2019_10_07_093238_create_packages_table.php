<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->tinyIncrements('id', 3);
            $table->string('public_id', 40);
            $table->string('title');
            $table->string('service');
            $table->tinyInteger('duration')->unsigned();
            $table->float('price', 8, 2);
            $table->float('discount', 8, 2)->default(0);
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

            $table->unique('public_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
