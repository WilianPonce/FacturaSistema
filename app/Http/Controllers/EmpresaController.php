<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Http\Resources\EmpresaResource;
use App\Http\Resources\EmpresaCollection;
use Illuminate\support\Str;

class EmpresaController extends Controller
{
    function index(){
        $empresa = Empresa::applySearchs()->applyFilters()->applySorts()->jsonPaginate(); 
        return EmpresaCollection::make($empresa);
    }
    
    function show(Empresa $empresa){
        return EmpresaResource::make($empresa);
    }
}
