<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuntoEmisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('punto_emisions', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo');
            $table->string('nombre');
            $table->string('emision');
            $table->string('factura');
            $table->string('nota_credito');
            $table->string('nota_debito');
            $table->string('guia_remision');
            $table->string('retencion_compra');
            $table->string('liquidacion_compra');
            $table->boolean('estado');
            $table->foreignId('empresa_id')->constrained()->cascadeOnDelete();
            $table->foreignId('establecimiento_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('punto_emisions');
    }
}
