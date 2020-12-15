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
        $empresa = Empresa::applySearchs()->applyFilters()->applySorts()->jsonPaginate(); 
        return RequestCollection::make($empresa);
    }
    
    function ver(Empresa $empresa){
        return RequestResource::make($empresa);
    }
}
