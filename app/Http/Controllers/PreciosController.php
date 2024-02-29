<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreciosController extends Controller
{
    public function index(){
        return view('precios.index');
    }
}
