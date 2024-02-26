<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;


class ProductoSimple extends Model
{
    protected $table = 'products_simples';

    protected $fillable = [
        'IdProducto',
        'VarianteCodigo',
        'VarianteNombre_color',
        'VariantesAtributos',
        'VarianteCodigo',
        'PresentacionCodigoTalle',
        'PresentacionSku',
        'PresentacionStock',
        'PresentacionStockDeposito',
        'PresentacionStockReservado',
        'PresentacionStockOnOrder',
        'PresentacionStockInmediato',
        'PresentacionPrecioVenta_ARS',
        'PresentacionPrecioVenta_USD',
        'PresentacionPrecioLista_ARS',
        'PresentacionPrecioLista_USD'
        
    ];

    public function productosConfigurable(){
        return $this->belongsTo(ProductoConfigurable::class,'IdProducto');
    }

    public static function allproductosimple(){

        $url = env('URL_API_REAL2B_TEST', 'http://127.0.0.1');
        $token = '927f6b6b-cbd4-46ba-92e6-d896350d1534';
        $total = 100;
        $desde = 0;
        $allproductossimples = [];

        do {
            $response = Http::withHeaders([
                'Authorization' =>  $token,
            ])->POST($url . '/productos', [
                "_idSolicitud" => "0123456789-XXXXXX-ASDFGHJKLQWERTYU",
                "desde" => $desde,
                "total" => $total
            ]);

            $productossimple = $response->json();
            $countproductossimples = count($productossimple['data']['productos']);

            if ($countproductossimples > 0) {
                $allproductossimples = array_merge($allproductossimples, $productossimple['data']['productos']);

                // Guardar productos en la base de datos
                foreach ($productossimple['data']['productos'] as $productoSimple) {
                    
                   
                      foreach ($productoSimple['variantes'] as $variantes){
                          
                          foreach ($variantes['presentaciones'] as  $presentaciones) {    
                            
                            
                              try {
                                  ProductoSimple::create([
                                      'IdProducto'=>$productoSimple['IdProducto'],
                                      'CodConfigurable'=>$productoSimple['codigo'],                                   
                                      'VarianteCodigo'=>$variantes['codigo'],
                                      'VarianteNombre_color'=>$variantes['nombre'],
                                      'VariantesAtributos'=>$variantes['atributos']['sale'],
                                      
                                      'PresentacionNombre'=>$presentaciones['nombre'],
                                      'PresentacionCodigoTalle'=>$presentaciones['codigo'],
                                      'PresentacionSku'=>$presentaciones['sku'],
                                      'PresentacionStock'=>$presentaciones['stock'],
                                      'PresentacionStockDeposito'=>$presentaciones['stockDeposito'],
                                      'PresentacionStockReservado'=>$presentaciones['stockReservado'],
                                      'PresentacionStockOnOrder'=>$presentaciones['stockOnOrder'],
                                      'PresentacionStockInmediato'=>$presentaciones['stockInmediato'],

                                      'PresentacionPrecioVenta_ARS'=>$presentaciones['precioVenta']['ARS'],
                                      'PresentacionPrecioVenta_USD'=>$presentaciones['precioVenta']['USD'],
                                      'PresentacionPrecioLista_ARS'=>$presentaciones['precioLista']['ARS'],
                                      'PresentacionPrecioLista_USD'=>$presentaciones['precioLista']['USD']
                                  ]);
                              } catch (\Exception $e) {
                                  
                                  var_dump('Error al guardar el producto: ' . $e->getMessage());
                              }
                    }
                    }
                }
                  
                $desde += $countproductossimples;
            } else {
                break;
            }
        } while ($countproductossimples >= $total);

        return $allproductossimples;
    }





    }
