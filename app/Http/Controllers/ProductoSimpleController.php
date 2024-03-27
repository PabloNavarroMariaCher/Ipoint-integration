<?php

namespace App\Http\Controllers;

use App\Models\ProductoSimple;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class ProductoSimpleController extends Controller
{
  
    public function index()
    {  
   
        
        return view('productosimple.index');
        
       
    }

  
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateProductosSimples()
    {
        $products2= ProductoSimple::allproductosimple();
        return view('productosimple.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
