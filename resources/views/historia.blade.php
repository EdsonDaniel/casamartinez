@extends('layouts.plantilla')

@section('title')
	Historia, Equipo | Casa Martínez
@endsection

@section('stylesheet')
<link rel="stylesheet" type="text/css" href="/css/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="/css/slick/slick-theme.css"/>
<link href="/css/custom/history.css" rel="stylesheet" type="text/css" />
@endsection

@section('id-container')
  id="bl-bg"
@endsection

@section('content')

<!--encabezado-->
	<div class="bg-image container-image fade-scroll">
      	<!--<div class="centered">Historia & Equipo</div>
      	<div class="right">
      		<ul>
      			<li><a href="javascript:saltarA('#origen')">-Origen Casa Martínez</a></li>
      			!--<li><a href="javascript:saltarA('#familia')">-Familia Martínez</a></li>--
      			<li><a href="javascript:saltarA('#equipo')">-Nuestro Equipo</a></li>
      			<li><a href="javascript:saltarA('#memorias')">-Memorias</a></li>
      		</ul>
      	</div>-->
      	<div  class="bg-img" style="background-image: url('/img/Campo-Hisashi.jpg'); background-color: black; opacity: 0.6"></div>
	</div>
	<!--encabezado-->

	<!-- primer corousel--
	<div class="env fade-scroll" id="origen">-->
	<div class="carousel-container fade-scroll py-3 my-4">
		<h2 class="carousel-title text-center">ORIGEN CASA MARTÍNEZ</h2>
		<div class="carousel-items">
			<!--primer item-->
			<div>
				<div class="text-and-img-c">
					<div>
						<img class="img-car img-r" src="/img/ABUELOS.jpg" alt="Generic placeholder image">
					</div>
					<div class="bg-text">
						<div class="btn-expand open"></div>
						<div>
							<!--<h5 class="title-carousel">DESDE 1942</h5>-->
						</div>
						<div class="parrafos">
							<p class="body-carousel">
								Casa Martínez surge del deseo de compartir y transmitir la herencia cultural aprendida del abuelo y padre de Don Ignacio Martínez García que tuvo origen en la Racheria “Las Carretas” en el Municipio de San Dionisio Ocotepec, Estado de Oaxaca.
								
							</p>
							<!--<p class="body-carousel">El origen de nuestro Mezcal comienza en 1942, por Don Ignacio Martínez Hernández† hasta el día de su fallecimiento en 1983, en la Ranchería “Las Carretas” en el Municipio de San Dionisio Ocotepec, Estado de Oaxaca.</p>-->
						</div>
					</div>
	    		</div>
			</div> <!-- fin primer item-->

			<!--segundo item-->
			<div>
				<div class="text-and-img-c">
	    			<div>
	    				<img class="img-car img-r" src="/img/ABUELOS.jpg" alt="Generic placeholder image">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">SEBASTÍAN MARTÍNEZ</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Empezó a producir Mezcal a base de agaves silvestres de la región como, Tobalá y Tepextate, utilizando técnicas ancestrales.</p>
	    				</div>
	    			</div>
	    		</div>
			</div> <!--fin segundo item-->

			<!--tercer item-->
	    	<div>
		      	<div class="text-and-img-c">
	    			<div>
	    				<img class="img-car img-r" src="/img/ABUELOS.jpg" alt="Generic placeholder image">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">IGNACIO MARTÍNEZ HERNÁNDEZ</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Aprendió de su padre el arte de producir mezcal, con las mismas técnicas ancestrales.</p>
	    				</div>
	    			</div>
	    		</div>
			</div>
			<!--tercer item-->
			<!--cuarto item-->
	    	<div>
		      	<div class="text-and-img-c">
	    			<div>
	    				<img class="img-car img-r" src="/img/ABUELOS.jpg" alt="Generic placeholder image">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">IGNACIO MARTÍNEZ GARCÍA</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Fundador de Casa Martínez, sigue conservando las raíces y conocimientos heredados de su abuelo y padre, compartiendo con nosotros un inigualable Mezcal.</p>
	    				</div>
	    			</div>
	    		</div>
			</div>
			<!--cuarto item-->
			<!--quinto item-->
	    	<div>
		      	<div class="text-and-img-c">
	    			<div>
	    				<img class="img-car img-r" src="/img/ABUELOS.jpg" alt="Generic placeholder image">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">CARMELA MOLINA</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Una Mujer guerrera quien sigue siendo uno de los eslabones principales dentro de Casa Martínez, al lado de su esposo ha aprendido el arte de producción de mezcal.</p>
	    				</div>
	    			</div>
	    		</div>
			</div>
			<!--quinto item-->
		</div><!--fin carousel items-->
	</div>
	<!--</div>-->
	<!--fin primer corousel-->

	<!--segundo corousel--
	<div class="env fade-scroll" id="equipo">-->
	<div class="carousel-container fade-scroll py-md-3 my-md-4">
		<h2 class="carousel-title text-center">NUESTRO EQUIPO</h2>
		<div class="carousel-items">

			<!--primer item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div name="div-img-hor">
	    				<img src="/img/equipo-cm.jpg" class="img-car img-r img-car-hor">
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
	    			<div name="div-img-hor">
	    				<img src="/img/maestro-magueyero.jpg" class="img-car img-r img-car-hor">
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
	    				<img src="/img/fernando.jpg" class="img-car img-r">
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
	    				<img src="/img/adrian.jpeg" class="img-car img-r">
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
	    				<img src="/img/aprendiz.jpg" class="img-car img-r">
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
	<!--</div>-->
	<!--fin segundo corousel-->

	<!--next section-->
	<div class="next">
		<div class="next-text">
			<p>SIGUIENTE</p>
			<p><a href="campos-de-maguey">Campos de Maguey</a></p>
		</div>
		<div  class="next-fondo" style="background-image: url('/img/Campo maguey cielo.jpg'); opacity: 0.4"></div>
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
	 			/*console.log("numero de parrafos = "+ parrafo.length);*/
	 			var altura = 0;
	 			var j;
	 			for (j = 0; j < parrafo.length; j++ ) {
	 				altura += parrafo[j].offsetHeight;
	 				//console.log("altura de parrafo = "+ parrafo[j].offsetHeight);
	 			}
	 			btn_open = this.firstElementChild;
	 			btn_open.classList.toggle("open");
	 			btn_open.classList.toggle("closed");
	 			/*console.log("altura = "+altura);*/
	 			altura += parrafo.length*15;
	 			altura = altura+"px";
	 			//console.log("altura sumada= "+altura);
	 			if (div_p.style.height === "") {
	 				div_p.style.height = altura;
	 			} else {
	 				div_p.style.height = "";
	 			}
	 		});
	 	}
 	}
 </script>
@endsection
