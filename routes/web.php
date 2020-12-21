<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

//página principal
    Route::get('/', function () {
        return view('welcome');
    });

//dashboard
    Route::middleware(['auth:sanctum', 'verified'])->get('/inicio', function () {
        return Inertia\Inertia::render('Dashboard');
    })->name('dashboard');

//administrar
    //Empresa
    Route::middleware(['auth:sanctum', 'verified'])->get('/administrar/empresa/listar', function () {
        return Inertia\Inertia::render('Administrar/Empresa/Listar');
    })->name('administrar.empresa.listar');
    Route::middleware(['auth:sanctum', 'verified'])->get('/administrar/empresa/ver', function () {
        return Inertia\Inertia::render('Administrar/Empresa/Ver');
    })->name('administrar.empresa.ver');
    Route::middleware(['auth:sanctum', 'verified'])->get('/administrar/empresa/crear', function () {
        return Inertia\Inertia::render('Administrar/Empresa/Crear');
    })->name('administrar.empresa.crear');
    Route::middleware(['auth:sanctum', 'verified'])->get('/administrar/empresa/editar', function () {
        return Inertia\Inertia::render('Administrar/Empresa/Editar');
    })->name('administrar.empresa.editar');

    //Establecimeintos
    Route::middleware(['auth:sanctum', 'verified'])->get('/administrar/establecimientos/listar', function () {
        return Inertia\Inertia::render('Administrar/Establecimientos/Listar');
    })->name('administrar.establecimientos.listar');
    Route::middleware(['auth:sanctum', 'verified'])->get('/administrar/establecimientos/ver', function () {
        return Inertia\Inertia::render('Administrar/Establecimientos/Ver');
    })->name('administrar.establecimientos.ver');
    Route::middleware(['auth:sanctum', 'verified'])->get('/administrar/establecimientos/crear', function () {
        return Inertia\Inertia::render('Administrar/Establecimientos/Crear');
    })->name('administrar.establecimientos.crear');
    Route::middleware(['auth:sanctum', 'verified'])->get('/administrar/establecimientos/editar', function () {
        return Inertia\Inertia::render('Administrar/Establecimientos/Editar');
    })->name('administrar.establecimientos.editar');

    //Puntos Emision
    Route::middleware(['auth:sanctum', 'verified'])->get('/administrar/puntos-emision/listar', function () {
        return Inertia\Inertia::render('Administrar/Puntos_Emision/Listar');
    })->name('administrar.puntos-emision.listar');
    Route::middleware(['auth:sanctum', 'verified'])->get('/administrar/puntos-emision/ver', function () {
        return Inertia\Inertia::render('Administrar/Puntos_Emision/Ver');
    })->name('administrar.puntos-emision.ver');
    Route::middleware(['auth:sanctum', 'verified'])->get('/administrar/puntos-emision/crear', function () {
        return Inertia\Inertia::render('Administrar/Puntos_Emision/Crear');
    })->name('administrar.puntos-emision.crear');
    Route::middleware(['auth:sanctum', 'verified'])->get('/administrar/puntos-emision/editar', function () {
        return Inertia\Inertia::render('Administrar/Puntos_Emision/Editar');
    })->name('administrar.puntos-emision.editar');

    //Usuarios
    Route::middleware(['auth:sanctum', 'verified'])->get('/administrar/usuarios/listar', function () {
        return Inertia\Inertia::render('Administrar/Usuarios/Listar');
    })->name('administrar.usuarios.listar');
    Route::middleware(['auth:sanctum', 'verified'])->get('/administrar/usuarios/{id}/ver', function () {
        return Inertia\Inertia::render('Administrar/Usuarios/Ver');
    })->name('administrar.usuarios.ver');
    Route::middleware(['auth:sanctum', 'verified'])->get('/administrar/usuarios/crear', function () {
        return Inertia\Inertia::render('Administrar/Usuarios/Crear');
    })->name('administrar.usuarios.crear');
    Route::middleware(['auth:sanctum', 'verified'])->get('/administrar/usuarios/{id}/editar', function () {
        return Inertia\Inertia::render('Administrar/Usuarios/Editar');
    })->name('administrar.usuarios.editar');





//pruebas pronto borrado
Route::middleware(['auth:sanctum', 'verified'])->get('/usuarios', function () {
    return Inertia\Inertia::render('Usuarios/Visualizar');
})->name('usuarios.visualizar');
//Funciones de Usuarios
Route::get("/usuarios/listar", [UsuariosController::class, "listar"])->name("usuarios.listar")->middleware("permission:usuarios.listar");
Route::post("/usuarios/crear", [UsuariosController::class, "crear"])->name("usuarios.crear")->middleware("permission:usuarios.crear");
Route::put("/usuarios/editar", [UsuariosController::class, "editar"])->name("usuarios.editar")->middleware("permission:usuarios.editar");
Route::delete("/usuarios/eliminar/{id}", [UsuariosController::class, "eliminar"])->name("usuarios.eliminar")->middleware("permission:usuarios.eliminar");
Route::get("/ver", [UsuariosController::class, "ver"])->name("usuarios.ver");
