<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference')->unique();
            $table->string('description');
            $table->dateTime('datedevis');
            $table->unsignedBigInteger('projet_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('service_id');
            $table->string('etatdevis');
            $table->double('montantdevis');
            $table->double('modalite')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('users_id');
            $table->foreign('projet_id')->references('id')->on('projets');
            $table->foreign('client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('devis');
    }
}
