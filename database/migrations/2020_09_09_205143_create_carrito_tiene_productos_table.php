<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritoTieneProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_tiene_productos', function (Blueprint $table) {
            //$table->id();
            $table->foreignId('carrito_compras_id')->constrained('carrito_compras');
            $table->foreignId('presentacion_producto_id')->constrained('presentaciones_producto');
            $table->integer('cantidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrito_tiene_productos');
    }
}
