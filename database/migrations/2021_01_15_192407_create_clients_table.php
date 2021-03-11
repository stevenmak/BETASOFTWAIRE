<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codeClient')->unique();
            $table->string('nom')->nullable();
            $table->string('prenomClient')->nullable();
            $table->string('nomClient')->nullable();
            $table->string('titreClient')->nullable();
            $table->string('genreClient')->nullable();
            $table->string('professionClient')->nullable();
            $table->string('adresseClient')->nullable();
            $table->string('villeClient')->nullable();
            $table->string('provinceClient')->nullable();
            $table->string('paysClient')->nullable();
            $table->string('domaineActivite')->nullable();
            $table->integer('termepaiement')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('courriel')->nullable();
            $table->string('siteweb')->nullable();
            $table->string('typeclient')->nullable();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('clients');
    }
}
