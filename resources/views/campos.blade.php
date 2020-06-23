@extends('layouts.plantilla')

@section('title')
	Campos de Maguey
@endsection

@section('stylesheet')
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

        <!-- primer corousel-->
        <div id="slider-1" class="carousel slide carousel-fade mt-0" data-ride="carousel" data-interval="7000">
          <h2 class="carousel-title text-center  mb-0">SAN DIONICIO OCOTEPEC</h2>
          <ol class="carousel-indicators mt-0">
              <li style="background-color: #8F8F8F !important;" data-target="#slider-1" data-slide-to="0" class="active"></li>
              <li style="background-color: #8F8F8F !important;" data-target="#slider-1" data-slide-to="1"></li>
              <li style="background-color: #8F8F8F !important;" data-target="#slider-1" data-slide-to="2"></li>
          </ol>
            <div class="carousel-inner">
              <!--primer item-->
              <div class="carousel-item div-carousel active">
                <div class="container col-7 mb-0">
                  <div class="row justify-content-md-center">
                    <div class="media mt-5">
                      <div class="media-body align-self-center mt-0">
                        <h5 class="mr-5 title-carousel">UBICACIÓN</h5>
                        <p class="body-carousel mr-5">Ubicado en la región de Valles Centrales del estado de Oaxaca a 65 kilómetros de la ciudad capital y es perteneciente al distrito de Tlacolula. Se encuentra entre las coordenadas 16°47'N y 96°23'47.9"W, a una altura de 1,695 m s.n.m..</p>
                      </div>
                      <img class="ml-3 img-car" src="img/campos-agave/agave1.jpg" alt="Generic placeholder image">
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
                        <h5 class="mr-5 title-carousel">TIPO DE MAGUEY</h5>
                        <p class="body-carousel mr-5">Colinda al norte con los municipios de Santiago Matatlán y Tlacolula de Matamoros; al sur con San Pedro Totolapa; al oeste con San Baltazar Chichicapam y Yaxe, Distrito de Ocotlán; y al este con San Pedro Quiatoni.</p>
                      </div>
                      <img class="ml-3 img-car" src="img/campos-agave/agave2.jpg" alt="Generic placeholder image">
                    </div>
                  </div> 
                </div>
              </div>
              <!--segundo item-->
              <!--tercer item-->
              <div class="carousel-item div-carousel">
                <div class="container col-7 mb-0">
                  <div class="row justify-content-md-center"><div class="media mt-5">
                        <div class="media-body align-self-center">
                          <h5 class="mr-5 title-carousel">EDAD</h5>
                          <p class="body-carousel mr-5">Los cerros más altos que se ubican dentro del territorio del municipio se llaman: cerro de la Cruz y cerro del Cantarito. Su topografía combina pequeños lomeríos con terrenos planos, además esta rodeado de diversos cerros.</p>
                        </div>
                        <img class="ml-3 img-car" src="img/campos-agave/agave3.jpg" alt="Generic placeholder image">
                    </div>
                </div> 
              </div>
            </div>
            <!--tercer item-->
          </div>
        </div><!-- fin primer corousel-->

        <hr style="margin-top: 80px; width: 65%;">

        <!-- segundo corousel-->
      <div id="slider-2" class="carousel slide carousel-fade mt-5 fade-scroll" data-ride="carousel" data-interval="7000">
        <h2 class="carousel-title text-center mt-5 mb-0">SAN ANDRÉS HUAYAPAM</h2>
        <ol class="carousel-indicators mt-0">
            <li style="background-color: #8F8F8F !important;" data-target="#slider-2" data-slide-to="0" class="active"></li>
            <li style="background-color: #8F8F8F !important;" data-target="#slider-2" data-slide-to="1"></li>
            <li style="background-color: #8F8F8F !important;" data-target="#slider-2" data-slide-to="2"></li>
        </ol>
          <div class="carousel-inner">
            <!--primer item-->
            <div class="carousel-item div-carousel active">
                <div class="container col-7 mb-0">
                  <div class="row justify-content-md-center">
                    <div class="media mt-5">
                      <img class="mr-4 img-car" src="img/campos-agave/agave2.jpg" alt="Generic placeholder image">
                      <div class="media-body align-self-center mt-0">
                        <h5 class="ml-5 title-carousel">SAN ANDRÉS HUAYAPAM</h5>
                        <p class="body-carousel ml-5">Ubicado en la región de Valles Centrales del estado de Oaxaca a 65 kilómetros de la ciudad capital y es perteneciente al distrito de Tlacolula. Se encuentra entre las coordenadas 16°47'N y 96°23'47.9"W, a una altura de 1,695 m s.n.m..</p>
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
                      <img class="mr-4 img-car" src="img/campos-agave/agave3.jpg" alt="Generic placeholder image">
                      <div class="media-body align-self-center">
                        <p class="body-carousel ml-5">Colinda al norte con los municipios de Santiago Matatlán y Tlacolula de Matamoros; al sur con San Pedro Totolapa; al oeste con San Baltazar Chichicapam y Yaxe, Distrito de Ocotlán; y al este con San Pedro Quiatoni.</p>
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
                      <img class="mr-4 img-car" src="img/campos-agave/agave4.jpg" alt="Generic placeholder image">
                      <div class="media-body align-self-center">
                        <p class="body-carousel ml-5">Los cerros más altos que se ubican dentro del territorio del municipio se llaman: cerro de la Cruz y cerro del Cantarito. Su topografía combina pequeños lomeríos con terrenos planos, además esta rodeado de diversos cerros.</p>
                      </div>
                  </div>
              </div> 
            </div>
          </div>
          <!--tercer item-->
        </div>
      </div><!-- fin segundo corousel-->

      <hr style="margin-top: 80px; width: 65%;">

      <!-- tercer corousel-->
        <div id="slider-1" class="carousel slide carousel-fade mt-5" data-ride="carousel" data-interval="7000">
          <h2 class="carousel-title text-center mt-5 mb-0">SAN MIGUEL GUELACHE</h2>
          <ol class="carousel-indicators mt-0">
              <li style="background-color: #8F8F8F !important;" data-target="#slider-1" data-slide-to="0" class="active"></li>
              <li style="background-color: #8F8F8F !important;" data-target="#slider-1" data-slide-to="1"></li>
              <li style="background-color: #8F8F8F !important;" data-target="#slider-1" data-slide-to="2"></li>
          </ol>
            <div class="carousel-inner">
              <!--primer item-->
              <div class="carousel-item div-carousel active">
                <div class="container col-7 mb-0">
                  <div class="row justify-content-md-center">
                    <div class="media mt-5">
                      <div class="media-body align-self-center mt-0">
                        <h5 class="mr-5 title-carousel">SAN MIGUEL GUELACHE</h5>
                        <p class="body-carousel mr-5">Ubicado en la región de Valles Centrales del estado de Oaxaca a 65 kilómetros de la ciudad capital y es perteneciente al distrito de Tlacolula. Se encuentra entre las coordenadas 16°47'N y 96°23'47.9"W, a una altura de 1,695 m s.n.m..</p>
                      </div>
                      <img class="ml-3 img-car" src="img/campos-agave/agave1.jpg" alt="Generic placeholder image">
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
                        <p class="body-carousel mr-5">Colinda al norte con los municipios de Santiago Matatlán y Tlacolula de Matamoros; al sur con San Pedro Totolapa; al oeste con San Baltazar Chichicapam y Yaxe, Distrito de Ocotlán; y al este con San Pedro Quiatoni.</p>
                      </div>
                      <img class="ml-3 img-car" src="img/campos-agave/agave2.jpg" alt="Generic placeholder image">
                    </div>
                  </div> 
                </div>
              </div>
              <!--segundo item-->
              <!--tercer item-->
              <div class="carousel-item div-carousel">
                <div class="container col-7 mb-0">
                  <div class="row justify-content-md-center"><div class="media mt-5">
                        <div class="media-body align-self-center">
                          <p class="body-carousel mr-5">Los cerros más altos que se ubican dentro del territorio del municipio se llaman: cerro de la Cruz y cerro del Cantarito. Su topografía combina pequeños lomeríos con terrenos planos, además esta rodeado de diversos cerros.</p>
                        </div>
                        <img class="ml-3 img-car" src="img/campos-agave/agave3.jpg" alt="Generic placeholder image">
                    </div>
                </div> 
              </div>
            </div>
            <!--tercer item-->
          </div>
        </div><!-- fin tercer corousel-->

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
@endsection