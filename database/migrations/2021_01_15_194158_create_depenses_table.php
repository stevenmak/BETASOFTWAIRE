<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('reference')->unique();
            $table->unsignedBigInteger('commande_id');
            $table->dateTime('datedepense');
            $table->unsignedBigInteger('projet_id');
            $table->unsignedBigInteger('etape_id');
            $table->unsignedBigInteger('tache_id');
            $table->unsignedBigInteger('service_id');
            $table->double('montant');
            $table->string('etatdepense');
            $table->string('libelle');
            $table->string('description');
            $table->string('remarque');
            $table->unsignedBigInteger('users_id');
            $table->timestamps();
            $table->foreign('commande_id')->references('id')->on('commandes');
            $table->foreign('projet_id')->references('id')->on('projets');
            $table->foreign('etape_id')->references('id')->on('etapes');
            $table->foreign('tache_id')->references('id')->on('taches');
            $table->foreign('service_id')->references('id')->on('services');
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
        Schema::dropIfExists('depenses');
    }
}
