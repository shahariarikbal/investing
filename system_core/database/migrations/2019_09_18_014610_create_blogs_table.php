<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->smallInteger('category_id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->string('feature_image', 40)->nullable();
            $table->tinyInteger('status')->default(2)->comment('1 = inactive, 2 = active, 3 = editing, 4 = published');
            $table->tinyInteger('created_by');
            $table->tinyInteger('updated_by')->nullable();
            $table->tinyInteger('deleted_by')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
