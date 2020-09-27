@extends('layouts.layout-tienda')

@section('title')
  Tienda en línea | Casa Martínez
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

        <div class="form-row mb-10 mb-md-0">
          <div class="col-2">
            <!-- Radio -->
            <div class="div-img-radio-products mt-md-2">
              <div class="custom-control custom-control-inline custom-control-img mb-4s">
                <input type="radio" class="custom-control-input" id="modalProductColorOne" name="modalProductColor" data-toggle="form-caption" data-target="#modalProductColorCaption" value="White" checked="">
                <label class="custom-control-label pb-1" for="modalProductColorOne">
                  <span class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(/img/botellas/anejo-sq.jpg);"></span>
                </label>
              </div>
              <div class="custom-control custom-control-inline custom-control-img mb-4s">
                <input type="radio" class="custom-control-input" id="modalProductColorTwo" name="modalProductColor" data-toggle="form-caption" data-target="#modalProductColorCaption" value="Black">
                <label class="custom-control-label pb-1" for="modalProductColorTwo">
                  <span class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(/img/botellas/sinai-sq.jpg);"></span>
                </label>
              </div>
            </div>
          </div>
          <div class="col-10">

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
      
      <div class="col-12 col-md-6 pl-md-4">

        <!-- Heading -->
        <h4 class="mb-1 mx-1 mx-md-auto mb-md-2 mb-md-3 title-product-modal">Mezcal Sinái (Joven) 750ml</h4>

        <div class="row mt-3">
          <div class="col-12 description">
            <p class="">
              Mezcal artesanal joven.
              Elaborado a base de agave 100% orgánico certificado. Su agradable aroma y sabor complacen hasta los paladares más exigentes.
            </p>
          </div>
        </div>

        <div class="row mt-3">

          <div class="col-12 col-md-6">
            <!-- Price -->
            <div class="mb-1 b-md-3 mx-1 mx-md-auto">
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
                  <input type="number" class="form-control" id="inputCantidad" placeholder="1" value="1" min="1" max="10">
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
              <p class="mx-1 mx-md-auto mb-4">
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
              <div class="col-12 px-0 mb-md-3">
                <!-- Submit -->
                <button type="submit" class="btn btn-block rounded-0 btn-modals ">Agregar al carrito <i class="fe fe-shopping-cart ml-2"></i></button>
              </div>

              <div class="col-12 px-0 ">
                <!-- Submit -->
                <button type="submit" class="btn btn-block rounded-0 btn-modals">Comprar ahora<i class="fe fe-shopping-cart ml-2"></i></button>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-md-6 mt-2">
            <p class="mb-0">
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

  <section class="pt-11">
      <div class="container">
        <div class="row">
          <div class="col-12">

            <!-- Nav -->
            <div class="nav nav-tabs nav-overflow justify-content-start justify-content-md-center border-bottom">
              <a class="nav-link active" data-toggle="tab" href="#descriptionTab">
                Description
              </a>
              <a class="nav-link" data-toggle="tab" href="#sizeTab">
                Size &amp; Fit
              </a>
              <a class="nav-link" data-toggle="tab" href="#shippingTab">
                Shipping &amp; Return
              </a>
            </div>

            <!-- Content -->
            <div class="tab-content">
              <div class="tab-pane fade active show" id="descriptionTab">
                <div class="row justify-content-center py-9">
                  <div class="col-12 col-lg-10 col-xl-8">
                    <div class="row">
                      <div class="col-12">

                        <!-- Text -->
                        <p class="text-gray-500">
                          Won't herb first male seas, beast. Let upon, female upon third fifth every. Man subdue rule after years herb after
                          form. And image may, morning. Behold in tree day sea that together cattle whose. Fifth gathering brought
                          bearing. Abundantly creeping whose. Beginning form have void two. A whose.
                        </p>

                      </div>
                      <div class="col-12 col-md-6">

                        <!-- List -->
                        <ul class="list list-unstyled mb-md-0 text-gray-500">
                          <li>
                            <strong class="text-body">SKU</strong>: #61590437
                          </li>
                          <li>
                            <strong class="text-body">Occasion</strong>: Lifestyle, Sport
                          </li>
                        </ul>

                      </div>
                      <div class="col-12 col-md-6">

                        <!-- List -->
                        <ul class="list list-unstyled mb-0">
                          <li>
                            <strong>Country</strong>: USA
                          </li>
                          <li>
                            <strong>Meterial</strong>: 96% Cotton, 4% Elastane
                          </li>
                        </ul>

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

                    <!-- Table -->
                    <div class="table-responsive">
                      <table class="table table-bordered table-sm table-hover">
                        <thead>
                          <tr>
                            <th>Shipping Options</th>
                            <th>Delivery Time</th>
                            <th>Price</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Standard Shipping</td>
                            <td>Delivery in 5 - 7 working days</td>
                            <td>$8.00</td>
                          </tr>
                          <tr>
                            <td>Express Shipping</td>
                            <td>Delivery in 3 - 5 working days</td>
                            <td>$12.00</td>
                          </tr>
                          <tr>
                            <td>1 - 2 day Shipping</td>
                            <td>Delivery in 1 - 2 working days</td>
                            <td>$12.00</td>
                          </tr>
                          <tr>
                            <td>Free Shipping</td>
                            <td>
                              Living won't the He one every subdue meat replenish
                              face was you morning firmament darkness.
                            </td>
                            <td>$0.00</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <!-- Caption -->
                    <p class="mb-0 text-gray-500">
                      May, life blessed night so creature likeness their, for. <a class="text-body text-decoration-underline" href="#!">Find out more</a>
                    </p>

                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

@endsection

@section('more-content')
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
                        <label class="text-center mr-3 mr-md-0 my-0" for="inputCantidad">Cantidad:</label>
                        <div class="input-group mt-md-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text p-0">
                              <button type="button" disabled="true" class="btn icon-input-number" id="buttonMinus">-</button>
                            </div>
                          </div>
                          <input type="number" class="form-control" id="inputCantidad" placeholder="1" value="1" min="1" max="10">
                          <div class="input-group-append">
                            <div class="input-group-text p-0">
                              <button type="button" class="btn icon-input-number" id="buttonPlus">+</button>
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

@endsection
@section('scripts')
<!--change navbar bg color-->
<script type="text/javascript">
  $(window).scroll(function(){
    var alto = $("#head-tienda").outerHeight();
    $("#topbar").toggleClass('nav-white', $(this).scrollTop()>alto);
  });
</script>
<script type="text/javascript" src="/js/card-collapse.js"></script>
@endsection