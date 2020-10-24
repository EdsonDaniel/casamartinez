<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->string('parcela');
            $table->string('ubicacion');
            $table->date('fecha_cultivo');
            $table->date('fecha_corte');
            $table->string('tipo_maguey');
            $table->integer('magueyes_cortados');
            $table->float('kilogramos');
            $table->string('maestro_magueyero');
            $table->string('maestro_mezcalero');
            $table->date('ingreso_coccion');
            $table->date('salida_coccion');
            $table->date('inicio_molienda');
            $table->date('termino_molienda');
            $table->integer('tinas_molienda')->nullable();
            $table->date('inicio_fermentacion');
            $table->date('salida_fermentacion');
            $table->float('volumen_fermentacion');
            
            $table->date('fecha_destilacion1');
            $table->float('volumen_destilacion1');
            $table->float('alcohol_destilacion1');
            
            $table->date('fecha_destilacion2')->nullable();
            $table->float('volumen_destilacion2')->nullable();
            $table->float('alcohol_destilacion2')->nullable();
            
            $table->date('traslado_envasadora');
            $table->string('lote_granel');
            $table->string('lote_envasado');
            $table->string('analisis');
            $table->integer('botellas_envasadas');
            $table->string('clase_mezcal');
            $table->string('porcentaje_alc_env');

            $table->foreignId('producto_id')->constrained('productos');
            $table->foreignId('presentacion_id')->constrained('presentaciones_producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas');
    }
}
