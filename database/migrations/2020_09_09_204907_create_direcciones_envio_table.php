<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesEnvioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones_envio', function (Blueprint $table) {
            $table->id();
            $table->string('calle');
            $table->integer('numero');
            $table->integer('numero_interior')->nullable();
            $table->string('apartamento')->nullable();
            $table->string('colonia');
            $table->string('municipio');
            $table->string('estado',100);
            $table->string('codigo_postal',10);
            $table->string('telefono',12);
            $table->string('nombre_residente');
            //$table->integer('predeterminada')->default('0');
            //$table->foreignId('pedido_id')->constrained('pedidos');
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
        Schema::dropIfExists('direcciones_envio');
    }
}
