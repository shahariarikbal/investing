<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('permission_id');
            $table->string('service');
            $table->timestamps();

            $table->unique(['permission_id', 'service']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_services');
    }
}
