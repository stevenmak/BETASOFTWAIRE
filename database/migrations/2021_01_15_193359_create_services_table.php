<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('designation');
            $table->integer('nbreAgent');
            $table->unsignedBigInteger('chefservice');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('departement_id');
            $table->timestamps();
            $table->foreign('chefservice')->references('id')->on('agents');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('departement_id')->references('id')->on('departements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
