<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_infos', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->nullable();
            $table->string('source')->nullable();
            $table->string('country')->nullable();
            $table->string('is_device')->nullable();
            $table->string('platform')->nullable();
            $table->string('browser')->nullable();
            $table->string('token')->nullable();
            $table->integer('count_trafic')->default(0);
            $table->string('date')->nullable();
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
        Schema::dropIfExists('device_infos');
    }
}
