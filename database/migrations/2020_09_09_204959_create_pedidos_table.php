<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('metodo_pago',100);
            $table->timestamp('fecha_envio')->nullable();
            $table->timestamp('fecha_entrega')->nullable();
            $table->string('id_rastreo')->nullable();
            $table->string('paqueteria')->nullable();
            $table->double('monto_total',8,2);
            $table->double('costo_envio',8,2);
            $table->integer('estado')->default('0');
            //$table->double('monto_total',8,2);
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('direccion_envio_id')->constrained('direcciones_envio');
            $table->foreignId('direccion_facturacion_id')->nullable()->constrained('direcciones_envio');
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
        Schema::dropIfExists('pedidos');
    }
}
