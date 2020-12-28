<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo');
            $table->date('periodo');
            $table->string('razon_social');
            $table->string('razon_comercial');
            $table->integer('tipo_identificacion');
            $table->string('identificacion');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->string('email_password');
            $table->string('email_server');
            $table->string('email_port');
            $table->string('email_security');
            $table->boolean('obligado_contabilidad');
            $table->string('contador_nombre')->nullable();
            $table->string('contador_ruc')->nullable();
            $table->string('representante_nombre')->nullable();
            $table->string('representante_ruc')->nullable();
            $table->date('periodo_inicio')->nullable();
            $table->date('periodo_fin')->nullable();
            $table->string('tipo_cuentas');
            $table->string('logotipo')->nullable();
            $table->string('firma_electronica')->nullable();
            $table->string('firma_electronica_password')->nullable();
            $table->date('firma_electronica_expiracion')->nullable();
            $table->date('firma_electronica_actualizacion')->nullable();
            $table->boolean('tipo_emision');
            $table->boolean('ambiente');
            $table->boolean('facturar_negativo');
            $table->foreignId('moneda_id')->constrained()->cascadeOnDelete();
            $table->foreignId('provincia_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ciudad_id')->constrained()->cascadeOnDelete();
            $table->string('email_facturacion')->nullable();
            $table->string('leyenda_facturacion')->nullable();
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
        Schema::dropIfExists('empresas');
    }
}
