<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('support_department_id')->unsigned();
            $table->string('subject');
            $table->text('issue');
            $table->string('attachment')->length(40)->nullable();
            $table->tinyInteger('severity')->unsignd()->comment('1 => general, 2 => medium, 3 => high');
            $table->mediumInteger('member_id')->unsigned();
            $table->tinyInteger('assign_to')->unsigned()->nullable();
            $table->tinyInteger('status')->default(1)->length(1)->comment('1 => open, 2 => answered, 3 => closed, 4 => resolved');
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
        Schema::dropIfExists('tickets');
    }
}
