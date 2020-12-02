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
	<div id="head-tienda" class="pt-4 mt-3 mt-md-0 px-2 mx-2">
	  <div class="row justify-content-center no-gutters">
	    <div class="col-10 col-md-2 row justify-content-center mb-2">
	      <div class="col-4 col-md-6 col-lg-7">
	        <img src="/img/logo-casa-martinez-svg.svg" class="img-fluid" alt="Logo Casa Martínez">
	      </div>
	    </div>
	  </div>
	  <h2 class="titulo text-center ">INFORMACIÓN DE ENVÍO</h2>
    {{--@guest
      <div class="row no-gutters justify-content-center">
        <p class="text-secondary mt-1 text-center" style="font-family: sans-serif; letter-spacing: 1px; font-size: 0.9rem;">¿Ya tienes una cuenta? Puedes iniciar sesión <a style="text-decoration: underline" href="/login"> aquí.</a>
        </p>
      </div>
    @endguest --}}
    
	</div>

	<nav class="pb-3">
      <div class="container">
        <div class="row">
          <div class="col-12">

            <!-- Breadcrumb -->
            <ol class="breadcrumb mb-0 font-size-xs text-gray-400">
              <li class="breadcrumb-item">
                <a class="link-breadcrumb" href="/tienda">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="/carrito-de-compras" class="link-breadcrumb">Carrito de compras</a>
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
        @if(Auth::check() && $direccion)

        <div class="alert-light mb-3 p-2 px-3 row">
          <!-- Checkbox -->
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" id="direccionRegistrada" type="checkbox" onchange="onChangeNewAddress(this)" checked="" name="addressExistente" data-relative="#nuevaDireccion" form="formDireccion" value="{{$direccion->id}}">
            <label class="custom-control-label font-size-sm" data-target="#dataDirReg" for="direccionRegistrada" data-toggle="collapse" aria-expanded="true" id="label-vieja">
              Entregar en esta direccion
            </label>
          </div>
          
        </div>

        <div class="row mb-4 collapse show" id="dataDirReg">
          <div class="col-12 col-md-6">
            <h5>Dirección de envío</h5>
            <!--<p class="m-0" style="font-weight: 500;">{{$direccion->nombre_residente}}-</p>-->
            <p class="m-0">{{$direccion->calle}} No. {{$direccion->numero}} 
              @if($direccion->numero_interior) No. Interior {{$direccion->numero_interior}} @endif
            </p>
            @if($direccion->apartamento)<p class="m-0">{{$direccion->apartamento}}</p>@endif
            <p class="m-0">{{$direccion->colonia}}</p>
            <p class="m-0">{{$direccion->municipio}}, {{$direccion->estado}}, {{$direccion->codigo_postal}}</p>
            <p class="m-0">Teléfono: {{$direccion->telefono}}</p>
            <p class="m-0"></p>
          </div>
          
        </div>
        <div class="col px-0">
          <!-- Checkbox -->
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input toF" id="nuevaDireccion" type="checkbox" onchange="onChangeNewAddress(this)" name="address" data-relative="#direccionRegistrada" >
            <label class="custom-control-label font-size-sm" data-target="#form-nueva-direccion" for="nuevaDireccion" data-toggle="collapse" aria-expanded="false" id="label-nueva">
              Enviar a otra dirección
            </label>
          </div>
        </div>
        @endif

        <div class="row @if(Auth::check() && $direccion) collapse @endif mt-4" id="form-nueva-direccion">
          <div class="col-12 col-md-12">
            <!-- Form -->
            <form id="formDireccion" method="post" action="/checkout">
              @csrf
              @if(Auth::check() && $direccion)
                <input type="hidden" name="direccionExistente" id="direccionExistente" data-check="1"  value="{{$direccion->id}}">
              @endif
              <!-- Heading -->
              <h5 class="mb-3">Datos de envío</h5>

              <!-- Billing details -->
              <div class="row mb-9">
                <div class="col-12 col-md-6">
                  <!-- First Name -->
                  <div class="form-group">
                    <label for="name">Nombre(s)*</label>
                    <input class="form-control form-control-sm @error('nombre') is-invalid @enderror" id="name" type="text" placeholder="Nombre(s)" name="nombre" required="" value="{{ old('nombre') }}">
                  </div>
                  @error('nombre')
                      <div class="msg-error">{{ $message }}</div>
                  @enderror

                </div>
                <div class="col-12 col-md-6">

                  <!-- Last Name -->
                  <div class="form-group">
                    <label for="lastname">Apellidos*</label>
                    <input class="form-control form-control-sm @error('apellidos') is-invalid @enderror" id="lastname" type="text" placeholder="Apellidos" required="" name="apellidos" value="{{ old('apellidos') }}">
                  </div>
                  @error('apellidos')
                      <div class="msg-error">{{ $message }}</div>
                  @enderror

                </div>
                <div class="col-12 col-md-6">

                  <!-- Email -->
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" type="email" placeholder="Email" required="" name="email" value="{{ old('email') }}">
                  </div>
                  @error('email')
                      <div class="msg-error">{{ $message }}</div>
                  @enderror

                </div>

                <div class="col-12 col-md-6">

                  <!-- telefono -->
                  <div class="form-group">
                    <label for="telefono">Teléfono*</label>
                    <input class="form-control form-control-sm address @error('telefono') is-invalid @enderror" id="telefono" type="number" name="telefono" max="9999999999" placeholder="Teléfono a 10 digitos" required="" value="{{ old('telefono') }}">
                  </div>
                  @error('telefono')
                      <div class="msg-error">{{ $message }}</div>
                  @enderror

                </div>
               
                <div class="col-6">

                  <!-- Calle -->
                  <div class="form-group">
                    <label for="calle">Calle*</label>
                    <input class="form-control form-control-sm @error('calle') is-invalid @enderror" id="calle" type="text" placeholder="Calle" required="" name="calle" value="{{ old('calle') }}">
                  </div>
                  @error('calle')
                      <div class="msg-error">{{ $message }}</div>
                  @enderror

                </div>

                <div class="col-3">

                  <!-- no exterior -->
                  <div class="form-group">
                    <label for="numero">No. exterior*</label>
                    <input class="form-control form-control-sm address @error('no_exterior') is-invalid @enderror" id="numero" type="text" list="sin_no" required="" name="no_exterior" value="{{ old('no_exterior') }}">
                    <datalist id="sin_no">
                        <option value="S/N"></option>
                      </datalist>
                  </div>
                  @error('no_exterior')
                      <div class="msg-error">{{ $message }}</div>
                  @enderror

                </div>

                <div class="col-3">

                  <!-- no interior -->
                  <div class="form-group">
                    <label for="numero_interior">No. interior</label>
                    <input class="form-control form-control-sm address @error('no_interior') is-invalid @enderror" id="numero_interior" type="number" value="{{ old('no_interior') }}"  placeholder="(Opcional)" name="no_interior">
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
                    <span>
                      <label for="codigo_postal">Código postal *</label>
                    <button class="btn btn-sm btn-outline-dark float-right btn-validate" onclick="validarCP(this)" data-input="#codigo_postal" type="button">Validar CP</button>
                    </span>
                    <input class="form-control form-control-sm address @error('codigo_postal') is-invalid @enderror" id="codigo_postal" type="number" placeholder="68000" required="" onchange="loadInfoCP(this)" name="codigo_postal" value="{{ old('codigo_postal') }}">
                  </div>
                  <div class="invalid-feedback">
                    Inserta un código postal válido.
                  </div>
                  @error('')
                      <div class="msg-error">{{ $message }}</div>
                  @enderror

                </div>
                <div class="col-12 col-md-6">

                  <!-- Colonia -->
                  <div class="form-group">
                    <label for="colonia">Colonia *</label>
                    <select class="form-control form-control-sm @error('colonia') is-invalid @enderror" id="colonia" disabled="" placeholder="Colonia" required="" data-codigo="codigo_postal" name="colonia" value="{{ old('colonia') }}">
                      
                    </select>
                    <!--<input class="form-control form-control-sm" disabled="" id="colonia" type="text" placeholder="Colonia" required="">-->
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- Municipio -->
                  <div class="form-group">
                    <label for="municipio">Municipio *</label>
                    <input class="form-control form-control-sm" disabled="" id="municipio" type="text" placeholder="Delegación o Municipio" required="" data-codigo="codigo_postal" name="municipio" value="{{ old('municipio') }}">
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- estado -->
                  <div class="form-group">
                    <label for="estado">Estado *</label>
                    <input class="form-control form-control-sm" id="estado" type="text" placeholder="Estado" required="" disabled="" data-codigo="codigo_postal" name="estado" value="{{ old('estado') }}">
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
                      <input class="form-control form-control-sm @error('nombre_facturacion') is-invalid @enderror" id="namef" type="text" placeholder="Nombre(s)" required="" name="nombre_facturacion">
                    </div>
                    @error('nombre_facturacion')
                      <div class="msg-error">{{ $message }}</div>
                    @enderror

                  </div>
                  <div class="col-12 col-md-6">

                    <!-- Last Name -->
                    <div class="form-group">
                      <label for="lastnamef">Apellidos*</label>
                      <input class="form-control form-control-sm @error('apellidos') is-invalid @enderror" id="lastnamef" type="text" placeholder="Apellidos"  name="apellidos_facturacion">
                    </div>
                    @error('apellidos')
                      <div class="msg-error">{{ $message }}</div>
                    @enderror

                  </div>
                  <div class="col-12 col-md-6">

                    <!-- Email -->
                    <div class="form-group">
                      <label for="emailf">Email *</label>
                      <input class="form-control form-control-sm @error('email_facturacion') is-invalid @enderror" id="emailf" type="email" placeholder="Email" required="" name="email_facturacion">
                    </div>
                    @error('email_facturacion')
                      <div class="msg-error">{{ $message }}</div>
                  @enderror

                  </div>

                  <div class="col-12 col-md-6">

                    <!-- telefono -->
                    <div class="form-group">
                      <label for="telefonof">Teléfono*</label>
                      <input class="form-control form-control-sm address @error('telefono_facturacion') is-invalid @enderror" id="telefonof" type="number" max="9999999999" placeholder="Teléfono a 10 digitos" required="" name="telefono_facturacion">
                    </div>
                    @error('telefono_facturacion')
                      <div class="msg-error">{{ $message }}</div>
                  @enderror

                  </div>
                 
                  <div class="col-6">

                    <!-- Calle -->
                    <div class="form-group">
                      <label for="callef">Calle*</label>
                      <input class="form-control form-control-sm @error('calle_facturacion') is-invalid @enderror" id="callef" type="text" placeholder="Calle" required="" name="calle_facturacion">
                    </div>
                    @error('calle_facturacion')
                      <div class="msg-error">{{ $message }}</div>
                  @enderror

                  </div>

                  <div class="col-3">

                    <!-- no exterior -->
                    <div class="form-group">
                      <label for="numerof">No. exterior*</label>
                      <input class="form-control form-control-sm address @error('no_exterior_facturacion') is-invalid @enderror" id="numerof" type="text" required="" name="no_exterior_facturacion">
                      <datalist id="browsers">
                        <option value="S/N">
                      </datalist>
                    </div>
                    @error('no_exterior_facturacion')
                      <div class="msg-error">{{ $message }}</div>
                  @enderror

                  </div>

                  <div class="col-3">

                    <!-- no interior -->
                    <div class="form-group">
                      <label for="numero_interiorf">No. interior</label>
                      <input class="form-control form-control-sm address" id="numero_interiorf" type="number"  placeholder="(Opcional)" name="no_interior_facturacion">
                    </div>
                    @error('')
                      <div class="msg-error">{{ $message }}</div>
                  @enderror

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
                      <span><label for="codigo_postalf">Código postal *</label>
                      <button class="btn btn-sm btn-outline-dark float-right btn-validate" onclick="validarCP(this)" data-input="#codigo_postalf" type="button">Validar CP</button></span> 
                      <input class="form-control form-control-sm address @error('codigo_postal_facturacion') is-invalid @enderror" id="codigo_postalf" type="number" placeholder="68000" required="" onchange="loadInfoCP(this)" name="codigo_postal_facturacion">
                    </div>
                    @error('codigo_postal_facturacion')
                      <div class="msg-error">{{ $message }}</div>
                    @enderror

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
                      <input class="form-control form-control-sm" id="estadof" type="text" placeholder="Estado" required="" disabled="" data-codigo="codigo_postalf" name="estado_facturacion" >
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
                    @error('')
                      <div class="msg-error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              
              
            </form>

          </div>

        </div>
      
      </div><!--fin row col-8 -->
      

      <div class="col-12 col-md-4 my-5 my-md-0">

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
<script type="text/javascript" src="/js/custom/listCheckout.js"></script>
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
  if(logged){
    $("#formDireccion input").prop("required", false);
  }
});
</script>
@endsection
