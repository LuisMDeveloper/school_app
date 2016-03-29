<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDocumentsToAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->string('certificado_secundaria');
            $table->string('acta_de_nacimiento_path');
            $table->string('curp');
            $table->string('comprobande_de_domicilio');
            $table->string('certificado_parcial')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->dropColumn('certificado_secundaria');
            $table->dropColumn('acta_de_nacimiento_path');
            $table->dropColumn('curp');
            $table->dropColumn('comprobande_de_domicilio');
            $table->dropColumn('certificado_parcial');
        });
    }
}
