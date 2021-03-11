<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->bigIncrements("id")->unsigned();
            $table->string("nom")->unique();
            $table->string("logo")->nullable();
            $table->string("idNat")->nullable();
            $table->string("RCCM")->nullable();
            $table->string("numImpot")->nullable();
            $table->string("telephone")->nullable();
            $table->string("mobile")->nullable();
            $table->string("courriel")->nullable();
            $table->string("siteweb")->nullable();
            $table->string("adresse")->nullable();
            $table->string("ville")->nullable();
            $table->string("province")->nullable();
            $table->string("pays")->nullable();
            $table->integer("employe")->nullable();
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
        Schema::dropIfExists('entreprises');
    }
}
