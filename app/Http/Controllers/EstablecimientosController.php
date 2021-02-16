<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Establecimiento;
use Illuminate\Support\Facades\Auth;

class EstablecimientosController extends Controller
{
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
