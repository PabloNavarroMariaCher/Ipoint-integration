<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductoConfigurable;
use App\Models\ProductoSimple;

class datatableController extends Controller
{
    public function allproductoconfigurable(){

       $productoconfigurables = ProductoConfigurable::all();

       return datatables()->of($productoconfigurables)->toJson() ;
    }
    public function allproductosimple(){

        $productosimple = ProductoSimple::all();
        
        return datatables()->of($productosimple)->toJson() ;

    }
}
