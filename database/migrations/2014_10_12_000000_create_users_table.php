<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('tipo_sangre')->nullable();
            $table->string('direccion')->nullable();
            $table->string('nombre_familiar')->nullable();
            $table->string('contacto_familiar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->foreignId('empresa_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('establecimiento_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('punto_emision_id')->nullable()->constrained()->cascadeOnDelete();
            $table->text('profile_photo_path')->nullable();
            $table->boolean('estado');
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
        Schema::dropIfExists('users');
    }
}
