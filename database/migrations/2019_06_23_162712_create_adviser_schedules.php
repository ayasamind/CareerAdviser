<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdviserSchedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adviser_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('adviser_id');
            $table->datetime('date');
            $table->integer('type');
            $table->timestamps();

            $table->index('adviser_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adviser_schedules');
    }
}
