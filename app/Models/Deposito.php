<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Deposito extends Model
{
    use HasFactory;
   
    protected $table = 'depositos';
   
    protected $fillable = [
        'codigo',
        'nombre'
        
    ];


    
    public static function createDepositos()
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


}
