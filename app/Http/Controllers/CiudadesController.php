<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ciudad;

class CiudadesController extends Controller
{
    function listar(Request $rq){
        $buscar = str_replace(array(" ", "-", "-"), "", $rq->buscar);
        $ciudades = Ciudad::where("provincia_id", "like", "%$buscar%")->get();
        return $ciudades;
    }
}
