@extends('layouts.plantilla')

@section('title')
	Catálogo de Productos
@endsection

@section('stylesheet')
<link href="css/custom/bebidas.css" rel="stylesheet" type="text/css" />
@endsection

@section('id-container')
  id="wh-bg"
@endsection

@section('content')
<h3 style="padding-top: 75px;" id="pr">PRODUCTOS CASA MARTÍNEZ</h3>
<div class="list-products">
	<!--product1-->
	<div class="img-p"><img src="img/sinai.png" class="img-cat"></div>
	<div class="descrip-p">
		<h4 class="product-head">MEZCAL SINÁI (JOVEN) 750 ml</h4>
		<p class="descrip">Elaborado a partir de agave 100% natural bajo la certificaión biodinámica acreditada en E.U.A</p>
		<br>
		<hr class="hr">
		<p class="presentacion">PRESENTACIÓN: 
			<select class="presentacion">
				<option>250 ml</option>
				<option>500 ml</option>
				<option>750 ml</option>
			</select>
		</p>
	</div>
	<div class="price-p">
		<h4 class="price">$700.00 <span style="font-size: 16px;">MXN</span></h4>
		<p class="presentacion" name="cantidad">
			<label class="presentacion">CANTIDAD:</label>
			<select class="presentacion">
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
		</p>
		<div class="buttons">
			<button class="button">AL CARRITO</button>
			<button class="button">COMPRAR</button>
		</div>
	</div>
	<!--product 1-->

	<hr style="margin: 60px; width: 100%;">

	<!--product 2-->
	<div class="img-p">
		<img src="img/diseno2.jpg" class="img-cat">
	</div>
	<div class="descrip-p">
		<h4 class="product-head">MEZCAL SINÁI (REPOSADO) 750 ml</h4>
		<p class="descrip">Elaborado a partir de agave 100% natural bajo la certificaión biodinámica acreditada en E.U.A Añejado por más de un año en barricas de madera.</p>
		<br>
		<hr class="hr">  				
		<p class="presentacion">PRESENTACIÓN: 
			<select class="presentacion">
				<option>250 ml</option>
				<option>500 ml</option>
				<option>750 ml</option>
			</select>
		</p>
	</div>
	<div class="price-p">
		<h4 class="price">$700.00 <span style="font-size: 16px;">MXN</span></h4>
		<p class="presentacion" name="cantidad">
			<label class="presentacion" >CANTIDAD:</label>
			<select class="presentacion">
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
		</p>
		<div class="buttons">
			<button class="button">AL CARRITO</button>
			<button class="button">COMPRAR</button>
		</div>
	</div>
	<!--product 2-->

	<hr style="margin: 60px; width: 100%;">

	<!--product 3-->
	<div class="img-p"><img src="img/diseno2.jpg" class="img-cat"></div>
	<div class="descrip-p">
		<h4 class="product-head">MEZCAL SINÁI (AÑEJO) 750 ml</h4>
		<p class="descrip">Elaborado a partir de agave 100% natural bajo la certificaión biodinámica acreditada en E.U.A Añejado por más de un año en barricas de madera.</p>
		<br>
		<hr class="hr"> 
		<p class="presentacion">PRESENTACIÓN: 
			<select class="presentacion">
				<option>250 ml</option>
				<option>500 ml</option>
				<option>750 ml</option>
			</select>
		</p>
	</div>
	<div class="price-p">
		<h4 class="price">$700.00 <span style="font-size: 16px;">MXN</span></h4>
		<p class="presentacion" name ="cantidad">
			<label class="presentacion">CANTIDAD:</label>
			<select class="presentacion">
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
		</p>
		<div class="buttons">
			<button class="button">AL CARRITO</button>
			<button class="button">COMPRAR</button>
		</div>
	</div>
	<!--product 3-->

	<hr style="margin: 60px; width: 100%;">

	<!--product 4-->
	<div class="img-p"><img src="img/anejo.jpg" class="img-cat"></div>
	<div class="descrip-p">
		<h4 class="product-head">MEZCAL SINÁI (RESERVA ESPECIAL) 750 ml</h4>
		<p class="descrip">Elaborado a partir de agave 100% natural bajo la certificaión biodinámica acreditada en E.U.A Añejado por más de un año en barricas de madera.</p>
		<br>
		<hr class="hr">
		<p class="presentacion">PRESENTACIÓN: 
			<select class="presentacion">
				<option>250 ml</option>
				<option>500 ml</option>
				<option>750 ml</option>
			</select>
		</p>
	</div>
	<div class="price-p">
		<h4 class="price">$700.00 <span style="font-size: 16px;">MXN</span></h4>
		<p class="presentacion" name="cantidad">
			<label class="presentacion">CANTIDAD:</label>
			<select class="presentacion">
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
		</p>
		<div class="buttons">
			<button class="button">AL CARRITO</button>
			<button class="button">COMPRAR</button>
		</div>
	</div>
	<!--product 4-->

	<hr style="margin: 60px; width: 100%;">
</div>

@endsection
