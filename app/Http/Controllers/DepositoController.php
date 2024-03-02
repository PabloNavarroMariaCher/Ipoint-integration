<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Deposito;
use Illuminate\Support\Facades\Http;

class DepositoController extends Controller
{

    public function index()
    {
        //$deposito = Deposito::create();******** UTILIZAR SOLO POR PRIMERA VEZ ************
        //   
        //    dd($deposito);
        return view('depositos.index');
    }


    public function store(Request $request)
    {
        //
    }


    public function getDepositos()
    {

        $url = env('URL_API_REAL2B_TEST', 'http://127.0.0.1');
        $token = '927f6b6b-cbd4-46ba-92e6-d896350d1534';
        $total = 100;
        $desde = 0;
        $allSucursal = [];
        $countsucursal = 0;
        do {
            $response = Http::withHeaders([
                'Authorization' =>  $token,
            ])->get($url . '/sucursales');
            $sucursales = $response->json();
            if ($sucursales > 0) {
                $allSucursal = array_merge($allSucursal, $sucursales['data']);

                $desde += $countsucursal;
            } else {
                break;
            }
        } while ($countsucursal >= $total);
        return $sucursales;
    }


    public function updatedDepositos()
    {
        
        $sucursal = $this->getDepositos(); 
        
        foreach ($sucursal['data'] as $depositoIpoint) {
            try {       
                $depositoApp = Deposito::where('codigo', $depositoIpoint['codigo'])->first();
                if ($depositoApp) {
                    $depositoApp->nombre = $depositoIpoint['nombre'];
                    $depositoApp->save();
                } else {
                    
                    Deposito::create([
                        'codigo' => $depositoIpoint['codigo'],
                        'nombre' => $depositoIpoint['nombre']
                    ]);
                }
            } catch (\Exception $e) {        
                var_dump('Error al guardar el deposito: ' . $e->getMessage());
            }
        }
        return view('depositos.index');
    }
}
