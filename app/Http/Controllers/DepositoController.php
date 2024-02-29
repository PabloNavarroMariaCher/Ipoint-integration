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
    //    $deposito = Deposito::update_depo()->get();
    //    dd($deposito);
        return view('depositos.index');
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show(string $id)
    {
        //
    }

 
    public function edit(string $id)
    {
        //
    }

    public  function create()
    {
        $url = env('URL_API_REAL2B_TEST', 'http://127.0.0.1');
        $token = '927f6b6b-cbd4-46ba-92e6-d896350d1534';
        $total = 100;
        $desde = 0;
        $allSucursal = [];
        $countsucursal= 0;
        do {
            $response = Http::withHeaders([
                'Authorization' =>  $token,
            ])->get($url . '/sucursales');
            $sucursales = $response->json();       
            if ($sucursales > 0) {
                $allSucursal = array_merge($allSucursal, $sucursales['data']);
                foreach ($sucursales['data'] as $sucursal) {
                    try {
                        Deposito::create([
                            'codigo' => $sucursal['codigo'],
                            'nombre' => $sucursal['nombre']
                          
                        ]);
                    } catch (\Exception $e) {        
                        var_dump('Error al guardar el deposito: ' . $e->getMessage());
                    }
                }
                $desde += $countsucursal;
            } else {
                break;
            }
        } while ($countsucursal >= $total);
        return $sucursales;
    }

    public function getDepositos(){

        $url = env('URL_API_REAL2B_TEST', 'http://127.0.0.1');
        $token = '927f6b6b-cbd4-46ba-92e6-d896350d1534';
        $total = 100;
        $desde = 0;
        $allSucursal = [];
        $countsucursal= 0;
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
      
         // Obtener los depositos actualizados desde la API
         $sucursal = DepositoController::getDepositos();
      

        
        
         foreach ($sucursal['data']as $depositoIpont) {
                 $depositoApp= Deposito::all();
                // $depositoIpont= $depositoIpont[];
                 dd($depositoIpont);
                 
             

    //         if ($existingDeposito) {
    //             $existingDeposito->update([
    //                 'nombre' => $deposito['nombre']
    //                 // Agregar más campos para actualizar según sea necesario
    //             ]);
    //         } else {
    //             // Si no existe, crear un nuevo registro
    //             try {
    //                 Deposito::create([
    //                     'codigo' => $deposito['codigo'],
    //                     'nombre' => $deposito['nombre']
    //                     // Agregar más campos según sea necesario
    //                 ]);
    //             } catch (\Exception $e) {
    //                 // Manejar el error en la creación del deposito
    //                 var_dump('Error al guardar el deposito: ' . $e->getMessage());
    //             }
    //         }
         }
    //     return view('depositos.index');
     }
  
   
}
