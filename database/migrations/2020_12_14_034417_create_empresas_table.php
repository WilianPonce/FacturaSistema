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
            $table->date('periodo');
            $table->string('razon_social');
            $table->string('razon_comercial');
            $table->string('ruc');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->string('email_password');
            $table->string('email_server');
            $table->string('email_port');
            $table->string('email_security');
            $table->boolean('obligado_contabilidad');
            $table->string('contador_nombre');
            $table->string('contador_ruc');
            $table->string('representante_nombre');
            $table->string('representante_ruc');
            $table->date('periodo_inicio');
            $table->date('periodo_fin');
            $table->string('tipo_cuentas');
            $table->string('logotipo');
            $table->string('firma_electronica');
            $table->string('firma_electronica_password');
            $table->date('firma_electronica_expiracion');
            $table->date('firma_electronica_actualizacion');
            $table->boolean('tipo_emision');
            $table->boolean('ambiente');
            $table->boolean('facturar_negativo');
            $table->foreignId('moneda_id')->constrained()->cascadeOnDelete();
            $table->foreignId('provincia_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ciudad_id')->constrained()->cascadeOnDelete();
            $table->string('email_facturacion');
            $table->string('leyenda_facturacion');
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
