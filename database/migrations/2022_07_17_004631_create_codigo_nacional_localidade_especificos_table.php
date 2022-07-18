<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodigoNacionalLocalidadeEspecificosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigo_nacional_localidade_especificos', function (Blueprint $table) {
            $table->id();
            $table->string('uf', 2);
            $table->string('municipio', 50);
            $table->string('codigo_cnl', 5);
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
        Schema::dropIfExists('codigo_nacional_localidade_especificos');
    }
}
