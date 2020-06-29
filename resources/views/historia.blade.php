@extends('layouts.plantilla')

@section('title')
	Historia, Colaboradores
@endsection

@section('stylesheet')
<link rel="stylesheet" type="text/css" href="css/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css"/>
<link href="css/custom/history.css" rel="stylesheet" type="text/css" />
@endsection

@section('id-container')
  id="bl-bg"
@endsection

@section('content')

<!--encabezado-->
	<div class="bg-image container-image fade-scroll">
      	<div class="centered">Historia & Equipo</div>
      	<div class="right">
      		<ul>
      			<li><a href="javascript:saltarA('#slider')">-Origen Casa Martínez</a></li>
      			<li><a href="javascript:saltarA('#slider-2')">-Familia Martínez</a></li>
      			<li><a href="javascript:saltarA('#slider-3')">-Nuestro Equipo</a></li>
      			<li><a href="javascript:saltarA('#slider-4')">-Memorias</a></li>
      		</ul>
      	</div>
      	<div  class="bg-img" style="background-image: url('/img/equipo.jpg'); background-color: black; opacity: 0.8"></div>
	</div>
	<!--encabezado-->

	<!-- primer corousel-->
	<div class="env fade-scroll">
	<div class="carousel-container">
		<h2 class="carousel-title text-center">ORIGEN CASA MARTÍNEZ</h2>
		<div class="carousel-items">
			<!--primer item-->
			<div>
				<div class="text-and-img-c">
					<div>
						<img class="img-car img-r" src="img/origen1.jpg" alt="Generic placeholder image">
					</div>
					<div class="bg-text">
						<div class="btn-expand open"></div>
						<div>
							<h5 class="title-carousel">DESDE 1950</h5>
						</div>
						<div class="parrafos">
							<p class="body-carousel">En el transcurso del año 1850 Matatlán, Oaxaca, era; tal como hoy día, uno de los principales escenarios del perfeccionamiento en los procesos del mezcal artesanal. La familia Martínez contribuyo a este movimiento a la par que construyó su legado como una de las familias más distinguidas por el cuidado que dan calidad de primer nivel en cada uno de sus procesos.  </p>
						</div>
					</div>
	    		</div>
			</div> <!-- fin primer item-->

			<!--segundo item-->
			<div>
				<div class="text-and-img-c">
	    			<div>
	    				<img class="img-car img-r" src="img/origen.jpg" alt="Generic placeholder image">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">INICIOS</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel ml-5 mt-3">Con más de 50 años de experiencia, Casa Cortés ha creado tres marcas, que por sus conceptos de selección, maduración y procedencia resaltan diferentes atributos culturales y ambientales transmitidos de generación en generación, de conocimientos adquiridos por sus antepasados.</p>
	    				</div>
	    			</div>
	    		</div>
			</div> <!--fin segundo item-->

			<!--tercer item-->
	    	<div>
		      	<div class="text-and-img-c">
	    			<div>
	    				<img class="img-car img-r" src="img/legado.jpg" alt="Generic placeholder image">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">LEGADO</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Actualmente en la 5ta generación de la familia Cortés se ha construido ya una comunidad que disfruta de la reunión de sabores, aromas y texturas de nuestras bebidas tomándolas en ocasiones importantes.</p>
	    				</div>
	    			</div>
	    		</div>
			</div>
			<!--tercer item-->
		</div><!--fin carousel items-->
	</div>
	</div>
	<!--fin primer corousel-->

	<!--segundo corousel-->
	<div class="fondo-mezcal env fade-scroll">
	<div class="carousel-container">
		<h2 class="carousel-title text-center">FAMILIA MARTÍNEZ</h2>
		<div class="carousel-items">
			<!--primer item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">IGNACIO MARTÍNEZ</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Elaborado en base a métodos artesanales y tradicionales, a partir de agaves silvestres o semicultivados, que tardan entre 7 a 10 años para su labrado (cosecha). El proceso continua con el cocimiento, molienda, fermentación y destilación. Pero todas las etapas del proceso deben ser prehispánicas y coloniales, para obtener un mezcal artesanal extraordinario.</p>
	    				</div>
	    			</div>
	    			<div class="img-l">
	    				<img class="img-car" src="img/envasado.jpg" alt="Generic placeholder image">
	    			</div>
	    		</div>
			</div>
			<!--primer item-->
			
			<!--segundo item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">CLAUDIO MARTÍNEZ</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Elaborado en base a métodos artesanales y tradicionales, a partir de agaves silvestres o semicultivados, que tardan entre 7 a 10 años para su labrado (cosecha). El proceso continua con el cocimiento, molienda, fermentación y destilación. Pero todas las etapas del proceso deben ser prehispánicas y coloniales, para obtener un mezcal artesanal extraordinario.</p>
	    				</div>
	    			</div>
	    			<div class="img-l">
	    				<img class="img-car" src="img/envasado.jpg" alt="Generic placeholder image">
	    			</div>
	    		</div>
			</div>
			<!--segundo item-->

			<!--TERCER item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">FABIÁN MARTINEZ</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Elaborado en base a métodos artesanales y tradicionales, a partir de agaves silvestres o semicultivados, que tardan entre 7 a 10 años para su labrado (cosecha). El proceso continua con el cocimiento, molienda, fermentación y destilación. Pero todas las etapas del proceso deben ser prehispánicas y coloniales, para obtener un mezcal artesanal extraordinario.</p>
	    				</div>
	    			</div>
	    			<div class="img-l">
	    				<img class="img-car" src="img/envasado.jpg" alt="Generic placeholder image">
	    			</div>
	    		</div>
			</div>
			<!--TERCER item-->
		</div><!-- fin carousel items-->		
	</div>
	</div>
	<!--fin segundo  corousel-->


	<!--tercer corousel-->
	<div class="env fade-scroll">
	<div class="carousel-container">
		<h2 class="carousel-title text-center">NUESTRO EQUIPO</h2>
		<div class="carousel-items">
			<!--primer item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div>
	    				<img src="/img/legado.jpg" class="img-car img-r">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">NUESTRO EQUIPO</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Cada miembro del equipo aporta una parte importante nuestro trabajo. Desde sembradores del maguey hasta diseñadores, todos están unidos por el amor y respeto compartidos por el trabajo, la técnica de cultivo y la filosofía heredada por Don Ignacio Martínez.</p>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
			<!--primer item-->

			<!--segundo item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div>
	    				<img src="/img/histori.jpg" class="img-car img-r">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">ALEJANDRO MORALES</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Con más de 50 años de experiencia, Casa Cortés ha creado tres marcas, que por sus conceptos de selección, maduración y procedencia resaltan diferentes atributos culturales y ambientales transmitidos de generación en generación, de conocimientos adquiridos por sus antepasados.</p>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
			<!--segundo item-->

			<!--tercer item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div>
	    				<img src="/img/histori.jpg" class="img-car img-r">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">AARÓN CRUZ</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Con más de 50 años de experiencia, Casa Cortés ha creado tres marcas, que por sus conceptos de selección, maduración y procedencia resaltan diferentes atributos culturales y ambientales transmitidos de generación en generación, de conocimientos adquiridos por sus antepasados.</p>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
			<!--tercer item-->

			<!--cuarto item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div>
	    				<img src="/img/histori.jpg" class="img-car img-r">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">GREGORIO ARAGÓN</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Con más de 50 años de experiencia, Casa Cortés ha creado tres marcas, que por sus conceptos de selección, maduración y procedencia resaltan diferentes atributos culturales y ambientales transmitidos de generación en generación, de conocimientos adquiridos por sus antepasados.</p>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
			<!--cuarto item-->

			<!--quinto item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div>
	    				<img src="/img/histori.jpg" class="img-car img-r">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">TERESA MARTÍNEZ</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Con más de 50 años de experiencia, Casa Cortés ha creado tres marcas, que por sus conceptos de selección, maduración y procedencia resaltan diferentes atributos culturales y ambientales transmitidos de generación en generación, de conocimientos adquiridos por sus antepasados.</p>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
			<!--quinto item-->
		</div><!-- fin carousel items-->		
	</div>
	</div>
	<!--fin tercer corousel-->

	<!--CUARTO corousel-->
	<div class="fondo-mezcal env fade-scroll">
	<div class="carousel-container">
		<h2 class="carousel-title text-center">MEMORIAS</h2>
		<div class="carousel-items">
			<!--primer item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">SEBASTIÁN MARTÍNEZ† (1.ª GENERACIÓN)</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Elaborado en base a métodos artesanales y tradicionales, a partir de agaves silvestres o semicultivados, que tardan entre 7 a 10 años para su labrado (cosecha). El proceso continua con el cocimiento, molienda, fermentación y destilación. Pero todas las etapas del proceso deben ser prehispánicas y coloniales, para obtener un mezcal artesanal extraordinario.</p>
	    				</div>
	    			</div>
	    			<div class="img-l">
	    				<img class="img-car" src="img/maestro-mezcalero.jpg" alt="Generic placeholder image">
	    			</div>
	    		</div>
			</div>
			<!--primer item-->

			<!--segundo item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">IGNACIO MARTÍNEZ HERNÁNDEZ (2.ª GENERACIÓN)</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
	    				</div>
	    			</div>
	    			<div class="img-l">
	    				<img class="img-car" src="img/envasado.jpg" alt="Generic placeholder image">
	    			</div>
	    		</div>
			</div>
			<!--segundo item-->

			<!--tercer item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">IGNACIO MARTÍNEZ (3.ª GENERACIÓN)</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
	    				</div>
	    			</div>
	    			<div class="img-l">
	    				<img class="img-car" src="img/envasado.jpg" alt="Generic placeholder image">
	    			</div>
	    		</div>
			</div>
			<!--tercer item-->

			<!--cuarto item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">CARMELA MOLINA</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño. por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.</p>
	    				</div>
	    			</div>
	    			<div class="img-l">
	    				<img class="img-car" src="img/envasado.jpg" alt="Generic placeholder image">
	    			</div>
	    		</div>
			</div>
			<!--cuarto item-->
		</div><!-- fin carousel items-->		
	</div>
	</div>
	<!--fin CUARTO corousel-->

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
<script type="text/javascript" src="css/slick/slick.min.js"></script>
<script>
      
$(document).ready(function(){

$('.carousel-items').slick({
  dots: true,
  infinite: true,
  speed: 900,
  fade: true,
  arrows: false,
  cssEase: 'linear',
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 550,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
});

 </script>
 <script type="text/javascript">
 	var texto = document.getElementsByClassName("bg-text");
 	var i;
 	var parrafo;
 	var div_p;
 	var btn_open;
 	for (i = 0; i < texto.length; i++) {
 		texto[i].addEventListener("click", function() {
 			/*this.classList.toggle("bg-text-v");*/
 			div_p = this.lastElementChild;
 			parrafo = div_p.lastElementChild;
 			btn_open = this.firstElementChild;
 			btn_open.classList.toggle("open");
 			btn_open.classList.toggle("closed");
 			console.log("altura = "+parrafo.offsetHeight);
 			var alt = parrafo.offsetHeight;
 			alt += 15;
 			alt = alt+"px";
 			/*parrafo.classList.toggle("bg-text-v");*/
 			if (div_p.style.height === "") {
 				div_p.style.height = alt;
 				/*btn_open.innerHTML = "CERRAR";*/

 			} else {
 				div_p.style.height = "";
 				/*btn_open.innerHTML = "ABRIR";*/
 			}
 		});
 	}
  /*var dropdownContent = this.nextElementSibling;
}
}*/
 </script>
@endsection
