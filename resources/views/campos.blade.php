@extends('layouts.plantilla')

@section('title')
	Campos de Maguey
@endsection

@section('stylesheet')
<link rel="stylesheet" type="text/css" href="css/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css"/>
<link href="css/custom/campos.css" rel="stylesheet" type="text/css" />
@endsection

@section('id-container')
  id="wh-bg"
@endsection

@section('content')

  <!--encabezado-->
  <div class="bg-image container-image fade-scroll" style="background-color: black; height: 50vh; font-weight: 500;">
    <div class="centered" style="top: 50%;">Campos de Maguey</div>
    <div class="bg-img" style="background-image: url('/img/campos-agave2.jpg'); opacity: 0.7;"></div>
  </div>
  <!--encabezado-->

  <!-- texto -->
  <div class="texto">
    <p>
      George Nakashima descubrió la ladera orientada al sur a lo largo de Aquetong Road en 1945 y persuadió al propietario para que le permitiera comprar tres acres de tierra a cambio de mano de obra. A medida que su negocio creció, compró dos parcelas más de tierra y construyó una docena de edificios más, todos orientados hacia el sur para maximizar la ganancia solar pasiva.
    </p>
  </div>
  <!-- texto -->

  <h3>NUESTROS CAMPOS DE MAGUEY</h3>

  <!--primer corousel-->
  <div class="carousel-container fade-scroll">
    <h2 class="carousel-title text-center">SAN DIONICIO OCOTEPEC</h2>
    <div class="carousel-items">
      <!-- primer item-->
      <div>
        <div class="text-and-img-c">
          <div class="bg-text">
            <div class="btn-expand open"></div>
            <div>
              <h5 class="title-carousel">UBICACIÓN</h5>
            </div>
            <div class="parrafos">
              <p class="body-carousel">Ubicado en la región de Valles Centrales del estado de Oaxaca a 65 kilómetros de la ciudad capital y es perteneciente al distrito de Tlacolula. Se encuentra entre las coordenadas 16°47'N y 96°23'47.9"W, a una altura de 1,695 m s.n.m..</p>
            </div>
          </div>
          <div class="img-l">
            <img class="img-car" src="img/campos-agave/agave1.jpg" alt="Generic placeholder image">
          </div>
        </div>
      </div>
      <!--primer item-->

      <!--SEGUNDO item-->
      <div>
        <div class="text-and-img-c">
          <div class="bg-text">
            <div class="btn-expand open"></div>
            <div>
              <h5 class="title-carousel">TIPO DE MAGUEY</h5>
            </div>
            <div class="parrafos">
              <p class="body-carousel">Colinda al norte con los municipios de Santiago Matatlán y Tlacolula de Matamoros; al sur con San Pedro Totolapa; al oeste con San Baltazar Chichicapam y Yaxe, Distrito de Ocotlán; y al este con San Pedro Quiatoni.</p>
            </div>
          </div>
          <div class="img-l">
            <img class="img-car" src="img/campos-agave/agave2.jpg" alt="Generic placeholder image">
          </div>
        </div>
      </div>
      <!--SEGUNDO item-->

      <!--TERCER item-->
      <div>
        <div class="text-and-img-c">
          <div class="bg-text">
            <div class="btn-expand open"></div>
            <div>
              <h5 class="title-carousel">EDAD</h5>
            </div>
            <div class="parrafos">
              <p class="body-carousel">Los cerros más altos que se ubican dentro del territorio del municipio se llaman: cerro de la Cruz y cerro del Cantarito. Su topografía combina pequeños lomeríos con terrenos planos, además esta rodeado de diversos cerros.</p>
            </div>
          </div>
          <div class="img-l">
            <img class="img-car" src="img/campos-agave/agave3.jpg" alt="Generic placeholder image">
          </div>
        </div>
      </div>
      <!--TERCER item-->

    </div><!-- fin carousel items-->    
  </div>
  <!--fin primer corousel-->

  <hr style="margin: 80px 0; width: 65%;">

  <!--segundo corousel-->
  <div class="carousel-container fade-scroll">
    <h2 class="carousel-title text-center">SAN MIGUEL GUELACHE</h2>
    <div class="carousel-items">
      <!--primer item-->
        <div>
          <div class="text-and-img-c">
            <div>
              <img src="/img/campos-agave/agave1.jpg" class="img-car img-r">
            </div>
            <div class="bg-text">
              <div class="btn-expand open"></div>
              <div>
                <h5 class="title-carousel">UBICACIÓN</h5>
              </div>
              <div class="parrafos">
                <p class="body-carousel">Ubicado en la región de Valles Centrales del estado de Oaxaca a 65 kilómetros de la ciudad capital y es perteneciente al distrito de Tlacolula. Se encuentra entre las coordenadas 16°47'N y 96°23'47.9"W, a una altura de 1,695 m s.n.m..</p>
              </div>
            </div>
          </div>
        </div>
      <!--primer item-->

      <!--segundo item-->
        <div>
          <div class="text-and-img-c">
            <div>
              <img src="/img/campos-agave/agave2.jpg" class="img-car img-r">
            </div>
            <div class="bg-text">
              <div class="btn-expand open"></div>
              <div>
                <h5 class="title-carousel">TIPO DE MAGUEY</h5>
              </div>
              <div class="parrafos">
                <p class="body-carousel">Ubicado en la región de Valles Centrales del estado de Oaxaca a 65 kilómetros de la ciudad capital y es perteneciente al distrito de Tlacolula. Se encuentra entre las coordenadas 16°47'N y 96°23'47.9"W, a una altura de 1,695 m s.n.m..</p>
              </div>
            </div>
          </div>
        </div>
      <!--segundo item-->

      <!--tercer item-->
        <div>
          <div class="text-and-img-c">
            <div>
              <img src="/img/campos-agave/agave3.jpg" class="img-car img-r">
            </div>
            <div class="bg-text">
              <div class="btn-expand open"></div>
              <div>
                <h5 class="title-carousel">EDAD</h5>
              </div>
              <div class="parrafos">
                <p class="body-carousel">Ubicado en la región de Valles Centrales del estado de Oaxaca a 65 kilómetros de la ciudad capital y es perteneciente al distrito de Tlacolula. Se encuentra entre las coordenadas 16°47'N y 96°23'47.9"W, a una altura de 1,695 m s.n.m..</p>
              </div>
            </div>
          </div>
        </div>
      <!--tercer item-->
    </div><!-- fin carousel items-->    
  </div>
  <!--fin segundo corousel-->

  <hr style="margin-top: 80px; width: 65%;">

  <!--tercer corousel-->
  <div class="carousel-container fade-scroll">
    <h2 class="carousel-title text-center">SAN ANDRES HUAYAPAM</h2>
    <div class="carousel-items">
      <!-- primer item-->
      <div>
        <div class="text-and-img-c">
          <div class="bg-text">
            <div class="btn-expand open"></div>
            <div>
              <h5 class="title-carousel">UBICACIÓN</h5>
            </div>
            <div class="parrafos">
              <p class="body-carousel">Ubicado en la región de Valles Centrales del estado de Oaxaca a 65 kilómetros de la ciudad capital y es perteneciente al distrito de Tlacolula. Se encuentra entre las coordenadas 16°47'N y 96°23'47.9"W, a una altura de 1,695 m s.n.m..</p>
            </div>
          </div>
          <div class="img-l">
            <img class="img-car" src="img/campos-agave/agave1.jpg" alt="Generic placeholder image">
          </div>
        </div>
      </div>
      <!--primer item-->

      <!--SEGUNDO item-->
      <div>
        <div class="text-and-img-c">
          <div class="bg-text">
            <div class="btn-expand open"></div>
            <div>
              <h5 class="title-carousel">TIPO DE MAGUEY</h5>
            </div>
            <div class="parrafos">
              <p class="body-carousel">Colinda al norte con los municipios de Santiago Matatlán y Tlacolula de Matamoros; al sur con San Pedro Totolapa; al oeste con San Baltazar Chichicapam y Yaxe, Distrito de Ocotlán; y al este con San Pedro Quiatoni.</p>
            </div>
          </div>
          <div class="img-l">
            <img class="img-car" src="img/campos-agave/agave2.jpg" alt="Generic placeholder image">
          </div>
        </div>
      </div>
      <!--SEGUNDO item-->

      <!--TERCER item-->
      <div>
        <div class="text-and-img-c">
          <div class="bg-text">
            <div class="btn-expand open"></div>
            <div>
              <h5 class="title-carousel">EDAD</h5>
            </div>
            <div class="parrafos">
              <p class="body-carousel">Los cerros más altos que se ubican dentro del territorio del municipio se llaman: cerro de la Cruz y cerro del Cantarito. Su topografía combina pequeños lomeríos con terrenos planos, además esta rodeado de diversos cerros.</p>
            </div>
          </div>
          <div class="img-l">
            <img class="img-car" src="img/campos-agave/agave3.jpg" alt="Generic placeholder image">
          </div>
        </div>
      </div>
      <!--TERCER item-->

    </div><!-- fin carousel items-->    
  </div>
  <!--fin tercer corousel-->

  <hr style="margin-top: 80px; width: 65%;">

  <div class="cita">
    <center>
      <a href="mailto:info@casamartinez.mx?subject=Agendar%20una%20visita%20al%20palenque." class="body-carousel" style="color: #212529; text-decoration: underline;">Agenda una visita al palenque</a>
    </center>
  </div>

  <!-- cita -->
  <div class="block-cita">
    <blockquote>
      <p class="text-cita">“Compartir experiencias con nuestros clientes y amigos, nos permite comunicar el trabajo que la familia Martínez ha estado realizando por generaciones. ”</p>
    </blockquote>
    <p class="ref-cita">-Alguien Martínez</p>
  </div>
  <!-- cita -->

  <!--next section-->
	<div class="next" style="background-color: black;">
		<div class="next-text">
			<p>SIGUIENTE</p>
			<p><a href="/certificaciones">Certificaciones</a></p>
		</div>
    <div class="next-fondo" style="background-image: url('/img/certificaciones.jpg'); opacity: 0.5;"></div>
	</div>
	<!--next section-->
@endsection


@section('scripts')
<!--change navbar bg color-->
<script type="text/javascript">
  $(window).scroll(function(){
    var alto = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
    $("nav").toggleClass('scrolled', $(this).scrollTop()>alto/2);
  });
</script>

<script type="text/javascript" src="css/slick/slick.min.js"></script>
<script>
      
$(document).ready(function(){

$('.carousel-items').slick({
  dots: true,
  infinite: true,
  speed: 900,
  fade: true,
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
  
 </script>
@endsection