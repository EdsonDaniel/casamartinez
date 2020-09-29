<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    <title>@yield('title')</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <style type="text/css">
      .background { width: 100%; height: 100%; background-color: lightgray;opacity: 0.92; z-index: 1000;}
      .backdrop.show{ opacity: 1; }
      .backdrop{ opacity: 0; transition: opacity 0.7s 
        linear; z-index: 1040;position: fixed;top: 0;right: 0;bottom: 0;left: 0;}
      .loading-wrapper{ position: absolute;top: 40%;left: 50%;transform: translate(-50%, -50%);z-index: 1001; }
    </style>
    
    
    <!-- Stylesheet -->
    <!--<link href="" rel="stylesheet">-->
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/custom/bootstrap.css') }}" type="text/css">
    <link href="{{ asset('/css/custom/principal.css') }}" rel="stylesheet" type="text/css">    
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;1,400&family=Raleway:wght@300;400;500;600&family=Spartan:wght@300;400;500&family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/custom/estilo.css">
    <link href="/css/custom/tienda.css" rel="stylesheet" type="text/css" />
    <!--<link rel="stylesheet" href="css/fonts/style.css">-->
    @yield('stylesheet')

</head>
<body onload="hideBackdrop()" class="preload">
  <div class="backdrop show" id="backdrop">
    <div class="background" id="background"></div>
    <div class="loading-wrapper" id="loading-wrapper">
      <img src="/img/loading2.gif" alt="Cargando">
    </div>
  </div>
  

  <!--Sidebar-->
  <div id="mySidenav" class="sidenav" >
      <a class="closebtn" onclick="closeNav()"><i class="fa fa-bars"></i></a>
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
          <a><span>BIENVENIDO {{ Auth::user()->name }}</span></a>
        </center>
      </div>
      @endguest

      <div class="options">
        @auth
        <div class="boton">
              <a>MI CUENTA</a>
              <button><i name="ic" class="fas fa-plus"></i></button>                
          </div>
          <div class="dropdown-container">
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
          </div>
          @endauth
          <div class="boton">
              <a>PRODUCTOS</a>
              <button><i name="ic" class="fas fa-plus"></i></button>                
          </div>
          <div class="dropdown-container">
              <ul>
                  <li><a href="">-Ignacio Martínez</a></li>
                  <li><a href="">-SiNái</a></li>
                  <li><a href="">-Habitante</a></li>
                  <li><a href="">-Origen Verde</a></li>
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

  <div id="app">
    <!--NavBar-->
    <nav id="topbar" class="navbar navbar-expand-lg fixed-top nav-trn">
        <div class="container">
            <a class="navbar-brand nav-home" href="/">CASA MARTÍNEZ</a>
            <div class="nav-items">
                <ul class="navbar-nav ml-auto" id="list-items">
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropbtn" href="/login">LOGIN</a>
                            <div class="dropdown-content">
                                <a href="/register">-Registrarse</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="d-flex">
                  <a href="#modalShoppingCart" data-toggle="modal" class="ico">
                    <!--<span class="fad fa-shopping-cart" id="cart"></span>-->
                    <i data-feather="shopping-cart" class="icon-nav" id="cart"></i>
                  </a>
                  <a class="ico pr-0" id="opened" onclick="openNav()">
                    <i data-feather="menu" class="icon-nav" id="icon-menu"></i>
                  </a> 
                </div>                
            </div>
        </div>
    </nav>
    <!--NavBar-->
    <!--container content-->
  
  <div class="app-container">@yield('content')</div>
  <!--container content-->

  <div class="ft-shop mt-5" id="div-footer">
    <!--footer-->
    <footer>
      <div class="div-foot">
          <div id="f2"><p>Tel. 951-323-0110</p></div>
          <div id="f1">
              <p class="text-center">
                  <a href="https://www.google.com/maps/place/San+Dionisio+Ocotepec,+Oax./@16.801013,-96.4114571,14z/data=!3m1!4b1!4m5!3m4!1s0x85c0b57286869a4f:0x26588c69bc264a18!8m2!3d16.7983019!4d-96.3965776">SAN DIONISIO OCOTEPEC, OAXACA<br> 16º48'N 96º24'W</a>
              </p>
          </div>
          
          <div id="f3">
              <p class="mail"><a href="mailto:info@casamartinez.mx">info@casamartinez.mx</a></p>
          </div>
          <div id="f5">
              <p class="links-ref"><a>PRIVACY POLICY</a> | <a href="">© 2016 – 2020</a> | <a href="">SITE CREDITS</a>
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
</div>


   
   <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>-->
   <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->

   @yield('more-content')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <script type="text/javascript" src="/js/custom/efectos2.js"></script>

   @yield('scripts')
   
</body>
</html>