<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTienenCaracteristicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_tienen_caracteristicas', function (Blueprint $table) {
            //$table->id();
            $table->foreignId('prod_id')->constrained('productos');
            $table->foreignId('carac_id')->constrained('otras_caracteristicas');
            $table->string('valor');
            $table->primary(['prod_id', 'carac_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_tienen_caracteristicas');
    }
}
