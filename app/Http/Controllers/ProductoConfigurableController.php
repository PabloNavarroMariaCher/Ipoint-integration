<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoConfigurable;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Http;



class ProductoConfigurableController extends Controller
{

  public function updateProductosconfiguragles()
  {
    ProductoConfigurable::createProducts();
    return view('productoConfiguarble.index');
  }



  public function index()
  {

    return view('productoConfigurable.index');
  }
}
