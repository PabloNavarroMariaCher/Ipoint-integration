<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products_simples', function (Blueprint $table) {
            $table->bigInteger('IdProducto');
            $table->string('CodConfigurable')->nullable();
            $table->string('NombreConfigurable')->nullable();
            $table->string('MonedaPredeterminada')->nullable();
            $table->string('VarianteCodigo')->nullable();
            $table->string('VarianteNombre_color')->nullable();
            $table->string('VariantesAtributos')->nullable();
            $table->string('PresentacionNombre')->nullable();
            $table->string('PresentacionCodigoTalle')->nullable();
            $table->string('PresentacionSku')->nullable();
            $table->string('PresentacionStock')->nullable();
            $table->string('PresentacionStockDeposito')->nullable();
            $table->string('PresentacionStockReservado')->nullable();
            $table->string('PresentacionStockOnOrder')->nullable();
            $table->string('PresentacionStockInmediato')->nullable();
            $table->string('PresentacionPrecioVenta_ARS')->nullable();
            $table->string('PresentacionPrecioVenta_USD')->nullable();
            $table->string('PresentacionPrecioLista_ARS')->nullable();
            $table->string('PresentacionPrecioLista_USD')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_simples');
    }
};
