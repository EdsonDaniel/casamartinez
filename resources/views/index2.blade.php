<!DOCTYPE html>
<html>
<head>
	<title>Casa Martínez</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/custom/bootstrap.css') }}" type="text/css">
  
  <link href="{{ asset('css/custom/principal.css') }}" rel="stylesheet" type="text/css" />
  <link href="css/custom/main.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital@0;1&family=Markazi+Text&family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/custom/estilo.css">
  <link rel="stylesheet" href="css/custom/desplegable.css">
  <link rel="stylesheet" href="css/fonts/style.css">
  <script src="https://kit-pro.fontawesome.com/releases/v5.10.1/js/pro.min.js" data-auto-fetch-svg></script>
  
</head>
<body>
  <!--NavBar-->
  <nav id="topbar" class="navbar navbar-expand-lg fixed-top nav-trn">
      <div class="container">
        <a class="navbar-brand nav-home" href="index.html">CASA MARTÍNEZ</a>
        <button class="navbar-toggler nav-home" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-font" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <div class="dropdown">
                <a class="nav-link dropbtn" href="philosophy.html">FILOSOFÍA</a>
                <div class="dropdown-content">
                  <a href="philosophy.html">-Introducción</a>
                  <a href="history.html">-Historia y equipo</a>
                  <a href="campos.html">-Campos de Agave</a>
                  <a href="certificaciones.html">-Certificaciones</a>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <a class="nav-link dropbtn" href="bebidas.html">PRODUCTOS</a>
                <div class="dropdown-content">
                  <a href="#">-Ignacio Martínez</a>
                  <a href="catalogo.html">-SiNái</a>
                  <a href="#">-Origen Verde</a>
                  <a href="#">-Habitante</a>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <a class="nav-link dropbtn" href="#">LOGIN</a>
                <div class="dropdown-content">
                  <a href="#">-Registrarse</a>
                </div>
              </div>
            </li>
            <li style="margin-top: 5px;">
              <a href="" class=""><span id="cart" class="fad fa-shopping-cart"></span></a>
            </li>
            <li class="nav-item expand-icon">
              <a class="nav-link expand-icon" onmouseover="openNav()">...</a> 
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <!--NavBar-->

  <header id=head class="fade-scroll"> 
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


   <!--Sidebar-->

  <div id="mySidenav" class="sidenav" onmouseover="openNav()" onmouseout="closeNav()">
    <ul class="acorh">
    <li><a href="bebidas.html">PRODUCTOS</a>
      <ul>
        <li><a href="">Ignacio Martínez</a></li>
        <li><a href="">SiNái</a></li>
        <li><a href="">Habitante</a></li>
        <li><a href="">Origen Verde</a></li>
      </ul>
     </li>
    <li><a href="philosophy.html">FILOSOFÍA</a>
      <ul>
        <li><a href="philosophy.html">Mezcal</a></li>
        <li><a href="history.html">Historia y equipo</a></li>
        <li><a href="campos.html">Campos de agave</a></li>
        <li><a href="">Certificaciones</a></li>
      </ul>
    </li>
    <li><a href="#">PROCESOS</a>
      <ul>
        <li><a href="URL31">Mezcal Joven</a></li>
        <li><a href="URL31">Mezcal Reposado</a></li>
        <li><a href="URL31">Mezcal Añejo</a></li>
        <li><a href="URL32">Origen Verde</a></li>
      </ul>
    </li>
    <li><a href="#">TOURS</a>
      <ul>
        <li><a href="URL31">Bin Dop</a></li>
        <li><a href="URL31">Productos Carmelita</a></li>
        <li><a href="URL31">AgaVerde</a></li>
        <li><a href="URL32">Campos de cultivo</a></li>
      </ul>
    </li>
    <li><a href="#">CONTACTO</a>
    </li>
    <li><a href="#">FAQs</a>
    </li>
  </ul>
  </div>



  <script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "400px";
    document.getElementById("topbar").style.display = "none";
    document.getElementById("head").className = "body-transparent";
    //document.body.className = "body-transparent";
    document.getElementById("container-home").className = "body-transparent";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("topbar").style.display = "block";
    document.getElementById("head").className = "";
    //document.body.className = "body-black";
    document.getElementById("container-home").className = "";
  }


  </script>
  <!--Sidebar-->

  <div id="container-home">
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
  <div class="container col-7 mt-5 fade-scroll">
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
  <div class="container col-7 mt-5 fade-scroll">
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
      <p class="text-center text-home mb-4"><a href="catalogo.html" style="color:white;">Ver todos los productos</a></p>
      <br>  
    </div> 
  </div>
  <!--seccion de botellas-->

</div>

  <!--footer-->
  <footer class="container mb-4 mt-5">
      <div class="row">
        <div class="col-4 justify-content-md-center">
         <p class="tel-number">Tel. 951-323-0110</p> 
        </div>
        <div class="col-4 text-center justify-content-md-center">
         <p class="tel-number mb-0">
          <a href="https://www.google.com/maps/place/San+Dionisio+Ocotepec,+Oax./@16.801013,-96.4114571,14z/data=!3m1!4b1!4m5!3m4!1s0x85c0b57286869a4f:0x26588c69bc264a18!8m2!3d16.7983019!4d-96.3965776">
            SAN DIONISIO OCOTEPEC, OAXACA<br>16º48'N 96º24'W</a>
          </p>
        </div>
        <div class="col-4 text-right justify-content-md-center">
         <p class="mail"><a href="mailto:info@casamartinez.mx" style="color: #212529; text-decoration: none;">info@casamartinez.mx</a></p> 
        </div>
      </div>
      <div class="row mt-0 mb-0">
        <div class="col-4 justify-content-md-center">
         <p class="second-line mb-0 mt-1"><a>PRIVACY POLICY</a> | <a href="">© 2016 – 2020</a> | <a href="">SITE CREDITS</a></p> 
        </div>
        <div class="col-4 text-center justify-content-md-center">
         <p class="tel-number"></p> 
        </div>
        <div class="col-4 text-right justify-content-md-center">
         <p class="second-line mb-0 mt-1 icon-redes fs" >
          <a href="https://twitter.com/MezcalSinai" target="_blank"><span class="icon-twitter1"></span></a>
          <a href="https://www.facebook.com/Mezcal.Sinai" target="_blank"><span class="icon-facebook-square"></span></a>
          <a href="https://www.instagram.com/mezcal.sinai" target="_blank"><span class="icon-instagram"><span class="path1"></span><span class="path2"></span></span></a>
        </p>
        </div>
      </div>
    </footer>
  <!--footer-->  




 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!--change navbar bg color-->
<script type="text/javascript">
  $(window).scroll(function(){
    var alto = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
    $("#topbar").toggleClass('scrolled', $(this).scrollTop()>alto);
  });
</script>

</body>
</html>