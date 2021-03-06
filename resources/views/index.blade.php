@extends('layouts.plantilla')

@section('title')
	Casa Martínez
@endsection

@section('stylesheet')
<link href="css/custom/main.css" rel="stylesheet" type="text/css" />
@endsection

@section('id-container')
  id="wh-bg"
@endsection

@section('content')
	<header id=head> 
  <!--Carrusel-->
  <div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image: url('/img/bendecir-mezcal.jpg')">
      	<div class="bottomright text-portada">
      		<p><em>“...los dioses dijeron entre sí: “He aquí que el hombre estará aína triste si no le hacemos nosotros algo para regocijarle y a fin de que tome gusto en vivir en la tierra y nos alabe y cante y dance.”</em></p>
      		<p><span>[Historia de México (Histoire du Mechique)]</span></p>
      	</div>
      </div>
      <div class="carousel-item" style="background-image: url('/img/campo-agaves.jpg');">
        <div class="bottomright text-portada">
      		<p><em>“...los dioses dijeron entre sí: “He aquí que el hombre estará aína triste si no le hacemos nosotros algo para regocijarle y a fin de que tome gusto en vivir en la tierra y nos alabe y cante y dance.”</em></p>
          <p><span>[Historia de México (Histoire du Mechique)]</span></p>
      	</div>
      </div>
      <div class="carousel-item" style="background-image: url('/img/pencas-maguey.jpg');">
        <div class="bottomright text-portada">
      		<p><em>“...los dioses dijeron entre sí: “He aquí que el hombre estará aína triste si no le hacemos nosotros algo para regocijarle y a fin de que tome gusto en vivir en la tierra y nos alabe y cante y dance.”</em></p>
          <p><span>[Historia de México (Histoire du Mechique)]</span></p>
      	</div>
      </div>
    </div>
  </div>
  <!--Fin Carrusel-->
</header>

  <!--primer parrafo-->
  <div class="container align-items-center mt-md-5 pt-4 pt-md-4 px-4 ">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6">
        <p class="text-home"><i>“El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.”</i>
        </p>
      </div>
    </div>
    <div class="row justify-content-center mt-md-4">
      <div class="col-12 col-md-6 div-img">
        <img src="/img/campo-agave-2.jpg" class="img-vertical d-block mx-auto mt-3">
      </div>
    </div>
  </div>
  <!--primer parrafo-->

  <!--segundo parrafp-->
  <div class="text-and-img">
    <div id="atr">
      <h5 class="header-parrafo align-text"><a href="/filosofia">FILOSOFÍA</a></h5>
      <p class="text-home align-text">Cuando era niño siempre me preguntaba, ¿cuál era mi misión en este mundo? Crecí, migré, volví y forme una familia y en ese transcurso aprendí que lo más valioso que tengo es la herencia que mis padres me han dejado y que hoy comparto con mis hijos y con el mundo,<br>¡HACER MEZCAL!.</p>
      <p class="text-home align-text"><span><a href="/filosofia" id="atra">-Leer más...</a></span></p>
    </div>

    <div class="div-img">
      <img class="img-vertical" src="/img/foto-maestro-mezcalero.jpg" alt="">
    </div>
  </div>
  <!--segundo parrafo-->

  <div class="text-and-img">
    <div class="div-img">
        <img src="/img/Campo-Hisashi.jpg" class="img-horizontal">
    </div>
    <div>
      <h5 class="header-parrafo"><a href="/historia">HISTORIA, COLABORADORES</a></h5>
      <p class="text-home">
        El origen de nuestro Mezcal comienza  en 1942, por Don Ignacio Martínez Hernández †, en la Ranchería  “Las Carretas” ubicada en el Municipio de San Dionisio Ocotepec, Estado de Oaxaca.
      </p>
      <p class="text-home">
        En la actualidad nuestros Maestros, Ignacio Martínez, Carmela Molina, Alejandro Morales, Gregorio Aragón son quienes en Mezcal y Maguey nos comparten sus vidas transformadas en extraordinarias experiencias que se disfrutan con Mezcal en Mano.
      </p>
      <p class="text-home"><span><a href="/historia">-Leer más...</a></span></p>
    </div>
  </div>

  <div class="div-products" style="background-image: url(/img/tobala.jpg); background-position: center;">
    <div style="width: 100%; height: auto; background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0)) !important;" class="m-0 py-3">
      <h2 class="title-bebidas text-center pt-2 pt-md-3"><a href="/productos">NUESTROS PRODUCTOS</a></h2>
      <p class="text-center text-home">Cada ruta que tomamos lleva implícita una botella de mezcal.</p>
    </div>

    <div class="img-hover-zoom--slowmo">
      <a href="/productos" title="Mezcal SiNái"><img class="img-bebidas img-circle" src="/img/SINAI_bird2019.jpg" alt="Logo Mezcal Sinái"></a>
    </div>

    <div class="img-hover-zoom--slowmo">
      <a href="/productos" title="Ignacio Martínez"><img class="img-bebidas img-circle" src="/img/logo-casa-martinez-sq.jpg" alt="Logo Casa Martínez"></a>
    </div>
    
    <div class="img-hover-zoom--slowmo">
      <a href="/productos" title="Habitente"> <img class="img-bebidas img-circle" src="/img/logo-casa-martinez-sq.jpg" alt="Logo Casa Martínez"> </a>
    </div>
    
    <div class="img-hover-zoom--slowmo">
      <a href="/productos" title="Origen Verde"><img class="img-bebidas img-circle" src="/img/logo-casa-martinez-sq.jpg" alt="Logo Casa Martínez"></a>
    </div>
    
    <div style="width: 100%; height: auto;">
      <p class="text-center text-home"><a href="/tienda" class="p-2 px-3 btn" style="font-size: 1.1rem; background-color: rgba(0,0,0, 0.5);">Ver todos los productos</a></p>
      <br>
    </div>
  </div>

@endsection

@section('scripts')
<!--change navbar bg color-->
<script type="text/javascript">
   $(window).scroll(function(){
    var alto = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
    var ancho = screen.width;
    var portada;
    if(ancho <= 760){
      portada = (alto * 70)/100;
    }else if(ancho > 760 && ancho < 992){
      portada = alto/2;
    }else{
      portada = alto;
    }
    $("nav").toggleClass('scrolled', $(this).scrollTop()>portada);
    $('.dropdown-content').toggleClass('scrolled', $(this).scrollTop()>portada);
  });
</script>
@endsection