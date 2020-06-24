@extends('layouts.plantilla')

@section('title')
	Productos Casa Martínez
@endsection

@section('stylesheet')
<link href="css/custom/bebidas.css" rel="stylesheet" type="text/css" />
@endsection

@section('id-container')
  id="wh-bg"
@endsection

@section('content')

<div>
	<h2 class="h2 text-center">MEZCAL</h2>
	<img src="img/portada-mezcal2.jpg" class="img-centered">
	<p class="text-center text-head">Nos destacamos por elaborar el mejor mezcal artesanal de la región, además de ser el único producido bajo la certificación de Agricultura Biodinámica, 100% orgánico.</p>
</div>

<hr style="margin: 50px; width: 70%;">

<div>
	<h3>NUESTRAS MARCAS</h3>
	<div class="galeria">
		<div>
			<a href=""><img src="img/m-joven.jpg"></a>
			<p class="gallery"> <a>ignacio Martínez</a></p>
		</div>
		
		<div>
			<a href=""><img src="img/m-reposado.jpg"></a>
			<p class="gallery">SiNái</a></p>
		</div>

		<div>
			<a href=""><img src="img/m-anejo.jpg"></a>
			<p class="gallery"><a href="">Origen Verde</a></p>
		</div>

		<div>
			<a href=""><img src="img/m-anejo.jpg"></a>
			<p class="gallery"><a href="">Habitante</a></p>
		</div>
	</div>

	<div class="block-cita">
		<blockquote>
			<p class="text-cita">“Compartir experiencias con nuestros clientes y amigos, nos permite comunicar el trabajo que la familia Martínez ha estado realizando por generaciones. ”</p>
		</blockquote>
		<p class="ref-cita">-Alguien Martínez</p>
	</div>
	<!-- cita -->
	
	<div class="text-cita mt-2">
		<center><a href="/catalogo" style="text-decoration: underline;">Ver todo el catálogo de productos</a></center>
	</div>
	
	<div class="menu">
		<center>
			<ul>
				<li class="menu-li"><a href="">PREGUNTAS FRECUENTES (FAQ)</a></li>
				<li class="menu-li"><a href="">PRODUCTOS CARMELITA</a></li>
				<li><a href="">DISTRIBUIDORES AUTORIZADOS</a></li>
			</ul>
		</center>
	</div>
</div>

<!--next section-->
	<div class="next" style="background-color: black;">
		<div class="next-text">
			<p>APRENDE</p>
			<p><a href="/historia">PROCESO DE ELABORACIÓN</a></p>
		</div>
		<div class="next-fondo" style="background-image: url('img/proceso.jpg');"></div>
	</div>
<!--next section-->
@endsection

