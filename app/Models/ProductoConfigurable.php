<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class ProductoConfigurable extends Model
{
    protected $table = 'products_configurable';

    protected $fillable = [
        'guiaTalles',
        'codigo',
        'nombre',
        'IdProducto',
        'prioridad',
        'monedaPredeterminada',
        'impuesto',
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

                // Guardar productos en la base de datos
                foreach ($products['data']['productos'] as $productData) {
                    try {
                        ProductoConfigurable::create([
                            'guiaTalles' => $productData['guiaTalles'],
                            'codigo' => $productData['codigo'],
                            'nombre' => $productData['nombre'],
                            'IdProducto' => $productData['IdProducto'],
                            'prioridad' => $productData['prioridad'],
                            'monedaPredeterminada' => $productData['monedaPredeterminada'],
                            'impuesto' => $productData['impuesto'],
                            'fechaCreacion' => $productData['fechaCreacion']
                        ]);
                    } catch (\Exception $e) {
                       
                        var_dump('Error al guardar el producto: ' . $e->getMessage());
                    }
                }

                $desde += $countProducts;
            } else {
                break;
            }
        } while ($countProducts >= $total);

        return $allProducts;
    }
}
