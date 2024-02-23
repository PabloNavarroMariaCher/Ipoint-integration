<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
