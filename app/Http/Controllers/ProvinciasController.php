<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provincia;

class ProvinciasController extends Controller
{
    function listar(Request $rq){
        $buscar = str_replace(array(" ", "-", "-"), "", $rq->buscar);
        $provincias = Provincia::where("nombre", "like", "%$buscar%")->get();
        return $provincias;
    }
}
