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
        Schema::create('products_configurable', function (Blueprint $table) {
            
            $table->string('IdProducto');       
            $table->string('guiaTalles')->nullable();
            $table->string('codigo');
            $table->string('nombre');
            $table->string('monedaPredeterminada');
            $table->string('impuesto');
            $table->string('fechaCreacion');
            $table->string('prioridad');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_configurable');
    }
};
