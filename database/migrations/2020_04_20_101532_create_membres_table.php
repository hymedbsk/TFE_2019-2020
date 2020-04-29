<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membres', function (Blueprint $table) {
            $table->unsignedBigInteger('User_id');
	    $table->foreign('User_id')->references('id')->on('users');
	    $table->string('matricule',8)->unique();
	    $table->string('nom',100);
            $table->string('prenom',100);
	    $table->boolean('admin')->default(0);
            $table->boolean('tresorier')->default(0); 
	    $table->boolean('secretaire')->default(0); 
	    $table->boolean('president')->default(0); 
	    $table->boolean('vice-president')->default(0); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membres');
    }
}
