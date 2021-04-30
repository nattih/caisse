<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('compte_id')->unsigned();
            $table->bigInteger('type_depense_id')->unsigned();
            $table->bigInteger('agent')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('compte_id')->references('id')->on('comptes');
            $table->foreign('type_depense_id')->references('id')->on('type_depenses')->oneDele('cascade');
            $table->foreign('agent')->references('id')->on('users');
            $table->string('date_depense');
            $table->double('montant');
            $table->double('nouveau_solde');
            $table->string('description');
            $table->string('fournisseur');
            $table->string('commentaire');
            $table->string('fichier');
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
        Schema::dropIfExists('depenses');
    }
}
