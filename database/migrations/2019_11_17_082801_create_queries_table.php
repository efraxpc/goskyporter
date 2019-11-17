<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remarks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');
            $table->timestamps();
        });

        Schema::create('queries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('querystatus');
            $table->integer('bookingsource');
            $table->integer('bookingtype');
            $table->integer('querytype');
            $table->integer('origin');
            $table->integer('destination');
            $table->integer('visastatus');
            $table->integer('airline');
            $table->date('query_date');
            $table->date('departure_date');
            $table->date('arrival_date');
            $table->text('passenger_details');
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
        Schema::dropIfExists('remarks');
        Schema::dropIfExists('queries');
    }
}
