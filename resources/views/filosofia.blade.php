@extends('layouts.plantilla')

@section('title')
	Filosofía
@endsection

@section('stylesheet')
<link href="css/custom/philosophy.css" rel="stylesheet" type="text/css" />
@endsection

@section('id-container')
  id="bl-bg"
@endsection

@section('content')

<div class="head-philosop fade-scroll"></div>
	<!-- Segunda imagen de fondo-->
	<div class="portada-fil fade-scroll">
	</div>
	<div class="img-source fade-scroll">
		Ignacio Martínez
	</div>
	<!--Segunda imagen de fondo-->

	<!-- cita -->
	<div class="block-cita fade-scroll">
		<blockquote >
			<p class="text-cita fade-scroll">“Con los pies en la tierra, la mirada en el cielo, el corazón en nuestra profesión y el firme deseo de seguir compartiendo en un futuro la bebida mística, ¡EL MEZCAL!”</p>
		</blockquote>
		<p class="ref-cita fade-scroll">-Alguien Martínez</p>
	</div>
	<!-- cita -->

	<!-- primer corousel-->
	<div>
		<h2 class="carousel-title text-center fade-scroll">EL MAGUEY</h2>
	<div id="slider" class="carousel carousel-height slide carousel-fade fade-scroll" data-ride="carousel" data-interval="7000">
		<ol class="carousel-indicators">
		    <li data-target="#slider" data-slide-to="0" class="active"></li>
		    <li data-target="#slider" data-slide-to="1"></li>
		    <li data-target="#slider" data-slide-to="2"></li>
		</ol>
	    <div class="carousel-inner">
	    	<!--primer item-->
	    	<div class="carousel-item active">
		      	<div class="text-and-img">
	    			<div>
	    				<img src="/img/corazon-maguey3.jpg" class="img-car img-r">
	    			</div>
	    			<div>
	    				<h5 class="title-carousel">EL DESTINO DEL MAGUEY</h5>
	    				<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
	    			</div>
	    		</div>
			</div>
			<!--primer item-->

			<!--segundo item-->
	    	<div class="carousel-item">
		      	<div class="text-and-img">
	    			<div>
	    				<img src="/img/cuerpo-maguey2.jpg" class="img-car img-r">
	    			</div>
	    			<div>
	    				<h5 class="title-carousel">EL CUERPO DEL MAGUEY</h5>
	    				<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
	    			</div>
	    		</div>
			</div>
			<!--segundo item-->

			<!--tercer item-->
	    	<div class="carousel-item">
		      	<div class="text-and-img">
	    			<div>
	    				<img src="/img/mezcal-reposado.jpg" class="img-car img-r">
	    			</div>
	    			<div>
	    				<h5 class="title-carousel">NUEVA VIDA PARA EL MAGUEY</h5>
	    				<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
	    			</div>
	    		</div>
			</div>
			<!--tercer item-->
		</div>
	</div>
	<!-- fin primer corousel-->	
	</div>
	

	
	<div class="fondo-mezcal fade-scroll">
		<!-- segundo corousel-->
		<h2 class="carousel-title text-center fade-scroll">EL MEZCAL</h2>
		<div id="slider-2" class="carousel carousel-height slide carousel-fade" data-ride="carousel" data-interval="7000">
			<ol class="carousel-indicators mt-0">
			    <li data-target="#slider-2" data-slide-to="0" class="active"></li>
			    <li data-target="#slider-2" data-slide-to="1"></li>
			    <li data-target="#slider-2" data-slide-to="2"></li>
			</ol>
		    <div class="carousel-inner">
		    	<!--primer item-->
		    	<div class="carousel-item active">
		    		<div class="text-and-img">
		    			<div>
		    				<h5 class="title-carousel">HISTORIA</h5>
		    				<p class="body-carousel">Elaborado en base a métodos artesanales y tradicionales, a partir de agaves silvestres o semicultivados, que tardan entre 7 a 10 años para su labrado (cosecha). El proceso continua con el cocimiento, molienda, fermentación y destilación. Pero todas las etapas del proceso deben ser prehispánicas y coloniales, para obtener un mezcal artesanal extraordinario.</p>
		    			</div>
		    			<div class="img-l">
		    				<img class="img-car" src="img/maestro-mezcalero.jpg" alt="Generic placeholder image">
		    			</div>
		    		</div>
		    	</div>
				<!--primer item-->

				<!--segundo item-->
		    	<div class="carousel-item">
			      	<div class="text-and-img">
			      		<div>
			      			<h5 class="title-carousel">MEZCAL ARTESANAL</h5>
			      			<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
			      		</div>
			      		<div class="img-l">
			      			<img class="img-car" src="img/diseno.jpg" alt="Generic placeholder image">
			      		</div>
			      	</div>
				</div>
				<!--segundo item-->

				<!--tercer item-->
		    	<div class="carousel-item">
			      	<div class="text-and-img">
			      		<div>
			      			<h5 class="title-carousel">CULTURA DEL MEZCAL</h5>
			      			<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
			      		</div>
			      		<div class="img-l">
			      			<img class="img-car" src="img/maestro-mezcal.jpg" alt="Generic placeholder image">
			      		</div>
			      	</div>
				</div>
				<!--tercer item-->
			</div>
		</div><!-- fin segundo corousel-->
	</div>

	<!--segundo item--
		    	<div class="carousel-item">
			      	<div class="text-and-img">
			      		<div>
			      			<h5 class="title-carousel">MEZCAL ARTESANAL</h5>
			      			<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
			      		</div>
			      		<div></div>
			      	</div>
				</div>
				--segundo item-->

	<!-- tercer corousel-->
	<div class="fondo-produccion fade-scroll">
		<h2 class="carousel-title text-center">PROCESO DE PRODUCCIÓN</h2>
		<div id="slider-3" class="carousel carousel-height slide carousel-fade" data-ride="carousel" data-interval="7000">
			<ol class="carousel-indicators">
			    <li data-target="#slider-3" data-slide-to="0" class="active"></li>
			    <li data-target="#slider-3" data-slide-to="1"></li>
			    <li data-target="#slider-3" data-slide-to="2"></li>
			    <li data-target="#slider-3" data-slide-to="3"></li>
			    <li data-target="#slider-3" data-slide-to="4"></li>
			    <li data-target="#slider-3" data-slide-to="5"></li>
			</ol>
		    <div class="carousel-inner">
		    	<!--primer item-->
		    	<div class="carousel-item active">
		    		<div class="text-and-img">
			      		<div>
			      			<h5 class="title-carousel">1. CORTE O JIMA DEL MAGUEY</h5>
			      			<p class="body-carousel">Elaborado en base a métodos artesanales y tradicionales, a partir de agaves silvestres o semicultivados, que tardan entre 7 a 10 años para su labrado (cosecha). El proceso continua con el cocimiento, molienda, fermentación y destilación. Pero todas las etapas del proceso deben ser prehispánicas y coloniales, para obtener un mezcal artesanal extraordinario.</p>
			      		</div>
			      		<div class="img-l">
			      			<img class="img-car" src="img/corte.jpg" alt="Generic placeholder image">
			      		</div>
			      	</div>
				</div>
				<!--primer item-->

				<!--segundo item-->
		    	<div class="carousel-item">
		    		<div class="text-and-img">
		    			<div>
		    				<h5 class="title-carousel">2. PROCESO DE COCCIÓN</h5>
		    				<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
		    			</div>
		    			<div class="img-l">
		    				<img class="img-car" src="img/coccion2.jpg" alt="Generic placeholder image">
		    			</div>
		    		</div>
		    	</div>
				<!--segundo item-->

				<!--tercer item-->
		    	<div class="carousel-item">
		    		<div class="text-and-img">
		    			<div>
		    				<h5 class="title-carousel">3. MOLIENDA</h5>
		    				<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
		    			</div>
		    			<div class="img-l">
		    				<img class="img-car" src="img/molienda.jpg" alt="Generic placeholder image">
		    			</div>
		    		</div>
				</div>
				<!--tercer item-->

				<!--CUARTO item-->
		    	<div class="carousel-item">
		    		<div class="text-and-img">
		    			<div>
		    				<h5 class="title-carousel">4. FERMENTACIÓN</h5>
		    				<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
		    			</div>
		    			<div class="img-l">
		    				<img class="img-car" src="img/fermentacion.jpg" alt="Generic placeholder image">
		    			</div>
		    		</div>
				</div>
				<!--CUARTO item-->

				<!--QUINTO item-->
		    	<div class="carousel-item">
		    		<div class="text-and-img">
		    			<div>
		    				<h5 class="title-carousel">5. DESTILACIÓN</h5>
		    				<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
		    			</div>
		    			<div class="img-l">
		    				<img class="img-car" src="img/destilacion.jpg" alt="Generic placeholder image">
		    			</div>
		    		</div>
				</div>
				<!--QUINTO item-->

				<!--SEXTO item-->
		    	<div class="carousel-item">
		    		<div class="text-and-img">
		    			<div>
		    				<h5 class="title-carousel">6. ENVASADO</h5>
		    				<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
		    			</div>
		    			<div class="img-l">
		    				<img class="img-car" src="img/envasado.jpg" alt="Generic placeholder image">
		    			</div>
		    		</div>
				</div>
				<!--SEXTO item-->
			</div>
		</div><!-- fin segundo corousel-->
	</div>

	<!-- tercer corousel-->
	<h2 class="carousel-title text-center">MAESTRO MEZCALERO</h2>
	<div id="slider-2" class="carousel carousel-height slide carousel-fade mb-5 fade-scroll"  data-interval="7000">
		<ol class="carousel-indicators">
		    <li data-target="#slider-2" data-slide-to="0" class="active"></li>
		    <li data-target="#slider-2" data-slide-to="1"></li>
		    <li data-target="#slider-2" data-slide-to="2"></li>
		    <li data-target="#slider-2" data-slide-to="3"></li>
		    <li data-target="#slider-2" data-slide-to="4"></li>
		</ol>
	    <div class="carousel-inner">
	    	<!--primer item-->
	    	<div class="carousel-item active">
	    		<div class="text-and-img">
	    			<div>
	    				<img src="/img/histori.jpg" class="img-car img-r">
	    			</div>
	    			<div>
	    				<h5 class="title-carousel">IGNACIO MARTÍNEZ</h5>
	    				<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
	    			</div>
	    		</div>
	    	</div>
			<!--primer item-->

			<!--segundo item-->
	    	<div class="carousel-item">
	    		<div class="text-and-img">
	    			<div>
	    				<img class="img-car img-r" src="img/diseno.jpg" alt="Generic placeholder image">
	    			</div>
	    			<div>
	    				<h5 class="title-carousel">CARMELA MOLINA</h5>
	    				<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
	    			</div>
	    		</div>
			</div>
			<!--segundo item-->

			<!--tercer item-->
	    	<div class="carousel-item">
	    		<div class="text-and-img">
	    			<div>
	    				<img class="img-car img-r" src="img/maestro-mezcal.jpg" alt="Generic placeholder image">
	    			</div>
	    			<div>
	    				<h5 class="title-carousel">EL CAMINO DE UN MAESTRO MEZCALERO</h5>
	    				<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
	    			</div>
	    		</div>
			</div>
			<!--tercer item-->

			<!--CUARTO item-->
	    	<div class="carousel-item">
	    		<div class="text-and-img">
	    			<div>
	    				<img class="img-car img-r" src="img/diseno.jpg" alt="Generic placeholder image">
	    			</div>
	    			<div>
	    				<h5 class="title-carousel">HABILIDADES</h5>
	    				<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
	    			</div>
	    		</div>
			</div>
			<!--CUARTO item-->

			<!--Quinto item-->
	    	<div class="carousel-item">
	    		<div class="text-and-img">
	    			<div>
	    				<img class="img-car img-r" src="img/maestro-mezcal.jpg" alt="Generic placeholder image">
	    			</div>
	    			<div>
	    				<h5 class="title-carousel">NUESTROS MAESTROS:<br>CARMELA MOLINA E IGNACIO MARTÍNEZ</h5>
	    				<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
	    			</div>
	    		</div>
			</div>
			<!--quinto item-->
		</div>
	</div><!-- fin tercer corousel-->


	<!-- cita -->
	<div class="fade-scroll">
		<div class="block-cita" >
		<blockquote class="fade-scroll">
			<p class="text-cita">“La historia de un Maestro Mezcalero se empieza a contar desde la niñez, etapa en donde empiezan a involucrarse en el trabajo familiar. Desde niño soñaba con ser alguien grande, hoy en día para nosotros lo ha logrado y es un ejemplo de que los sueños de niños se pueden hacer realidad.”</p>
		</blockquote>
		<p class="ref-cita">-Ignacio Martínez</p>
		</div>
	</div>
	<!-- cita -->


	<!--next section-->
	<div class="next" >
		<div class="next-text">
			<p>SIGUIENTE</p>
			<p><a href="/historia">Historia, Colaboradores</a></p>
		</div>
		<div class="next-fondo" style="background-image: url('/img/equipo.jpg');"></div>
	</div>
	<!--next section-->

@endsection

@section('scripts')
<script type="text/javascript">
	$(function() {
                
                var documentEl = $(document), 
                fadeElem = $('.fade-scroll');
                documentEl.on('scroll', function() {
                    var currScrollPos = documentEl.scrollTop();
                    
                    fadeElem.each(function() {
                        var $this = $(this),
                            elemOffsetTop = $this.offset().top;
                        if (currScrollPos > elemOffsetTop) $this.css('opacity', 1 - (currScrollPos-elemOffsetTop)/400);
                    }); 
                });
                
            });
</script>
@endsection

