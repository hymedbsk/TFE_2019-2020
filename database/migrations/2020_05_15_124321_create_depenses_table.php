<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depenses', function (Blueprint $table) {
            $table->bigIncrements('dep_id');
            $table->string('libelle',50);
	    $table->float('montant');
	    $table->unsignedBigInteger('budg_id');
	    $table->unsignedBigInteger('User_id');
	    $table->string('description',200);
	    $table->timestamp('date_cree');
	    $table->timestamp('date_supp')->nullable();

	    $table->foreign('User_id')->references('id')->on('users');
            $table->foreign('budg_id')->references('budg_id')->on('budgets');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depenses');
    }
}
