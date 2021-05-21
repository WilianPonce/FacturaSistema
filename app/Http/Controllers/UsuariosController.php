<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserAll;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;
use PhpParser\Node\Stmt\Foreach_;

class UsuariosController extends Controller
{
    //vistas de empresas
    function listar_render(){

        return Inertia::render('src/Administrar/Usuarios/Listar');
    }
    function ver_render($id){
        $response = User::where("empresa_id", "=", Auth::User()->empresa_id)->where("id", "=", $id)->first();
        if(empty($response)){
            return abort(404);
        }
        return Inertia::render('src/Administrar/Usuarios/Ver', ['response' => $response]);
    }
    function crear_render(){
        $roles = Role::all();
        return Inertia::render('src/Administrar/Usuarios/Crear', compact('roles'));
    }
    function editar_render($id){
        $usuario = UserAll::select("*", "role_id AS rol")->leftjoin("model_has_roles", "model_has_roles.model_id", "id")->where("id", $id)->first();
        $usuario["confirm_password"] = $usuario->password;
        $roles = Role::all();
        return Inertia::render('src/Administrar/Usuarios/Editar', compact('usuario', 'roles'));
    }

    //peticiones de establecimientos
    function listar(Request $rq){
        $bs = str_replace(array(" ", "-", "_"), "%", $rq->buscar);
        return User::where("name", "like", "%$bs%")
                        ->orWhere("email", "like", "%$bs%")
                        ->orWhere("telefono", "like", "%$bs%")
                        ->orWhere("celular", "like", "%$bs%")
                        ->orWhere("tipo_sangre", "like", "%$bs%")
                        ->orWhere("direccion", "like", "%$bs%")
                        ->orderBy("id", "DESC")
                        ->simplePaginate(10);
    }
    function eliminar($id){
        UserAll::destroy($id);
        DB::table("model_has_roles")->where("model_id", $id)->delete();
        return redirect()->back()->with('message', "Usuario eliminado exitosamente");
    }
    function crear(Request $rq){
        $valores = $rq->except('rol', 'confirm_password');
        $valores["estado"] = 1;
        $us = UserAll::create($valores);
        $us->save();
        $rol = $rq->rol;

        User::find($us->id)->assignRole($rol);

        return redirect()->back()->with('message', "Usuario creado exitosamente");
    }
    function editar(Request $rq, $id){
        $valores = $rq->except('rol', 'confirm_password');
        $us = UserAll::findOrFail($id);
        $us->update($valores);
        $rol = $rq->rol;
        DB::table("model_has_roles")->where("model_id", $id)->delete();
        User::find($id)->assignRole($rol);

        return redirect()->back()->with('message', "Usuario actualizado exitosamente");
    }
    function ver(){
        return Auth::user();
    }
}
