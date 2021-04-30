<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('bilan_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bilan_id')->references('id')->on('bilans');
            $table->date('date_ouverture');
            $table->double('solde_ouverture');
            $table->date('date_fermeture')->nullable();
            $table->double('solde_fermeture')->nullable();
            $table->double('total_recette')->nullable();
            $table->double('total_depense')->nullable();
            $table->double('solde_theorique')->nullable();
            $table->double('solde_physique')->nullable();
            $table->double('ecart')->nullable();
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
        Schema::dropIfExists('comptes');
    }
}
