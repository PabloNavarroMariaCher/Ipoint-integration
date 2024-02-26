<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductoConfigurable;


class datatableController extends Controller
{
    public function allproductoconfigurable(){

       $productoconfigurables = ProductoConfigurable::all();

       return datatables()->of($productoconfigurables)->toJson() ;
    }
}
