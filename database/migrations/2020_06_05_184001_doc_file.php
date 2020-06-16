<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_file', function (Blueprint $table) {
		$table->bigIncrements('id');
		$table->unsignedBigInteger("doc_id");
		$table->unsignedBigInteger("file_id");
		$table->foreign('file_id')->references('file_id')->on('fichiers');
            	$table->foreign('doc_id')->references('doc_id')->on('documents');
            
	 });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
