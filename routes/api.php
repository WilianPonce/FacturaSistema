<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\EstablecimientosController;
use App\Http\Controllers\MonedasController;
use App\Http\Controllers\ProvinciasController;
use App\Http\Controllers\CiudadesController;
use App\Http\Controllers\PuntosEmisionController;
use App\Http\Controllers\RolesController;

//Administrar
    //Empresa
    Route::prefix('/administrar/empresas')->group(function () {
        Route::get('', [EmpresasController::class, 'listar'])->name('api.empresas.listar')->middleware("permission:empresas.listar");
        Route::get('/{id}', [EmpresasController::class, 'ver'])->name('api.empresas.ver')->middleware("permission:empresas.ver");
        Route::post('', [EmpresasController::class, 'crear'])->name('api.empresas.crear')->middleware("permission:empresas.crear");
        Route::put('/{id}', [EmpresasController::class, 'editar'])->name('api.empresas.editar')->middleware("permission:empresas.editar");
        Route::delete('/{id}', [EmpresasController::class, 'eliminar'])->name('api.empresas.eliminar')->middleware("permission:empresas.eliminar");
    });

    //Establecimientos
    Route::prefix('/administrar/establecimientos')->group(function () {
        Route::get("", [EstablecimientosController::class, "listar"])->name("api.establecimientos.listar")->middleware("permission:establecimientos.listar");
        Route::get("/{id}", [EstablecimientosController::class, "ver"])->name("api.establecimientos.ver")->middleware("permission:establecimientos.ver");
        Route::post("", [EstablecimientosController::class, "crear"])->name("api.establecimientos.crear")->middleware("permission:establecimientos.crear", "empresa");
        Route::put("/{id}", [EstablecimientosController::class, "editar"])->name("api.establecimientos.editar")->middleware("permission:establecimientos.editar", "empresa");
        Route::delete("/{id}", [EstablecimientosController::class, "eliminar"])->name("api.establecimientos.eliminar")->middleware("permission:establecimientos.eliminar");
    });

    //Puntos_emision
    Route::prefix('/administrar/puntos_emision')->group(function () {
        Route::get("", [PuntosEmisionController::class, "listar"])->name("api.puntos_emision.listar")->middleware("permission:puntos_emision.listar");
        Route::get("/{id}", [PuntosEmisionController::class, "ver"])->name("api.puntos_emision.ver")->middleware("permission:puntos_emision.ver");
        Route::post("", [PuntosEmisionController::class, "crear"])->name("api.puntos_emision.crear")->middleware("permission:puntos_emision.crear", "empresa");
        Route::put("/{id}", [PuntosEmisionController::class, "editar"])->name("api.puntos_emision.editar")->middleware("permission:puntos_emision.editar", "empresa");
        Route::delete("/{id}", [PuntosEmisionController::class, "eliminar"])->name("api.puntos_emision.eliminar")->middleware("permission:puntos_emision.eliminar");
    });

    //Usuarios
    Route::prefix('/administrar/usuarios')->group(function () {
        Route::get("", [UsuariosController::class, "listar"])->name("api.usuarios.listar")->middleware("permission:usuarios.listar");
        Route::get("/{id}", [UsuariosController::class, "ver"])->name("api.usuarios.ver")->middleware("permission:usuarios.ver");
        Route::post("", [UsuariosController::class, "crear"])->name("api.usuarios.crear")->middleware("permission:usuarios.crear");
        Route::put("/{id}", [UsuariosController::class, "editar"])->name("api.usuarios.editar")->middleware("permission:usuarios.editar");
        Route::delete("/{id}", [UsuariosController::class, "eliminar"])->name("api.usuarios.eliminar")->middleware("permission:usuarios.eliminar");
    });

    //Usuarios
    Route::prefix('/administrar/roles')->group(function () {
        Route::get("", [RolesController::class, "listar"])->name("api.roles.listar")->middleware("permission:roles.listar");
        Route::get("/{id}", [RolesController::class, "ver"])->name("api.roles.ver")->middleware("permission:roles.ver");
        Route::post("", [RolesController::class, "crear"])->name("api.roles.crear")->middleware("permission:roles.crear");
        Route::put("/{id}", [RolesController::class, "editar"])->name("api.roles.editar")->middleware("permission:roles.editar");
        Route::delete("/{id}", [RolesController::class, "eliminar"])->name("api.roles.eliminar")->middleware("permission:roles.eliminar");
    });




    //Permisos
    Route::get('/permisos/listar', [UsuariosController::class, 'listar_permisos'])->name('api.permisos.listar');
    //Monedas
    Route::get('/moneda', [MonedasController::class, 'listar'])->name('api.moneda.listar');
    //Ciudades
    Route::get('/ciudad', [CiudadesController::class, 'listar'])->name('api.ciudad.listar');
    //Provincias
    Route::get('/provincia', [ProvinciasController::class, 'listar'])->name('api.provincia.listar');
    //logotipo
    Route::get('/logotipo/{logotipo}', [EmpresasController::class, 'logotipo'])->name('api.logotipo');
    //establecimientos select
    Route::get('/establecimiento/select', [EstablecimientosController::class, 'select'])->name('api.establecimiento.select');
