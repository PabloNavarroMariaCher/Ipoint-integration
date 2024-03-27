<?php

namespace App\Http\Controllers;

use App\Models\ProductoSimple;
use Illuminate\Http\Request;

class PreciosController extends Controller
{
    public function index(){

        $precios = ProductoSimple::all();
        return view('precios.index',compact('precios'));
    }
}
