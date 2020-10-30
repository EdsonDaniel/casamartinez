<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    <title>@yield('title')</title>
    
    <!-- Stylesheet -->
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/css/custom/bootstrap.css" type="text/css">
    <link href="{{ asset('/css/custom/principal.css') }}" rel="stylesheet" type="text/css">
    <!--<script src="https://kit-pro.fontawesome.com/releases/v5.10.1/js/pro.min.js" data-auto-fetch-svg></script>-->
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;1,400&family=Markazi+Text&family=Raleway:wght@300;400;500;600&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="css/custom/estilo.css">
    <!--<link rel="stylesheet" href="css/fonts/style.css">-->
    @yield('stylesheet')

</head>
<body>

    <!-- Modal -->
    <div class="modal fade" id="modalHome" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-trans-md ">
                <div class="modal-header border-0">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-5">
                                <img src="/img/logo-casa-martinez-wh.svg" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body border-0 px-5 text-modalhome">
                    <div class="row">
                        <div class="col-12">
                            <p class="m-0">Debe tener la mayoría de edad para poder navegar en este sitio web.</p>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer border-0 px-5 ">
                    <div class="w-100">
                        <button type="button" id="btn-confirm-edad" class="btn btn-block rounded-0 btn-modalhome btn-outline-secondary" >SOY MAYOR DE EDAD</button>
                        
                        <a href="https://google.com" class="btn btn-block rounded-0 btn-modalhome btn-outline-secondary mt-3">NO SOY MAYOR DE EDAD</a>

                        <p class="mt-4 text-modalhome text-center">Beba responsablemente.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="app">
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
                                <a href="/historia">-Historia, Equipo</a>
                                <a href="/campos-de-maguey">-Campos de Maguey</a>
                                <a href="/certificaciones">-Certificaciones</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropbtn" href="/productos">PRODUCTOS</a>
                            <div class="dropdown-content">
                                <a href="/proximamente">-Ignacio Martínez</a>
                                <a href="/catalogo">-SiNái</a>
                                <a href="/proximamente">-Origen Verde</a>
                                <a href="/proximamente">-Habitante</a>
                            </div>
                        </div>
                    </li>
                    @guest
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropbtn" href="/login">LOGIN</a>
                            <div class="dropdown-content">
                                <a href="/register">-Registrarse</a>
                            </div>
                        </div>
                    </li>
                    @else
                     <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropbtn" href="/mi-cuenta"><i class="fas fa-user"></i></a>
                            <div class="dropdown-content">
                                <a href="/mi-cuenta">-Mi cuenta</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                   -Cerrar sesión
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
                            </div>
                        </div>
                    </li>
                    @endguest

                </ul>

                <a href="/tienda" class="ico"><span class="fa fa-shopping-bag" id="cart"></span></a>
                <a class="ico" id="opened" onclick="openNav()"><i class="fa fa-bars" id="icon-menu"></i></a> 
            </div>
        </div>
    </nav>
    <!--NavBar-->

    <!--Sidebar-->
    <div id="mySidenav" class="sidenav" >
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-bars"></i></a>
        <div class="title-nav">
          <h2><a href="/">CASA MARTINEZ</a></h2>
        </div>

        @guest
        <div class="log-in">
          <center>
            <a href="/login" id="ic"><i class="far fa-user"></i></a>
            <span><a href="/login">INICIAR SESIÓN</a></span>
          </center>
        </div>
        @else
        <div class="log-in usuario">
          <center>
            <a id="ic"><i class="far fa-user"></i></a>
            <a href="/mi-cuenta"><span>{{ Auth::user()->name }}</span></a>
          </center>
        </div>
        @endguest

        <div class="options">
          @auth
          <div style="margin: 12px 20px 0; display: block; min-width: 320px;">
                <a href="/mi-cuenta">MI CUENTA</a>
                </a>
            </div>
            <!--<div class="dropdown-container">
                <ul>
                    <li><a href="">-Mis pedidos</a></li>
                    <li><a href="">-Mis datos</a></li>
                    <li><a href="">-Configuración de la cuenta</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('-Salir') }}</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                </ul>
            </div>-->
            @endauth
            <div class="boton">
                <a>PRODUCTOS</a>
                <button><i name="ic" class="fas fa-plus"></i></button>                
            </div>
            <div class="dropdown-container">
                <ul>
                    <li><a href="/proximamente">-Ignacio Martínez</a></li>
                    <li><a href="/tienda">-SiNái</a></li>
                    <li><a href="/proximamente">-Habitante</a></li>
                    <li><a href="/proximamente">-Origen Verde</a></li>
                    <li><a href="/productos">-Todos los productos</a></li>
                </ul>
            </div>

            <div class="boton">
                <a>FILOSOFÍA</a>
                <button><i name="ic" class="fas fa-plus"></i></button>
            </div>
            <div class="dropdown-container">
                <ul>
                    <li><a href="/filosofia">-Introducción</a></li>
                    <li><a href="/historia">-Historia, Equipo</a></li>
                    <li><a href="/campos-de-maguey">-Campos de maguey</a></li>
                    <li><a href="/certificaciones">-Certificaciones</a></li>
                </ul>
            </div>

        </div>

        <div class="footer-side">
          <hr class="line">
          <a href="#">Contacto</a>
          <a href="#">Ayuda</a>            
        </div>
    </div>
    <!--Sidebar-->
  <!--container content-->
  
  <div @yield('id-container') class="app-container">@yield('content')</div>
  <!--container content-->

  <!--footer-->
  <footer>
    <div class="div-foot" id="div-foot">
        <div id="f2"><p>Tel. 951-106-4061</p></div>
        <div id="f1">
            <p class="text-center">
                <a href="https://www.google.com/maps/place/San+Dionisio+Ocotepec,+Oax./@16.801013,-96.4114571,14z/data=!3m1!4b1!4m5!3m4!1s0x85c0b57286869a4f:0x26588c69bc264a18!8m2!3d16.7983019!4d-96.3965776">SAN DIONISIO OCOTEPEC, OAXACA<br> 16º48'N 96º24'W</a>
            </p>
        </div>
        
        <div id="f3">
            <p class="mail"><a href="mailto:info@casamartinez.mx">info@casamartinez.mx</a></p>
        </div>
        <div id="f5">
            <p class="redes"><a>PRIVACY POLICY</a> | <a href="">© 2016 – 2020</a> | <a href="mailto:edsondanyel@gmail.com?subject=About%20casamartinez.mx">SITE CREDITS</a>
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
  </footer>
  <!--footer-->

  </div>

   <!-- Scripts -->
   
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 
   <script type="text/javascript" src="js/custom/efectos.js"></script>

   @yield('scripts')
   
</body>
</html>