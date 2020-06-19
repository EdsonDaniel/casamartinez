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
      	<div class="bottomright">
      		<p class="text-cita"><i>“Mezcal proviene de la estructura náhuatl de la palabra Mezcal: 'Metl' que significa Maguey, en yuxtaposición con la palabra 'Ixcalli' que quiere decir cocido, la traducción formal debería ser 'Maguey Cocido”</i></p>
      		<p class="text-cita">
      			-Alguien Martínez
      		</p>
      	</div>
      </div>
      <div class="carousel-item" style="background-image: url('img/maestro3.jpg');">
        <div class="bottomright">
      		<p class="text-cita"><i>“Tenemos claro que es nuestra responsabilidad el cuidado de la tierra y el agave”</i></p>
      		<p class="text-cita">
      			-Alguien Martínez
      		</p>
      	</div>
      </div>
      <div class="carousel-item" style="background-image: url('img/molienda3.jpg');">
        <div class="bottomright">
      		<p class="text-cita"><i>“Involucrarse en cada detalle, puede hacer la diferencia en todo. ”</i></p>
      		<p class="text-cita">
      			-Alguien Martínez
      		</p>
      	</div>
      </div>
    </div>
  </div>
  <!--Fin Carrusel-->
  </header>

  <!--primer parrafp-->
  <div class="container col-7 mt-5">
    <div class="row justify-content-md-center">
      <div class="media mt-5">
        <img class="mr-4 img-vertical d-block" src="img/corazon-maguey3.jpg" alt="Generic placeholder image">
        <div class="media-body align-self-center">
          <p class="text-cita ml-5"><i>“El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.”</i></p>
          <p class="ref-cita ml-5">
            -Alguien Martínez
          </p>
        </div>
      </div>
    </div> 
   </div>
  <!--primer parrafo-->

  <!--segundo parrafp-->
  <div class="container col-7 mt-5">
    <div class="row justify-content-md-center">
      <div class="media mt-5">
        <div class="media-body align-self-center">
          <h5 class="mt-0 text-right header-parrafo">FILOSOFÍA</h5>
          <p class="text-home text-right">Nuestra filosofía empieza con nuestro amor a nuestras raíces buscando siempre cuidar a la tierra, su ecosistema y a las personas que la trabajan. </p>
          <p class="text-right more"><a href="philosophy.html">-Leer más...</a></p>
        </div>
        <img class="ml-4 img-horizontal d-block " src="img/maguey.jpeg" alt="Generic placeholder image">
      </div>
    </div> 
   </div>
  <!--segundo parrafo-->

   <!--tercer parrafp-->
  <div class="container col-7 mt-5">
    <div class="row justify-content-md-center">
      <div class="media mt-5">
        <img class="mr-3 img-vertical d-block" src="img/histori.jpg" alt="Generic placeholder image">
        <div class="media-body align-self-center">
          <h5 class="mt-0 ml-4 header-parrafo">HISTORIA, COLABORADORES</h5>
          <p class="text-home ml-4">La increíble historia sobre la familia Martínez y todo el equipo de trabajo detrás de nuestras bebidas.</p>
          <p class="more ml-4"><a href="history.html">-Leer más...</a></p>
        </div>
      </div>
    </div> 
   </div>
  <!--terer parrafo-->

  <!--seccion de botellas-->
  <div class="mt-5 div-fondo">
    <div class="container">
      <h2 class="title-bebidas header-parrafo text-center"><a href="bebidas.html" style="color:white;">PRODUCTOS</a></h2>
      <p class="text-center text-home">Cada ruta que tomamos lleva implícita una botella de mezcal.</p>
    </div>

    <div class="container">
      <div class="row justify-content-md-center mb-5">
        <div class="col-3">
          <div class="img-hover-zoom--slowmo">
            <img class="mt-4 img-bebidas" src="img/mezcal-joven.jpg" alt="Mezcal joven">
          </div>
        </div>
        <div class="col-3">
          <div class="img-hover-zoom--slowmo">
            <img class="mt-4 img-bebidas" src="img/mezcal-anejo.jpg" alt="Mezcal joven">
          </div>
        </div>
        <div class="col-3">
          <div class="img-hover-zoom--slowmo">
            <img class="mt-4 img-bebidas" src="img/mezcal-reposado.jpg" alt="Mezcal joven">
          </div>
        </div>
        <div class="col-3">
          <div class="img-hover-zoom--slowmo">
            <img class="mt-4 img-bebidas" src="img/reserva.jpg" alt="Mezcal joven">
          </div>
        </div>
    </div>
  </div>

  <div class="container">
    <p class="text-center text-home mb-4"><a href="/catalogo" style="color:white;">Ver todos los productos</a></p>
    <br>  
  </div> 
</div>
<!--seccion de botellas-->
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