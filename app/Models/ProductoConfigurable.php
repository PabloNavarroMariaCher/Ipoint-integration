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
    public function productossimple(){
        return $this->hasMany(ProductoSimple::class,'IdProducto');
    }

    public static function createProducts()
    {
        ProductoConfigurable::truncate();
        $url = env('URL_API_REAL2B_TEST', 'http://127.0.0.1');
        $token = '927f6b6b-cbd4-46ba-92e6-d896350d1534';
        $total = 1000;
        $desde = 0;
        $allProducts = [];
        do {
            $response = Http::withHeaders([
                'Authorization' =>  $token,
            ])->post($url . '/productos', [
                "_idSolicitud" => "0123456789-XXXXXX-ASDFGHJKLQWERTYU",
                "desde" => $desde,
                "total" => $total
            ]);
    
            $products = $response->json();
        
            $countProducts = count($products['data']['productos']);
    
            if ($countProducts > 0) {
                $allProducts = array_merge($allProducts, $products['data']['productos']);
    
                // Chunk para procesar los productos en lotes
                collect($products['data']['productos'])->chunk(1000)->each(function ($chunk) {
                    try {
                        $dataToInsert = [];
                        foreach ($chunk as $productData) {
                            $dataToInsert[] = [
                                'guiaTalles' => $productData['guiaTalles'],
                                'codigo' => $productData['codigo'],
                                'nombre' => $productData['nombre'],
                                'IdProducto' => $productData['IdProducto'],
                                'prioridad' => $productData['prioridad'],
                                'monedaPredeterminada' => $productData['monedaPredeterminada'],
                                'impuesto' => $productData['impuesto'],
                                'fechaCreacion' => $productData['fechaCreacion']
                            ];
                        }
                        ProductoConfigurable::insert($dataToInsert);
                    } catch (\Exception $e) {
                        var_dump('Error al guardar el producto: ' . $e->getMessage());
                    }
                });
    
                $desde += $countProducts;
            } else {
                break;
            }
        } while ($countProducts >= $total);
    
        return $allProducts;
    }
    
}
