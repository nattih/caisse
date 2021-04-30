<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recettes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('compte_id')->unsigned();
            $table->bigInteger('type_recette_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('compte_id')->references('id')->on('comptes');
            $table->foreign('type_recette_id')->references('id')->on('type_recettes')->oneDele('cascade');
            $table->string('libelle');
            $table->date('date_recette');
            $table->double('montant');
            $table->double('nouveau_solde');
            $table->integer('source');
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
        Schema::dropIfExists('recettes');
    }
}
