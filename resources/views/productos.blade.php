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
	<h2 class="h2 text-center pt-5 mb-0">MEZCAL</h2>
	<img src="img/logo-casa-martinez.png" class="img-centered mt-0" style="max-width: 200px;">
	<!--<p class="text-center text-head">Nos destacamos por elaborar el mejor mezcal artesanal de la región, además de ser el único producido bajo la certificación de Agricultura Biodinámica, 100% orgánico.</p>-->
</div>

<div>
	<h2 class="h2 text-center pt-0">NUESTRAS MARCAS</h2>
	<div class="galeria my-3">
		<div>
			<a href=""><img src="/img/m-joven.jpg"></a>
			<p class="gallery"><a>SiNái</a></p>
		</div>

		<div>
			<a href=""><img src="/img/logo.jpg" class="px-5 pb-0"></a>
			<p class="gallery"> <a>Ignacio Martínez</a></p>
		</div>

		<div>
			<a href=""><img src="/img/logo.jpg" class="px-5 pb-0"></a>
			<p class="gallery"><a href="">Origen Verde</a></p>
		</div>

		<div>
			<a href=""><img src="/img/logo.jpg" class="px-5 pb-0"></a>
			<p class="gallery"><a href="">Habitante</a></p>
		</div>
	</div>

	<div class="text-cita mt-2">
		<center> <h2 class="h2 pt-0 text-uppercase"> <a href="/tienda" style="text-decoration: underline;">Ver todo el catálogo de productos</a> </h2> </center>
	</div>

	<div class="block-cita">
		<blockquote>
			<p class="text-cita">“Compartir experiencias con nuestros clientes y amigos, nos permite comunicar el trabajo que la familia Martínez ha estado realizando por generaciones. ”</p>
		</blockquote>
	</div>
	<!-- cita -->
	
	
	
	<div class="menu">
		<center>
			<ul>
				<li class="menu-li"><a href="/">PREGUNTAS FRECUENTES (FAQ)</a></li>
				<li class="menu-li"><a href="/">PRODUCTOS CARMELITA</a></li>
				<li><a href="/">DISTRIBUIDORES AUTORIZADOS</a></li>
			</ul>
		</center>
	</div>
</div>

<!--next section-->
	<div class="next" style="background-color: black;">
		<div class="next-text">
			<p>APRENDE</p>
			<p><a href="/filosofia">PROCESO DE ELABORACIÓN</a></p>
		</div>
		<div class="next-fondo" style="background-image: url('img/proceso.jpg');"></div>
	</div>
<!--next section-->
@endsection

