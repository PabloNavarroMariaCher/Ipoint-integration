<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class SourceController extends Controller
{
    public function index()
    {
        $url = env('URL_API_REAL2B_TEST', 'http://127.0.0.1');
        $token = '927f6b6b-cbd4-46ba-92e6-d896350d1534';

        $response = Http::withHeaders([
            'Authorization' =>  $token,
        ])->get($url . '/sucursales');

        $sources= $response->json();
        
        return view('sources.index', compact('sources'));
    }
}