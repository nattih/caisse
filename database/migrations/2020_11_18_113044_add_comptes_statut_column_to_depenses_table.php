<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddComptesStatutColumnToDepensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('depenses', function (Blueprint $table) {
            $table->boolean('statut')->default(false)->after('fichier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('depenses', function (Blueprint $table) {
            $table->dropColumn('statut');
        });
    }
}
