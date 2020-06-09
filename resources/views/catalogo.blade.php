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
<div class="container" style="margin-top: 75px;">
	<h3>PRODUCTOS CASA MARTÍNEZ</h3>
	<!--lista de productos-->
	
	<!--product 1-->
	<div class="container">
		<div class="row justify-content-center" style="margin-top: 60px;">
			<div class="col-4">
				<center><img src="img/sinai.png" class="img-cat"></center>
			</div>
			
			<div class="col-5">
				<h4 class="product-head">MEZCAL SINÁI (JOVEN) 750 ml</h4>
				<p class="descrip">Elaborado a partir de agave 100% natural bajo la certificaión biodinámica acreditada en E.U.A</p>
				<br>
				<hr>
				<p class="presentacion">PRESENTACIÓN: 
					<select class="presentacion">
						<option>250 ml</option>
						<option>500 ml</option>
						<option>750 ml</option>
					</select>
				</p>
			</div>

			<div class="col-3">
				<div class="container">
					<h4 class="price m-0">$700.00 <span style="font-size: 16px;">MXN</span></h4>
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
					<button class="button" style="margin-top: 30px;">AL CARRITO</button>
					<button class="button">COMPRAR</button>
				</div>
			</div>
		</div>
	</div>
	<!--product 1-->

	<hr style="margin-top: 60px; width: 70%;">

	<!--product 2-->
	<div class="container">	
		<div class="row justify-content-center" style="margin-top: 70px;">
			<div class="col-4">
				<center><img src="img/mezcal-joven.jpg" class="img-cat"></center>
			</div>
			
			<div class="col-5">
				<h4 class="product-head">MEZCAL SINÁI (REPOSADO) 750 ml</h4>
				<p class="descrip">Elaborado a partir de agave 100% natural bajo la certificaión biodinámica acreditada en E.U.A Añejado por más de un año en barricas de madera.</p>
  				<br>
  				<hr>  				
  				<p class="presentacion">PRESENTACIÓN: 
  					<select class="presentacion">
  						<option>250 ml</option>
  						<option>500 ml</option>
  						<option>750 ml</option>
  					</select>
  				</p>
  			</div>

  			<div class="col-3">
				<div class="container">
					<h4 class="price m-0">$700.00 <span style="font-size: 16px;">MXN</span></h4>
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
					<button class="button" style="margin-top: 30px;">AL CARRITO</button>
					<button class="button">COMPRAR</button>
				</div>
			</div>
		</div>
	</div>
	<!--product 2-->

	<hr style="margin-top: 60px; width: 70%;">

	<!--product 3-->
	<div class="container">	
		<div class="row justify-content-center" style="margin-top: 70px;">
			<div class="col-4">
				<center><img src="img/diseno2.jpg" class="img-cat"></center>
			</div>
			
			<div class="col-5">
				<h4 class="product-head">MEZCAL SINÁI (AÑEJO) 750 ml</h4>
				<p class="descrip">Elaborado a partir de agave 100% natural bajo la certificaión biodinámica acreditada en E.U.A Añejado por más de un año en barricas de madera.</p>
  				<br>
  				<hr>  				
  				<p class="presentacion">PRESENTACIÓN: 
  					<select class="presentacion">
  						<option>250 ml</option>
  						<option>500 ml</option>
  						<option>750 ml</option>
  					</select>
  				</p>
  			</div>

  			<div class="col-3">
				<div class="container">
					<h4 class="price m-0">$700.00 <span style="font-size: 16px;">MXN</span></h4>
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
					<button class="button" style="margin-top: 30px;">AL CARRITO</button>
					<button class="button">COMPRAR</button>
				</div>
			</div>
		</div>
	</div>
	<!--product 3-->

	<hr style="margin-top: 60px; width: 70%;">


	<!--product 4-->
	<div class="container">	
		<div class="row justify-content-center" style="margin-top: 70px;">
			<div class="col-4">
				<center><img src="img/anejo.jpg" class="img-cat"></center>
			</div>
			
			<div class="col-5">
				<h4 class="product-head">MEZCAL SINÁI (RESERVA ESPECIAL) 750 ml</h4>
				<p class="descrip">Elaborado a partir de agave 100% natural bajo la certificaión biodinámica acreditada en E.U.A Añejado por más de un año en barricas de madera.</p>
  				<br>
  				<hr>  				
  				<p class="presentacion">PRESENTACIÓN: 
  					<select class="presentacion">
  						<option>250 ml</option>
  						<option>500 ml</option>
  						<option>750 ml</option>
  					</select>
  				</p>
  			</div>

  			<div class="col-3">
				<div class="container">
					<h4 class="price m-0">$700.00 <span style="font-size: 16px;">MXN</span></h4>
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
					<button class="button" style="margin-top: 30px;">AL CARRITO</button>
					<button class="button">COMPRAR</button>
				</div>
			</div>
		</div>
	</div>
	<!--product 4-->

	<hr style="margin-top: 60px; width: 70%;">

</div>

@endsection
