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
              <li class="breadcrumb-item active">
                INFORMACIÓN DE envío
              </li>
            </ol>

          </div>
        </div>
      </div>
    </nav>

  <div class="container" style="font-family: 'Nunito', sans-serif;">
    <div class="row">
        <div class="col-12 col-md-8">
          <!-- Form -->
          <form id="formDireccion" method="post" action="/checkout">
            @csrf
            <!-- Heading -->
            <h5 class="mb-3">Datos de envío</h5>

            <!-- Billing details -->
            <div class="row mb-9">
              <div class="col-12 col-md-6">
                <!-- First Name -->
                <div class="form-group">
                  <label for="name">Nombre(s)*</label>
                  <input class="form-control form-control-sm" id="name" type="text" placeholder="Nombre(s)" name="nombre" required="">
                </div>

              </div>
              <div class="col-12 col-md-6">

                <!-- Last Name -->
                <div class="form-group">
                  <label for="lastname">Apellidos*</label>
                  <input class="form-control form-control-sm" id="lastname" type="text" placeholder="Apellidos" required="" name="apellidos">
                </div>

              </div>
              <div class="col-12 col-md-6">

                <!-- Email -->
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input class="form-control form-control-sm" id="email" type="email" placeholder="Email" required="" name="email">
                </div>

              </div>

              <div class="col-12 col-md-6">

                <!-- telefono -->
                <div class="form-group">
                  <label for="telefono">Teléfono*</label>
                  <input class="form-control form-control-sm address" id="telefono" type="number" name="telefono" max="10" placeholder="Teléfono a 10 digitos" required="">
                </div>

              </div>
             
              <div class="col-6">

                <!-- Calle -->
                <div class="form-group">
                  <label for="calle">Calle*</label>
                  <input class="form-control form-control-sm" id="calle" type="text" placeholder="Calle" required="" name="calle">
                </div>

              </div>

              <div class="col-3">

                <!-- no exterior -->
                <div class="form-group">
                  <label for="numero">No. exterior*</label>
                  <input class="form-control form-control-sm address" id="numero" type="text" list="sin_no" required="" name="no_exterior">
                  <datalist id="sin_no">
                      <option value="S/N"></option>
                    </datalist>
                </div>

              </div>

              <div class="col-3">

                <!-- no interior -->
                <div class="form-group">
                  <label for="numero_interior">No. interior</label>
                  <input class="form-control form-control-sm address" id="numero_interior" type="number"  placeholder="(Opcional)" name="no_interior">
                </div>

              </div>

              <div class="col-12">

                <!-- Address Line 2 -->
                <div class="form-group">
                  <label for="checkoutBillingAddressTwo">Apartamento, piso, etc.</label>
                  <input class="form-control form-control-sm" id="checkoutBillingAddressTwo" type="text" placeholder="Apratamento, local, piso, etc. (opcional)" name="apartamento">
                </div>

              </div>
              <div class="col-12 mt-2"><div class="form-control-sm px-0">Introduce un código postal para rellenar los demás datos.</div></div>
              
              <div class="col-12 col-md-6">

                <!-- ZIP / Postcode -->
                <div class="form-group mb-0">
                  <label for="codigo_postal">Código postal *</label>
                  <input class="form-control form-control-sm address" id="codigo_postal" type="number" placeholder="68000" required="" onchange="loadInfoCP(this)" name="codigo_postal">
                </div>
                <div class="invalid-feedback">
                  Inserta un código postal válido.
                </div>

              </div>
              <div class="col-12 col-md-6">

                <!-- Colonia -->
                <div class="form-group">
                  <label for="colonia">Colonia *</label>
                  <select class="form-control form-control-sm " id="colonia" disabled="" placeholder="Colonia" required="" data-codigo="codigo_postal" name="colonia">
                    
                  </select>
                  <!--<input class="form-control form-control-sm" disabled="" id="colonia" type="text" placeholder="Colonia" required="">-->
                </div>

              </div>
              <div class="col-12 col-md-6">

                <!-- Municipio -->
                <div class="form-group">
                  <label for="municipio">Municipio *</label>
                  <input class="form-control form-control-sm" disabled="" id="municipio" type="text" placeholder="Delegación o Municipio" required="" data-codigo="codigo_postal" name="municipio">
                </div>

              </div>
              <div class="col-12 col-md-6">

                <!-- estado -->
                <div class="form-group">
                  <label for="estado">Estado *</label>
                  <input class="form-control form-control-sm" id="estado" type="text" placeholder="Estado" required="" disabled="" data-codigo="codigo_postal" name="estado">
                </div>

              </div>
            </div>

            <!-- Heading -->
            <h5 class="mb-3">Datos de facturación</h5>

            <div class="col-12">
              <!-- Checkbox -->
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" id="mismaDireccion" type="checkbox" checked="" name="misma_direccion">
                <label class="custom-control-label font-size-sm" data-target="#direccionFacturacion" for="mismaDireccion" data-toggle="collapse">
                  Iguales a los datos de envío
                </label>
              </div>
            </div>

            <!-- Billing details -->
            <div class="collapse mt-4" id="direccionFacturacion">
              <div class="row mb-9">
                <div class="col-12 col-md-6">

                  <!-- First Name -->
                  <div class="form-group">
                    <label for="namef">Nombre(s)*</label>
                    <input class="form-control form-control-sm" id="namef" type="text" placeholder="Nombre(s)" required="" name="nombre_facturacion">
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- Last Name -->
                  <div class="form-group">
                    <label for="lastnamef">Apellidos*</label>
                    <input class="form-control form-control-sm" id="lastnamef" type="text" placeholder="Apellidos" required="" name="apellidos_facturacion">
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- Email -->
                  <div class="form-group">
                    <label for="emailf">Email *</label>
                    <input class="form-control form-control-sm" id="emailf" type="email" placeholder="Email" required="" name="email_facturacion">
                  </div>

                </div>

                <div class="col-12 col-md-6">

                  <!-- telefono -->
                  <div class="form-group">
                    <label for="telefonof">Teléfono*</label>
                    <input class="form-control form-control-sm address" id="telefonof" type="number" max="10" placeholder="Teléfono a 10 digitos" required="" name="telefono_facturacion">
                  </div>

                </div>
               
                <div class="col-6">

                  <!-- Calle -->
                  <div class="form-group">
                    <label for="callef">Calle*</label>
                    <input class="form-control form-control-sm" id="callef" type="text" placeholder="Calle" required="" name="calle_facturacion">
                  </div>

                </div>

                <div class="col-3">

                  <!-- no exterior -->
                  <div class="form-group">
                    <label for="numerof">No. exterior*</label>
                    <input class="form-control form-control-sm address" id="numerof" type="text" required="" name="no_exterior_facturacion">
                    <datalist id="browsers">
                      <option value="S/N">
                    </datalist>
                  </div>

                </div>

                <div class="col-3">

                  <!-- no interior -->
                  <div class="form-group">
                    <label for="numero_interiorf">No. interior</label>
                    <input class="form-control form-control-sm address" id="numero_interiorf" type="number"  placeholder="(Opcional)" name="no_interior_facturacion">
                  </div>

                </div>

                <div class="col-12">

                  <!-- Address Line 2 -->
                  <div class="form-group">
                    <label for="apartamentof">Apartamento, piso, etc.</label>
                    <input class="form-control form-control-sm" id="apartamentof" type="text" placeholder="Apratamento, local, piso, etc. (opcional)" name="apartamento_facturacion">
                  </div>

                </div>
                <div class="col-12 mt-2"><div class="form-control-sm px-0">Introduce un código postal para rellenar los demás datos.</div></div>
                
                <div class="col-12 col-md-6">

                  <!-- ZIP / Postcode -->
                  <div class="form-group">
                    <label for="codigo_postalf">Código postal *</label>
                    <input class="form-control form-control-sm address" id="codigo_postalf" type="number" placeholder="68000" required="" onchange="loadInfoCP(this)" name="codigo_postal_facturacion">
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- Colonia -->
                  <div class="form-group">
                    <label for="coloniaf">Colonia *</label>
                    <select class="form-control form-control-sm " id="coloniaf" disabled="" placeholder="Colonia" required="" data-codigo="codigo_postalf" name="colonia_facturacion"></select>
                    <!--<input class="form-control form-control-sm" disabled="" id="coloniaf" type="text" placeholder="Colonia" required="">-->
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- Municipio -->
                  <div class="form-group">
                    <label for="municipiof">Municipio *</label>                    
                    <input class="form-control form-control-sm" disabled="" id="municipiof" type="text" placeholder="Delegación o Municipio" required="" data-codigo="codigo_postalf" name="municipio_facturacion">
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- estado -->
                  <div class="form-group">
                    <label for="estadof">Estado *</label>
                    <input class="form-control form-control-sm" id="estadof" type="text" placeholder="Estado" required="" disabled="" data-codigo="codigo_postalf" name="estado_facturacion">
                  </div>

                </div>
              </div>
            </div>

            <div class="col-12 mt-2">
              <!-- Checkbox -->
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" id="registrarse" type="checkbox" name="registrarse">
                <label class="custom-control-label font-size-sm" data-target="#contraseña" for="registrarse" data-toggle="collapse">
                  Deseo registrarme y guardar mis datos para futuras compras. 
                </label>
              </div>
            </div>
            <div class="collapse mt-2" id="contraseña">
              <div class="row">
                <div class="col-12 mt-2">
                  <!-- passworrd-->
                  <div class="form-group">
                    <label for="password">Crear Contraseña*</label>
                    <input class="form-control form-control-sm" id="password" type="password" placeholder="Contraseña" required="" name="password">
                  </div>
                </div>
              </div>
            </div>
            
            
          </form>

        </div>
        <div class="col-12 col-md-4">

          <!-- Heading -->
          <h5 class="text-center">Productos <span id="countp"></span></h5>

          <!-- Divider -->
          <hr class="my-7">

          <!-- List group -->
          <ul class="list-group list-group-lg list-group-flush-y list-group-flush-x mb-7" id="listCheckout">
            
          </ul>

          <!-- Card -->
          <div class="card mb-9 bg-light">
            <div class="card-body">
              <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                <li class="list-group-item d-flex">
                  <span>Subtotal</span> <span class="ml-auto font-size-sm" id="monto-subtotal3">$89.00</span>
                </li>
              </ul>
            </div>
          </div>

          <!-- Button -->
          <button class="btn btn-block btn-dark btn-modals" form="formDireccion" type="submit" >
            Proceder al pago
          </button>

        </div>
      </div>
    
  </div>
@endsection

@section('scripts')
<!--<script src="https://js.stripe.com/v3/"></script>-->
<script type="text/javascript">
  var productos = {!! json_encode($productos) !!};
  var logged = @json(Auth::check());
  @if(Auth::check())
  var inCart = {!! json_encode($inCart) !!};
  @endif
  $( document ).ready(function() {
  addListeners();
  fadeNav();
  createInputCart();
});
</script>
<!--<script type="text/javascript" src="/js/custom/tiendaEfectos.js"></script>-->
<script type="text/javascript" src="/js/custom/listCheckout.js"></script>
@endsection
