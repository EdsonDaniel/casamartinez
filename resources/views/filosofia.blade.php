@extends('layouts.plantilla')

@section('title')
	Filosofía
@endsection

@section('stylesheet')
<link rel="stylesheet" type="text/css" href="css/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css"/>
<link href="css/custom/philosophy.css" rel="stylesheet" type="text/css" />
@endsection

@section('id-container')
  id="bl-bg"
@endsection

@section('content')

<div class="head-philosop fade-scroll"></div>
	<!--<div class="portada-fil fade-scroll">
	</div>
	<-- Segunda imagen de fondo--
	<div class="img-source fade-scroll">
		Ignacio Martínez
	</div>
	<--Segunda imagen de fondo-->

	<!-- cita -->
	<div class="block-cita fade-scroll">
		<blockquote >
			<p class="text-cita fade-scroll">“Con los pies en la tierra, la mirada en el cielo, el corazón en nuestra profesión y el firme deseo de seguir compartiendo en un futuro la bebida mística, ¡EL MEZCAL!”</p>
		</blockquote>
	</div>
	<!-- cita -->

	<!-- primer corousel-->
	<div class="env">
	<div class="carousel-container">
		<h2 class="carousel-title text-center fade-scroll">EL MAGUEY</h2>
		<div class="carousel-items">
			<!--primer item-->
			<div>
				<div class="text-and-img-c">
					<div>
						<img src="/img/mama-sembrando.jpg" class="img-car img-r">
					</div>
					<div class="bg-text">
						<div class="btn-expand open"></div>
						<div>
							<h5 class="title-carousel">ORIGEN</h5>
						</div>
						<div class="parrafos">
							<p class="body-carousel">“El árbol de las maravillas es el maguey, de que los nuevos o chapetones (como en Indias lo llaman), suelen escribir milagros, de que de agua y vino, y aceite y vinagre, y miel, y arrope e hilo, y aguja, y otras cien cosas. Él es un árbol que en la Nueva España estiman mucho los indios, y de ordinario tienen en su habitación alguno o algunos de este género para ayuda a su vida, y en los campos se da y le cultivan...”</p>
							<p class="body-carousel"><i>[Historia natural y moral de las Indias, Cap. 23] José de Acosta</i></p>
						</div>
					</div>
	    		</div>
			</div> <!-- fin primer item-->

			<!--segundo item-->
			<div>
				<div class="text-and-img-c">
	    			<div>
	    				<img src="/img/Maguey-vivero-1-año.jpg" class="img-car img-r">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">VIDA PARA EL MAGUEY</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">
	    						Por su naturaleza de vegetal resistente al desierto pero generoso en sus dádivas para quien las sabe aprovechar; por su vínculo estrecho con la luna, que simbolizaba la totalidad de la vida sacralizada del México antiguo; porque después de la Conquista y el desplome de las civilizaciones mesoamericanas siguió siendo techo, vestido, ayate, comida, vino, medicina y defensa de los mexicanos, el maguey merece ser llamado reverencialmente el Señor Maguey.
	    					</p>
	    					<p class="body-carousel"><i>[Fernando Benítez, Artes de México, 51]</i></p>
	    				</div>
	    			</div>
	    		</div>
			</div> <!--fin segundo item-->

			<!--tercer item-->
	    	<div>
		      	<div class="text-and-img-c">
	    			<div>
	    				<img src="/img/quiote-luz.jpg" class="img-car img-r">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">DESTINO DEL MAGUEY</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Conservar el ecosistema es respetar los tiempos que la naturaleza designa para que una planta alcance la madurez. </p>
	    					<p class="body-carousel">Como política de sustentabilidad, Casa Martínez aprovecha exclusivamente Magueyes que los mismos Maestros han cultivado. </p>
	    					<p class="body-carousel">Sólo el 1% de nuestra producción son Agaves Silvestres, de los cuales tuvieron que tener autorización previa por la población para su corte.
	    					</p>
	    				</div>
	    			</div>
	    		</div>
			</div>
			<!--tercer item-->
		</div><!--fin carousel items-->
	</div>
	</div>
	<!--fin primer corousel-->

	<!--segundo  carousel-->
	<div class="fondo-mezcal env fade-scroll">
	<div class="carousel-container">
		<h2 class="carousel-title text-center fade-scroll">EL MEZCAL</h2>
		<div class="carousel-items">
			<!--primer item-->
			<div>
				<div class="text-and-img-c">
					<div class="bg-text">
						<div class="btn-expand open"></div>
						<div>
							<h5 class="title-carousel">HISTORIA</h5>
						</div>
						<div class="parrafos">
							<p class="body-carousel">La palabra Mezcal deriva del Náhuatl Mexcalli; de Metl, Maguey, e Ixca, cocer u hornear, esto es, maguey cocido u horneado.</p>
						</div>
					</div>
					<div class="img-l">
						<img class="img-car" src="/img/Ignacio-tomando-mezcal.jpg" alt="Generic placeholder image">
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
							<h5 class="title-carousel">CLASES DE MEZCAL</h5>
						</div>
						<div class="parrafos">
							<p class="body-carousel">
								De acuerdo con la <a href="https://dof.gob.mx/nota_detalle.php?codigo=5472787&fecha=23/02/2017" style="text-decoration: underline;">NOM 070-2016,</a> el Mezcal se divide en tres categorías:
							</P>
							<ul>
								<li>Mezcal.</li>
								<li>Mezcal Artesanal.</li>
								<li>Mezcal Ancestral.</li>
							</ul>
							<p class="body-carousel">Diferenciandose cada uno en base a su proceso de producción. </p>
						</div>
					</div>
					<div class="img-l">
						<img class="img-car" src="/img/Ignacio-tomando-mezcal.jpg" alt="Generic placeholder image">
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
							<h5 class="title-carousel">MEZCAL ARTESANAL</h5>
						</div>
						<div class="parrafos">
							<p class="body-carousel">
								El proceso de producción del  Mezcal Artesanal utiliza métodos prehispánicos junto con métodos derivados de la conquista Española. 
							</p>
							<p class="body-carousel">
								La forma más común en la producción es mediante un horno cónico en el proceso de cocción, la molienda en molinos tipo chileno o egipcio, la fermentación en tinas de madera y la destilación en alambiques de cobre. 
							</p>
						</div>
					</div>
					<div class="img-l">
						<img class="img-car" src="/img/Ignacio-tomando-mezcal.jpg" alt="Generic placeholder image">
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
							<h5 class="title-carousel">CULTURA DEL MEZCAL</h5>
						</div>
						<div class="parrafos">
							<p class="body-carousel">En Oaxaca tenemos un dicho popular que dice:</p>
							<p class="body-carousel"><i>“Para todo mal Mezcal y para todo bien, también.”</i></p>
							</p>
						</div>
					</div>
					<div class="img-l">
						<img class="img-car" src="/img/Ignacio-tomando-mezcal.jpg" alt="Generic placeholder image">
					</div>
				</div>
			</div>
			<!--cuarto item-->

			<!--quinto item-->
			<div>
				<div class="text-and-img-c">
					<div class="bg-text">
						<div class="btn-expand open"></div>
						<div>
							<h5 class="title-carousel">CULTURA DEL MEZCAL</h5>
						</div>
						<div class="parrafos">
							<p class="body-carousel">El Mezcal es parte de nuestras tradiciones, de nuestra vida, cuando alguien nace brindamos con Mezcal, de igual manera cuando alguien parte de este mundo, también brindamos con Mezcal. En cada acontecimiento el Mezcal nos acompaña. </p>
							<p class="body-carousel">En Casa Martínez buscamos conservar la cosmológico de este espíritu.
							</p>
						</div>
					</div>
					<div class="img-l">
						<img class="img-car" src="/img/Ignacio-tomando-mezcal.jpg" alt="Generic placeholder image">
					</div>
				</div>
			</div>
			<!--quinto item-->
		</div>
	</div>
	<!--fin segundo carousel-->
	</div>

	<!-- tercer carousel-->
	<div class="fondo-produccion env fade-scroll">
	<div class="carousel-container" id="proceso">
		<h2 class="carousel-title text-center fade-scroll">PROCESO DE PRODUCCIÓN</h2>
		<div class="carousel-items">
			<!--primer item-->
	    	<div>
	    		<div class="text-and-img-c">
		      		<div class="bg-text">
		      			<div class="btn-expand open"></div>
		      			<div>
		      				<h5 class="title-carousel">1. REPRODUCCIÓN Y CULTIVO</h5>
		      			</div>
		      			<div class="parrafos">
		      				<p class="body-carousel">Partiendo de una política de sustentabilidad, cultivamos de forma responsable Magueyes de la variedad espadín (el 99% de nuestra producción es a partir de este agave) de manera <em>orgánica y biodinámica.</em></p>
		      			</div>
		      		</div>
		      		<div class="img-l">
		      			<img class="img-car" src="/img/Sembrando.jpg" alt="Generic placeholder image">
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
	    					<h5 class="title-carousel">2. SELECCIÓN DE AGAVES</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Antes de producir nuestros Mezcales, lo primero que hacemos  es seleccionar los magueyes que cuentan con la madurez propia para ser aprovechados. Esta labor la realiza nuestros Maestros Ignacio Martínez y Gregorio Aragón.</p>
	    				</div>
	    			</div>
	    			<div class="img-l">
	    				<img class="img-car img-car-hor" src="/img/Ignacio-solo-espalda.jpg" alt="Generic placeholder image">
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
	    					<h5 class="title-carousel">3. CORTE</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Basados en la cosmología usamos un calendario lunar para identificar los momentos adecuados para cortar los magueyes previamente seleccionados.</p>
	    				</div>
	    			</div>
	    			<div class="img-l">
	    				<img class="img-car" src="/img/Maguey-palenque-cielo.jpg" alt="Generic placeholder image">
	    			</div>
	    		</div>
			</div>
			<!--tercer item-->

			<!--CUARTO item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">4. COCCIÓN</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Cocción en horno cónico bajo tierra durante 48 a 72 hrs.</p>
	    				</div>
	    			</div>
	    			<div class="img-l">
	    				<img class="img-car img-car-hor" src="/img/Horno.jpg" alt="Generic placeholder image">
	    			</div>
	    		</div>
			</div>
			<!--CUARTO item-->

			<!--QUINTO item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">5. MOLIENDA</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Machacado en tahona de piedra de rio. </p>
	    				</div>
	    			</div>
	    			<div class="img-l">
	    				<img class="img-car img-car-hor" src="/img/Moler-fernando.jpg" alt="Generic placeholder image">
	    			</div>
	    		</div>
			</div>
			<!--QUINTO item-->

			<!--SEPTIMO item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">6. DESTILACIÓN</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">2 destilaciones en ollas de cobre.</p>
	    				</div>
	    			</div>
	    			<div class="img-l">
	    				<img class="img-car" src="/img/Fermentando.jpg" alt="Generic placeholder image">
	    			</div>
	    		</div>
			</div>
			<!--SEPTIMO item-->

			<!--octavo item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">6. MADURACIÓN</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">
	    						Madurado en barricas de roble blanco Americano en cava subterránea. 
	    					</p>
	    					<ul>
	    						<li>Para Mezcal reposado se madura durante 6 y 9 meses.</li>
	    						<li>Para Mezcales añejos se madura durante 3 años. </li>
	    						<li>Las reservas especiales superan los 8 años.</li>
	    					</ul>
	    				</div>
	    			</div>
	    			<div class="img-l">
	    				<img class="img-car" src="img/envasado.jpg" alt="Generic placeholder image">
	    			</div>
	    		</div>
			</div>
			<!--octavo item-->
		</div>
	</div>
	<!--fin tercer carousel-->
	</div>

	<!--Cuarto carousel-->
	<div class="env fade-scroll">
	<div class="carousel-container" id="maestro-mezcalero">
		<h2 class="carousel-title text-center fade-scroll">MAESTRO MEZCALERO</h2>
		<div class="carousel-items">
			<!--primer item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div>
	    				<img src="/img/Niño-moliendo.jpg" class="img-car img-r">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">CAMINO</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">La mayoría de nuestros Maestros aprenden el oficio desde la niñez. Las primeras tareas en una fábrica de Mezcal es acompañar y colaborar con la familia en pequeños trabajos como, cuidar el llenado de los cantaros, arrear al caballo, cuidar el calentamiento de las ollas, cuidar de los magueyes del vivero, cortar espinas de maguey, etc.</p>
	    					<p class="body-carousel">Es así, como de forma empírica, se adquieren las bases para cultivar y producir un buen Mezcal, y mediante la experiencia, buscan alcanzar el título de Maestr@ Mezcalero.</p>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
			<!--primer item-->

			<!--segundo item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div>
	    				<img class="img-car img-r img-car-hor" src="/img/Destapando.jpg" alt="Generic placeholder image">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">HABILIDAD</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">
	    						Las habilidades que l&#64;s Maestr@s tienen, son a partir de los conocimientos que en el transcurso de su vida van adquiriendo. </p>
	    						<p class="body-carousel">Como (por ejemplo): El punto adecuado del calentamiento de un horno para comenzar a ingresar Maguey, otro punto muy importante es conocer el momento exacto en el que una tina de fermentación está lista, y los  tiempos para la segunda destilación (separación del corazón o cuerpo de las colas).
	    					</p>
	    				</div>
	    			</div>
	    		</div>
			</div>
			<!--segundo item-->

			<!--tercer item-->
	    	<div>
	    		<div class="text-and-img-c">
	    			<div>
	    				<img class="img-car img-r" src="/img/pareja.jpg" alt="Generic placeholder image">
	    			</div>
	    			<div class="bg-text">
	    				<div class="btn-expand open"></div>
	    				<div>
	    					<h5 class="title-carousel">CARMELA MOLINA E IGNACIO MARTÍNEZ</h5>
	    				</div>
	    				<div class="parrafos">
	    					<p class="body-carousel">Desde el fallecimiento de Don Ignacio Mtz. Hernández, Don Ignacio (2.ª generación) y Doña Carmela comenzaron esta grandiosa experiencia de continuar con el legado familiar, cultivando, produciendo y comercializando un Mezcal Familiar.</p>
	    					<p class="body-carousel">Sus enseñanzas han forjado a que sus hijos amen y conserven la tradición Mezcalera.</p>
	    				</div>
	    			</div>
	    		</div>
			</div>
			<!--tercer item-->
		</div>
	</div>
	</div>
	<!-- fin Cuarto carousel-->
	

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
			<p><a href="/historia">Historia & Equipo</a></p>
		</div>
		<div class="next-fondo" style="background-image: url('/img/Campo-Hisashi.jpg');"></div>
	</div>
	<!--next section-->

@endsection

@section('scripts')
<script type="text/javascript">
	$(function() {
		var alto = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
		var val_fade = 500;
		if(alto< 450){
			console.log("ltura es: "+alto);
			return;
		}
		var documentEl = $(document), 
		fadeElem = $('.fade-scroll');
		documentEl.on('scroll', function() {
			var currScrollPos = documentEl.scrollTop();

			fadeElem.each(function() {
				var $this = $(this),
				elemOffsetTop = $this.offset().top;
				if (currScrollPos > elemOffsetTop) 
					$this.css('opacity', 1 - (currScrollPos-elemOffsetTop)/500);
			}); 
		});
	});
</script>
<script type="text/javascript" src="css/slick/slick.min.js"></script>
<script>
	var ancho2 = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
 	if(ancho2<760){
 		var texto = document.getElementsByClassName("bg-text");
 		var i;
	 	var parrafo;
	 	var div_p;
	 	var btn_open;
	 	for (i = 0; i < texto.length; i++) {
	 		/*var img = texto[i].nextElementSibling;
	 		if(img === null)
	 			img = texto[i].previousElementSibling;

	 		img= img.firstElementChild;
	 		var img_widht = img.clientWidth;
	 		console.log("img widt:"+img_widht);
	 		console.log("img height:"+img.clientHeight);
	 		console.log("label: "+img.nodeName);

	 		if(img_widht>img.clientHeight)
	 			img.style.marginLeft = ""+(-1*(img_widht-ancho2)/2)+"px";

	 		*/

	 		texto[i].addEventListener("click", function() {
	 			/*this.classList.toggle("bg-text-v");*/
	 			div_p = this.lastElementChild;
	 			parrafo = div_p.children;
	 			//console.log("numero de parrafos = "+ parrafo.length);
	 			var altura = 0;
	 			var j;
	 			for (j = 0; j < parrafo.length; j++ ) {
	 				altura += parrafo[j].offsetHeight;
	 				console.log("altura de parrafo = "+ parrafo[j].offsetHeight);
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
 <script type="text/javascript">
 	$(document).ready(function(){
 		$('.carousel-items').slick({
 			dots: true,
 			infinite: true,
 			speed: 900,
 			fade: true,
 			arrows: false,
 			cssEase: 'linear'
 		});
 	});
 </script>
@endsection

