@extends('layouts.layout-tienda')

@section('title')
  Productos | Casa Martínez
@endsection

@section('stylesheet')
  <link rel="stylesheet" type="text/css" href="/css/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="/css/slick/slick-theme.css"/>
@endsection

@section('content')


<div class="device-xs d-block d-sm-none"></div>
<div class="device-sm d-none d-sm-block d-md-none"></div>
<div class="device-md d-none d-md-block d-lg-none"></div>
<div class="device-lg d-none d-lg-block"></div>

  <!-- Content -->
  <div class="container mt-5">
    <div class="row ">
      <div class="col-12 col-md-6">

        <!-- Image --
        <img class="img-fluid d-block my-md-5 " img-modal  src="/img/botellas/anejo-sq.jpg" alt="...">-->

        <div class="form-row mb-md-0 justify-content-center">
          <div class="col-3 col-md-2 mr-md-auto ">
            <!-- Radio -->
            <div class="div-img-radio-products mt-md-2">
              <div class="custom-control custom-control-img mb-3 mb-md-4">
                <input type="radio" class="custom-control-input" id="modalProductColorOne" name="modalProductColor" data-toggle="form-caption" data-target="#modalProductColorCaption" value="White" checked="">
                <label class="custom-control-label pb-1" for="modalProductColorOne">
                  <span class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(/storage/{{$presentacion->foto_url}});"></span>
                </label>
              </div>
              <div class="custom-control custom-control-img mb-3 mb-md-4">
                <input type="radio" class="custom-control-input" id="modalProductColorTwo" name="modalProductColor" data-toggle="form-caption" data-target="#modalProductColorCaption" value="Black">
                <label class="custom-control-label pb-1" for="modalProductColorTwo">
                  <span class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(/img/botellas/sinai-sq.jpg);"></span>
                </label>
              </div>
            </div>
          </div>
          <div class="col-8 col-md-10">

            <!-- Card -->
            <div class="card border-0 mb-0 mb-md-5">

              <!-- Badge -->
              <div class="badge badge-dark rounded-right card-badge card-badge-left text-uppercase">
                New
              </div>

              <!-- Image -->
              <div class="wrapper shadow-md">

                <!-- Image -->
                <img class="card-img-top card-img-back p-1 p-md-2" src="/storage/{{$presentacion->foto_url}}" alt="...">

              </div>

            </div>

            <!-- Card -->
          </div>

        </div>

      </div>
      
      <div class="col-12 col-md-6 pl-md-4 mt-4 mt-md-3 px-4">

        <!-- Heading -->
        <h4 class="mb-1 mx-md-auto mb-md-2 mb-md-3 title-product-modal">{{$producto->nombre . " " . $presentacion->contenido . " " . $presentacion->unidad_c }}</h4>

        <div class="row mt-3">
          <div class="col-12 description">
            <!--<p class="m-0">
              Mezcal artesanal joven.
              Elaborado a base de agave 100% orgánico certificado. Su agradable aroma y sabor complacen hasta los paladares más exigentes.
            </p>
          -->
            <p class="m-0">
              {{$producto->descripcion}}
            </p>
          </div>
        </div>

        <div class="row mt-3">

          <div class="col-12 col-md-6">
            <!-- Price -->
            <div class="mb-1 b-md-3 mx-md-auto">
              <h4 class="price-product-modal mb-1 ">$ {{$presentacion->precio_consumidor}} MXN</h4>
              @switch($presentacion->estado)
                @case(-1)
                @case(0)
                  <span class="product-status d-block mt-md-2 text-danger">
                  No Disponible por el momento</span>
                  @break
                @case(1)
                  <span class="product-status d-block mt-md-2">Disponible</span>
                  @break
                @case(2)
                  <span class="product-status d-block mt-md-2 text-muted">Próximamente</span>
                  @break
              @endswitch
            </div>
          </div>

          @if($presentacion->estado == 1)
          <div class="col-12 col-md-6 d-flex align-items-end">
            <div class="w-100">
              <div class="d-flex">
                <label class="d-block mr-3 my-0 " for="inputCantidad">Cantidad:</label>
                <div class="input-group ">
                  <div class="input-group-prepend">
                    <div class="input-group-text p-0 rounded-0">
                      <button type="button" disabled="true" class="btn icon-input-number rounded-0" id="buttonMinus">-</button>
                    </div>
                  </div>
                  <input type="number" class="form-control input-cantidad" id="inputCantidad" placeholder="1" value="1" min="1" max="10">
                  <div class="input-group-append">
                    <div class="input-group-text p-0 rounded-0">
                      <button type="button" class="btn icon-input-number rounded-0" id="buttonPlus">+</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif
        </div>

        <div class="row mt-3">

          <div class="col-12 col-md-6">
            <div class="form-group">

              <!-- Label -->
              <p class="mx-md-auto mb-4">
                Presentación: <strong id="modalProductColorCaption">{{$presentacion->contenido. " ". $presentacion->unidad_c}}</strong>
              </p>

              <!-- Radio -->
              <div class="div-img-radio-products">
                @foreach($producto->presentaciones as $p)
                <div class="custom-control custom-control-inline custom-control-img">
                  <input type="radio" class="custom-control-input" name="modalProductColor" data-toggle="form-caption" data-target="#modalProductColorCaption" value="White"
                   @if ($loop->first)checked=""@endif >
                  <label class="custom-control-label pb-1" for="modalProductColorOne">
                    <span class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(/storage/{{$p->foto_url}});"></span>
                  </label>
                </div>
                @endforeach
                
              </div>
            </div>
          </div>
          @if($presentacion->estado == 1)
          <div class="col-12 col-md-6 mt-3 d-flex flex-column justify-content-center">
            <div class="d-flex flex-column ">
              <div class="col-12 px-0 mb-2 mb-md-3">
                <!-- Submit -->
                <button type="submit" class="btn btn-block rounded-0 btn-modals ">Agregar al carrito <i class="fe fe-shopping-cart ml-2"></i></button>
              </div>

              <div class="col-12 px-0 ">
                <!-- Submit -->
                <button type="submit" class="btn btn-block rounded-0 btn-modals">Comprar ahora<i class="fe fe-shopping-cart ml-2"></i></button>
              </div>
            </div>
          </div>
          @endif
          <div class="col-12 col-md-6 mt-md-2 mt-4">
            <p class="mb-0 text-center text-md-left">
              <span class="mr-1">Compartir:</span>
              <a class="btn btn-circle btn-light border" href="#!">
                <i class="fab fa-twitter"></i>
              </a>
              <a class="btn btn-circle btn-light border" href="#!">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a class="btn btn-circle btn-light border" href="#!">
                <i class="fab fa-pinterest-p"></i>
              </a>
            </p>
          </div>


        </div>

      </div>

    </div>
  </div><!--container-->


  <section class="pt-5">
      <div class="container">
        <div class="row">
          <div class="col-12">

            <h4 class="text-verde text-center letter-sp-1 mb-4 mb-md-5">Especificaciones del producto</h4>

            <!-- Content -->
            <div class="row justify-content-center mx-0 mx-md-auto">
              <div class="col-12 col-lg-10 col-xl-8">
                <div class="row">
                  <div class="col-12 ">
                    <div class="row justify-content-center">
                      <div class="col-12 ">
                        <!-- Table -->
                        <div class="table-responsive">
                          <table class="table table-bordered table-sm table-hover">
                            <tbody>
                              @foreach($producto->caracteristicas as $c)
                                <tr>
                                  <td class="px-2">{{$c->nombre}}</td>
                                  <td class="px-2">{{$c->pivot->valor}}</td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
  </section>

  <!--recomendaciones-->

  <section class="pt-5">
      <div class="container">
        <div class="row">
          <div class="col-12">

            <!-- Heading -->
            <h4 class="mb-4 mb-md-5 text-center text-verde" style="font-weight: 500;">Nuestras recomendaciones para usted</h4>

            <!-- Products -->
            <div class="row mt-md-0 justify-content-center mx-0 mx-md-auto" id="rowProductsRecomend">
              @foreach($recomendados as $r)
                <div class="col-6 col-md-3 mb-2 mb-md-0 px-2 mx-md-3">

                  <!-- Card -->
                  <div class="card border-0 mb-0 mb-md-5 shadow">

                    <!-- Badge -->
                    <div class="badge badge-dark rounded-right card-badge card-badge-left text-uppercase">
                      New
                    </div>

                    <!-- Image -->
                    <div class="card-img mb-1">

                      <!-- Image -->
                      <a class="card-img-hover" href="/tienda/detalles-producto?product={{$r->producto_id."_".$r->id_presentacion}}">
                        <img class="card-img-top card-img-back p-1 p-md-2" src="/img/botellas/sinai-sq.jpg" alt="...">
                        <img class="card-img-top card-img-front p-1 p-md-2" src="/storage/{{$r->foto_url}}" alt="...">
                      </a>

                      <!-- Actions -->
                      <div class="card-actions">
                        <div class="card-action">
                          <button class="btn-xs btn-circle btn-light border" data-toggle="modal" data-target="#modalProduct">
                            <i data-feather="eye"></i>
                          </button>
                        </div>
                        <div class="card-action">
                          <button class="btn-xs btn-circle btn-light border" data-toggle="button">
                            <i data-feather="shopping-cart"></i>
                          </button>
                        </div>
                      </div>

                    </div>

                    <!-- Body -->
                    <div class="card-body mb-3 mt-1 p-0 pt-1 text-center mx-2 pt-md-2 border-top">

                      <!-- Title -->
                      <div class="pb-1 title-wrapper">
                        <a class="text-body title-product" href="/tienda/detalles-producto?product={{$r->producto_id."_".$r->id_presentacion}}">
                          {{$r->nombre}}
                          <span class="d-block">{{$r->presentacion}}</span>
                        </a>
                      </div>

                      <!-- Price -->
                      <div class="text-secpndary price-product mt-1 mt-md-0">
                        {{$r->formated_price}}
                      </div>

                    </div>

                  </div>

                </div>
              @endforeach

            </div>

          </div>
        </div>
      </div>
    </section>
  
  <section class="bg-light mt-5" id="section-footer-details">
    <div class="container px-0 py-3">
      <div class="row mx-0 mx-md-auto">
        <div class="col-12 col-md-6 col-lg-3">

          <!-- Item -->
          <div class="d-flex mb-2 mb-md-0 pb-1 mb-lg-0">

            <!-- Icon -->
            <div class="my-md-1 my-2"><i data-feather="help-circle" ></i></div>

            <!-- Body -->
            <div class="ml-2 pl-1 ml-md-3 pl-md-0">

              <!-- Heading -->
              <h5 class="foot-headers my-1">
                ¿Tiene alguna duda?
              </h5>

              <!-- Text -->
              <p class="mb-0 foot-text text-muted">
                Puede consultar la sección de Preguntas Frecuentes.
              </p>

            </div>

          </div>

        </div>
        <div class="col-12 col-md-6 col-lg-3">

          <!-- Item -->
          <div class="d-flex mb-2 mb-md-0 pb-1 mb-lg-0">

            <!-- Icon -->
            <div class="my-md-1 my-2"><i data-feather="info"></i></div>

            <!-- Body -->
            <div class="ml-2 pl-1 ml-md-3 pl-md-0">

              <!-- Heading -->
              <h5 class="foot-headers my-1">
                ¿Necesita más información?
              </h5>

              <!-- Text -->
              <p class="mb-0 foot-text text-muted">
                Puede escribirnos al e-mail <a href="mailto:info@casamartinez.mx">info@casamartinez.mx</a>  
              </p>

            </div>

          </div>

        </div>
        <div class="col-12 col-md-6 col-lg-3">

          <!-- Item -->
          <div class="d-flex mb-2 mb-md-0 pb-1 mb-lg-0">

            <!-- Icon -->
            <div class="my-md-1 my-2"><i data-feather="lock"></i></div>

            <!-- Body -->
            <div class="ml-2 pl-1 ml-md-3 pl-md-0">

              <!-- Heading -->
              <h5 class="foot-headers my-1">
                ¿Es segura mi compra?
              </h5>

              <!-- Text -->
              <p class="mb-0 foot-text text-muted">
                Completamente. No se preocupe.
              </p>

            </div>

          </div>

        </div>
        <div class="col-12 col-md-6 col-lg-3">

          <!-- Item -->
          <div class="d-flex mb-2 mb-md-0 pb-1 mb-lg-0">

            <!-- Icon -->
            <!--<div class="my-1"><i data-feather="meh"></i></div>-->
            <div class="my-md-1 my-2"><i class="far fa-frown-open" style="font-size: 1.5rem"></i></div>

            <!-- Body -->
            <div class="ml-2 pl-1 ml-md-3 pl-md-0">

              <!-- Heading -->
              <h5 class="foot-headers my-1">
                ¿Tuvo algún problema con su envío?
              </h5>

              <!-- Text -->
              <p class="mb-0 foot-text text-muted">
                Puede consultar nuestra Políticas de devoluciones
              </p>

            </div>

          </div>

        </div>
      </div>
    </div>
  </section>

  <table id="list">
    
  </table>

@endsection

@section('scripts')

<script type="text/javascript" src="/js/card-collapse.js"></script>
<script type="text/javascript">
  $("#div-footer").removeClass("mt-5");
  $(window).scroll(function(){
    var alto = $("#head-tienda").outerHeight();
    $("#topbar").toggleClass('nav-white', $(this).scrollTop()>alto);
  });

  if( isBreakpoint('xs') || isBreakpoint('sm')) {
   $("#rowProductsRecomend div.col-6:last-child").remove();
   $(".card-actions").addClass("pt-1 pr-2");
   $(".col-4.col-img").addClass("pl-0");
  }

</script>
@endsection