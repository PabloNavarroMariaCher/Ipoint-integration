<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;



class Stock extends Model
{
   
    public static function getSkuXStock(){

        $url = env('URL_API_REAL2B_TEST', 'http://127.0.0.1');
        $token = '927f6b6b-cbd4-46ba-92e6-d896350d1534';

        $response = Http::withHeaders([
            'Authorization' =>  $token,


        ])->POST($url . '/stockporsku',[
             "_idSolicitud"=> "012345678-xxxxx-asdfghjjkllqwruri",
             "skus"=>"C032P0086901046001"
        
        
        ]);

        $SkuXStock = $response->json();

    return $SkuXStock;
    }
 
    public static function getProducts(){

        $url = env('URL_API_REAL2B_TEST', 'http://127.0.0.1');
        $token = '927f6b6b-cbd4-46ba-92e6-d896350d1534';

        $response = Http::withHeaders([
            'Authorization' =>  $token,


        ])->POST($url . '/productos',[
            "_idSolicitud" => "0123456789-XXXXXX-ASDFGHJKLQWERTYU",
            "desde" => 0,
            "total" => 1000
        
        
        ]);

        $products = $response->json();

    return $products;
    }


}