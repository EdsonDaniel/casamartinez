@extends('layouts.plantilla')

@section('title')
	Historia, Colaboradores
@endsection

@section('stylesheet')
<link href="css/custom/history.css" rel="stylesheet" type="text/css" />
@endsection

@section('id-container')
  id="bl-bg"
@endsection

@section('content')

<!--encabezado-->
	<div class="bg-image container-image fade-scroll">
      	<div class="centered">Historia, Colaboradores</div>
      	<div class="right">
      		<ul>
      			<li><a href="javascript:saltarA('#slider')">-Origen Casa Martínez</a></li>
      			<li><a href="javascript:saltarA('#slider-2')">-Familia Martínez</a></li>
      			<li><a href="javascript:saltarA('#slider-3')">-Colaboradores</a></li>
      			<li><a href="javascript:saltarA('#slider-4')">-Memorias</a></li>
      		</ul>
      	</div>
      	<div  class="bg-img" style="background-image: url('/img/equipo.jpg'); background-color: black; opacity: 0.6"></div>
	</div>
	<!--encabezado-->

	<!-- primer corousel-->
	<div id="slider" class="carousel slide carousel-fade fade-scroll" style="margin-top: 110px;" data-ride="carousel" data-interval="7000">
		<h2 class="carousel-title text-center mt-5 mb-3">ORIGEN CASA MARTÍNEZ</h2>
		<ol class="carousel-indicators mt-0">
		    <li data-target="#slider" data-slide-to="0" class="active"></li>
		    <li data-target="#slider" data-slide-to="1"></li>
		    <li data-target="#slider" data-slide-to="2"></li>
		</ol>
	    <div class="carousel-inner">
	    	<!--primer item-->
	    	<div class="carousel-item div-carousel active">
		      	<div class="container col-7 mb-0">
		      		<div class="row justify-content-md-center">
		      			<div class="media mt-5">
					        <img class="mr-4 img-car" src="img/origen1.jpg" alt="Generic placeholder image">
					        <div class="media-body align-self-center mt-0">
					        	<h5 class="ml-5 title-carousel">DESDE 1950</h5>
						        <p class="body-carousel ml-5 mt-3">En el transcurso del año 1850 Matatlán, Oaxaca, era; tal como hoy día, uno de los principales escenarios del perfeccionamiento en los procesos del mezcal artesanal. La familia Martínez contribuyo a este movimiento a la par que construyó su legado como una de las familias más distinguidas por el cuidado que dan calidad de primer nivel en cada uno de sus procesos.  </p>
					        </div>
					    </div>
					</div> 
				</div>
			</div>
			<!--primer item-->

			<!--segundo item-->
	    	<div class="carousel-item div-carousel">
		      	<div class="container col-7 mb-0">
		      		<div class="row justify-content-md-center">
		      			<div class="media mt-5">
					        <img class="mr-4 img-car" src="img/origen.jpg" alt="Generic placeholder image">
					        <div class="media-body align-self-center">
					        	<h5 class="ml-5 title-carousel">INICIOS</h5>
						        <p class="body-carousel ml-5 mt-3">Con más de 50 años de experiencia, Casa Cortés ha creado tres marcas, que por sus conceptos de selección, maduración y procedencia resaltan diferentes atributos culturales y ambientales transmitidos de generación en generación, de conocimientos adquiridos por sus antepasados.</p>
					        </div>
					    </div>
					</div> 
				</div>
			</div>
			<!--segundo item-->

			<!--tercer item-->
	    	<div class="carousel-item div-carousel">
		      	<div class="container col-7 mb-0">
		      		<div class="row justify-content-md-center">
		      			<div class="media mt-5">
					        <img class="mr-4 img-car" src="img/legado.jpg" alt="Generic placeholder image">
					        <div class="media-body align-self-center">
					        	<h5 class="ml-5 title-carousel">LEGADO</h5>
						        <p class="body-carousel ml-5 mt-3">Actualmente en la 5ta generación de la familia Cortés se ha construido ya una comunidad que disfruta de la reunión de sabores, aromas y texturas de nuestras bebidas tomándolas en ocasiones importantes.</p>
					        </div>
					    </div>
					</div> 
				</div>
			</div>
			<!--tercer item-->
		</div>
	</div><!-- fin primer corousel-->


	<div class="fondo-mezcal fade-scroll">
		<!-- segundo corousel-->
		<div id="slider-2" class="carousel slide carousel-fade mt-0" data-ride="carousel" data-interval="7000">
			<h2 class="carousel-title text-center mt-5 mb-0">FAMILIA MARTÍNEZ</h2>
			<ol class="carousel-indicators mt-0">
			    <li data-target="#slider-2" data-slide-to="0" class="active"></li>
			    <li data-target="#slider-2" data-slide-to="1"></li>
			    <li data-target="#slider-2" data-slide-to="2"></li>
			    <li data-target="#slider-2" data-slide-to="3"></li>
			    <li data-target="#slider-2" data-slide-to="4"></li>
			</ol>
		    <div class="carousel-inner">
		    	<!--primer item-->
		    	<div class="carousel-item div-carousel active">
			      	<div class="container col-7 mb-0">
			      		<div class="row justify-content-md-center">
			      			<div class="media mt-5">
						        <div class="media-body align-self-center mt-0">
						        	<h5 class="mr-5 title-carousel2">IGNACIO MARTÍNEZ</h5>
							        <p class="body-carousel mr-5 mt-3">Elaborado en base a métodos artesanales y tradicionales, a partir de agaves silvestres o semicultivados, que tardan entre 7 a 10 años para su labrado (cosecha). El proceso continua con el cocimiento, molienda, fermentación y destilación. Pero todas las etapas del proceso deben ser prehispánicas y coloniales, para obtener un mezcal artesanal extraordinario.</p>
						        </div>
						        <img class="ml-3 img-car" src="img/maestro-mezcalero.jpg" alt="Generic placeholder image">
						    </div>
						</div> 
					</div>
				</div>
				<!--primer item-->

				<!--segundo item-->
		    	<div class="carousel-item div-carousel">
			      	<div class="container col-7 mb-0">
			      		<div class="row justify-content-md-center">
			      			<div class="media mt-5">
						        <div class="media-body align-self-center">
						        	<h5 class="mr-5 title-carousel">CLAUDIO MARTÍNEZ</h5>
							        <p class="body-carousel mr-5 mt-3">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
						        </div>
						        <img class="ml-3 img-car" src="img/diseno.jpg" alt="Generic placeholder image">
						    </div>
						</div> 
					</div>
				</div>
				<!--segundo item-->

				<!--tercer item-->
		    	<div class="carousel-item div-carousel">
			      	<div class="container col-7 mb-0">
			      		<div class="row justify-content-md-center">
			      			<div class="media mt-5">
						        <div class="media-body align-self-center">
						        	<h5 class="mr-5 title-carousel">Fabián Martínez</h5>
							        <p class="body-carousel mr-5 mt-3">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
						        </div>
						        <img class="ml-3 img-car" src="img/maestro-mezcal.jpg" alt="Generic placeholder image">
						    </div>
						</div> 
					</div>
				</div>
				<!--tercer item-->

				<!--CUARTO item-->
		    	<div class="carousel-item div-carousel">
			      	<div class="container col-7 mb-0">
			      		<div class="row justify-content-md-center">
			      			<div class="media mt-5">
						        <div class="media-body align-self-center">
						        	<h5 class="mr-5 title-carousel">MEZCAL REPOSADO</h5>
							        <p class="body-carousel mr-5 mt-3">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
						        </div>
						        <img class="ml-3 img-car" src="img/maestro-mezcal.jpg" alt="Generic placeholder image">
						    </div>
						</div> 
					</div>
				</div>
				<!--CUARTO item-->

				<!--QUINTO item-->
		    	<div class="carousel-item div-carousel">
			      	<div class="container col-7 mb-0">
			      		<div class="row justify-content-md-center">
			      			<div class="media mt-5">
						        <div class="media-body align-self-center">
						        	<h5 class="mr-5 title-carousel">MEZCAL AÑEJO</h5>
							        <p class="body-carousel mr-5 mt-3">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
						        </div>
						        <img class="ml-3 img-car" src="img/maestro-mezcal.jpg" alt="Generic placeholder image">
						    </div>
						</div> 
					</div>
				</div>
				<!--QUINTO item-->
			</div>
		</div><!-- fin segundo corousel-->
	</div><!--fin div img fondo-->

	<!--tercer corousel-->
	<div id="slider-3" class="carousel slide carousel-fade fade-scroll" style="margin-top: 110px;" data-ride="carousel" data-interval="7000">
		<h2 class="carousel-title text-center mt-5 mb-3">COLABORADORES</h2>
		<ol class="carousel-indicators mt-0">
		    <li data-target="#slider-3" data-slide-to="0" class="active"></li>
		    <li data-target="#slider-3" data-slide-to="1"></li>
		    <li data-target="#slider-3" data-slide-to="2"></li>
		</ol>
	    <div class="carousel-inner">
	    	<!--primer item-->
	    	<div class="carousel-item div-carousel active">
		      	<div class="container col-7 mb-0">
		      		<div class="row justify-content-md-center">
		      			<div class="media mt-5">
					        <img class="mr-4 img-car" src="img/origen1.jpg" alt="Generic placeholder image">
					        <div class="media-body align-self-center mt-0">
						        <p class="body-carousel ml-5 mt-3">Cada miembro del equipo aporta una parte importante nuestro trabajo. Desde sembradores del maguey hasta diseñadores, todos están unidos por el amor y respeto compartidos por el trabajo, la técnica de cultivo y la filosofía heredada por Don Ignacio Martínez.</p>
					        </div>
					    </div>
					</div> 
				</div>
			</div>
			<!--primer item-->

			<!--segundo item-->
	    	<div class="carousel-item div-carousel">
		      	<div class="container col-7 mb-0">
		      		<div class="row justify-content-md-center">
		      			<div class="media mt-5">
					        <img class="mr-4 img-car" src="img/origen.jpg" alt="Generic placeholder image">
					        <div class="media-body align-self-center">
					        	<h5 class="ml-5 title-carousel">ALEJANDRO MORALES</h5>
						        <p class="body-carousel ml-5 mt-3">Con más de 50 años de experiencia, Casa Cortés ha creado tres marcas, que por sus conceptos de selección, maduración y procedencia resaltan diferentes atributos culturales y ambientales transmitidos de generación en generación, de conocimientos adquiridos por sus antepasados.</p>
					        </div>
					    </div>
					</div> 
				</div>
			</div>
			<!--segundo item-->

			<!--tercer item-->
	    	<div class="carousel-item div-carousel">
		      	<div class="container col-7 mb-0">
		      		<div class="row justify-content-md-center">
		      			<div class="media mt-5">
					        <img class="mr-4 img-car" src="img/legado.jpg" alt="Generic placeholder image">
					        <div class="media-body align-self-center">
					        	<h5 class="ml-5 title-carousel">GREGORIO ARAGÓN</h5>
						        <p class="body-carousel ml-5 mt-3">Actualmente en la 5ta generación de la familia Cortés se ha construido ya una comunidad que disfruta de la reunión de sabores, aromas y texturas de nuestras bebidas tomándolas en ocasiones importantes.</p>
					        </div>
					    </div>
					</div> 
				</div>
			</div>
			<!--tercer item-->

			<!--CUARTO item-->
	    	<div class="carousel-item div-carousel">
		      	<div class="container col-7 mb-0">
		      		<div class="row justify-content-md-center">
		      			<div class="media mt-5">
					        <img class="mr-4 img-car" src="img/legado.jpg" alt="Generic placeholder image">
					        <div class="media-body align-self-center">
					        	<h5 class="ml-5 title-carousel">AARÓN CRUZ</h5>
						        <p class="body-carousel ml-5 mt-3">Actualmente en la 5ta generación de la familia Cortés se ha construido ya una comunidad que disfruta de la reunión de sabores, aromas y texturas de nuestras bebidas tomándolas en ocasiones importantes.</p>
					        </div>
					    </div>
					</div> 
				</div>
			</div>
			<!--CUARTO item-->

			<!--QUINTO item-->
	    	<div class="carousel-item div-carousel">
		      	<div class="container col-7 mb-0">
		      		<div class="row justify-content-md-center">
		      			<div class="media mt-5">
					        <img class="mr-4 img-car" src="img/legado.jpg" alt="Generic placeholder image">
					        <div class="media-body align-self-center">
					        	<h5 class="ml-5 title-carousel">TERESA MARTÍNEZ</h5>
						        <p class="body-carousel ml-5 mt-3">Actualmente en la 5ta generación de la familia Cortés se ha construido ya una comunidad que disfruta de la reunión de sabores, aromas y texturas de nuestras bebidas tomándolas en ocasiones importantes.</p>
					        </div>
					    </div>
					</div> 
				</div>
			</div>
			<!--QUINTO item-->
		</div>
	</div><!-- fin tercer corousel-->

	<!-- Cuarto Carousel-->
	<div class="fondo-mezcal fade-scroll">
		<div id="slider-4" class="carousel slide carousel-fade mt-0" data-ride="carousel" data-interval="7000">
			<h2 class="carousel-title text-center mt-5 mb-0">MEMORIAS</h2>
			<ol class="carousel-indicators mt-0">
			    <li data-target="#slider-4" data-slide-to="0" class="active"></li>
			    <li data-target="#slider-4" data-slide-to="1"></li>
			    <li data-target="#slider-4" data-slide-to="2"></li>
			    <li data-target="#slider-4" data-slide-to="3"></li>
			    <li data-target="#slider-4" data-slide-to="4"></li>
			</ol>
		    <div class="carousel-inner">
		    	<!--primer item-->
		    	<div class="carousel-item div-carousel active">
			      	<div class="container col-7 mb-0">
			      		<div class="row justify-content-md-center">
			      			<div class="media mt-5">
						        <div class="media-body align-self-center mt-0">
						        	<h5 class="mr-5 title-carousel2">SEBASTIÁN MARTÍNEZ† (1.ª GENERACIÓN)</h5>
							        <p class="body-carousel mr-5 mt-3">Elaborado en base a métodos artesanales y tradicionales, a partir de agaves silvestres o semicultivados, que tardan entre 7 a 10 años para su labrado (cosecha). El proceso continua con el cocimiento, molienda, fermentación y destilación. Pero todas las etapas del proceso deben ser prehispánicas y coloniales, para obtener un mezcal artesanal extraordinario.</p>
						        </div>
						        <img class="ml-3 img-car" src="img/maestro-mezcalero.jpg" alt="Generic placeholder image">
						    </div>
						</div> 
					</div>
				</div>
				<!--primer item-->

				<!--segundo item-->
		    	<div class="carousel-item div-carousel">
			      	<div class="container col-7 mb-0">
			      		<div class="row justify-content-md-center">
			      			<div class="media mt-5">
						        <div class="media-body align-self-center">
						        	<h5 class="mr-5 title-carousel">IGNACIO MARTÍNEZ HERNÁNDEZ (2.ª GENERACIÓN)</h5>
							        <p class="body-carousel mr-5 mt-3">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
						        </div>
						        <img class="ml-3 img-car" src="img/diseno.jpg" alt="Generic placeholder image">
						    </div>
						</div> 
					</div>
				</div>
				<!--segundo item-->

				<!--tercer item-->
		    	<div class="carousel-item div-carousel">
			      	<div class="container col-7 mb-0">
			      		<div class="row justify-content-md-center">
			      			<div class="media mt-5">
						        <div class="media-body align-self-center">
						        	<h5 class="mr-5 title-carousel">IGNACIO MARTÍNEZ (3.ª GENERACIÓN)</h5>
							        <p class="body-carousel mr-5 mt-3">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
						        </div>
						        <img class="ml-3 img-car" src="img/maestro-mezcal.jpg" alt="Generic placeholder image">
						    </div>
						</div> 
					</div>
				</div>
				<!--tercer item-->

				<!--CUARTO item-->
		    	<div class="carousel-item div-carousel">
			      	<div class="container col-7 mb-0">
			      		<div class="row justify-content-md-center">
			      			<div class="media mt-5">
						        <div class="media-body align-self-center">
						        	<h5 class="mr-5 title-carousel">CARMELA MOLINA</h5>
							        <p class="body-carousel mr-5 mt-3">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
						        </div>
						        <img class="ml-3 img-car" src="img/maestro-mezcal.jpg" alt="Generic placeholder image">
						    </div>
						</div> 
					</div>
				</div>
				<!--CUARTO item-->
			</div>
		</div><!-- fin CUARTO corousel-->
	</div><!--fin div img fondo-->

	<!--next section-->
	<div class="next">
		<div class="next-text">
			<p>SIGUIENTE</p>
			<p><a href="campos-de-maguey">Campos de Maguey</a></p>
		</div>
		<div  class="next-fondo" style="background-image: url('/img/campos-agave2.jpg'); opacity: 0.4"></div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@endsection
