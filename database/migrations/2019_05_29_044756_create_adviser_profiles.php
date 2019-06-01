<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdviserProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adviser_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo_url');
            $table->integer('adviser_id');
            $table->integer('gender');
            $table->integer('prefecture_id');
            $table->text('comment');
            $table->text('introduce');
            $table->text('industry');
            $table->text('company_number');
            $table->text('place');
            $table->text('performance');
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
        Schema::dropIfExists('adviser_profiles');
    }
}
