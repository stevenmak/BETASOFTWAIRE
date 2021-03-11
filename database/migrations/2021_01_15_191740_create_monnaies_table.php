<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonnaiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monnaies', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("codeMonnaie")->unique();
            $table->string("abbreviationMonnaie")->nullable();
            $table->string("symboleMonnaie")->nullable();
            $table->string("intituleMonnaie")->nullable();
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
        Schema::dropIfExists('monnaies');
    }
}
