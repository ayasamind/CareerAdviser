<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReviewToMeetingRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meeting_requests', function (Blueprint $table) {
            $table->integer('star')->nullable();
            $table->string('review')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meeting_requests', function (Blueprint $table) {
            $table->dropColumn('review');
            $table->dropColumn('star');
        });
    }
}
