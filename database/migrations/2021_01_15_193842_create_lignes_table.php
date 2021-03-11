<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantite');
            $table->string('description');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('materiaux_id');
            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('materiaux_id')->references('id')->on('materiels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lignes');
    }
}
