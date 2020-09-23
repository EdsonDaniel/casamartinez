@extends('layouts.layout-tienda')

@section('title')
	Tienda en línea | Casa Martínez
@endsection

@section('stylesheet')
<link href="css/custom/tienda.css" rel="stylesheet" type="text/css" />

@endsection

@section('content')
<!--<div class="device-sm d-none d-md-block"></div>-->
<div class="device-xs d-block d-sm-none"></div>
<div class="device-sm d-none d-sm-block d-md-none"></div>
<div class="device-md d-none d-md-block d-lg-none"></div>
<div class="device-lg d-none d-lg-block"></div>
<div id="head-tienda">
  <div class="row justify-content-center no-gutters">
    <div class="col-sm-2 row justify-content-center">
      <div class="col-7 col-md-9 col-lg-10 ">
        <img src="img/logo-casa-martinez-svg.svg" class="img-fluid" alt="Logo Casa Martínez">
      </div>
    </div>
  </div>
  <h2 class="titulo text-center m-0 p-0">TIENDA EN LÍNEA</h2>
</div>
<section class="p-1 pt-4">
  <div class="container p-md-0">
    <div class="row ">
      <!--sidebar-->
      <div class="col-12 col-md-3 col-lg-3 pl-sm-3 pl-md-0 pb-1" id="side-branch">
        <!-- Filters -->
        <form class="mb-10 mb-md-0">
          <ul class="nav nav-vertical shadow-sm" id="listSide">
            <li class="nav-item " id="li-listSide">
              <!-- Toggle -->
              <a class="nav-link shadow-sm title-product dropdown-toggle font-size-md position-relative" data-toggle="collapse" aria-expanded="true" href="#branchCollapse" id="linkBranchCollapse">
                Nuestras Marcas
                <i class="right fas fa-angle-down"></i>
              </a>

              <!-- Collapse -->
              <div class="collapse show shadow shadow-sm" id="branchCollapse">
                <div class="form-group m-0">
                  <ul class="pl-2 mb-0" id="productsNav">
                    <li class="px-1 py-2">
                      <a class="" >Sinái</a>
                    </li>
                    <li class="px-1 py-2">
                      <a class="" >Ignacio Martínez</a>
                    </li>
                    <li class="px-1 py-2">
                      <a class="" >Origen verde</a>
                    </li>
                    <li class="px-1 py-2">
                      <a class="" >Habitante</a>
                    </li>
                    
                  </ul>
                </div>
              </div>

            </li>
          </ul>
        </form>
      </div>
      <!--sidebar-->
      
      <!--products-->
      <div class="col-12 col-md-9 col-lg-9 ">
        <div class="row align-items-center mb-md-3 " id="rowFilters">
          <!--<div class="col-12 col-md-auto text-center">-->
            <!-- Filter -->
            <div class="col-12 d-flex align-items-center justify-content-end bg-gray rounded-top pr-2 " id="filterBar">
              <a class="text-body p-2 d-block w-100 text-right"  data-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter" id="linkCollapseFilter">
                <i class="fas fa-list-ul mr-2 fa-xs"></i></i>Filtros
              </a>
            </div>
            <div class="col-12 collapse shadow pt-2" id="collapseFilter" >
              <!--<div class="container-fluid mb-4 border-bottom" >-->
              <form >
                <div class="container">
                  <div class="row justify-content-center">
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
                    <div class="form-group form-group-overflow mb-md-0 pl-3 pl-md-4">
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
        <div class="row mt-4" id="rowProducts">
          <div class="col-6 col-md-4 mb-0">

            <!-- Card -->
            <div class="card border-0 mb-0 mb-md-5">

              <!-- Badge -->
              <div class="badge badge-dark rounded-right card-badge card-badge-left text-uppercase">
                New
              </div>

              <!-- Image -->
              <div class="card-img">

                <!-- Image -->
                <a class="card-img-hover" href="product.html">
                  <img class="card-img-top card-img-back p-3" src="/img/botellas/sinai-sq.jpg" alt="...">
                  <img class="card-img-top card-img-front p-3" src="/img/botellas/anejo-sq.jpg" alt="...">
                </a>

                <!-- Actions -->
                <div class="card-actions">
                  <span class="card-action">
                    <button class="btn btn-xs btn-circle btn-light border" data-toggle="modal" data-target="#modalProduct">
                      <i data-feather="eye"></i>
                    </button>
                  </span>
                  <span class="card-action">
                    <button class="btn btn-xs btn-circle btn-light border" data-toggle="button">
                      <i data-feather="shopping-cart"></i>
                    </button>
                  </span>
                  <span class="card-action">
                    <button class="btn btn-xs btn-circle btn-light border" data-toggle="button">
                      <i data-feather="heart"></i>
                    </button>
                  </span>
                </div>

              </div>

              <!-- Body -->
              <div class="card-body text-center py-0 pt-md-3 border-top">

                <!-- Title -->
                <div class="pb-1">
                  <a class="text-body title-product" href="product.html">
                    Mezcal Sinái (Joven) 750 ml
                  </a>
                </div>

                <!-- Price -->
                <div class="text-muted price-product">
                  $129.00
                </div>

              </div>

            </div>

          </div>

          <div class="col-6 col-md-4 mb-0">

            <!-- Card -->
            <div class="card border-0 mb-0 mb-md-5">

              <!-- Badge -->
              <div class="badge badge-dark rounded-right card-badge card-badge-left text-uppercase">
                New
              </div>

              <!-- Image -->
              <div class="card-img">

                <!-- Image -->
                <a class="card-img-hover" href="product.html">
                  <img class="card-img-top card-img-back p-3" src="/img/botellas/sinai-sq.jpg" alt="...">
                  <img class="card-img-top card-img-front p-3" src="/img/botellas/anejo-sq.jpg" alt="...">
                </a>

                <!-- Actions -->
                <div class="card-actions">
                  <span class="card-action">
                    <button class="btn btn-xs btn-circle btn-light border" data-toggle="modal" data-target="#modalProduct">
                      <i data-feather="eye"></i>
                    </button>
                  </span>
                  <span class="card-action">
                    <button class="btn btn-xs btn-circle btn-light border" data-toggle="button">
                      <i data-feather="shopping-cart"></i>
                    </button>
                  </span>
                  <span class="card-action">
                    <button class="btn btn-xs btn-circle btn-light border" data-toggle="button">
                      <i data-feather="heart"></i>
                    </button>
                  </span>
                </div>

              </div>

              <!-- Body -->
              <div class="card-body text-center py-0 pt-md-3 border-top">

                <!-- Title -->
                <div class="pb-1">
                  <a class="text-body title-product" href="product.html">
                    Mezcal Sinái (Joven) 750 ml
                  </a>
                </div>

                <!-- Price -->
                <div class=" text-muted price-product">
                  $129.00
                </div>

              </div>

            </div>

          </div>

          <div class="col-6 col-md-4 mb-0">

            <!-- Card -->
            <div class="card border-0 mb-0 mb-md-5">

              <!-- Badge -->
              <div class="badge badge-dark rounded-right card-badge card-badge-left text-uppercase">
                New
              </div>

              <!-- Image -->
              <div class="card-img">

                <!-- Image -->
                <a class="card-img-hover" href="product.html">
                  <img class="card-img-top card-img-back p-3" src="/img/botellas/sinai-sq.jpg" alt="...">
                  <img class="card-img-top card-img-front p-3" src="/img/botellas/anejo-sq.jpg" alt="...">
                </a>

                <!-- Actions -->
                <div class="card-actions">
                  <span class="card-action">
                    <button class="btn btn-xs btn-circle btn-light border" data-toggle="modal" data-target="#modalProduct">
                      <i data-feather="eye"></i>
                    </button>
                  </span>
                  <span class="card-action">
                    <button class="btn btn-xs btn-circle btn-light border" data-toggle="button">
                      <i data-feather="shopping-cart"></i>
                    </button>
                  </span>
                  <span class="card-action">
                    <button class="btn btn-xs btn-circle btn-light border" data-toggle="button">
                      <i data-feather="heart"></i>
                    </button>
                  </span>
                </div>

              </div>

              <!-- Body -->
              <div class="card-body text-center py-0 pt-md-3 border-top">

                <!-- Title -->
                <div class="pb-1">
                  <a class="text-body title-product" href="product.html">
                    Mezcal Sinái (Joven) 750 ml
                  </a>
                </div>

                <!-- Price -->
                <div class=" text-muted price-product">
                  $129.00
                </div>

              </div>

            </div>

          </div>

          <div class="col-6 col-md-4 mb-0">

            <!-- Card -->
            <div class="card border-0 mb-0 mb-md-5">

              <!-- Badge -->
              <div class="badge badge-dark rounded-right card-badge card-badge-left text-uppercase">
                New
              </div>

              <!-- Image -->
              <div class="card-img">

                <!-- Image -->
                <a class="card-img-hover" href="product.html">
                  <img class="card-img-top card-img-back p-3" src="/img/botellas/sinai-sq.jpg" alt="...">
                  <img class="card-img-top card-img-front p-3" src="/img/botellas/anejo-sq.jpg" alt="...">
                </a>

                <!-- Actions -->
                <div class="card-actions">
                  <span class="card-action">
                    <button class="btn btn-xs btn-circle btn-light border" data-toggle="modal" data-target="#modalProduct">
                      <i data-feather="eye"></i>
                    </button>
                  </span>
                  <span class="card-action">
                    <button class="btn btn-xs btn-circle btn-light border" data-toggle="button">
                      <i data-feather="shopping-cart"></i>
                    </button>
                  </span>
                  <span class="card-action">
                    <button class="btn btn-xs btn-circle btn-light border" data-toggle="button">
                      <i data-feather="heart"></i>
                    </button>
                  </span>
                </div>

              </div>

              <!-- Body -->
              <div class="card-body text-center py-0 pt-md-3 border-top">

                <!-- Title -->
                <div class="pb-1">
                  <a class="text-body title-product" href="product.html">
                    Mezcal Sinái (Joven) 750 ml
                  </a>
                </div>

                <!-- Price -->
                <div class=" text-muted price-product">
                  $129.00
                </div>

              </div>

            </div>

          </div>

          

        </div>

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
    </div>
  </div>
</section>
@endsection


@section('scripts')
<!--change navbar bg color-->
<script type="text/javascript">
  $(window).scroll(function(){
    var alto = $("#head-tienda").outerHeight();
    $("#topbar").toggleClass('nav-white', $(this).scrollTop()>alto);
  });
</script>
<script type="text/javascript" src="js/card-collapse.js"></script>
@endsection