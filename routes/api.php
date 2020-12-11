<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

//dashboard
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
    
//usuario Sesión
    Route::get("/ver", [UsuariosController::class, "ver"])->name("usuarios.ver")->middleware("permission:users.ver");

//Administrar
    //Empresa
    Route::get("/administrar/empresa/listar", [EmpresaController::class, "listar"])->name("empresa.listar")->middleware("permission:empresa.listar");
    Route::get("/administrar/empresa/ver", [EmpresaController::class, "ver"])->name("empresa.ver")->middleware("permission:empresa.ver");
    Route::post("/administrar/empresa/crear", [EmpresaController::class, "crear"])->name("empresa.crear")->middleware("permission:empresa.crear");
    Route::put("/administrar/empresa/editar", [EmpresaController::class, "editar"])->name("empresa.editar")->middleware("permission:empresa.editar");
    Route::delete("/administrar/empresa/eliminar/{id}", [EmpresaController::class, "eliminar"])->name("empresa.eliminar")->middleware("permission:empresa.eliminar");
    
    //Establecimientos
    Route::get("/administrar/establecimientos/listar", [EstablecimientosController::class, "listar"])->name("establecimientos.listar")->middleware("permission:establecimientos.listar");
    Route::get("/administrar/establecimientos/ver", [EstablecimientosController::class, "ver"])->name("establecimientos.ver")->middleware("permission:establecimientos.ver");
    Route::post("/administrar/establecimientos/crear", [EstablecimientosController::class, "crear"])->name("establecimientos.crear")->middleware("permission:establecimientos.crear");
    Route::put("/administrar/establecimientos/editar", [EstablecimientosController::class, "editar"])->name("establecimientos.editar")->middleware("permission:establecimientos.editar");
    Route::delete("/administrar/establecimientos/eliminar/{id}", [EstablecimientosController::class, "eliminar"])->name("establecimientos.eliminar")->middleware("permission:establecimientos.eliminar");
    
    //Puntos_emision
    Route::get("/administrar/puntos_emision/listar", [Puntos_emisionController::class, "listar"])->name("puntos_emision.listar")->middleware("permission:puntos_emision.listar");
    Route::get("/administrar/puntos_emision/ver", [Puntos_emisionController::class, "ver"])->name("puntos_emision.ver")->middleware("permission:puntos_emision.ver");
    Route::post("/administrar/puntos_emision/crear", [Puntos_emisionController::class, "crear"])->name("puntos_emision.crear")->middleware("permission:puntos_emision.crear");
    Route::put("/administrar/puntos_emision/editar", [Puntos_emisionController::class, "editar"])->name("puntos_emision.editar")->middleware("permission:puntos_emision.editar");
    Route::delete("/administrar/puntos_emision/eliminar/{id}", [Puntos_emisionController::class, "eliminar"])->name("puntos_emision.eliminar")->middleware("permission:puntos_emision.eliminar");