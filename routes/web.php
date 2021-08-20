<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\EstablecimientosController;
use App\Http\Controllers\PuntosEmisionController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RolesController;
use App\Models\Empresa;

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
    Route::middleware(['auth:sanctum', 'verified'])->prefix('/administrar/empresas/')->group(function () {
        Route::get('listar', [EmpresasController::class, "listar_render"])->name('administrar.empresas.listar')->middleware("permission:empresas.listar");
        Route::get('{id}/ver', [EmpresasController::class, "ver_render"])->name('administrar.empresas.ver')->middleware("permission:empresas.ver");;
        Route::get('crear', [EmpresasController::class, "crear_render"])->name('administrar.empresas.crear')->middleware("permission:empresas.crear");
        Route::get('{id}/editar', [EmpresasController::class, "editar_render"])->name('administrar.empresas.editar')->middleware("permission:empresas.editar");
    });

    //Establecimeintos
    Route::middleware(['auth:sanctum', 'verified'])->prefix('/administrar/establecimientos/')->group(function () {
        Route::get('listar', [EstablecimientosController::class, "listar_render"])->name('administrar.establecimientos.listar')->middleware("permission:establecimientos.listar");
        Route::get('{id}/ver', [EstablecimientosController::class, "ver_render"])->name('administrar.establecimientos.ver')->middleware("permission:establecimientos.ver");;
        Route::get('crear', [EstablecimientosController::class, "crear_render"])->name('administrar.establecimientos.crear')->middleware("permission:establecimientos.crear");
        Route::get('{id}/editar', [EstablecimientosController::class, "editar_render"])->name('administrar.establecimientos.editar')->middleware("permission:establecimientos.editar");
    });

    //Puntos Emision
    Route::middleware(['auth:sanctum', 'verified'])->prefix('/administrar/puntos-emision/')->group(function () {
        Route::get('listar', [PuntosEmisionController::class, "listar_render"])->name('administrar.puntos_emision.listar')->middleware("permission:puntos_emision.listar");
        Route::get('{id}/ver', [PuntosEmisionController::class, "ver_render"])->name('administrar.puntos_emision.ver')->middleware("permission:puntos_emision.ver");
        Route::get('crear', [PuntosEmisionController::class, "crear_render"])->name('administrar.puntos_emision.crear')->middleware("permission:puntos_emision.crear");
        Route::get('{id}/editar', [PuntosEmisionController::class, "editar_render"])->name('administrar.puntos_emision.editar')->middleware("permission:puntos_emision.editar");
    });

    //Usuarios
    Route::middleware(['auth:sanctum', 'verified'])->prefix('/administrar/usuarios/')->group(function () {
        Route::get('listar', [UsuariosController::class, "listar_render"])->name('administrar.usuarios.listar')->middleware("permission:usuarios.listar");
        Route::get('{id}/ver', [UsuariosController::class, "ver_render"])->name('administrar.usuarios.ver')->middleware("permission:usuarios.ver");
        Route::get('crear', [UsuariosController::class, "crear_render"])->name('administrar.usuarios.crear')->middleware("permission:usuarios.crear");
        Route::get('{id}/editar', [UsuariosController::class, "editar_render"])->name('administrar.usuarios.editar')->middleware("permission:usuarios.editar");
    });

    //Roles
    Route::middleware(['auth:sanctum', 'verified'])->prefix('/administrar/roles/')->group(function () {
        Route::get('listar', [RolesController::class, "listar_render"])->name('administrar.roles.listar')->middleware("permission:roles.listar");
        Route::get('{id}/ver', [RolesController::class, "ver_render"])->name('administrar.roles.ver')->middleware("permission:roles.ver");
        Route::get('crear', [RolesController::class, "crear_render"])->name('administrar.roles.crear')->middleware("permission:roles.crear");
        Route::get('{id}/editar', [RolesController::class, "editar_render"])->name('administrar.roles.editar')->middleware("permission:roles.editar");
    });
