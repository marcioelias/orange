<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mbilling');
            $table->unsignedBigInteger('id_plan');
            $table->unsignedBigInteger('id_prefix');
            $table->unsignedBigInteger('id_trunk_group');
            $table->unsignedInteger('minimal_time_charge');
            $table->unsignedInteger('initblock');
            $table->unsignedInteger('billingblock');
            $table->string('id_prefix');
            $table->string('id_prefix_destination');
            $table->unsignedDecimal('tarifa', 8, 6);
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
        Schema::dropIfExists('tarifas');
    }
}
