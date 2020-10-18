@extends('layouts.layout-tienda')

@section('title')
	Mi cuenta | Casa Martínez
@endsection

@section('stylesheet')
  <link rel="stylesheet" href="/css/custom/accountUser.css">
@endsection

@section('content')

	<!--<div class="device-xs d-block d-sm-none"></div>
	<div class="device-sm d-none d-sm-block d-md-none"></div>
	<div class="device-md d-none d-md-block d-lg-none"></div>
	<div class="device-lg d-none d-lg-block"></div>-->
	<div id="head-tienda">
	  <div class="row justify-content-center no-gutters">
	    <div class="col-10 col-md-2 row justify-content-center mb-2">
	      <div class="col-4 col-md-6 col-lg-7">
	        <img src="/img/logo-casa-martinez-svg.svg" class="img-fluid" alt="Logo Casa Martínez">
	      </div>
	    </div>
	  </div>
	  <h2 class="titulo text-center m-0 p-0">MI CUENTA</h2>    
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
              Mi cuenta
            </li>
          </ol>

        </div>
      </div>
    </div>
  </nav>

  <section class="pt-7 pb-12" style='font-family: "Nunito", sans-serif;'>
    <div class="container">
      @if (session('status'))
        @if(session('status')['value'])
          <div class="alert alert-success">
            {{ session('status')['msg'] }}
          </div>
        @else
          <div class="alert alert-danger">
            {{ session('status')['msg'] }}
          </div>
        @endif
      @endif
      @if ($errors->any())
        <div class="alert alert-danger">
          <p>Ocurrieron algunos errores al actualizar los datos.</p>
          <ul class="m-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="row">
        <div class="col-12 col-md-4">
          <!-- Nav -->
          <nav class="mb-md-0">
            <div class="list-group list-group-sm list-group-strong list-group-flush-x" id="list-tab" role="tablist">
              <a class="d-flex align-items-center justify-content-between list-group-item list-group-item-action dropright-toggle active" data-toggle="list" href="#list-pedidos" role="tab">
                MIS PEDIDOS
                <i class="fas fa-angle-right"></i>
              </a>
              <a class="d-flex align-items-center justify-content-between  list-group-item list-group-item-action dropright-toggle " data-toggle="list" href="#list-datos" role="tab">
                MIS DATOS
                <i class="fas fa-angle-right"></i>
              </a>
              <a class="d-flex align-items-center justify-content-between  list-group-item list-group-item-action dropright-toggle " data-toggle="list" href="#list-direcciones" role="tab">
                MIS DIRECCIONES
                <i class="fas fa-angle-right"></i>
              </a>
              <a class="d-flex align-items-center justify-content-between  list-group-item list-group-item-action dropright-toggle" data-toggle="list" href="#list-cerrar" role="tab">
                CERRAR SESIÓN
                <i class="fas fa-angle-right"></i>
              </a>
            </div>
          </nav>

        </div>
        <div class="col-12 col-md-8">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-pedidos" role="tabpanel">
              <div class="row">
                <div class="col-12">
                  @if(!$pedidos->isEmpty())
                    @foreach($pedidos as $p)
                    <div class="card mb-5 border">
                      <div class="card-body">
                        <!-- Info -->
                        <div class="card card-sm">
                          <div class="card-body bg-light">
                            <div class="row">
                              <div class="col-6 col-lg-3">

                                <!-- Heading -->
                                <h6 class="heading-xxxs text-muted">No. Pedido</h6>

                                <!-- Text -->
                                <p class="mb-lg-0 font-size-sm font-weight-bold">
                                  673290789
                                </p>

                              </div>
                              <div class="col-6 col-lg-3">

                                <!-- Heading -->
                                <h6 class="heading-xxxs text-muted">Pedido realizado:</h6>

                                <!-- Text -->
                                <p class="mb-lg-0 font-size-sm font-weight-bold">
                                  <time datetime="2019-10-01">
                                    01 Oct, 2019
                                  </time>
                                </p>

                              </div>
                              <div class="col-6 col-lg-3">

                                <!-- Heading -->
                                <h6 class="heading-xxxs text-muted">Estado:</h6>

                                <!-- Text -->
                                <p class="mb-0 font-size-sm font-weight-bold">
                                  Awating Delivery
                                </p>

                              </div>
                              <div class="col-6 col-lg-3">

                                <!-- Heading -->
                                <h6 class="heading-xxxs text-muted">Total:</h6>

                                <!-- Text -->
                                <p class="mb-0 font-size-sm font-weight-bold">
                                  $259.00
                                </p>

                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="card-footer">
                        <div class="row align-items-center justify-content-between">
                          <div class="col-12 col-lg-6">
                            <div class="form-row mb-4 mb-lg-0">
                              <div class="col-3">

                                <!-- Image -->
                                <div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(/storage/img/fotos-productos/aA27tVRS9nTVJj8st48x4V7z8rthlQxdb5gsTy0y.jpeg);"></div>

                              </div>
                              <div class="col-3">

                                <!-- Image -->
                                <div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(/storage/img/fotos-productos/aA27tVRS9nTVJj8st48x4V7z8rthlQxdb5gsTy0y.jpeg);"></div>

                              </div>
                              <div class="col-3">

                                <!-- Image -->
                                <div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(/storage/img/fotos-productos/aA27tVRS9nTVJj8st48x4V7z8rthlQxdb5gsTy0y.jpeg);"></div>

                              </div>
                              <div class="col-3">

                                <!-- Image -->
                                <div class="embed-responsive embed-responsive-1by1">
                                  <a class="embed-responsive-item embed-responsive-item-text text-reset" href="#!">
                                    <div class="font-size-xxs font-weight-bold d-flex justify-content-center align-items-center h-100 bg-white text-center text-dark">
                                      +2 <br> more
                                    </div>
                                  </a>
                                </div>

                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-lg-4">
                            <div class="form-row justify-content-center">
                              <div class="col-12">
                                <!-- Button -->
                                <a class="btn btn-outline-dark btn-sm ls btn-block " href="account-order.html">
                                  DETALLES DEL PEDIDO
                                </a>

                              </div>
                              <div class="col-12 mt-2">
                                <!-- Button -->
                                <a class="btn btn-outline-dark ls btn-sm btn-block " href="account-order.html">
                                  COMPRAR DE NUEVO
                                </a>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  @else
                  <div class="card">
                    <div class="card-body bg-light">
                      <p>No tienes ningún pedido registrado.</p>
                      <p>Visita la tienda y conoce los productos que tenemos para ti.</p>
                      <p class="text-center ">
                        <a href="/tienda" class="btn btn-next">Ir a la tienda <i class="fas fa-long-arrow-alt-right"></i></a>
                      </p>
                    </div>
                  </div>
                  @endif
                </div>
              </div>

            </div>

            <div class="tab-pane fade" id="list-datos" role="tabpanel" >
              <div class="row">
                <form class="w-100" action="/update-user" method="post">
                  @csrf
                  @method('post')                  
                  <div class="col-12">
                    <div class="row mx-0">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="name">
                            Nombre(s) *
                          </label>
                          <input class="form-control form-control-sm" id="name" type="text" placeholder="Nombre(s)*" value="{{$user->name}}" required="" name="name">
                        </div>
                      </div>

                      <div class="col-6">
                        <div class="form-group">
                          <label for="apellidos">
                            Apellidos *
                          </label>
                          <input class="form-control form-control-sm" id="apellidos" type="text" placeholder="Apellidos *" value="{{$user->last_name}}" required="" name="last_name">
                        </div>
                      </div>

                      <div class="col-12">

                        <!-- Email -->
                        <div class="form-group">
                          <label for="email">
                            e-mail *
                          </label>
                          <input class="form-control form-control-sm" id="email" type="email" placeholder="e-mail *" value="{{$user->email}}" required="" name="email">
                        </div>

                      </div>

                      <div class="col-12 ">

                        <!-- Password -->
                        <div class="form-group">
                          <label for="new_pw">
                            Nueva Contraseña
                          </label>
                          <input class="form-control form-control-sm" id="new_pw" type="password" placeholder="Cambiar Contraseña *" name="nueva_contraseña">
                        </div>

                      </div>

                      <div class="col-12 ">

                        <!-- Password -->
                        <div class="form-group">
                          <label for="password">
                            Contraseña Actual
                          </label>
                          <input class="form-control form-control-sm" id="password" type="password" placeholder="Contraseña actual *" name="password" >
                        </div>

                      </div>

                      <div class="col-12">
                        <div class="d-flex justify-content-center">
                          <button class="btn btn-outline-dark">Guardar Cambios</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </form>
              </div>
            </div>
            
            <div class="tab-pane fade" id="list-direcciones" role="tabpanel" >
              <div class="row">
                <div class="col-12">
                  <div class="row mx-0">

                    @if(!$direcciones->isEmpty())
                      @foreach($direcciones as $d)
                      <div class="col-12 col-lg-6">

                        <!-- Card -->
                        <div class="card card-lg bg-light mb-8">
                          <div class="card-body">

                            <!-- Heading -->
                            <h5 class="mb-6">
                              Dirección de envío
                            </h5>

                            <!-- Text -->
                            <p class="text-muted mb-0" data-id="{{$d->id}}">
                              <span class="name">{{$d->nombre_residente}}</span> <br>
                              <span class="calle">{{$d->calle}}</span> No. <span class="numero">{{$d->numero}}</span>
                              @if($d->numero_interior != null)
                              No. interior <span class="no_int">{{$d->numero_interior}}</span>
                              @endif
                              <br>
                              @if($d->apartamento != null)
                              <span class="apartamento">{{$d->apartamento}}</span>
                              @endif
                              <span class="colonia">{{$d->colonia}}</span><br>
                              <span class="municipio">{{$d->municipio}}</span>, <span class="estado">{{$d->estado}}</span> <span class="cod_postal">{{$d->codigo_postal}}</span>
                              <br>
                              Teléfono: <span class="telefono">{{$d->telefono}}</span><br>
                            </p>

                            <!-- Action -->
                            <div class="card-action card-action-right">

                              <!-- Button -->
                              <button class="btn btn-xs btn-circle btn-white-primary" onclick="updateDireccion(this)">
                                <i class="fa fa-edit"></i>
                              </button>

                              <!-- Button -->
                              <button class="btn btn-xs btn-circle btn-white-primary" onclick="deleteDireccion(this)">
                                <i class="fas fa-times"></i>
                              </button>

                            </div>

                          </div>
                        </div>

                      </div>
                      @endforeach
                    @else
                      <div class="col-12 ">

                        <!-- Card -->
                        <div class="card card-lg bg-light mb-8">
                          <div class="card-body">

                            <!-- Heading -->
                            <p class="mb-6">
                              No tienes ninguna dirección de envío registrada aún.
                            </p>

                          </div>
                        </div>
                      </div>
                    @endif
                    <div class="col-12 mb-3">
                      <div class="d-flex justify-content-center mt-4">
                        <!-- Button -->
                        <button class="btn btn-outline-dark" type="button" data-toggle="collapse" data-target="#collapse-form-dir" aria-expanded="false" aria-controls="collapse-form-dir" id="btn_nd">
                        Nueva dirección <i class="fe fe-plus"></i>
                      </button>
                      </div>
                    </div>

                    <div class="collapse" id="collapse-form-dir">
                      <form action="/nueva-direccion" method="post" >
                        @csrf

                        <div class="card">
                          <div class="card-body">
                            <!-- Billing details -->
                            <div class="row">
                              <div class="col-12 col-md-6">
                                <!-- First Name -->
                                <div class="form-group">
                                  <label for="nombre_envio">Nombre(s)*</label>
                                  <input class="form-control form-control-sm @error('nombre') is-invalid @enderror" id="nombre_envio" type="text" placeholder="Nombre(s)" name="nombre" required="" value="{{ old('nombre') }}">
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
                                  <label for="email_envio">Email *</label>
                                  <input class="form-control form-control-sm @error('email') is-invalid @enderror" id="email_envio" type="email" placeholder="Email" required="" name="email" value="{{ old('email') }}">
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

                              <div class="col-12 mb-3">
                                <div class="d-flex justify-content-center mt-4">
                                  <!-- Button -->
                                  <button class="btn btn-outline-dark" type="submit" >
                                    Guardar dirección <i class="fe fe-plus"></i>
                                  </button>
                                </div>
                              </div>
                            
                            </div>
                            
                          </div>
                        </div>
                      </form>
                    </div>

                    <div class="d-none" id="collapse-form-update">
                      <form action="/update-direccion" method="post" id="update_dir">
                        @csrf

                        <div class="card">
                          <div class="card-body">
                            <!-- Billing details -->
                            <div class="row">
                              <div class="col-12 ">
                                <!-- First Name -->
                                <div class="form-group">
                                  <label for="nombre_envio_u">Nombre Completo*</label>
                                  <input class="form-control form-control-sm @error('nombre') is-invalid @enderror" id="nombre_envio_u" type="text" placeholder="Nombre(s)" name="nombre" required="" value="{{ old('nombre') }}">
                                </div>
                                @error('nombre')
                                  <div class="msg-error">{{ $message }}</div>
                                @enderror

                              </div>
                              
                              <div class="col-12 col-md-6">

                                <!-- Email -->
                                <div class="form-group">
                                  <label for="email_envio_u">Email *</label>
                                  <input class="form-control form-control-sm @error('email') is-invalid @enderror" id="email_envio_u" type="email" placeholder="Email" required="" name="email" value="{{ $user->email }}">
                                </div>

                                @error('email')
                                  <div class="msg-error">{{ $message }}</div>
                                @enderror

                              </div>

                              <div class="col-12 col-md-6">

                                <!-- telefono -->
                                <div class="form-group">
                                  <label for="telefono_u">Teléfono*</label>
                                  <input class="form-control form-control-sm address @error('telefono') is-invalid @enderror" id="telefono_u" type="number" name="telefono" max="9999999999" placeholder="Teléfono a 10 digitos" required="" value="{{ old('telefono') }}">
                                </div>
                                @error('telefono')
                                    <div class="msg-error">{{ $message }}</div>
                                @enderror

                              </div>
               
                              <div class="col-6">

                                <!-- Calle -->
                                <div class="form-group">
                                  <label for="calle_u">Calle*</label>
                                  <input class="form-control form-control-sm @error('calle') is-invalid @enderror" id="calle_u" type="text" placeholder="Calle" required="" name="calle" value="{{ old('calle') }}">
                                </div>
                                @error('calle')
                                    <div class="msg-error">{{ $message }}</div>
                                @enderror

                              </div>

                              <div class="col-3">

                                <!-- no exterior -->
                                <div class="form-group">
                                  <label for="numero_u">No. exterior*</label>
                                  <input class="form-control form-control-sm address @error('no_exterior') is-invalid @enderror" id="numero_u" type="text" list="sin_no" required="" name="no_exterior" value="{{ old('no_exterior') }}">
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
                                  <label for="numero_interior_u">No. interior</label>
                                  <input class="form-control form-control-sm address @error('no_interior') is-invalid @enderror" id="numero_interior_u" type="number" value="{{ old('no_interior') }}"  placeholder="(Opcional)" name="no_interior">
                                </div>

                              </div>

                              <div class="col-12">

                                <!-- Address Line 2 -->
                                <div class="form-group">
                                  <label >Apartamento, piso, etc.</label>
                                  <input class="form-control form-control-sm" id="apartamento_u" type="text" placeholder="Apratamento, local, piso, etc. (opcional)" name="apartamento">
                                </div>

                              </div>

                              
                              <div class="col-12 mt-2"><div class="form-control-sm px-0">Introduce un código postal para rellenar los demás datos.</div></div>
                              
                              <div class="col-12 col-md-6">

                                <!-- ZIP / Postcode -->
                                <div class="form-group mb-0">
                                  <span>
                                    <label for="codigo_postal_u">Código postal *</label>
                                    <button class="btn btn-sm btn-outline-dark float-right btn-validate" onclick="validarCP(this)" data-input="#codigo_postal_u" type="button">Validar CP</button>
                                  </span>
                                  <input class="form-control form-control-sm address @error('codigo_postal') is-invalid @enderror" id="codigo_postal_u" type="number" placeholder="68000" required="" onchange="loadInfoCP(this)" name="codigo_postal" value="{{ old('codigo_postal') }}">
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
                                  <label for="colonia_u">Colonia *</label>
                                  <select class="form-control form-control-sm @error('colonia') is-invalid @enderror" id="colonia_u" placeholder="Colonia" required="" data-codigo="codigo_postal_u" name="colonia" value="{{ old('colonia') }}">
                                    
                                  </select>
                                </div>

                              </div>
                              <div class="col-12 col-md-6">

                                <!-- Municipio -->
                                <div class="form-group">
                                  <label for="municipio_u">Municipio *</label>
                                  <input class="form-control form-control-sm" disabled="" id="municipio_u" type="text" placeholder="Delegación o Municipio" required="" data-codigo="codigo_postal_u" name="municipio" value="{{ old('municipio') }}">
                                </div>

                              </div>
                              <div class="col-12 col-md-6">

                                <!-- estado -->
                                <div class="form-group">
                                  <label for="estado_u">Estado *</label>
                                  <input class="form-control form-control-sm" id="estado_u" type="text" placeholder="Estado" required="" disabled="" data-codigo="codigo_postal_u" name="estado" value="{{ old('estado') }}">
                                </div>

                              </div>
                              <input type="hidden" name="direccion_id" id="id_dir_u">

                              <div class="col-12 mb-3">
                                <div class="d-flex justify-content-center mt-4">
                                  <!-- Button -->
                                  <button class="btn btn-outline-dark" type="submit" >
                                    Guardar cambios
                                  </button>
                                </div>
                              </div>
                            
                            </div>
                            
                          </div>
                        </div>
                      </form>
                    </div>
                  
                  </div>
                </div>
              </div>
            </div>
            

            <div class="tab-pane fade" id="list-cerrar" role="tabpanel" >...</div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <form id="delete_dir" action="/delete-direccion" method="post">
    @csrf
  </form>

  <!--modal delete-->
  <div class="modal fade" id="modalDeleteDir" tabindex="-1" role="dialog" aria-labelledby="modalResponseLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content" style="font-family: 'Nunito', sans-serif;">
        
        <div class="modal-header text-center">
          <h5 class="modal-title w-100">¿Desea eliminar esta dirección?</h5>
        </div>
          
        <div class="modal-body">
          <div class="mt-4 px-2">
            <!-- Text -->
            <p class="text-muted mb-0" id="data_modal">
              <span id="modal_name" ></span> <br>
              <span id="modal_calle"></span> No. <span id="modal_numero"></span>
              <br>
              <span id="modal_colonia"></span><br>
              <span id="modal_municipio"></span>, <span id="modal_estado"></span> <span id="modal_codigo_postal"></span>
              <br>
              Teléfono: <span id="modal_telefono"></span><br>
            </p>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="submit" form="delete_dir" class="btn btn-success" data-dismiss="modal">Aceptar</button>
        </div>
        
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script type="text/javascript" src="/js/custom/listCheckout.js"></script>
<script type="text/javascript" src="/js/custom/accountUser.js"></script>
@endsection
