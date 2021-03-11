<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codeContact');
            $table->string('prenomContact');
            $table->string('nomContact');
            $table->string('titreContact');
            $table->string('genreContact');
            $table->string('professionContact');
            $table->string('telephone');
            $table->string('mobile');
            $table->string('courriel');
            $table->string('adresse');
            $table->string('ville');
            $table->string('province');
            $table->string('pays');
            $table->string('domaineActivite');
            $table->unsignedBigInteger("client_id");
            $table->unsignedBigInteger("users_id");
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('contacts');
    }
}
