<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoSimple;
use App\Models\ProductoConfigurable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countproductossimples= ProductoSimple::count();
        $countproductosconfigurables = ProductoConfigurable::count();
        return view('home',[
            'countproductossimples'=>$countproductossimples,
            'countproductosconfigurables' =>$countproductosconfigurables
        ]);
    }
}
