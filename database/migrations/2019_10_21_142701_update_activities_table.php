<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_activities', function (Blueprint $table) {
            //
            $table->biginteger('contact_id')->unsigned();
            $table->foreign('contact_id')->references('id')->on('t_contacts');

            $table->biginteger('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('t_activity_statuses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_activities', function (Blueprint $table) {
            //
        });
    }
}
