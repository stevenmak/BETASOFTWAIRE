<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prenom')->nullable();
            $table->string('nom')->nullable();
            $table->string('codeAgent')->unique();
            $table->string('matriculeAgent')->unique();
            $table->string('genre')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('courriel')->nullable();
            $table->string('titreAgent')->nullable();
            $table->string('profession')->nullable();
            $table->string('niveauEtude')->nullable();
            $table->string('etatCivil')->nullable();
            $table->string('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('province')->nullable();
            $table->string('pays')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}
