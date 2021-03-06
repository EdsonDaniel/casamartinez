@extends('layouts.layout-tienda')

@section('title')
	Tienda en línea | Casa Martínez
@endsection

@section('content')


<div class="device-xs d-block d-sm-none"></div>
<div class="device-sm d-none d-sm-block d-md-none"></div>
<div class="device-md d-none d-md-block d-lg-none"></div>
<div class="device-lg d-none d-lg-block"></div>
<div id="head-tienda">
  <div class="row justify-content-center no-gutters">
    <div class="col-10 col-md-2 row justify-content-center">
      <div class="col-7 col-md-9 col-lg-10 ">
        <img src="/img/logo-casa-martinez-svg.svg" class="img-fluid" alt="Logo Casa Martínez">
      </div>
    </div>
  </div>
  <h2 class="titulo text-center m-0 p-0">TIENDA EN LÍNEA</h2>
</div>
<section class="p-1 pt-2 pt-md-3">
  <div class="container p-md-0">
    <div class="row ">
      <!--sidebar-->
      <div class="col-12 col-md-3 col-lg-3 pl-md-0 pb-1" id="side-branch">
        <div class="row no-gutters">
          <div class="col-12 nav-item " id="listSide">
            <!-- Toggle -->
            <a class="nav-link border-bottom-0 position-relative" data-toggle="collapse" aria-expanded="false" href="#branchCollapse" id="linkBranchCollapse" role="button" aria-controls="branchCollapse" ><!--border-->
              Nuestras Marcas
              <i class="right fas fa-angle-down"></i>
            </a>

            <!-- Collapse -->
            <div class="collapse border-top-0 rounded-0 shadow shadow-sm" id="branchCollapse">
              <div class="container">
                <ul class="pl-2 py-2 mb-0" id="productsNav">
                  <li>
                    <a >Sinái</a>
                  </li>
                  <li>
                    <a >Ignacio Martínez</a>
                  </li>
                  <li>
                    <a >Origen verde</a>
                  </li>
                  <li>
                    <a >Habitante</a>
                  </li>
                  
                </ul>
              </div>
              
            </div>
          </div>
        </div>
        
      
      </div>
      <!--sidebar-->
      
      <div class="col-12 col-md-9 col-lg-9 ">
        <div class="row align-items-center mb-md-2 no-gutters" id="rowFilters">
          <!--<div class="col-12 col-md-auto text-center">-->
            <!-- Filter -->
            <div class="col-12 d-flex align-items-center justify-content-end bg-dark rounded-top pr-2 border-0" id="filterBar">
              <a class="text-white p-2 d-block w-100 text-right"  data-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter" id="linkCollapseFilter">
                <i class="fas fa-list-ul mr-2 fa-xs"></i>Filtros
              </a>
            </div>
            <div class="col-12 collapse shadow border-0 rounded-0" id="collapseFilter" >
              <!--<div class="container-fluid mb-4 border-bottom" >-->
              <form id="formFilter">
                <div class="container">
                  <div class="row pt-2 justify-content-center">
                    <div class="col-6 col-md-4">
                      <!-- Heading -->
                      <p class="">
                        <strong>Tipo de Mezcal:</strong>
                      </p>

                      <!-- Form group -->
                      <div class="form-group form-group-overflow mb-md-0 pl-3 pl-md-4">
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" id="seasonOne" name="category" type="checkbox" value="Summer">
                          <label class="custom-control-label" for="seasonOne">Joven</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" id="seasonTwo" name="category" type="checkbox" value="Winter">
                          <label class="custom-control-label" for="seasonTwo">Reposado</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" id="seasonThree" name="category" type="checkbox" value="Spring &amp; Fall">
                          <label class="custom-control-label" for="seasonThree">Añejo</label>
                        </div>
                      </div>

                    </div>

                    <div class="col-6 col-md-4">
                      <!-- Heading -->
                      <p class="">
                        <strong>Presentación:</strong>
                      </p>

                      <!-- Form group -->
                      <div class="form-group form-group-overflow mb-md-0 pl-3 pl-md-4">
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" id="seasonOne" name="category" type="checkbox" value="Summer">
                          <label class="custom-control-label" for="seasonOne">750 ml.</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" id="seasonTwo" name="category" type="checkbox" value="Winter">
                          <label class="custom-control-label" for="seasonTwo">500 ml.</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" id="seasonThree" name="category" type="checkbox" value="Spring &amp; Fall">
                          <label class="custom-control-label" for="seasonThree">250ml.</label>
                        </div>
                      </div>
                    </div>
                
                    <div class="col-12 col-md-4">

                      <!-- Heading -->
                      <p class="">
                        <strong>Ordenar por:</strong>
                      </p>

                      <!-- Form group -->
                      <div class="form-group-overflow mb-md-0 pl-3 pl-md-4">
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" id="seasonOne" name="category" type="checkbox" value="Summer">
                          <label class="custom-control-label" for="seasonOne">Más populares</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" id="seasonTwo" name="category" type="checkbox" value="Winter">
                          <label class="custom-control-label" for="seasonTwo">Precio (Menor a mayor)</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" id="seasonThree" name="category" type="checkbox" value="Spring &amp; Fall">
                          <label class="custom-control-label" for="seasonThree">Precio (Mayor a menor)</label>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

              </form>
              <!--</div>-->
            </div>
        </div>

        <!-- Products -->
        <div class="row no-gutters mt-3 mt-md-0 shadow" id="rowProducts">
          <div class="col-6 col-md-4 mb-2 mb-md-0">

            <!-- Card -->
            <div class="card border-0 mb-0 mb-md-5">

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
              <div class="card-body mt-1 p-0 pt-1 text-center mx-2 pt-md-2 border-top">

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

          <div class="col-6 col-md-4 mb-2 mb-md-0">

            <!-- Card -->
            <div class="card border-0 mb-0 mb-md-5">

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
              <div class="card-body mt-1 p-0 pt-1 text-center mx-2 pt-md-2 border-top">

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

          <div class="col-6 col-md-4 mb-2 mb-md-0">

            <!-- Card -->
            <div class="card border-0 mb-0 mb-md-5">

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
              <div class="card-body mt-1 p-0 pt-1 text-center mx-2 pt-md-2 border-top">

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

          <div class="col-6 col-md-4 mb-2 mb-md-0">

            <!-- Card -->
            <div class="card border-0 mb-0 mb-md-5">

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
              <div class="card-body mt-1 p-0 pt-1 text-center mx-2 pt-md-2 border-top">

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

          <div class="col-6 col-md-4 mb-2 mb-md-0">

            <!-- Card -->
            <div class="card border-0 mb-0 mb-md-5">

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
              <div class="card-body mt-1 p-0 pt-1 text-center mx-2 pt-md-2 border-top">

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
        <!-- row products-->

        <!--rowPagination-->
        <div class="row justify-content-end mt-4" id="rowPagination">
          <!-- Pagination -->
          <nav class="d-flex justify-content-center justify-content-md-end">
            <ul class="pagination pagination-sm text-gray-400">
              <li class="page-item">
                <a class="page-link page-link-arrow" href="#">
                  <i class="fa fa-caret-left"></i>
                </a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">5</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">6</a>
              </li>
              <li class="page-item">
                <a class="page-link page-link-arrow" href="#">
                  <i class="fa fa-caret-right"></i>
                </a>
              </li>
            </ul>
          </nav>

        </div>
        <!--rowPagination-->
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