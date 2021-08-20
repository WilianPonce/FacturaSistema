<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

use App\Models\User;
use App\Models\UserAll;

class RolesController extends Controller
{
    //vistas de empresas
    function listar_render(){
        return Inertia::render('src/Administrar/Roles/Listar');
    }
    function crear_render(){
        $permisos = DB::table("permissions")->get();
        return Inertia::render('src/Administrar/Roles/Crear', compact('permisos'));
    }
    function editar_render($id){
        $permisos = DB::table("permissions")->get();
        $user_permiso = DB::table("role_has_permissions")->where("role_id", $id)->get();
        $user_permisos =  [];
        for($a=0; $a< count($user_permiso); $a++){
            array_push($user_permisos, $user_permiso[$a]->permission_id);
        }
        $roles = Role::where("id", $id)->first();
        return Inertia::render('src/Administrar/Roles/Editar', compact('roles', 'user_permisos', 'permisos'));
    }

    //peticiones de establecimientos
    function listar(Request $rq){
        $bs = str_replace(array(" ", "-", "_"), "%", $rq->buscar);
        return Role::where("name", "like", "%$bs%")->orderBy("id", "DESC")->simplePaginate(10);
    }
    function eliminar($id){
        Role::find($id)->delete();
        return redirect()->back()->with('message', "Usuario eliminado exitosamente");
    }
    function crear(Request $rq){
        $valores = $rq->only("name");
        $role = Role::create($valores);

        for($a=0; $a< count($rq->permisos); $a++){
            Role::find($role->id)->givePermissionTo($rq->permisos[$a]);
        }

        return redirect()->back()->with('message', "Rol creado exitosamente");
    }
    function editar(Request $rq, $id){
        $valores = $rq->only("name");
        Role::find($id)->update($valores);

        DB::table("role_has_permissions")->where("role_id", $id)->delete();

        for($a=0; $a< count($rq->permisos); $a++){
            Role::find($id)->givePermissionTo($rq->permisos[$a]);
        }

        return redirect()->back()->with('message', "Rol actualizado exitosamente");
    }
    function ver(){
        return Auth::user();
    }
}
