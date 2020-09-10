<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosCompradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_comprados', function (Blueprint $table) {
            $table->foreignId('presentacion_producto_id')->constrained('presentaciones_producto');
            $table->integer('cantidad');
            $table->double('precio_unitario',8,2);
            $table->foreignId('pedido_id')->constrained('pedidos');
            //nombre_promo varchar(250),
            //monto_des float,
            //url_foto_prod text,
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_comprados');
    }
}
