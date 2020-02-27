<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceGraphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_graphs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('service');
            $table->date('date');
            $table->double('value', 5,2);
            $table->boolean('profit')->default(true);
            $table->bigInteger('package_id')->nullable();
            $table->mediumInteger('member_id')->length(8)->nullable();
            $table->boolean('is_notified')->default(false);
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('performance_graphs');
    }
}
