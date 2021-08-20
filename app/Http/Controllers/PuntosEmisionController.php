<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PuntoEmision;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PuntosEmisionController extends Controller
{
    //vistas de establecimientos
    function listar_render(){
        return Inertia::render('src/Administrar/Puntos_Emision/Listar');
    }
    function ver_render($id){
        $response = PuntoEmision::where("empresa_id", "=", Auth::User()->empresa_id)->where("id", "=", $id)->first();
        if(empty($response)){
            return abort(404);
        }
        return Inertia::render('src/Administrar/Puntos_Emision/Ver', ['response' => $response]);
    }
    function crear_render(){
        return Inertia::render('src/Administrar/Puntos_Emision/Crear');
    }
    function editar_render($id){
        $response = PuntoEmision::where("empresa_id", "=", Auth::User()->empresa_id)->where("id", "=", $id)->first();
        if(empty($response)){
            return abort(404);
        }
        $response->offsetSet('_method', "PUT");
        return Inertia::render('src/Administrar/Puntos_Emision/Editar', ['response' => $response]);
    }

    //peticiones de establecimientos
    function listar(Request $rq){
        $buscar = str_replace(array(" ", "-", "_"), "%", $rq->buscar);
        $puntoEmision = PuntoEmision::select('*')
                            ->where(function($q) use ($buscar){
                                $q->where('codigo', 'like','%'.$buscar.'%')
                                ->orWhere('nombre', 'like','%'.$buscar.'%')
                                ->orWhere('serie', 'like','%'.$buscar.'%')
                                ->orWhere('factura', 'like','%'.$buscar.'%')
                                ->orWhere('nota_credito', 'like','%'.$buscar.'%');
                            })->where('empresa_id', '=', Auth::user()->empresa_id)
                            ->orderBy("id","DESC")
                            ->paginate(10);
        return $puntoEmision;
    }
    function crear(Request $rq){
        $this->validar($rq);
        PuntoEmision::create($rq->all());
        return redirect()->back()->with('message', "Punto de Emisión creado exitosamente");
    }
    function editar($id, Request $rq){
        $this->validar($rq);
        PuntoEmision::find($id)->update($rq->all());
        return redirect()->back()->with('message', "Punto de Emisión actualizado exitosamente");
    }
    function eliminar($id){
        PuntoEmision::find($id)->delete();
        return redirect()->back()->with('message', "Punto de Emisión Eliminado");
    }
    //Funciones Adicionales
    function validar($rq){
        $rules = [
            'nombre' => 'required',
            'serie' => 'required|numeric|digits:3',
            'estado' => 'required|boolean',
            'establecimiento_id' => 'required',
        ];
        $message = [
            'nombre.required' => 'Nombre Obligatorio',
            'serie.required' => 'Debe agregar la serie',
            'serie.numeric' => 'Debe ingresar solo números',
            'serie.digits' => 'Debe ingresar 3 Dígitos',
            'estado.required' => 'Debe agreagr estado',
            'establecimiento_id.required' => 'No esta asigando un establecimiento',
        ];
        $this->validate($rq, $rules, $message);
    }
}
