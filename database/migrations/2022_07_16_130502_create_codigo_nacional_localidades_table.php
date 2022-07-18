<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodigoNacionalLocalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigo_nacional_localidades', function (Blueprint $table) {
            $table->id();
            $table->string('uf', 2);
            $table->string('sigla_cnl', 4);
            $table->string('codigo_cnl', 5);
            $table->string('localidade', 50);
            $table->string('municipio', 50);
            $table->string('prefixo', 7);
            $table->string('prestadora', 30);
            $table->unsignedInteger('numeracao_inicial')->default(0);
            $table->unsignedInteger('numeracao_final')->default(0);
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
        Schema::dropIfExists('codigo_nacional_localidades');
    }
}
