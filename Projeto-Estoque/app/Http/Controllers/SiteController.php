<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $produtodoDia = Produto::with('marca')->find('2');
        
        return response()->json($produtodoDia);
    }

    public function ler_marca(){
        $marca = Produto::get();
        return response($marca, 200);
    }
}
