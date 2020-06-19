<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
  <title>Casa Martínez</title>

   <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/custom/bootstrap.css') }}" type="text/css">
    <link href="{{ asset('css/custom/principal.css') }}" rel="stylesheet" type="text/css"/>
    <!--<link href="https://fonts.googleapis.com/css2?family=Lora:ital@0;1&family=Markazi+Text&family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;1,400&family=Markazi+Text&family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="css/custom/estilo.css">
    
    <link href="css/custom/main.css" rel="stylesheet" type="text/css" />
	
  
</head>
<body>
   <!--NavBar-->
    <nav id="topbar" class="navbar navbar-expand-lg fixed-top nav-trn">
        <div class="container">
            <a class="navbar-brand nav-home" href="/">CASA MARTÍNEZ</a>
            <div class="nav-items">
                <ul class="navbar-nav ml-auto" id="list-items">
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropbtn" href="/filosofia">FILOSOFÍA</a>
                            <div class="dropdown-content">
                                <a href="/filosofia">-Introducción</a>
                                <a href="/historia">-Historia y equipo</a>
                                <a href="/campos-de-maguey">-Campos de Agave</a>
                                <a href="/certificaciones">-Certificaciones</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropbtn" href="/productos">PRODUCTOS</a>
                            <div class="dropdown-content">
                                <a href="#">-Ignacio Martínez</a>
                                <a href="/catalogo">-SiNái</a>
                                <a href="#">-Origen Verde</a>
                                <a href="#">-Habitante</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropbtn" href="/login">LOGIN</a>
                            <div class="dropdown-content">
                                <a href="#">-Registrarse</a>
                            </div>
                        </div>
                    </li>
                </ul>

                <a href="/" class="ico"><span class="fad fa-shopping-cart" id="cart"></span></a>
                <a class="ico" onclick="openNav()"><i class="far fa-bars" id="icon-menu"></i></a> 
            </div>
        </div>
    </nav>
    <!--NavBar-->

    

    <!--Sidebar-->
    <div id="mySidenav" class="sidenav" >
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="far fa-bars"></i></a>
        <div id="login-section">
            <div class="title-nav">
                <h2>CASA MARTINEZ</h2>
            </div>
            
            <div class="log-in">
                <center>
                    <a href="/login" id="ic"><i class="far fa-user"></i></a>
                    <span><a href="/login">INICIAR SESIÓN</a></span>
                </center>
            </div>
        </div>

        <div class="options">
            <div class="boton">
                <a href="/productos">PRODUCTOS</a>
                <button><i name="ic" class="fas fa-plus"></i></button>                
            </div>
            <div class="dropdown-container">
                <ul>
                    <li><a href="">-Ignacio Martínez</a></li>
                    <li><a href="">-SiNái</a></li>
                    <li><a href="">-Habitante</a></li>
                    <li><a href="">-Origen Verde</a></li>
                </ul>
            </div>

            <div class="boton">
                <a href="#">FILOSOFÍA</a>
                <button><i name="ic" class="fas fa-plus"></i></button>
            </div>
            <div class="dropdown-container">
                <ul>
                    <li><a href="/filosofia">-Introducción</a></li>
                    <li><a href="/historia">-Historia, Colaboradores</a></li>
                    <li><a href="/campos-de-maguey">-Campos de maguey</a></li>
                    <li><a href="/certificaciones">-Certificaciones</a></li>
                </ul>
            </div>

        </div>

        <div class="footer-side">
            <hr style="border-top: 1.2px solid rgba(155, 155, 155, 0.5);">
            <a href="#">Contacto</a>
            <a href="#">Ayuda</a>            
        </div>
    </div>
    <!--Sidebar-->
    <script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("boton");
var i;
var icon;
for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var btn = this.lastElementChild;
  icon = btn.firstElementChild;
  icon.classList.toggle("fa-minus");
  icon.classList.toggle("fa-plus");
  
  var dropdownContent = this.nextElementSibling;
  btn = dropdownContent.firstElementChild;
  var alt = btn.offsetHeight;
  alt += 6;
  alt = alt+"px"
  /*console.log(alt);
  console.log(dropdownContent.style.height);*/
  if (dropdownContent.style.height === "") {
    console.log(alt);
  dropdownContent.style.height = alt;
  } else {
  dropdownContent.style.height = "";
  }
  });
}
</script>
  <!--container content-->
  
  <div id="wh-bg">
    <header id=head> 
  <!--Carrusel-->
  <div id="slider" class="carousel slide carousel-fade" >
    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image: url('img/agave2.jpg')">
        <div class="bottomright">
          <p class="text-cita"><i>“Mezcal proviene de la estructura náhuatl de la palabra Mezcal: 'Metl' que significa Maguey, en yuxtaposición con la palabra 'Ixcalli' que quiere decir cocido, la traducción formal debería ser 'Maguey Cocido”</i></p>
          <p class="ref-cita">
            -Alguien Martínez
          </p>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('img/maestro3.jpg');">
        <div class="bottomright">
          <p class="text-cita">“Tenemos claro que es nuestra responsabilidad el cuidado de la tierra y el agave”</p>
          <p class="ref-cita">
            -Alguien Martínez
          </p>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('img/molienda3.jpg');">
        <div class="bottomright">
          <p class="text-cita">“Involucrarse en cada detalle, puede hacer la diferencia en todo. ”</p>
          <p class="ref-cita">
            -Alguien Martínez
          </p>
        </div>
      </div>
    </div>
  </div>
  <!--Fin Carrusel-->
  </header> 
  </div>


  <div class="text-and-img">
    <div class="div-img">
        <img src="/img/histori.jpg" class="img-vertical">
    </div>
    <div>
      <p class="text-home"><i>“El mezcal, la bebida de los dioses, fue concebida por un rayo que cayó sobre un agave que dio origen a la primera tatema, iniciando así la tradición del elixir oaxaqueño por excelencia que hoy cobija la cultura culinaria de los mexicanos y con ello: su identidad.”</i></p>
      <p class="text-home">-Alguien Martínez</p>
    </div>
  </div>

  <!--segundo parrafp-->
  <div class="text-and-img">
     <div>
      <h5 class="text-right header-parrafo"><a href="/filosofía">FILOSOFÍA</a></h5>
      <p class="text-home text-right">Nuestra filosofía empieza con nuestro amor a nuestras raíces buscando siempre cuidar a la tierra, su ecosistema y a las personas que la trabajan. </p>
      <p class="text-right text-home"><a href="/filosofia">-Leer más...</a></p>
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
      <p class="text-home"><a href="/historia">-Leer más...</a></p>
    </div>
  </div>


<div class="div-products" >
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


<div class="div-foot">
  <div id="f2"><p>Tel. 951-323-0110</p></div>
  <div id="f1">
    <p class="text-center">
                <a href="https://www.google.com/maps/place/San+Dionisio+Ocotepec,+Oax./@16.801013,-96.4114571,14z/data=!3m1!4b1!4m5!3m4!1s0x85c0b57286869a4f:0x26588c69bc264a18!8m2!3d16.7983019!4d-96.3965776">SAN DIONISIO OCOTEPEC, OAXACA<br>16º48'N 96º24'W</a>
            </p>
  </div>
  <div id="f3">
    <p class="mail"><a href="mailto:info@casamartinez.mx">info@casamartinez.mx</a></p>
  </div>
<div id="f5">
  <p class="redes"><a>PRIVACY POLICY</a> | <a href="">© 2016 – 2020</a> | <a href="">SITE CREDITS</a>
            </p> 
</div>

<div id="f4">
   <p class="redes icons">
                <a href="https://twitter.com/MezcalSinai" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://www.facebook.com/Mezcal.Sinai" target="_blank"><i class="fab fa-facebook-square"></i></a>
                <a href="https://www.instagram.com/mezcal.sinai" target="_blank"><i class="fab fa-instagram"></i></a>
            </p>

</div>
  
</div>

   <!--footer--
  <footer class="container mb-4 mt-5">
    <div class="row">
        <div class="col-4 justify-content-md-center">
            <p class="tel-number">Tel. 951-323-0110</p> 
        </div>
        <div class="col-4 text-center justify-content-md-center">
            <p class="tel-number mb-0">
                <a href="https://www.google.com/maps/place/San+Dionisio+Ocotepec,+Oax./@16.801013,-96.4114571,14z/data=!3m1!4b1!4m5!3m4!1s0x85c0b57286869a4f:0x26588c69bc264a18!8m2!3d16.7983019!4d-96.3965776">SAN DIONISIO OCOTEPEC, OAXACA<br>16º48'N 96º24'W</a>
            </p>
        </div>
        <--<div class="col-4 text-right justify-content-md-center">
            <p class="mail"><a href="mailto:info@casamartinez.mx" style="text-decoration: none;">info@casamartinez.mx</a>
            </p> 
        </div>--
    </div>
    <div class="row mt-0 mb-0">
        <div class="col-4 justify-content-md-center">
            <p class="second-line mb-0 mt-1"><a>PRIVACY POLICY</a> | <a href="">© 2016 – 2020</a> | <a href="">SITE CREDITS</a>
            </p> 
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
  --footer-->

   <!-- Scripts -->
   <script src="https://kit-pro.fontawesome.com/releases/v5.10.1/js/pro.min.js" data-auto-fetch-svg></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <script type="text/javascript" src="js/custom/efectos.js"></script>

   @yield('scripts')
   
</body>
</html>