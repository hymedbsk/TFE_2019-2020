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
            
	    $table->bigIncrements('event_id');
	    $table->unsignedInteger('user_id');
	    $table->foreign('user_id')->references('id')->on('users');
	    $table->string('titre');
	    $table->dateTime('début');
	    $table->dateTime('fin');
	    $table->string('color',20);
	    $table->timestamp('date_cree');
            $table->timestamp('date_maj')->nullable();
            $table->timestamp('date_supp')->nullable();
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
