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
  <div class="bg-image container-image fade-scroll" style="background-color: black; height: 100vh;">
    <!--<div class="centered" style="top: 50%;">Campos de Maguey</div>-->
    <div class="bg-img" style="background-image: url('/img/Campo maguey cielo.jpg'); opacity: 0.7;"></div>
  </div>
  <!--encabezado-->

  <!-- texto -->
  <div class="texto">
    <p>
      En una ocasión preguntábamos al Maestro Ignacio Mtz. ¿Qué se necesitaba para hacer un buen Mezcal?, el sabiamente nos respondió:
    </p>
    <p><i> -Hagamos un ejemplo. Hablemos de la cocina, ¿sabes qué se necesita para que una salsa este bien rica?</i></p>
    <p><i>Primero: ¡FUNDAMENTAL! Un buen tomate. ¿Qué significa eso? Que el cociner@ debe conocer su materia prima, su jitomate, chile y cebolla. Sus ingredientes deben ser de calidad, de buena tierra, bien cuidados, maduros (ni verdes, ni demasiado rojos) CONOCER SU ORIGEN.</i></p>
    <p><i>Segundo: ¡AMOR! La sazón es el cariño con el que se hacen las cosas.</i></p> 
    <p><i>Además, ¡RESPETO!: el tiempo para esperar un buen tomate, el tiempo para elaborarlo, es saber respetar cada proceso, cada elemento.</i></p>
    <p><i>Entonces aplicándolo al MEZCAL, lo primero sería un buen Maguey. Maduro, de buena tierra, que sepas que se ha cultivado con dedicación, que conozcas su origen, saber si el Maguey se reprodujo por hijuelo, quiote o semilla (por polinización), de que zona viene, que tipo de tierra, quién lo cultivo, de qué manera fue tratado;  y lo segundo: Amor, querer lo que hacemos es lo que nos caracteriza, aquí las cosas se hacen con cariño.</i></p>
    <p><i>La Dedicación es saber esperar, el Mezcal y Maguey son tan nobles que si tú respetas sus tiempos ellos sabrán compensarte en espíritu.</i></p>
    <p><i>Prueba el Mezcal y notarás el maguey, notarás el cariño y también notaras el respeto (un mezcal nos trata como uno lo trata).</i></p>
  </div>
  <!-- texto -->

  <h3>NUESTROS CAMPOS DE MAGUEY</h3>

  <div class="texto" style="margin-top: 1.5rem; margin-bottom: 1.5rem;"><p>Referenciamos nuestras zonas por la familia con quien colaboramos:</p></div>

  <!--primer corousel-->
  <div class="env">
  <div class="carousel-container">
    <h2 class="carousel-title text-center">FAM ARAGÓN</h2>
    <div class="carousel-items">
      <!-- primer item-->
      <div>
        <div class="text-and-img-c">
          <div class="bg-text">
            <div class="btn-expand open"></div>
            <div>
              <h5 class="title-carousel">SANTA ANA TAVELA</h5>
            </div>
            <div class="parrafos">
              <ul>
                <li><strong>Altura:</strong> 700 m s. n. m.</li>
                <li><strong>Ubicación:</strong> LN 16°39' LO 95°55'</li>
              </ul>
            </div>
          </div>
          <div class="img-l">
            <img class="img-car" src="/img/Paisaje-con-burro.jpg" alt="Generic placeholder image">
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
              <h5 class="title-carousel">SANTA ANA TAVELA</h5>
            </div>
            <div class="parrafos">
              <ul>
                <li><strong>Clima:</strong> Cálido templado.</li>
                <li><strong>Tipo de tierra:</strong> Robisol eútrico.</li>
              </ul>
            </div>
          </div>
          <div class="img-l" name="div-img-hor">
            <img class="img-car img-car-hor" src="/img/campo-tavela.jpg" alt="Generic placeholder image">
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
              <h5 class="title-carousel">SANTA ANA TAVELA</h5>
            </div>
            <div class="parrafos">
              <ul>
                <li><strong>Maestro magueyero:</strong> Gregorio Aragón.</li>
                <li><strong>Forma de reproducción:</strong> Hijuelo.</li>
                <li><strong>Tipo de agave:</strong> Espadín.</li>
              </ul>
            </div>
          </div>
          <div class="img-l" name="div-img-hor">
            <img class="img-car img-car-hor" src="/img/campo-tavela2.jpg" alt="Generic placeholder image">
          </div>
        </div>
      </div>
      <!--TERCER item-->

    </div><!-- fin carousel items-->    
  </div>
  </div>
  <!--fin primer corousel-->

  <hr style="margin: 0 auto; width: 65%; border-top-width:2px;">

  <!--segundo corousel-->
  <div class="env">
  <div class="carousel-container">
    <h2 class="carousel-title text-center">FAM MARTÍNEZ</h2>
    <div class="carousel-items">
      <!-- primer item-->
      <div>
        <div class="text-and-img-c">
          <div class="bg-text">
            <div class="btn-expand open"></div>
            <div>
              <h5 class="title-carousel">SAN DIONICIO OCOTEPEC</h5>
            </div>
            <div class="parrafos">
              <ul>
                <li><strong>Altura:</strong>  1679 m s. n. m.</li>
                <li><strong>Ubicación:</strong>  16°48' LN y 96°24' LO</li>
              </ul>
            </div>
          </div>
          <div class="img-l" name="div-img-hor">
            <img class="img-car img-car-hor" src="/img/campos-agave/agave2.jpg" alt="Generic placeholder image">
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
              <h5 class="title-carousel">SAN DIONICIO OCOTEPEC</h5>
            </div>
            <div class="parrafos">
              <ul>
                <li><strong>Clima:</strong> Templado.</li>
                <li><strong>Tipo de tierra:</strong> Cambisol cálcico.</li>
              </ul>
            </div>
          </div>
          <div class="img-l" name="div-img-hor">
            <img class="img-car img-car-hor" src="/img/campos-agave.jpg" alt="Generic placeholder image">
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
              <h5 class="title-carousel">SAN DIONICIO OCOTEPEC</h5>
            </div>
            <div class="parrafos">
              <ul>
                <li><strong>Maestro magueyero:</strong> Ignacio Martínez.</li>
                <li><strong>Forma de reproducción:</strong> Apomixis, Hijuelo, Semilla.</li>
                <li><strong>Tipo de agave:</strong> Espadín.</li>
              </ul>
            </div>
          </div>
          <div class="img-l" name="div-img-hor">
            <img class="img-car img-car-hor" src="/img/campos-agave-2.jpg" alt="Generic placeholder image">
          </div>
        </div>
      </div>
      <!--TERCER item-->
    </div><!-- fin carousel items-->    
  </div>
  </div>

  <!--fin segundo corousel-->

  <hr style="margin: 0 auto; width: 65%; border-top-width:2px;">

  
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
  </div>
  <!-- cita -->

  <!--next section-->
	<div class="next" style="background-color: black;">
		<div class="next-text">
			<p>SIGUIENTE</p>
			<p><a href="/certificaciones">Certificaciones</a></p>
		</div>
    <div class="next-fondo" style="background-image: url('/img/portada-certificaciones.jpg'); opacity: 0.5;"></div>
	</div>
	<!--next section-->
@endsection


@section('scripts')
<!--change navbar bg color-->
<script type="text/javascript">
  $(window).scroll(function(){
    var alto = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
    $("nav").toggleClass('scrolled', $(this).scrollTop()>alto/2);
    $('.dropdown-content').toggleClass('scrolled', $(this).scrollTop()>alto/2);
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
  arrows: false
});
});

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
  
@endsection