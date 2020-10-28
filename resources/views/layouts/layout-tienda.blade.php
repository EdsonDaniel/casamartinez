<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield('title')</title>
    <style type="text/css">
      .background { width: 100%; height: 100%; background-color: lightgray;opacity: 0.92; z-index: 1000;}
      .backdrop.show{ opacity: 1; }
      .backdrop{ opacity: 0; transition: opacity 0.7s 
        linear; z-index: 1060;position: fixed;top: 0;right: 0;bottom: 0;left: 0;}
      .loading-wrapper{ position: absolute;top: 40%;left: 50%;transform: translate(-50%, -50%);z-index: 1001; }
    </style>
    
    
    <!-- Stylesheet -->
    <!--<link href="" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css" type="text/css">
    <!--<link rel="stylesheet" href="{{ asset('/css/custom/bootstrap.css') }}" type="text/css">-->
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
                  @guest
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropbtn" href="/login">LOGIN</a>
                            <div class="dropdown-content">
                                <a href="/register">-Registrarse</a>
                            </div>
                        </div>
                    </li>
                  @endguest
                </ul>
                <div class="d-flex">
                  @auth
                    <div class="dropdown">
                      <a class="ico" href="/mi-cuenta"><i class="fas fa-user"></i></a>
                      <div class="dropdown-content">
                        <a href="/mi-cuenta">-Mi cuenta</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">-Cerrar sesión</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
                      </div>
                    </div>
                  @endauth

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
      <div class="div-foot" id="div-foot">
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

  <!--modal-->
  <div class="modal fade" id="modalProduct" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mx-4 m-md-auto modal-lg" role="document">
      <div class="modal-content">
        <!-- Close -->
        <button style="z-index: 5;" type="button" class="close btn-close-modal" data-dismiss="modal" aria-label="Close">
          <span class="fe fe-x" aria-hidden="true" >&times;</span>
        </button>

        <!-- Content -->
        <div class="container-fluid px-xl-0">
          <div class="row align-items-center mx-xl-0">
            <div class="col-12 col-lg-6 col-xl-5 py-3 py-md-4 py-xl-0 px-xl-0" id="modalImgContainer">

              <!-- Image --
              <img class="img-fluid d-block my-md-5 " id="img-modal"  src="/img/botellas/anejo-sq.jpg" alt="...">-->

            </div>
            <div class="col-12 col-lg-6 col-xl-7 py-9 px-md-9">

              <!-- Heading -->
              <h4 class="mb-1 mx-1 mx-md-auto mb-md-2 mb-md-3 title-product-modal">
                <!--Mezcal Sinái(Joven) 750ml --></h4>

              <!-- Price -->
              <div class="mb-1 b-md-3 mx-1 mx-md-auto">
                <h4 class="price-product-modal mb-1 mt-2"><!-- $850.00 MXN --></h4>
                <span class="product-status">Disponible</span>
              </div>

              <!-- Form -->
              <form class="w-100">
                <!--row form-->
                <div class="row mx-0">

                  <!--col-left-->
                  <div class="col-12 col-md-7 px-0">
                    <div class="form-group">

                      <!-- Label -->
                      <p class="mx-1 mx-md-auto">
                        Presentación: <strong id="modalProductPresentationCaption">750 ml</strong>
                      </p>

                      <!-- Radio -->
                      <div class="div-img-radio-products" id="div-presentations">
                        
                      </div>
                    </div>
                  </div>
                  <!--col-left-->

                  <!--col-right-->
                  <div class="col-12 col-md-4 px-0 d-flex justify-content-center mt-1">
                    <div class="mt-md-3">
                      <div class="form-group d-flex flex-md-column align-items-center">
                        <label class="text-center mr-3 mr-md-0 my-0">Cantidad:</label>
                        <div class="input-group mt-md-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text p-0 rounded-0">
                              <button type="button" class="btn icon-input-number h-100 rounded-0 btn-minus " onclick="btnMinus(this)" disabled="">-</button>
                            </div>
                          </div>
                          <input type="number" class="form-control input-cantidad" placeholder="1" value="1" min="1" max="10" onchange="changeCantidad(this)" id="inputCantidadModal">
                          <div class="input-group-append">
                            <div class="input-group-text p-0 rounded-0">
                              <button type="button" onclick="btnPlus(this)" class="btn icon-input-number btn-plus h-100" >+</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--col-right-->

                  <div class="col-12 px-1 px-md-auto">
                    <!-- Submit -->
                    <button type="button" class="btn btn-block rounded-0 my-1 my-md-2 btn-modals p-2 " id="btn-toCart" data-presentation="">
                      Agregar al carrito <i class="fe fe-shopping-cart ml-2"></i>
                    </button>
                  </div>

                  <div class="col-12 px-1 px-md-auto">
                    <!-- Submit -->
                    <button type="submit" class="btn btn-block rounded-0 mb-4 mb-md-auto btn-modals p-2">
                      Comprar ahora<i class="fe fe-shopping-cart ml-2"></i>
                    </button>
                  </div>
                  
                </div>
                <!--row form-->
              </form>

            </div>

          </div>
        </div><!--container-->

      </div><!--modal-content-->
    </div>
  </div>

  <div class="modal fixed-right fade" id="modalShoppingCart" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">

    <div class="modal-dialog modal-dialog-vertical" role="document">

      <!-- Full cart (add `.d-none` to disable it) -->
      <div class="modal-content">
        

        <!-- Header-->
        <div class="modal-header title-modal-cart line-height-fixed font-size-lg">
          <!-- Close -->
          <button style="z-index: 5;" type="button" class="close d-flex m-0 p-0" data-dismiss="modal" aria-label="Close">
            <i data-feather="x" aria-hidden="true" >&times;</i>
          </button>
          <span class="mx-auto" style="font-weight: 400;">Tu Carrito 
            <span id="countCart"></span>
          </span>

          <!--delete-all-->
          <div class="tooltip" id="tooltip-cart">
            <button type="button" id="vaciarCarrito" class="btn d-flex btn-trash-all float-right p-1" >
              <i aria-hidden="true" class="fa fa-trash-alt" ></i>
            </button>
            <span class="tooltiptext tooltip-left">Vaciar Carrito</span>
          </div>
        </div>

        <div id="cartContent" class="d-none">
          <!-- List group -->
          <ul class="list-group list-group-lg list-group-flush" id="listProducts">
           
          </ul>

          <!-- Footer -->
          <div class="modal-footer line-height-fixed font-size-sm bg-light mt-auto" id="footer-modal-cart">
            <span class="subtotal-label">Subtotal:</span>
            <span id="monto-subtotal" class="ml-auto monto-subtotal">$89.00</span>
          </div>

          <!-- Buttons -->
          <form id="validateCart" method="POST" action="/validate-cart"></form>
          <div class="modal-body " type="button" id="cartButtons">
            <button id="toCheckout" data-redirect="checkout" class="btn btn-block btn-modals btn-dark">Proceder al pago</button>
            <button id="toShoppingCart" data-redirect="cartView" type="button" class="btn btn-block btn-outline-dark btn-modal-light" >Ver carrito</button>
          </div>
        </div>

        <!--cartEmpty-->
        <div class="modal-body d-none my-5 pb-5" id="cartEmpty">
          <!-- Heading -->
          <h5 class="mb-5 pb-5 text-center " id="headEmpty">Tu carrito está vacío 😞</h5>
          <!-- Button -->
          <button class="btn btn-block btn-modals btn-outline-dark mb-5" data-dismiss="modal" aria-label="Close" >
            Continua Comprando
          </button>
        </div>
        

      </div>

    </div>
  </div>

   <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>-->
   <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->
   <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
   <!--<script src="{{ asset('js/app.js') }}" ></script>-->
   <script type="text/javascript" src="/js/app.js"></script>
   <script type="text/javascript" src="/js/custom/efectos2.js"></script>
   <script type="text/javascript" src="/js/card-collapse.js"></script>


   @yield('scripts')
   
</body>
</html>