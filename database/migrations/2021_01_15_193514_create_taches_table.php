<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('designation');
            $table->string('description');
            $table->dateTime('dateDebut');
            $table->dateTime('dateFin');
            $table->integer('priorite');
            $table->integer('avancement');
            $table->string('etat');
            $table->unsignedBigInteger('etape_id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('service_id');
            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('etape_id')->references('id')->on('etapes');
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taches');
    }
}
