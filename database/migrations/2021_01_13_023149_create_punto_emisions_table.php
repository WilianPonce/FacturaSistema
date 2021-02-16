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
            $table->integer('codigo')->nullable();
            $table->string('nombre');
            $table->string('serie');
            $table->string('factura')->nullable();
            $table->string('nota_credito')->nullable();
            $table->string('nota_debito')->nullable();
            $table->string('guia_remision')->nullable();
            $table->string('retencion_compra')->nullable();
            $table->string('liquidacion_compra')->nullable();
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
