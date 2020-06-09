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
<div style="margin: 70px 20px 0px;">
	<div>
		<h2 class="h2 text-center">MEZCAL</h2>
		<img src="img/portada-mezcal2.jpg" class="img-centered">
	</div>
</div>
<div class="container">
	<div class="row justify-content-center mt-4">
		<div class="col-8">
			<p class="text-center text-head">Nos destacamos por elaborar el mejor mezcal artesanal de la región, además de ser el único producido bajo la certificación de Agricultura Biodinámica, 100% orgánico.</p>
		</div>
		<hr style="margin: 50px; width: 70%;">
	    </div>
	    <h3>NUESTRAS MARCAS</h3>
	    <div class="row justify-content-center" style="margin-top: 40px;">
	    	<div class="col-3 gallery p-1">
	    		<a href="">
	    			<div>
	    				<img src="img/m-joven.jpg" class="col-12">
	    			</div>
	    			<div class="gallery">
	    				ignacio Martínez
	    			</div>
	    		</a>
	    	</div>

	    	<div class="col-3 gallery p-1">
	    		<a href="">
	    			<div>
	    				<img src="img/m-reposado.jpg" class="col-12">
	    			</div>
	    			<div class="gallery">SiNái
	    			</div>
	    		</a>
	    	</div>
	    	<div class="col-3 gallery p-1">
	    		<a href="">
	    			<div>
	    				<img src="img/m-anejo.jpg" class="col-12">
	    			</div>
	    			<div class="gallery">
	    				Origen Verde
	    			</div>
	    		</a>
	    	</div>

	    	<div class="col-3 gallery p-1">
	    		<a href="">
	    			<div>
	    				<img src="img/m-anejo.jpg" class="col-12">
	    			</div>
	    			<div class="gallery">
	    				Habitante
	    			</div>
	    		</a>
	    	</div>
	    	<div class="col-10 gallery" >
	    		<div>
	    			<!-- cita -->
	    			<div class="container mt-5">
	    				<div >
	    					<div class="col-12">
	    						<blockquote>
	    							<p class="cita">“Compartir experiencias con nuestros clientes y amigos, nos permite comunicar el trabajo que la familia Martínez ha estado realizando por generaciones. ”</p>
	    						</blockquote>
	    						<p class="ref">-Alguien Martínez</p>
	    					</div>
	    				</div>
	    			</div>
	    			<!-- cita -->
	    		</div>
	    	</div>
	    </div>
	    <div class="cita mt-2">
	    	<center>
	    		<a href="/catalogo">Ver todo el catálogo de productos</a>
	    	</center>
	    </div>
	    <div class="menu">
	    	<center>
	    		<ul>
	    			<li><a href="">PREGUNTAS FRECUENTES (FAQ)</a></li>
	    			<li> | </li>
	    			<li><a href="">PRODUCTOS CARMELITA</a></li>
	    			<li> | </li>
	    			<li><a href="">DISTRIBUIDORES AUTORIZADOS</a></li>
	    		</ul>
	    	</center>
	    </div>
	</div><!--container-->
	<!--next section-->
	<div class="next" style="background-image: url('img/proceso.jpg'); margin-top: 60px;">
		<div class="next-text">
			<p>APRENDE</p>
			<p><a href="history.html">PROCESO DE ELABORACIÓN</a></p>
		</div>
	</div>
	<!--next section-->
@endsection

