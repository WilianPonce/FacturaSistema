<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Moneda;

class MonedasController extends Controller
{
    function listar(Request $rq){
        $buscar = str_replace(array(" ", "-", "-"), "", $rq->buscar);
        $monedas = Moneda::where("nombre", "like", "%$buscar%")->get();
        return $monedas;
    }
}
