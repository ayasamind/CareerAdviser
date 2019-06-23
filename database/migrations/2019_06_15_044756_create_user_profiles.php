<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo_url')->nullable();
            $table->integer('user_id');
            $table->integer('gender')->nullable();
            $table->integer('prefecture_id')->nullable();
            $table->text('university')->nullable();
            $table->integer('graduate_year')->nullable();
            $table->date('birthday')->nullable();
            $table->text('informal_decision')->nullable();
            $table->text('situation')->nullable();
            $table->text('axis_reason')->nullable();
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
        Schema::dropIfExists('user_profiles');
    }
}
