@extends('layouts.plantilla')

@section('title')
	Historia, Equipo | Casa Martínez
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
      			<li><a href="javascript:saltarA('#origen')">-Origen Casa Martínez</a></li>
      			<li><a href="javascript:saltarA('#familia')">-Familia Martínez</a></li>
      			<li><a href="javascript:saltarA('#equipo')">-Nuestro Equipo</a></li>
      			<li><a href="javascript:saltarA('#memorias')">-Memorias</a></li>
      		</ul>
      	</div>
      	<div  class="bg-img" style="background-image: url('/img/equipo.jpg'); background-color: black; opacity: 0.8"></div>
	</div>
	<!--encabezado-->

	<!-- primer corousel-->
	<div class="env fade-scroll" id="origen">
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
							<h5 class="title-carousel">DESDE 1942</h5>
						</div>
						<div class="parrafos">
							<p class="body-carousel">El origen de nuestro Mezcal comienza en 1942, por Don Ignacio Martínez Hernández† hasta el día de su fallecimiento en 1983, en la Ranchería “Las Carretas” en el Municipio de San Dionisio Ocotepec, Estado de Oaxaca.</p>
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
	    					<h5 class="title-carousel">INICIOS (1986)</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">En 1986, retoma el trabajo su hijo, el Sr. Ignacio Martínez García, quien es actualmente nuestro Maestro Mezcalero, especialista en el cultivo de Agave y Producción de Mezcal.</p>
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
	    					<h5 class="title-carousel">2003</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Don Ignacio Martínez García, junto con varios productores de la región forman el grupo de trabajo UNIÓN DE PRODUCTORES DE MAGUEY Y MEZCAL DE SAN DIONISIO OCOTEPEC, Formada por Maestros Mezcaleros y Magueyeros de la localidad.</p>
	    				</div>
	    			</div>
	    		</div>
			</div>
			<!--tercer item-->
			<!--cuarto item-->
	    	<div>
		      	<div class="text-and-img-c">
	    			<div>
	    				<img class="img-car img-r" src="img/legado.jpg" alt="Generic placeholder image">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">2006</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Año en el que surge nuestra primera marca llamada SI NAI, que en zapoteco signiﬁca “Como Ayer”.</p>
	    				</div>
	    			</div>
	    		</div>
			</div>
			<!--cuarto item-->
			<!--quinto item-->
	    	<div>
		      	<div class="text-and-img-c">
	    			<div>
	    				<img class="img-car img-r" src="img/legado.jpg" alt="Generic placeholder image">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">2020</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Surge CASA MARTINEZ, familia que reúne a 4 Marcas de Mezcal Artesanal.</p>
	    				</div>
	    			</div>
	    		</div>
			</div>
			<!--quinto item-->
		</div><!--fin carousel items-->
	</div>
	</div>
	<!--fin primer corousel-->

	<!--segundo corousel-->
	<div class="env fade-scroll" id="equipo">
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
	    					
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Cada miembro del equipo aporta una parte importante nuestro trabajo. Desde sembradores del maguey hasta diseñadores, todos están unidos por el amor y respeto compartidos por el trabajo, la técnica de cultivo y la filosofía heredada por Don Ignacio Martínez</p>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
			<!--primer item-->

			<!--primer item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div>
	    				<img src="/img/legado.jpg" class="img-car img-r">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">MAGUEY</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Maestros magueyeros:</p>
	    					<ul class="list-masters">
	    						<li>Gregorio Aragón.</li>
	    						<li>Neftalí Aragón.</li>
	    					</ul>
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
	    					<h5 class="title-carousel">MEZCAL</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Maestros Mezcaleros:</p>
	    					<ul class="list-masters">
	    						<li>Carmela Molina e Ignacio Martínez.</li>
	    						<li>Alejandro Morales.</li>
	    						<li>Aarón Cruz.</li>
	    					</ul>
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
	    					<h5 class="title-carousel">MAGUEY Y MAÍZ</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Maestro Agricultor:</p>
	    					<ul class="list-masters">
	    						<li>Adrián Núñes.</li>	    							
	    					</ul>
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
	    					<h5 class="title-carousel">APRENDIZ</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel"></p>
	    					<ul class="list-masters">
	    						<li>Claudio Martínez.</li>	    							
	    					</ul>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
			<!--cuarto item-->
		</div><!-- fin carousel items-->		
	</div>
	</div>
	<!--fin segundo corousel-->

	<!--CUARTO corousel-->
	<div class="fondo-mezcal env fade-scroll" id="memorias">
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
  arrows: false
});
});

 </script>
 <script type="text/javascript">
 	<script>
	var ancho2 = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
 	if(ancho2<760){
 		var texto = document.getElementsByClassName("bg-text");
 		var i;
	 	var parrafo;
	 	var div_p;
	 	var btn_open;
	 	for (i = 0; i < texto.length; i++) {
	 		texto[i].addEventListener("click", function() {
	 			/*this.classList.toggle("bg-text-v");*/
	 			div_p = this.lastElementChild;
	 			parrafo = div_p.children;
	 			console.log("numero de parrafos = "+ parrafo.length);
	 			var altura = 0;
	 			var j;
	 			for (j = 0; j < parrafo.length; j++ ) {
	 				altura += parrafo[j].offsetHeight;
	 				console.log("altura de parrafo = "+ parrafo[j].offsetHeight);
	 			}
	 			btn_open = this.firstElementChild;
	 			btn_open.classList.toggle("open");
	 			btn_open.classList.toggle("closed");
	 			console.log("altura = "+altura);
	 			altura += parrafo.length*15;
	 			altura = altura+"px";
	 			console.log("altura sumada= "+altura);
	 			if (div_p.style.height === "") {
	 				div_p.style.height = altura;
	 			} else {
	 				div_p.style.height = "";
	 			}
	 		});
	 	}
 	}
 </script>
 </script>
@endsection
