<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('establecimientos', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo')->nullable();
            $table->string('nombre');
            $table->string('serie');
            $table->string('url_web')->nullable();
            $table->string('nombre_comercial')->nullable();
            $table->string('direccion');
            $table->boolean('estado');
            $table->foreignId('empresa_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('establecimientos');
    }
}
