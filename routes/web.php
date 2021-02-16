<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Models\Empresa;
use App\Models\Establecimiento;
use App\Models\PuntoEmision;

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
    Route::prefix('/administrar/empresas/')->group(function () {
        Route::middleware(['auth:sanctum', 'verified'])->get('listar', function () {
            return Inertia\Inertia::render('src/Administrar/Empresas/Listar');
        })->name('administrar.empresas.listar');
        Route::middleware(['auth:sanctum', 'verified'])->get('{id}/ver', function ($id) {
            return Inertia\Inertia::render('src/Administrar/Empresas/Ver');
        })->name('administrar.empresas.ver');
        Route::middleware(['auth:sanctum', 'verified'])->get('crear', function () {
            return Inertia\Inertia::render('src/Administrar/Empresas/Crear');
        })->name('administrar.empresas.crear');
        Route::middleware(['auth:sanctum', 'verified'])->get('{id}/editar', function ($id) {
            $recupera = Empresa::find($id);
            return Inertia\Inertia::render('src/Administrar/Empresas/Editar', ['recupera' => $recupera]);
        })->name('administrar.empresas.editar');
    });

    //Establecimeintos
    Route::prefix('/administrar/establecimientos/')->group(function () {
        Route::middleware(['auth:sanctum', 'verified'])->get('listar', function () {
            return Inertia\Inertia::render('src/Administrar/Establecimientos/Listar');
        })->name('administrar.establecimientos.listar');
        Route::middleware(['auth:sanctum', 'verified'])->get('{id}/ver', function ($id) {
            $response = Establecimiento::where("empresa_id", "=", Auth::User()->empresa_id)->where("id", "=", $id)->first();
            return Inertia\Inertia::render('src/Administrar/Establecimientos/Ver', ['form' => $response]);
        })->name('administrar.establecimientos.ver');
        Route::middleware(['auth:sanctum', 'verified'])->get('crear', function () {
            return Inertia\Inertia::render('src/Administrar/Establecimientos/Crear');
        })->name('administrar.establecimientos.crear');
        Route::middleware(['auth:sanctum', 'verified'])->get('{id}/editar', function ($id) {
            $response = Establecimiento::where("empresa_id", "=", Auth::User()->empresa_id)->where("id", "=", $id)->first();
            return Inertia\Inertia::render('src/Administrar/Establecimientos/Editar', ['response' => $response]);
        })->name('administrar.establecimientos.editar');
    });

    //Puntos Emision
    Route::prefix('/administrar/puntos-emision/')->group(function () {
        Route::middleware(['auth:sanctum', 'verified'])->get('listar', function () {
            return Inertia\Inertia::render('src/Administrar/Puntos_Emision/Listar');
        })->name('administrar.puntos_emision.listar');
        Route::middleware(['auth:sanctum', 'verified'])->get('{id}/ver', function ($id) {
            return Inertia\Inertia::render('src/Administrar/Puntos_Emision/Ver');
        })->name('administrar.puntos_emision.ver');
        Route::middleware(['auth:sanctum', 'verified'])->get('crear', function () {
            return Inertia\Inertia::render('src/Administrar/Puntos_Emision/Crear');
        })->name('administrar.puntos_emision.crear');
        Route::middleware(['auth:sanctum', 'verified'])->get('{id}/editar', function ($id) {
            $response = PuntoEmision::where("empresa_id", "=", Auth::User()->empresa_id)->where("id", "=", $id)->first();
            return Inertia\Inertia::render('src/Administrar/Puntos_Emision/Editar', ['response' => $response]);
        })->name('administrar.puntos_emision.editar');
    });

    //Usuarios
    Route::prefix('/administrar/usuarios/')->group(function () {
        Route::middleware(['auth:sanctum', 'verified'])->get('listar', function () {
            return Inertia\Inertia::render('src/Administrar/Usuarios/Listar');
        })->name('administrar.usuarios.listar');
        Route::middleware(['auth:sanctum', 'verified'])->get('{id}/ver', function ($id) {
            return Inertia\Inertia::render('src/Administrar/Usuarios/Ver');
        })->name('administrar.usuarios.ver');
        Route::middleware(['auth:sanctum', 'verified'])->get('crear', function () {
            return Inertia\Inertia::render('src/Administrar/Usuarios/Crear');
        })->name('administrar.usuarios.crear');
        Route::middleware(['auth:sanctum', 'verified'])->get('{id}/editar', function ($id) {
            return Inertia\Inertia::render('src/Administrar/Usuarios/Editar');
        })->name('administrar.usuarios.editar');
    });



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
