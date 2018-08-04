<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_type');
            $table->string('event_name');
            $table->longText('event_description');
            $table->date('event_date');
            $table->time('event_time');
            $table->string('event_location');
            $table->integer('number_of_tickets_available');
            $table->integer('price_per_ticket');
            $table->string('event_image');
            $table->integer('tickets_sold')->default('0');
            $table->integer('event_status')->default('2');
            $table->string('event_host');
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
        Schema::dropIfExists('events');
    }
}
