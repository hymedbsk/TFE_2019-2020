<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
        $table->bigIncrements('budg_id');
        $table->unsignedBigInteger('User_id');
	$table->foreign('User_id')->references('id')->on('users');
        $table->string('nom',20);
        $table->float('total');
        $table->string('annee',9);
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
        Schema::dropIfExists('budgets');
    }
}
