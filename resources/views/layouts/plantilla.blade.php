<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    <title>@yield('title')</title>
    
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/custom/bootstrap.css') }}" type="text/css">
    <link href="{{ asset('css/custom/principal.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@0;1&family=Markazi+Text&family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom/estilo.css">
    <link rel="stylesheet" href="css/custom/desplegable.css">
    <link rel="stylesheet" href="css/fonts/style.css">
    @yield('stylesheet')

</head>
<body>
    <!--NavBar-->
    <nav id="topbar" class="navbar navbar-expand-lg fixed-top nav-trn">
        <div class="container">
            <a class="navbar-brand nav-home" href="/">CASA MARTÍNEZ</a>
            <button class="navbar-toggler nav-home" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-font" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
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
    <!--Sidebar-->

  <!--container content-->
  
  <div @yield('id-container')>@yield('content')</div>
  <!--container content-->

  <!--footer-->
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
        <div class="col-4 text-right justify-content-md-center">
            <p class="mail"><a href="mailto:info@casamartinez.mx" style="text-decoration: none;">info@casamartinez.mx</a>
            </p> 
        </div>
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
  <!--footer-->

   <!-- Scripts -->
   <script src="https://kit-pro.fontawesome.com/releases/v5.10.1/js/pro.min.js" data-auto-fetch-svg></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <script type="text/javascript" src="js/custom/efectos.js"></script>

   @yield('scripts')
   
</body>
</html>