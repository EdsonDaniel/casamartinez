<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresentacionesProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentaciones_producto', function (Blueprint $table) {
            $table->id();
            //$table->double('contenido',8,2);
            $table->float('contenido');
            $table->string('unidad_c');
            $table->double('precio_consumidor',8,2);
            $table->double('precio_distribuidor',8,2);
            $table->double('precio_restaurant',8,2);
            $table->double('precio_promocion',8,2)->nullable();
            $table->double('costo_adquisicion',8,2)->nullable();
            $table->integer('estado');
            $table->integer('stock');
            $table->integer('stock_min');
            $table->double('peso',8,2);
            $table->double('alto',8,2);
            $table->double('ancho',8,2);
            $table->double('largo',8,2);
            $table->string('foto_url');
            $table->foreignId('producto_id')->constrained('productos');
            $table->timestamps();
            
            $table->unique(['contenido','unidad_c','producto_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presentaciones_producto');
    }
}
