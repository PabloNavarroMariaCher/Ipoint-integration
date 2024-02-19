<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;



class Product extends Model
{
    protected $fillable = [
        'guiaTalles',
        'codigo',
        'nombre',
        'IdProducto',
        'prioridad',      
        'monedaPredeterminada',
        'impuesto'
    ];
    protected $cast = [
        'fechaCreacion',
    ];

    public static function getProducts()
    {
        $url = env('URL_API_REAL2B_TEST', 'http://127.0.0.1');
        $token = '927f6b6b-cbd4-46ba-92e6-d896350d1534';
        $total = 100;
        $desde = 0;
        $allProducts = []; 

        do {
            $response = Http::withHeaders([
                'Authorization' =>  $token,
            ])->POST($url . '/productos', [
                "_idSolicitud" => "0123456789-XXXXXX-ASDFGHJKLQWERTYU",
                "desde" => $desde,
                "total" => $total
            ]);

            $products = $response->json();
            $countProducts = count($products['data']['productos']);

            if ($countProducts > 0) {

                $allProducts = array_merge($allProducts, $products['data']['productos']);

                $desde += $countProducts;
            } else {

                break;
            }
        } while ($countProducts >= $total); 

        return $allProducts;
    }
}
