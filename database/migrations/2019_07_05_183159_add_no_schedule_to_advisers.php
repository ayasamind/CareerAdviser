<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNoScheduleToAdvisers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advisers', function (Blueprint $table) {
            $table->boolean('schedule_flag')->default(true);
            $table->boolean('public_flag')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advisers', function (Blueprint $table) {
            $table->dropColumn('schedule_flag');
            $table->dropColumn('public_flag');
        });
    }
}
