<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EmpresasController;

//Administrar
    //Empresa
    Route::get('/administrar/empresas', [EmpresasController::class, 'listar'])->name('api.empresas.listar')->middleware("permission:empresas.listar");
    Route::get('/administrar/empresas/{id}', [EmpresasController::class, 'ver'])->name('api.empresas.ver')->middleware("permission:empresas.ver");
    Route::post('/administrar/empresas', [EmpresasController::class, 'crear'])->name('api.empresas.crear')->middleware("permission:empresas.crear");
    Route::put('/administrar/empresas/{id}', [EmpresasController::class, 'editar'])->name('api.empresas.editar')->middleware("permission:empresas.editar");
    Route::delete('/administrar/empresas/{id}', [EmpresasController::class, 'eliminar'])->name('api.empresas.eliminar')->middleware("permission:empresas.eliminar");

    //Establecimientos
    Route::get("/administrar/establecimientos/listar", [EstablecimientosController::class, "listar"])->name("api.establecimientos.listar")->middleware("permission:establecimientos.listar");
    Route::get("/administrar/establecimientos/ver", [EstablecimientosController::class, "ver"])->name("api.establecimientos.ver")->middleware("permission:establecimientos.ver");
    Route::post("/administrar/establecimientos/crear", [EstablecimientosController::class, "crear"])->name("api.establecimientos.crear")->middleware("permission:establecimientos.crear");
    Route::put("/administrar/establecimientos/editar", [EstablecimientosController::class, "editar"])->name("api.establecimientos.editar")->middleware("permission:establecimientos.editar");
    Route::delete("/administrar/establecimientos/eliminar/{id}", [EstablecimientosController::class, "eliminar"])->name("api.establecimientos.eliminar")->middleware("permission:establecimientos.eliminar");

    //Puntos_emision
    Route::get("/administrar/puntos_emision/listar", [Puntos_emisionController::class, "listar"])->name("api.puntos_emision.listar")->middleware("permission:puntos_emision.listar");
    Route::get("/administrar/puntos_emision/ver", [Puntos_emisionController::class, "ver"])->name("api.puntos_emision.ver")->middleware("permission:puntos_emision.ver");
    Route::post("/administrar/puntos_emision/crear", [Puntos_emisionController::class, "crear"])->name("api.puntos_emision.crear")->middleware("permission:puntos_emision.crear");
    Route::put("/administrar/puntos_emision/editar", [Puntos_emisionController::class, "editar"])->name("api.puntos_emision.editar")->middleware("permission:puntos_emision.editar");
    Route::delete("/administrar/puntos_emision/eliminar/{id}", [Puntos_emisionController::class, "eliminar"])->name("api.puntos_emision.eliminar")->middleware("permission:puntos_emision.eliminar");

    //Usuarios
    Route::get("/administrar/usuarios/listar", [UsuariosController::class, "listar"])->name("api.usuarios.listar")->middleware("permission:usuarios.listar");
    Route::get("/administrar/usuarios/ver", [UsuariosController::class, "ver"])->name("api.usuarios.ver")->middleware("permission:usuarios.ver");
    Route::post("/administrar/usuarios/crear", [UsuariosController::class, "crear"])->name("api.usuarios.crear")->middleware("permission:usuarios.crear");
    Route::put("/administrar/usuarios/editar", [UsuariosController::class, "editar"])->name("api.usuarios.editar")->middleware("permission:usuarios.editar");
    Route::delete("/administrar/usuarios/eliminar/{id}", [UsuariosController::class, "eliminar"])->name("api.usuarios.eliminar")->middleware("permission:usuarios.eliminar");

    //Impuestos
    Route::get("/administrar/impuestos/listar", [ImpuestosController::class, "listar"])->name("api.impuestos.listar")->middleware("permission:impuestos.listar");
    Route::get("/administrar/impuestos/ver", [ImpuestosController::class, "ver"])->name("api.impuestos.ver")->middleware("permission:impuestos.ver");
    Route::post("/administrar/impuestos/crear", [ImpuestosController::class, "crear"])->name("api.impuestos.crear")->middleware("permission:impuestos.crear");
    Route::put("/administrar/impuestos/editar", [ImpuestosController::class, "editar"])->name("api.impuestos.editar")->middleware("permission:impuestos.editar");
    Route::delete("/administrar/impuestos/eliminar/{id}", [ImpuestosController::class, "eliminar"])->name("api.impuestos.eliminar")->middleware("permission:impuestos.eliminar");
