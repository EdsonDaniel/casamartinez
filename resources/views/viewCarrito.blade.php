@extends('layouts.layout-tienda')

@section('title')
	Tienda en línea | Casa Martínez
@endsection

@section('stylesheet')
  <style type="text/css">body{ padding-top: 0; }</style>
@endsection

@section('content')

	<div class="device-xs d-block d-sm-none"></div>
	<div class="device-sm d-none d-sm-block d-md-none"></div>
	<div class="device-md d-none d-md-block d-lg-none"></div>
	<div class="device-lg d-none d-lg-block"></div>
	<div id="head-tienda">
	  <div class="row justify-content-center no-gutters">
	    <div class="col-10 col-md-2 row justify-content-center mb-2">
	      <div class="col-4 col-md-6 col-lg-7">
	        <img src="/img/logo-casa-martinez-svg.svg" class="img-fluid" alt="Logo Casa Martínez">
	      </div>
	    </div>
	  </div>
	  <h2 class="titulo text-center m-0 p-0">TU CARRITO DE COMPRAS</h2>
	</div>

	<nav class="py-3">
      <div class="container">
        <div class="row">
          <div class="col-12">

            <!-- Breadcrumb -->
            <ol class="breadcrumb mb-0 font-size-xs text-gray-400">
              <li class="breadcrumb-item">
                <a class="link-breadcrumb" href="/tienda">Home</a>
              </li>
              <li class="breadcrumb-item active">
                Carrito de Compras
              </li>
            </ol>

          </div>
        </div>
      </div>
    </nav>
    <section class="pt-7 pb-12">
      <div class="container">
        <div class="row d-none justify-content-center" id="cartEmpty">
          <div class="d-flex">
            <div class="modal-body my-5 pb-5" id="cartEmpty">
              <h5 class="mb-5 pb-5 text-center " id="headEmpty">Tu carrito está vacío 😞</h5>
              <!-- Button -->
              <a href="/tienda" class="btn btn-block btn-modals btn-outline-dark mb-5" aria-label="Close">
                Continua Comprando
              </a>
            </div>
          </div>
        </div>
        <div class="row" id="cartNotEmpty">
          <div class="col-12 col-md-8">

            <!-- List group -->
            <ul class="list-group list-group-lg list-group-flush-x mb-6" id="listCarrito">
            	@if(Auth::check())
            	@foreach($productos as $product)
            		<li class="list-group-item border-0" data-product="{{$product->id_presentacion}}">
                  <hr>
            			<div class="row align-items-center">
            				<div class="col-3">
            					<!-- Image -->
            					<a href="product.html">
            						<img src="/storage/{{$product->foto_url}}" alt="..." class="img-fluid">
            					</a>
            				</div>
            				<div class="col">
			                    <!-- Title -->
			                    <div class="d-flex mb-2 font-weight-bold">
			                      <a class="title-product-cart "  href="product.html">
			                      	{{$product->nombre}}
			                      </a>
			                      <button class="ml-auto btn close btn-trash close p-1" onclick="btnTrash(this)">
			                      	<i class="icon-trash-product far fa-trash-alt" ></i>
			                      </button>
			                    </div>

			                    <!-- Text -->
			                    <p class="m-0 cantidad-label" style="font-weight: 500;">
			                      Presentación: {{$product->presentacion}}
			                    </p>
                          <p class="my-1 price-cart">{{$product->formated_price}}</p>

			                    <!--Footer -->
			                    <div class="d-flex justify-content-center align-items-end">
			                    	<div class="form-group d-flex flex-column align-items-start  mb-0" style="font-weight: 500;">
			                    		<label class="cantidad-label text-center mr-3 mr-md-0 my-0" style="font-size: 0.9rem;">Cantidad:</label>
			                    		<div class="input-group mt-md-1">
			                    			<div class="input-group-prepend">
			                    				<div class="input-group-text p-0 rounded-0">
			                    					<button type="button" class="btn icon-input-number h-100 rounded-0 btn-minus " onclick="btnMinus(this)" >-</button>
                                    <button type="button" onclick="btnTrashCart(this)" class="btn rounded-0 btn-trash h-100 d-none"> <i class="icon-trash-product far fa-trash-alt"></i></button>
			                    				</div>
			                    			</div>
			                    			<input type="number" class="form-control input-cantidad" placeholder="1" value="1" min="1" max="10" onchange="changeCantidad(this)" data-product="{{$product->id_presentacion}}">
			                    			<div class="input-group-append">
			                    				<div class="input-group-text p-0 rounded-0">
			                    					<button type="button" onclick="btnPlus(this)" class="btn icon-input-number btn-plus h-100" >+</button>
			                    				</div>
			                    			</div>
			                    		</div>
			                    	</div>
			                    	<span data-price="{{$product->precio_consumidor}}" class="ml-auto price-cantidad"></span>
			                    </div>
			                </div>
			            </div>
			        </li>
			    @endforeach
			    @endif
            </ul>
            <hr>
          </div>
          <div class="col-12 col-md-4 ">

            <!-- Total -->
            <div class="card mb-7 bg-light">
              <div class="card-body">
                <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                  <li class="list-group-item d-flex">
                    <span class="subtotal-label">Subtotal</span> <span class="ml-auto monto-subtotal font-size-sm" id="monto-subtotal2">$89.00</span>
                  </li>
                  <li class="list-group-item mensaje-envio">
                    *El Costo de envío se calculará en el siguiente paso.
                  </li>
                </ul>
              </div>
            </div>

            <!-- Button -->
            <a class="btn btn-block btn-dark mb-2 btn-modals" href="checkout.html">Proceder al pago</a>

            <!-- Link -->
            <a class="btn btn-back btn-block" href="/tienda" id="backToShop">
              <i class="fas fa-long-arrow-alt-left"></i> Regresar a la tienda
            </a>

          </div>
        </div>
      </div>
    </section>
@endsection

@section('scripts')
<script type="text/javascript">
  var productos = {!! json_encode($productos) !!};
  var logged = @json(Auth::check());
  @if(Auth::check())
  var inCart = {!! json_encode($inCart) !!};
  @endif
</script>
<script type="text/javascript" src="/js/custom/tiendaEfectos.js"></script>
@endsection
