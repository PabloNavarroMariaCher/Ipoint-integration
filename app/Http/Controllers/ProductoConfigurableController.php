<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoConfigurable;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Http;



class ProductoConfigurableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productosActualizados = 0;
        $productosCreados = 0;
        //ProductoConfigurable::createProducts(); //trae todos los productos
        // $products= ProductoConfigurable::all();
        return view('productoConfigurable.index', [
            'productosActualizados' => $productosActualizados,
            '$productosCreados' => $productosCreados
        ]);
        //,['products'=>$products]);
    }


    public function getProducts()
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





    public function updateProductosconfiguragles()
    {
        $url = env('URL_API_REAL2B_TEST', 'http://127.0.0.1');
        $token = '927f6b6b-cbd4-46ba-92e6-d896350d1534';
        $total = 100;
        $desde = 0;
        $productosActualizados = 0;
        $productosCreados = 0;

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
            $appProductosConfigurables = ProductoConfigurable::all();
            if ($countProducts > 0) {
                foreach ($products['data']['productos'] as $productData) {
                    foreach ($appProductosConfigurables as $app_productoconfigurable) {
                        // Verificar si la fecha de creación del producto es posterior a la fecha actual
                        $fechaCreacionProducto = strtotime($productData['fechaCreacion']);
                        $fechaActual = time();
                        
                        if (strtotime($fechaCreacionProducto) > strtotime($app_productoconfigurable['updated_at'])) {
                            // Buscar el producto en la base de datos local
                            $localProduct = ProductoConfigurable::where('IdProducto', $productData['IdProducto'])->first();

                            if ($localProduct) {
                                // Si el producto existe en la base de datos local, actualizar sus datos
                                $localProduct->update([
                                    'guiaTalles' => $productData['guiaTalles'],
                                    'codigo' => $productData['codigo'],
                                    'nombre' => $productData['nombre'],
                                    'prioridad' => $productData['prioridad'],
                                    'monedaPredeterminada' => $productData['monedaPredeterminada'],
                                    'impuesto' => $productData['impuesto'],
                                    'fechaCreacion' => $productData['fechaCreacion']
                                ]);

                                $productosActualizados++;
                            } else {
                                // Si el producto no existe en la base de datos local, crearlo
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
                                $productosCreados++;
                            }
                        }
                    }
                }

                $desde += $countProducts;
            } else {
                break;
            }
        } while ($countProducts >= $total);

        return view('productoConfigurable.index', [
            'productosActualizados' => $productosActualizados,
            'productosCreados' => $productosCreados
        ]);
    }
}
