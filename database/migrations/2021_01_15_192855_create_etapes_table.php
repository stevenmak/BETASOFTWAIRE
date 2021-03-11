<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etapes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomEtape')->unique();
            $table->unsignedBigInteger('projet_id');
            $table->dateTime('debutEtape');
            $table->dateTime('debutFin');
            $table->integer('tempsprevu');
            $table->integer('avancement');
            $table->string('description');
            $table->string('etatEtape');
            $table->string('etapeprerequise');
            $table->unsignedBigInteger('users_id');
            $table->timestamps();
            $table->foreign('projet_id')->references('id')->on('projets');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etapes');
    }
}
