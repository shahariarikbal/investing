<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('service');
            $table->string('question');
            $table->text('answer');
            $table->boolean('status')->default(false)->comment('false = inactive, true = active');
            $table->tinyInteger('created_by')->unsigned();
            $table->tinyInteger('updated_by')->unsigned()->nullable();
            $table->tinyInteger('deleted_by')->unsigned()->nullable();
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
        Schema::dropIfExists('faqs');
    }
}
