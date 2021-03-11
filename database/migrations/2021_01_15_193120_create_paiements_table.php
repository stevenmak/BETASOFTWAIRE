<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference')->unique();
            $table->string('libelle');
            $table->string('description');
            $table->date('datepaiement');
            $table->date('montant');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('projet_id');
            $table->unsignedBigInteger('users_id');
            $table->timestamps();
            $table->foreign('projet_id')->references('id')->on('projets');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paiements');
    }
}
