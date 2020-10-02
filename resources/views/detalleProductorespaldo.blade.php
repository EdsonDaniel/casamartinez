@extends('layouts.layout-tienda')

@section('title')
  Tienda en línea | Casa Martínez
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
                  <span class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(/img/botellas/anejo-sq.jpg);"></span>
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
                <img class="card-img-top card-img-back p-1 p-md-2" src="/img/botellas/anejo-sq.jpg" alt="...">

              </div>

            </div>

            <!-- Card -->
          </div>

        </div>

      </div>
      
      <div class="col-12 col-md-6 pl-md-4 mt-4 mt-md-3 px-4">

        <!-- Heading -->
        <h4 class="mb-1 mx-md-auto mb-md-2 mb-md-3 title-product-modal">Mezcal Sinái (Joven) 750ml</h4>

        <div class="row mt-3">
          <div class="col-12 description">
            <p class="m-0">
              Mezcal artesanal joven.
              Elaborado a base de agave 100% orgánico certificado. Su agradable aroma y sabor complacen hasta los paladares más exigentes.
            </p>
          </div>
        </div>

        <div class="row mt-3">

          <div class="col-12 col-md-6">
            <!-- Price -->
            <div class="mb-1 b-md-3 mx-md-auto">
              <h4 class="price-product-modal mb-1 ">$850.00 MXN</h4>
              <span class="product-status d-block mt-md-2">Disponible</span>
            </div>
          </div>

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
        </div>

        <div class="row mt-3">

          <div class="col-12 col-md-6">
            <div class="form-group">

              <!-- Label -->
              <p class="mx-md-auto mb-4">
                Presentación: <strong id="modalProductColorCaption">750 ml</strong>
              </p>

              <!-- Radio -->
              <div class="div-img-radio-products">
                <div class="custom-control custom-control-inline custom-control-img">
                  <input type="radio" class="custom-control-input" id="modalProductColorOne" name="modalProductColor" data-toggle="form-caption" data-target="#modalProductColorCaption" value="White" checked="">
                  <label class="custom-control-label pb-1" for="modalProductColorOne">
                    <span class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(/img/botellas/anejo-sq.jpg);"></span>
                  </label>
                </div>
                <div class="custom-control custom-control-inline custom-control-img">
                  <input type="radio" class="custom-control-input" id="modalProductColorTwo" name="modalProductColor" data-toggle="form-caption" data-target="#modalProductColorCaption" value="Black">
                  <label class="custom-control-label pb-1" for="modalProductColorTwo">
                    <span class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(/img/botellas/anejo-sq.jpg);"></span>
                  </label>
                </div>
                <div class="custom-control custom-control-inline custom-control-img">
                  <input type="radio" class="custom-control-input" id="modalProductColorTwo" name="modalProductColor" data-toggle="form-caption" data-target="#modalProductColorCaption" value="Black">
                  <label class="custom-control-label pb-1" for="modalProductColorTwo">
                    <span class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(/img/botellas/anejo-sq.jpg);"></span>
                  </label>
                </div>
              </div>
            </div>
          </div>
          
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

            <!-- Nav -->
            <div class="nav nav-tabs nav-overflow justify-content-start justify-content-md-center border-bottom-0 text-center" id="nav-description">
              <a class="nav-link active" data-toggle="tab" href="#descriptionTab">
                Especifica&shy;ciones
              </a>
              <a class="nav-link" data-toggle="tab" href="#sizeTab">
                Métodos de Envío
              </a>
              <a class="nav-link" data-toggle="tab" href="#shippingTab">
                Métodos de Pago
              </a>
            </div>

            <!-- Content -->
            <div class="tab-content mt-4 mt-md-5">
              <div class="tab-pane fade active show" id="descriptionTab">
                <div class="row justify-content-center mx-0 mx-md-auto">
                  <div class="col-12 col-lg-10 col-xl-8">
                    <div class="row">
                      <div class="col-12">

                        <!-- Text -->
                        <p class="">
                          Won't herb first male seas, beast. Let upon, female upon third fifth every. Man subdue rule after years herb after
                          form. And image may, morning. Behold in tree day sea that together cattle whose. Fifth gathering brought
                          bearing. Abundantly creeping whose. Beginning form have void two. A whose.
                        </p>

                      </div>
                      <h3 class="mx-2 mx-md-auto">Detalles del producto</h3>

                      <div class="col-12 ">
                        <div class="row justify-content-center">
                          <div class="col-12 col-md-9">
                            <!-- Table -->
                            <div class="table-responsive">
                              <table class="table table-bordered table-sm table-hover">
                                <tbody>
                                  <tr>
                                    <td>Maestro Mezcalero</td>
                                    <td>Ignacio Martpinez</td>
                                  </tr>
                                  <tr>
                                    <td>Maguey</td>
                                    <td>Angustifolia, Maguey Espadín</td>
                                  </tr>
                                  <tr>
                                    <td>Edad de maguey</td>
                                    <td>10 años.</td>
                                  </tr>
                                  <tr>
                                    <td>Destilación</td>
                                    <td>
                                      Doble, en ollas de cobre.
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      <div class="col-12">
                      <!-- Caption -->
                        <p class="mb-0 text-gray-500">
                          May, life blessed night so creature likeness their, for. <a class="text-body text-decoration-underline" href="#!">Find out more</a>
                        </p>
                      </div>
                      
                    </div>

                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="sizeTab">
                <div class="row justify-content-center py-9">
                  <div class="col-12 col-lg-10 col-xl-8">
                    <div class="row">
                      <div class="col-12 col-md-6">

                        <!-- Text -->
                        <p class="mb-4">
                          <strong>Fitting information:</strong>
                        </p>

                        <!-- List -->
                        <ul class="mb-md-0 text-gray-500">
                          <li>
                            Upon seas hath every years have whose
                            subdue creeping they're it were.
                          </li>
                          <li>
                            Make great day bearing.
                          </li>
                          <li>
                            For the moveth is days don't said days.
                          </li>
                        </ul>

                      </div>
                      <div class="col-12 col-md-6">

                        <!-- Text -->
                        <p class="mb-4">
                          <strong>Model measurements:</strong>
                        </p>

                        <!-- List -->
                        <ul class="list-unstyled text-gray-500">
                          <li>Height: 1.80 m</li>
                          <li>Bust/Chest: 89 cm</li>
                          <li>Hips: 91 cm</li>
                          <li>Waist: 65 cm</li>
                          <li>Model size: M</li>
                        </ul>

                        <!-- Size -->
                        <p class="mb-0">
                          <img src="assets/img/icons/icon-ruler.svg" alt="..." class="img-fluid">
                          <a class="text-reset text-decoration-underline ml-3" data-toggle="modal" href="#modalSizeChart">Size chart</a>
                        </p>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="shippingTab">
                <div class="row justify-content-center py-9">
                  <div class="col-12 col-lg-10 col-xl-8">
                    <p>Su compra es 100% segura. Puede pagar a través de las siguientes plataformas.</p>

                    <div class="d-flex mt-4 justify-content-center">
                      <div class="mr-4"> <img class="img-fluid icon-payment" src="/img/icons/icono-mp-sm.png"></div>
                      <div class="mr-4"><img class="img-fluid icon-payment" src="/img/icons/PP_logo_h_100x26.png"></div>
                      <div><img class="img-fluid icon-payment" src="/img/icons/Stripe-wordmark-blurple_sm.png"></div>
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
            <h4 class="mb-4 mb-md-5 text-center" style="font-weight: 500;">Nuestras recomendaciones para usted</h4>

            <!-- Products -->
            <div class="row mt-md-0 justify-content-center mx-0 mx-md-auto" id="rowProductsRecomend">
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
                    <a class="card-img-hover" href="product.html">
                      <img class="card-img-top card-img-back p-1 p-md-2" src="/img/botellas/sinai-sq.jpg" alt="...">
                      <img class="card-img-top card-img-front p-1 p-md-2" src="/img/botellas/anejo-sq.jpg" alt="...">
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
                      <a class="text-body title-product" href="product.html">
                        Mezcal Sinái (Joven) 750 ml
                      </a>
                    </div>

                    <!-- Price -->
                    <div class="text-secpndary price-product mt-1 mt-md-0">
                      $129.00
                    </div>

                  </div>

                </div>

              </div>

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
                    <a class="card-img-hover" href="product.html">
                      <img class="card-img-top card-img-back p-1 p-md-2" src="/img/botellas/sinai-sq.jpg" alt="...">
                      <img class="card-img-top card-img-front p-1 p-md-2" src="/img/botellas/anejo-sq.jpg" alt="...">
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
                      <a class="text-body title-product" href="product.html">
                        Mezcal Sinái (Joven) 750 ml
                      </a>
                    </div>

                    <!-- Price -->
                    <div class="text-secpndary price-product mt-1 mt-md-0">
                      $129.00
                    </div>

                  </div>

                </div>

              </div>

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
                    <a class="card-img-hover" href="product.html">
                      <img class="card-img-top card-img-back p-1 p-md-2" src="/img/botellas/sinai-sq.jpg" alt="...">
                      <img class="card-img-top card-img-front p-1 p-md-2" src="/img/botellas/anejo-sq.jpg" alt="...">
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
                      <a class="text-body title-product" href="product.html">
                        Mezcal Sinái (Joven) 750 ml
                      </a>
                    </div>

                    <!-- Price -->
                    <div class="text-secpndary price-product mt-1 mt-md-0">
                      $129.00
                    </div>

                  </div>

                </div>

              </div>

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

@section('more-content')
  <!--modal show peoduct-->
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
            <div class="col-12 col-lg-6 col-xl-5 py-3 py-md-4 py-xl-0 px-xl-0">

              <!-- Image -->
              <img class="img-fluid d-block my-md-5 " img-modal  src="/img/botellas/anejo-sq.jpg" alt="...">

            </div>
            <div class="col-12 col-lg-6 col-xl-7 py-9 px-md-9">

              <!-- Heading -->
              <h4 class="mb-1 mx-1 mx-md-auto mb-md-2 mb-md-3 title-product-modal">Mezcal Sinái(Joven) 750ml</h4>

              <!-- Price -->
              <div class="mb-1 b-md-3 mx-1 mx-md-auto">
                <h4 class="price-product-modal mb-1 mt-2">$850.00 MXN</h4>
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
                        Presentación: <strong id="modalProductColorCaption">750 ml</strong>
                      </p>

                      <!-- Radio -->
                      <div class="div-img-radio-products">
                        <div class="custom-control custom-control-inline custom-control-img">
                          <input type="radio" class="custom-control-input" id="modalProductColorOne" name="modalProductColor" data-toggle="form-caption" data-target="#modalProductColorCaption" value="White" checked="">
                          <label class="custom-control-label pb-1" for="modalProductColorOne">
                            <span class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(/img/botellas/anejo-sq.jpg);"></span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-inline custom-control-img">
                          <input type="radio" class="custom-control-input" id="modalProductColorTwo" name="modalProductColor" data-toggle="form-caption" data-target="#modalProductColorCaption" value="Black">
                          <label class="custom-control-label pb-1" for="modalProductColorTwo">
                            <span class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(/img/botellas/anejo-sq.jpg);"></span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-inline custom-control-img">
                          <input type="radio" class="custom-control-input" id="modalProductColorTwo" name="modalProductColor" data-toggle="form-caption" data-target="#modalProductColorCaption" value="Black">
                          <label class="custom-control-label pb-1" for="modalProductColorTwo">
                            <span class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(/img/botellas/anejo-sq.jpg);"></span>
                          </label>
                        </div>
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
                            <div class="input-group-text p-0">
                              <button type="button" disabled="true" class="btn icon-input-number btn-minus" >-</button>
                            </div>
                          </div>
                          <input type="number" class="form-control input-cantidad" placeholder="1" value="1" min="1" max="10">
                          <div class="input-group-append">
                            <div class="input-group-text p-0">
                              <button type="button" class="btn icon-input-number btn-plus">+</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--col-right-->

                  <div class="col-12 px-1 px-md-auto">
                    <!-- Submit -->
                    <button type="submit" class="btn btn-block rounded-0 my-1 my-md-2 btn-modals p-2">
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

  <!--modal cart shopping-->

  <div class="modal fixed-right fade" id="modalShoppingCart" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">

    <div class="modal-dialog modal-dialog-vertical" role="document">

      <!-- Full cart (add `.d-none` to disable it) -->
      <div class="modal-content">
        <!-- Close -->
        <button style="z-index: 5;" type="button" class="close btn-close-modal-right" data-dismiss="modal" aria-label="Close">
          <span class="fe fe-x" aria-hidden="true" >&times;</span>
        </button>

        <!-- Header-->
        <div class="modal-header title-modal-cart line-height-fixed font-size-lg">
          <span class="mx-auto" style="font-weight: 400;">Tu Carrito (2)</span>
        </div>

        <!-- List group -->
        <ul class="list-group list-group-lg list-group-flush">
          <li class="list-group-item">
            <div class="row align-items-center">
              <div class="col-4 col-img">

                <!-- Image -->
                <a href="">
                  <img class="img-fluid" src="/img/botellas/anejo-sq.jpg" alt="...">
                </a>

              </div>
              <div class="col-8 pl-0">

                <!-- Title -->
                <p class="font-size-sm font-weight-bold mb-2 mb-md-0">
                  <a class="text-body title-product-cart" href="">Mezcal Sinái (Joven) 750ml</a> <br>
                  <span class="price-cart d-block mt-2">$840.00</span>
                </p>

                <!--Footer -->
                <div class="d-flex align-items-md-center align-items-end">

                  <div class="d-flex align-items-md-center align-items-start flex-column flex-md-row">
                    <label class="d-block mr-2 my-0 mb-1 mb-md-0 cantidad-label" >Cantidad:</label>
                    <div class="input-group ">
                      <div class="input-group-prepend">
                        <div class="input-group-text p-0 rounded-0">
                          <button type="button" class="btn icon-input-number rounded-0 btn-minus d-none">-</button>
                          <button type="button" class="btn rounded-0 btn-trash d-none"><i class="icon-trash-product" data-feather="trash-2"></i></button>
                        </div>
                      </div>
                      <input type="number" class="form-control input-cantidad font-sans-serif" id="inputCantidadCart" placeholder="1" value="1" min="1" max="10">
                      <div class="input-group-append">
                        <div class="input-group-text p-0 rounded-0">
                          <button type="button" class="btn icon-input-number rounded-0 btn-plus">+</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <span class="price-cantidad text-muted ml-auto" >
                    $890.00
                  </span>

                </div>

              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row align-items-center">
              <div class="col-4">

                <!-- Image -->
                <a href="./product.html">
                  <img class="img-fluid" src="./assets/img/products/product-10.jpg" alt="...">
                </a>

              </div>
              <div class="col-8">

                <!-- Title -->
                <p class="font-size-sm font-weight-bold mb-6">
                  <a class="text-body" href="./product.html">Suede cross body Bag</a> <br>
                  <span class="text-muted">$49.00</span>
                </p>

                <!--Footer -->
                <div class="d-flex align-items-center">

                  <!-- Select -->
                  <select class="custom-select custom-select-xxs w-auto">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                  </select>

                  <!-- Remove -->
                  <a class="font-size-xs text-gray-400 ml-auto" href="#!">
                    <i class="fe fe-x"></i> Remove
                  </a>

                </div>

              </div>
            </div>
          </li>
        </ul>

        <!-- Footer -->
        <div class="modal-footer line-height-fixed font-size-sm bg-light mt-auto">
          <span class="subtotal-label">Subtotal</span> <span class="ml-auto monto-subtotal">$89.00</span>
        </div>

        <!-- Buttons -->
        <div class="modal-body">
          <a class="btn btn-block btn-modals btn-dark" href="./checkout.html">Proceder al pago</a>
          <a class="btn btn-block btn-outline-dark btn-modal-light" href="./shopping-cart.html">Ver carrito</a>
        </div>

      </div>

      <!-- Empty cart (remove `.d-none` to enable it) -->
      <div class="modal-content d-none">

        <!-- Close -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fe fe-x" aria-hidden="true"></i>
        </button>

        <!-- Header-->
        <div class="modal-header line-height-fixed font-size-lg">
          <strong class="mx-auto">Your Cart (0)</strong>
        </div>

        <!-- Body -->
        <div class="modal-body flex-grow-0 my-auto">

          <!-- Heading -->
          <h6 class="mb-7 text-center">Your cart is empty 😞</h6>

          <!-- Button -->
          <a class="btn btn-block btn-outline-dark" href="#!">
            Continue Shopping
          </a>

        </div>

      </div>

    </div>
  </div>

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