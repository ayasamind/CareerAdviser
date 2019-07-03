<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdviserCareers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adviser_careers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('adviser_id');
            $table->text('year');
            $table->text('career');
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
        Schema::dropIfExists('adviser_careers');
    }
}
