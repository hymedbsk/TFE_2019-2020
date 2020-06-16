<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichiers', function (Blueprint $table) {
        	$table->bigIncrements('file_id');
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("doc_id");
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('doc_id')->references('doc_id')->on('documents');
            $table->string('nom', 100);
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
        Schema::dropIfExists('files');
    }
}
