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
      <div class="carousel-item active" style="background-image: url('img/agave2.jpg')">
      	<div class="bottomright text-portada">
      		<p>“Mezcal proviene de la estructura náhuatl de la palabra Mezcal: 'Metl' que significa Maguey, en yuxtaposición con la palabra 'Ixcalli' que quiere decir cocido, la traducción formal debería ser 'Maguey Cocido”</p>
      		<p><span>-Alguien Martínez</span></p>
      	</div>
      </div>
      <div class="carousel-item" style="background-image: url('img/maestro3.jpg');">
        <div class="bottomright text-portada">
      		<p>“Tenemos claro que es nuestra responsabilidad el cuidado de la tierra y el agave”</p>
      		<p><span>-Alguien Martínez</span></p>
      	</div>
      </div>
      <div class="carousel-item" style="background-image: url('img/molienda3.jpg');">
        <div class="bottomright text-portada">
      		<p>“Involucrarse en cada detalle, puede hacer la diferencia en todo. ”</p>
      		<p><span>-Alguien Martínez</span></p>
      	</div>
      </div>
    </div>
  </div>
  <!--Fin Carrusel-->
</header>

  <!--primer parrafo-->
  <div class="text-and-img">
    <div class="div-img">
        <img src="/img/histori.jpg" class="img-vertical">
    </div>
    <div>
      <p class="text-home"><i>“El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.”</i>
      </p>
      <p class="text-home">-Alguien Martínez</p>
    </div>
  </div>
  <!--primer parrafo-->

  <!--segundo parrafp-->
  <div class="text-and-img">
    <div id="atr">
      <h5 class="header-parrafo align-text"><a href="/filosofía">FILOSOFÍA</a></h5>
      <p class="text-home align-text">Nuestra filosofía empieza con nuestro amor a nuestras raíces buscando siempre cuidar a la tierra, su ecosistema y a las personas que la trabajan. </p>
      <p class="text-home align-text"><span><a href="/filosofia" id="atra">-Leer más...</a></span></p>
    </div>

    <div class="div-img">
      <img class="img-horizontal" src="img/maguey.jpeg" alt="Generic placeholder image">
    </div>
  </div>
  <!--segundo parrafo-->

  <div class="text-and-img">
    <div class="div-img">
        <img src="/img/corazon-maguey3.jpg" class="img-vertical">
    </div>
    <div>
      <h5 class="header-parrafo"><a href="/historia">HISTORIA, COLABORADORES</a></h5>
      <p class="text-home">La increíble historia sobre la familia Martínez y todo el equipo de trabajo detrás de nuestras bebidas.</p>
      <p class="text-home"><span><a href="/historia">-Leer más...</a></span></p>
    </div>
  </div>

  <div class="div-products">
    <div style="width: 100%; height: auto;">
      <h2 class="title-bebidas text-center"><a href="/productos">NUESTROS PRODUCTOS</a></h2>
      <p class="text-center text-home">Cada ruta que tomamos lleva implícita una botella de mezcal.</p>
    </div>

    <div class="img-hover-zoom--slowmo">
      <img class="img-bebidas" src="img/mezcal-joven.jpg" alt="Mezcal joven">
    </div>

    <div class="img-hover-zoom--slowmo">
      <img class="img-bebidas" src="img/mezcal-anejo.jpg" alt="Mezcal joven">
    </div>
    
    <div class="img-hover-zoom--slowmo">
      <img class="img-bebidas" src="img/mezcal-reposado.jpg" alt="Mezcal joven">
    </div>
    
    <div class="img-hover-zoom--slowmo">
      <img class="img-bebidas" src="img/reserva.jpg" alt="Mezcal joven">
    </div>
    
    <div style="width: 100%; height: auto;">
      <p class="text-center text-home"><a href="/catalogo">Ver todos los productos</a></p>
      <br>
    </div>
  </div>

@endsection

@section('scripts')
<!--change navbar bg color-->
<script type="text/javascript">
  $(window).scroll(function(){
    var alto = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
    $("nav").toggleClass('scrolled', $(this).scrollTop()>alto);
  });
</script>
@endsection