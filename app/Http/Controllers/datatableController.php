<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductoConfigurable;
use App\Models\ProductoSimple;
use App\Models\Deposito;

class datatableController extends Controller
{
    public function allproductoconfigurable(){

       $productoconfigurables = ProductoConfigurable::all();

       return datatables()->of($productoconfigurables)->toJson() ;
    }
    public function allproductosimple(){

        $productosimple2 = ProductoSimple::all();
        
        return datatables()->of($productosimple2)->toJson() ;

    }
    public function alldeposito(){
        $depositos = Deposito::all();
        return datatables()->of($depositos)->toJson() ;
    }
   

}
