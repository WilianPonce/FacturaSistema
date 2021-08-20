<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
class EmpresasController extends Controller
{
    //vistas de empresas
    function listar_render(){
        return Inertia::render('src/Administrar/Empresas/Listar');
    }
    function ver_render($id){
        $response = Empresa::find($id);
        if(empty($response)){
            return abort(404);
        }
        $response->offsetSet('email_password_confirmation', $response->email_password);
        return Inertia::render('src/Administrar/Empresas/Ver', ['response' => $response]);
    }
    function crear_render(){
        return Inertia::render('src/Administrar/Empresas/Crear');
    }
    function editar_render($id){
        $response = Empresa::find($id);
        if(empty($response)){
            return abort(404);
        }
        $response->offsetSet('_method', "PUT");
        $response->offsetSet('email_password_confirmation', $response->email_password);
        $response->offsetSet('logotipo_archivo', null);
        $response->offsetSet('firma_electronica_archivo', null);

        return Inertia::render('src/Administrar/Empresas/Editar', ['response' => $response]);
    }

    //peticiones de establecimientos
    function validar($rq){
        $email_facturacion = '';
        $unico = '';
        if(isset($rq->email_facturacion)){
            $email_facturacion = ['email'];
        }
        if(!isset($rq->id)){
            $unico = 'unique:empresas';
        }
        $rules = [
            'periodo' => 'required|numeric',
            'razon_social' => 'required',
            'razon_comercial' => 'required',
            'tipo_identificacion' => 'required',
            'identificacion' => 'required|numeric',
            'direccion' => 'required',
            'telefono' => 'required|numeric',
            'email' => 'required|email|'.$unico,
            'email_password' => 'required|confirmed',
            'email_server' => 'required',
            'email_port' => 'required|numeric',
            'email_security' => 'required|numeric',
            'obligado_contabilidad' => 'required|numeric|boolean',
            'tipo_emision' => 'required|boolean',
            'ambiente' => 'required|boolean',
            'facturar_negativo' => 'required|boolean',
            'moneda_id' => 'required|numeric',
            'provincia_id' => 'required|numeric',
            'ciudad_id' => 'required|numeric',
            'email_facturacion' => $email_facturacion
        ];
        $message = [
            'periodo.required' => 'Perido obligatorio',
            'periodo.numeric' => 'Perido debe ser un Año',
            'razon_social.required' => 'Razon Social obligatorio'
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
                            ->orderBy("id","DESC")
                            ->paginate(10);
        return $empresas;
    }
    function ver($id){
        return Empresa::find($id);
    }
    function crear(Request $rq){
        $this->validar($rq);
        //logotipo
        $logotipo = $this->guardar_logotipo($rq);
        if($logotipo){$rq->offsetSet('logotipo', $logotipo);}
        //firma
        $firma = $this->guardar_firma($rq);
        if($firma){$rq->offsetSet('firma_electronica', $firma);}

        Empresa::create($rq->except('email_password_confirmation', 'logotipo_archivo', 'firma_electronica_archivo'));
        return redirect()->back()->with('message', "Empresa creada exitosamente");
    }
    function editar($id, Request $rq){
        $this->validar($rq);
        //logotipo
        $logotipo = $this->guardar_logotipo($rq);
        if($logotipo){$rq->offsetSet('logotipo', $logotipo);}

        //firma
        $firma = $this->guardar_firma($rq);
        if($firma){$rq->offsetSet('firma_electronica', $firma);}

        Empresa::find($id)->update($rq->except('email_password_confirmation', 'logotipo_archivo', 'firma_electronica_archivo'));
        return redirect()->back()->with('message', "Empresa actualizada exitosamente");
    }
    function eliminar($id){
        Empresa::destroy($id);
        return redirect()->back()->with('message', "Empresa Eliminada");
    }

    //guarda el logotipo en el servidor y retorna el nombre del archivo
    function guardar_logotipo($rq){
        if ($rq->file('logotipo_archivo')) {
            $logotipo = $rq->file('logotipo_archivo');
            $ext = pathinfo($logotipo->getClientOriginalName(), PATHINFO_EXTENSION);
            $logotipo_nombre = "logotipo-" . time() . "-" . $rq->razon_social . '.' . $ext;
            $logotpio_ubicacion = storage_path('archivos/logotipos');
            $logotipo->move($logotpio_ubicacion, $logotipo_nombre);
            return $logotipo_nombre;
        }
        return false;
    }
    //guarda la firma en el servidor y retorna el nombre del archivo
    function guardar_firma($rq){
        if ($rq->file('firma_electronica_archivo')) {
            $firma_electronica = $rq->file('firma_electronica_archivo');
            $ext = pathinfo($firma_electronica->getClientOriginalName(), PATHINFO_EXTENSION);
            $firma_nombre = "firma-" . time() . "-" . $rq->razon_social . '.' . $ext;
            $logotpio_ubicacion = storage_path('archivos/firmas_electronicas');
            $firma_electronica->move($logotpio_ubicacion, $firma_nombre);
            return $firma_nombre;
        }
        return false;
    }

    //recupera la vista del logotipo mediante una ruta del servidor
    function logotipo($logotipo){
        $file = storage_path('archivos/logotipos/').$logotipo;
        return \File::get($file);
    }
}
