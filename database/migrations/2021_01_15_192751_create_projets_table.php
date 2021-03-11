<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codeProjet')->unique();
            $table->string('nomProjet')->nullable();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('contact_id');
            $table->date('datedebut')->nullable();
            $table->date('datefin')->nullable();
            $table->string('description')->nullable();
            $table->string('methodepaiement')->nullable();
            $table->string('etatprojet')->nullable();
            $table->string('chefprojet')->nullable();
            $table->double('BudgetProjet')->nullable();
            $table->unsignedBigInteger('users_id');
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('contact_id')->references('id')->on('contacts');
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
        Schema::dropIfExists('projets');
    }
}
