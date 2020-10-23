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
                          <input class="custom-control-input"  name="category" type="checkbox" value="Summer">
                          <label class="custom-control-label" for="seasonOne">Joven</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input"  name="category" type="checkbox" value="Winter">
                          <label class="custom-control-label" for="seasonTwo">Reposado</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input"  name="category" type="checkbox" value="Spring &amp; Fall">
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
                          <input class="custom-control-input"  name="category" type="checkbox" value="Summer">
                          <label class="custom-control-label" for="seasonOne">750 ml.</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input"  name="category" type="checkbox" value="Winter">
                          <label class="custom-control-label" for="seasonTwo">500 ml.</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input"  name="category" type="checkbox" value="Spring &amp; Fall">
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
                          <input class="custom-control-input"  name="category" type="checkbox" value="Summer">
                          <label class="custom-control-label" for="seasonOne">Más populares</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input"  name="category" type="checkbox" value="Winter">
                          <label class="custom-control-label" for="seasonTwo">Precio (Menor a mayor)</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input"  name="category" type="checkbox" value="Spring &amp; Fall">
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
          <form id="addToCart" action="" method="post">
            @csrf
            @method('POST')
          </form>
          @foreach($productos as $producto)
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
                <a class="card-img-hover" href="/tienda/detalles-producto?product={{$producto->producto_id."_".$producto->id_presentacion}}">
                  <img class="card-img-top card-img-back p-1 p-md-2" src="/img/botellas/sinai-sq.jpg" alt="...">
                  <img class="card-img-top card-img-front p-1 p-md-2" src="/storage/{{$producto->foto_url}}" alt="...">
                </a>

                <!-- Actions -->
                <div class="card-actions">
                  <div class="card-action tooltip">
                    <button class="btn-xs btn-circle btn-light border" data-toggle="modal" data-target="#modalProduct" data-product="{{$producto->producto_id}}" data-presentation="{{$producto->id_presentacion}}">
                      <i data-feather="eye"></i>
                    </button>
                    <span class="tooltiptext tooltip-left">Ver producto</span>
                  </div>
                  <div class="card-action tooltip">
                      <button class="btn-xs btn-circle btn-light border toCart" data-presentation="{{$producto->id_presentacion}}" data-toggle="button" >
                        <i data-feather="shopping-cart"></i>
                        <img src="/img/pulse-loading.gif" class="img-fluid">
                      </button>
                      <span class="tooltiptext tooltip-left tooltiptext-lg">Agregar al carrito</span>
                  </div>
                </div>

              </div>

              <!-- Body -->
              <div class="card-body mt-1 p-0 pt-1 text-center mx-2 pt-md-2 border-top">

                <!-- Title -->
                <div class="pb-1 title-wrapper">
                  <a class="text-body title-product" href="/tienda/detalles-producto?product={{$producto->producto_id."_".$producto->id_presentacion}}">
                    {{$producto->nombre }}
                    <span class="d-block">{{ $producto->presentacion }}</span>
                  </a>
                </div>

                <!-- Price -->
                <div class="text-secpndary price-product mt-1 mt-md-0">
                  {{ $producto->formated_price }}
                </div>

              </div>

            </div>

          </div>
          @endforeach

        </div>
        <!-- row products-->

        
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')
<!--change navbar bg color-->
<script type="text/javascript">
  var productos = {!! json_encode($productos) !!};
  var logged = @json(Auth::check());
  @if(Auth::check())
  var inCart = {!! json_encode($inCart) !!};
  @endif
</script>
<script type="text/javascript" src="/js/custom/tiendaEfectos.js"></script>
@endsection