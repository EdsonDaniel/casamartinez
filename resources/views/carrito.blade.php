@extends('layouts.plantilla')

@section('title')
	Tu carrito de compras | Casa Martínez
@endsection

@section('stylesheet')
<link href="css/custom/bebidas.css" rel="stylesheet" type="text/css" />
@endsection

@section('id-container')
  id="wh-bg"
@endsection

@section('content')
<div>
	<h2 class="h2 text-center titulo-carrito">CARRITO DE COMPRAS</h2>
	<div class="head-car">
		
		<div class="cantidades">TOTAL</div>
		<div class="cantidades">CANTIDAD</div>	
		
		<div class="nom-prod text-left">PRODUCTOS</div>
	</div>
	<hr class="separador st">
</div>

<!--product1-->
<div class="products-car">
	<div class="div-icon"><span class="trash"><a><i class="fad fa-trash"></i></a></span></div>
	<div class="cantidades total">
		$8000.00		
	</div>	
	<div class="cantidades tr">
		<select class="presentacion font-s">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select>
	</div>
	<div class="nom-prod">
		<h4 class="product-head fs">MEZCAL SINÁI (JOVEN) <span name="val-presentacion">750 ml</span></h4>
		<p class="presentacion fs">PRESENTACIÓN: 
			<select class="presentacion">
				<option>250 ml</option>
				<option>500 ml</option>
				<option>750 ml</option>
			</select>
		</p>
	</div>
	
	<div class="img-caru"><img src="img/sinai.png" class=""></div>
</div>
<!--product 1-->
<hr class="separador">
<!--product2-->
<div class="products-car">
	<div class="div-icon"><span class="trash"><a><i class="fad fa-trash"></i></a></span></div>
	<div class="cantidades total">
		$8000.00		
	</div>	
	<div class="cantidades tr">
		<select class="presentacion font-s">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select>
	</div>
	<div class="nom-prod">
		<h4 class="product-head fs">MEZCAL SINÁI (JOVEN) <span name="val-presentacion">750 ml</span></h4>
		<p class="presentacion fs">PRESENTACIÓN: 
			<select class="presentacion">
				<option>250 ml</option>
				<option>500 ml</option>
				<option>750 ml</option>
			</select>
		</p>
	</div>
	
	<div class="img-caru"><img src="img/sinai.png" class=""></div>
</div>
<!--product 2-->
<hr class="separador">

<div class="products-car alig">
	<div class="cantidades total"><strong>$5000.00</strong></div>
	<div class="subtotal"><h5>SUBTOTAL <span> (4 PRODUCTOS)</span>:</h5></div>
	<div class="mensaje m-0"><p>Procede a la pantalla de pago para calcular gastos de envío e impuestos.</p></div>
</div>
<div class="products-car">
	<div class="pago">
		<button class="button ">PROCEDER AL PAGO</button>
		<button class="button">ACTUALIZAR ARTÍCULOS</button>
	</div>
</div>
@endsection


@section('scripts')

@endsection