<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertises', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->text('code')->nullable();
            $table->text('image')->length(40)->nullable();
            $table->tinyInteger('page')->unsigned();
            $table->tinyInteger('position')->unsigned();
            $table->smallInteger('order')->unsigned()->default(0);
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->boolean('status')->default(false);
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['page', 'position', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertises');
    }
}
