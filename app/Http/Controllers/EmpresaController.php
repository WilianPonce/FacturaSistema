<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Http\Resources\RequestResource;
use App\Http\Resources\RequestCollection;
use Illuminate\support\Str;

class EmpresaController extends Controller
{
    function listar(){
        $empresas = Empresa::paginate(10);
        return $empresas;
    }

    function ver(Empresa $empresa){
        return RequestResource::make($empresa);
    }
}
