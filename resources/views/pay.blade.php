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
	  <h2 class="titulo text-center m-0 p-0">INFORMACIÓN DE ENVÍO</h2>
    @guest
      <div class="row no-gutters justify-content-center">
        <p class="text-secondary mt-1" style="font-family: sans-serif; letter-spacing: 1px; font-size: 0.9rem;">¿Ya tienes una cuenta? Puedes iniciar sesión <a style="text-decoration: underline" href="/login"> aquí.</a>
      </div>
    </p>
    @endguest
    
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
            <li class="breadcrumb-item">
              <a href="/carito-de-compras" class="link-breadcrumb">Carrito de compras</a>
            </li>
            <li class="breadcrumb-item">
              <a class="link-breadcrumb" href="/informacion-de-envio">INFORMACIÓN DE envío</a>
            </li>
            <li class="breadcrumb-item active">finaliza tu compra</li>
          </ol>

        </div>
      </div>
    </div>
  </nav>

  <section style="font-family: 'Nunito', sans-serif;">
    <div class="container">
      <div class="row">
        <div class="col-8">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body px-3 data-pay">
                  <span class="mr-4">Datos de contacto:</span>
                  <span class="text-secondary"> edsondaniel@gmail.com</span>
                  <span class="float-right">
                    <a href=""><i data-feather="edit" class="icon-edit-input"></i></a>
                  </span>
                </div>
              </div>
              <div class="card">
                <div class="card-body px-3 data-pay">
                  <span class="mr-4">Dirección de envío:</span> 
                  <span class="text-secondary">cuauhtemoc 7, 68250 Soledad Etla OAX, México</span>
                  <span class="float-right">
                    <a href=""> <i data-feather="edit" class="icon-edit-input"></i></a>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <!--pago-->
          <div class="row mt-4">
            <div class="col-12">
              <h5>Métodos de Pago</h5>
              <p>
                <!--<i data-feather="lock" class="icon-feather"></i> -->
                <i class="fas fa-lock"></i>
              Compra segura.</p>


            </div>
          </div>
        </div>
        

        <div class="col-4">
          
        </div>
      </div>
    </div>
  </section>

  
@endsection

@section('scripts')

<!--<script type="text/javascript" src="/js/custom/tiendaEfectos.js"></script>-->
<script type="text/javascript" src="/js/custom/listCheckout.js"></script>
@endsection
