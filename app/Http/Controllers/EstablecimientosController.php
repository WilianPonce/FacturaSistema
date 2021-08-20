<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Establecimiento;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class EstablecimientosController extends Controller
{
    //vistas de establecimientos
    function listar_render(){
        return Inertia::render('src/Administrar/Establecimientos/Listar');
    }
    function ver_render($id){
        $response = Establecimiento::where("empresa_id", "=", Auth::User()->empresa_id)->where("id", "=", $id)->first();
        if(empty($response)){
            return abort(404);
        }
        return Inertia::render('src/Administrar/Establecimientos/Ver', ['response' => $response]);
    }
    function crear_render(){
        return Inertia::render('src/Administrar/Establecimientos/Crear');
    }
    function editar_render($id){
        $response = Establecimiento::where("empresa_id", "=", Auth::User()->empresa_id)->where("id", "=", $id)->first();
        if(empty($response)){
            return abort(404);
        }
        $response->offsetSet('_method', "PUT");
        return Inertia::render('src/Administrar/Establecimientos/Editar', ['response' => $response]);
    }

    //peticiones de establecimientos
    function listar(Request $rq){
        $buscar = str_replace(array(" ", "-", "_"), "%", $rq->buscar);
        $establecimientos = Establecimiento::select('*')
                            ->where(function($q) use ($buscar){
                                $q->where('nombre', 'like','%'.$buscar.'%')
                                ->orWhere('codigo', 'like','%'.$buscar.'%')
                                ->orWhere('url_web', 'like','%'.$buscar.'%')
                                ->orWhere('nombre_comercial', 'like','%'.$buscar.'%')
                                ->orWhere('direccion', 'like','%'.$buscar.'%');
                            })->where('empresa_id', '=', Auth::user()->empresa_id)
                            ->orderBy("id","DESC")
                            ->paginate(10);
        return $establecimientos;
    }
    function crear(Request $rq){
        $this->validar($rq);
        Establecimiento::create($rq->all());
        return redirect()->back()->with('message', "Establecimiento creado exitosamente");
    }
    function editar($id, Request $rq){
        $this->validar($rq);
        Establecimiento::find($id)->update($rq->all());
        return redirect()->back()->with('message', "Establecimiento creado exitosamente");
    }
    function eliminar($id){
        Establecimiento::find($id)->delete();
        return redirect()->back()->with('message', "Establecimiento Eliminado");
    }
    //Funciones Adicionales
    function validar($rq){
        $rules = [
            'nombre' => 'required',
            'serie' => 'required|numeric|digits:3',
            'direccion' => 'required',
            'estado' => 'required|boolean',
        ];
        $message = [
            'nombre.required' => 'Nombre Obligatorio',
            'serie.required' => 'Debe agregar la serie',
            'serie.numeric' => 'Debe ingresar solo números',
            'serie.digits' => 'Debe ingresar 3 Dígitos',
            'direccion.required' => 'Debe agregar una dirección',
            'estado.required' => 'Debe agreagr estado',
        ];
        $this->validate($rq, $rules, $message);
    }
    function select(Request $rq){
        $buscar = str_replace(array(" ", "-", "_"), "%", $rq->buscar);
        $establecimientos = Establecimiento::select('*')
                            ->where(function($q) use ($buscar){
                                $q->where('nombre', 'like','%'.$buscar.'%')
                                ->orWhere('codigo', 'like','%'.$buscar.'%')
                                ->orWhere('url_web', 'like','%'.$buscar.'%')
                                ->orWhere('nombre_comercial', 'like','%'.$buscar.'%')
                                ->orWhere('direccion', 'like','%'.$buscar.'%');
                            })->where('empresa_id', '=', Auth::user()->empresa_id)
                            ->orderBy("id","DESC")->get();
        return $establecimientos;
    }
}
