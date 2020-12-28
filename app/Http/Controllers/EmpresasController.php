<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class EmpresasController extends Controller
{
    function validar_crear($rq){
        $rules = [
            'codigo' => 'required|max:1',
            'periodo' => 'required',
            'razon_social' => 'required',
            'razon_comercial' => 'required',
            'tipo_identificacion' => 'required',
            'identificacion' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'email_password' => 'required|confirmed',
            'email_server' => 'required',
            'email_port' => 'required',
            'email_security' => 'required',
            'obligado_contabilidad' => 'required',
            'tipo_cuentas' => 'required',
            'tipo_emision' => 'required',
            'ambiente' => 'required',
            'facturar_negativo' => 'required',
            'moneda_id' => 'required',
            'provincia_id' => 'required',
            'ciudad_id' => 'required',
        ];
        $message = [
            'codigo.required' => 'El Código es obligatorio',
            'codigo.max' => 'El Código solo permite 1 caracter',
        ];
        $this->validate($rq, $rules, $message);
    }
    function validar_editar($rq){
        $rules = [
            'codigo' => 'required|max:100',
            'periodo' => 'required',
            'razon_social' => 'required',
            'razon_comercial' => 'required',
            'tipo_identificacion' => 'required',
            'identificacion' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'email_password' => 'required',
            'email_server' => 'required',
            'email_port' => 'required',
            'email_security' => 'required',
            'obligado_contabilidad' => 'required',
            'tipo_cuentas' => 'required',
            'tipo_emision' => 'required',
            'ambiente' => 'required',
            'facturar_negativo' => 'required',
            'moneda_id' => 'required',
            'provincia_id' => 'required',
            'ciudad_id' => 'required',
        ];
        $message = [
            'codigo.required' => 'El Código es obligatorio',
        ];
        $this->validate($rq, $rules, $message);
    }
    function listar(Request $rq){
        $buscar = str_replace(array(" ", "-", "_"), "%", $rq->buscar);
        $empresas = Empresa::where("codigo", "LIKE", "%$buscar%")
                            ->orWhere("razon_social", "LIKE", "%$buscar%")
                            ->orWhere("razon_comercial", "LIKE", "%$buscar%")
                            ->orWhere("tipo_identificacion", "LIKE", "%$buscar%")
                            ->orWhere("identificacion", "LIKE", "%$buscar%")
                            ->orWhere("direccion", "LIKE", "%$buscar%")
                            ->orWhere("telefono", "LIKE", "%$buscar%")
                            ->orWhere("email", "LIKE", "%$buscar%")
                            ->orWhere("leyenda_facturacion", "LIKE", "%$buscar%")
                            ->paginate(10);
        return $empresas;
    }
    function ver($id){
        return Empresa::find($id);
    }
    function crear(Request $rq){
        $this->validar_crear($rq);

        Empresa::create($rq->all());
        return redirect()->back()->with('message', "Empresa creada exitosamente");
    }
    function editar($id, Request $rq){
        $this->validar_editar($rq);

        Empresa::find($id)->update($rq);
        return redirect()->back()->with('message', "Empresa actualizada exitosamente");
    }
    function eliminar($id){
        Empresa::destroy($id);
        return redirect()->back()->with('message', "Empresa Eliminada");
    }
}
