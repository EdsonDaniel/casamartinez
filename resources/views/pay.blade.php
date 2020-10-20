@extends('layouts.layout-tienda')

@section('title')
	Tienda en línea | Casa Martínez
@endsection

@section('stylesheet')
  <style type="text/css">body{ padding-top: 0; }</style>
  <script src="https://js.stripe.com/v3/"></script>
  <link rel="stylesheet" type="text/css" href="/css/custom/inputsPayment.css">
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

  <section style="font-family: 'Nunito', sans-serif;" id="pageContent">
    <div class="container">
      <div class="row">
        <div class="col-8">
          <div class="row">
            <div class="col-12">

              <div class="accordion" id="direccion-envio">
                <div class="card rounded">
                  <div class="card-header" id="headEnvio" style="line-height: 1; color: #6c757d;">
                      <a class="btn-block" role="button" data-toggle="collapse" data-target="#infoEnvio" aria-expanded="true" aria-controls="infoEnvio">
                        Enviar a: 
                        <span data-name="{{$direccion['nombre'].' '.$direccion['apellidos']}}" @if($direccionFacturacion == '0') id="customer_name" @endif>
                          {{$direccion['nombre'].' '.$direccion['apellidos']}}
                        </span>
                        <i class="float-right fas fa-angle-down"></i>
                      </a>
                  </div>

                  <div id="infoEnvio" class="collapse show" aria-labelledby="headEnvio" data-parent="#direccion-envio">
                    <div class="card-body py-2">
                      <p class="m-0">{{$direccion['calle']}} No. {{$direccion['no_exterior']}} 
                        @if($direccion['no_interior']) No. Interior {{$direccion['no_interior']}} @endif
                        <span class="float-right">
                          <a href="">
                            <i data-feather="edit" class="icon-edit-input"></i>
                          </a>
                        </span>
                      </p>
                      @if($direccion['apartamento'])
                        <p class="m-0">{{$direccion['apartamento']}}</p>
                      @endif
                      <p class="m-0">{{$direccion['colonia']}}</p>
                      <p class="m-0" 
                      @if($direccionFacturacion == '0') id="zip_code" data-code="{{$direccion['codigo_postal']}}" @endif>{{$direccion['municipio']}}, {{$direccion['estado']}}, {{$direccion['codigo_postal']}}</p>
                      <p class="m-0">Teléfono: {{$direccion['telefono']}}</p>
                      <p class="m-0"></p>
                    </div>
                  </div>
                
                </div>
                
                @if($direccionFacturacion != '0')
                  <div class="card rounded">
                    <div class="card-header" id="headFacturacion" style="line-height: 1;">
                      <a class="btn-block" role="button" data-toggle="collapse" data-target="#infoFacturacion" aria-expanded="false" aria-controls="infoEnvio">
                        Nombre en la tarjeta: 
                        <span data-name="{{$direccionFacturacion['nombre'].' '.$direccion['apellidos']}}" id="customer_name">
                          {{$direccionFacturacion['nombre'].' '.$direccion['apellidos']}}
                        </span>
                        <i class="float-right fas fa-angle-down"></i>
                      </a>
                    </div>

                    <div id="infoFacturacion" class="collapse" aria-labelledby="headFacturacion" data-parent="#direccion-envio">
                      <div class="card-body py-2">
                        <p class="m-0">
                          {{$direccionFacturacion['calle_facturacion']}} No. {{$direccionFacturacion['no_exterior_facturacion']}} 
                          @if($direccionFacturacion['no_interior_facturacion']) No. Interior {{$direccionFacturacion['no_interior_facturacion']}} @endif
                        </p>
                        @if($direccion['apartamento_facturacion'])
                          <p class="m-0">{{$direccionFacturacion['apartamento_facturacion']}}</p>
                        @endif
                        <p class="m-0">{{$direccionFacturacion['colonia_facturacion']}}</p>
                        <p class="m-0" id="zip_code" data-code="{{$direccionFacturacion['codigo_postal_facturacion']}}">{{$direccionFacturacion['municipio_facturacion']}}, {{$direccionFacturacion['estado_facturacion']}}, {{$direccionFacturacion['codigo_postal_facturacion']}}</p>
                        <p class="m-0">Teléfono: {{$direccionFacturacion['telefono_facturacion']}}</p>
                        <p class="m-0"></p>
                      </div>
                    </div>
                  </div>
                @else
                  <div class="col px-2 mt-3">
                    <!-- Checkbox -->
                    <div style="line-height: 2;" class="d-flex align-items-center">
                      <i class="fas fa-check-square mr-2"></i>
                        Datos de facturación igual a la dirección de envío.
                      <span class="ml-2" style="line-height: 1;">
                        <a href=""> <i data-feather="edit" class="icon-edit-input" style="height: 1rem;"></i></a>
                      </span>
                    </div>
                  </div>
                @endif
              </div>


            </div>
          </div>

          <!--pago-->
          <div class="row my-4">
            <div class="col-12">
              <h5>Métodos de Pago</h5>
            </div>

            <!-- pay with stripe-->
            <div class="col-6">
              <div class="row justify-content-center">
                <div class="col-12">
                  <div class="inputs-card" id="example-2">
                    <form id="payment-form" class="px-3 py-3 shadow">
                      <fieldset class="m-1 p-3 border rounded" style="border-color: rgba(134, 136, 124, 0.7) !important;">
                        <legend class="card-only w-auto px-2 my-0" style="font-size: 1rem;">Pagar con tarjeta</legend>
                        
                      <div class="rowCard">
                        <div class="field d-flex align-items-center border border-secondary p-1 rounded">
                          <div id="card-number" class="input empty"></div>
                          <label class="m-0 px-1" for="card-number">Número de tarjeta</label>
                          <div class="baseline"></div>
                        </div>
                      </div>
                      <div class="row px-2">
                        <div class="col-12">
                        <div><p id="error-cardNumber" class="invalid"></p></div></div>
                      </div>
                      
                      <div class="rowCard d-flex justify-content-between">
                        <div class="field d-flex align-items-center half-width border border-secondary p-1 rounded mr-2">
                          <div id="card-expiry" class="input empty"></div>
                          <label class="m-0 px-1" for="card-expiry">Vencimiento</label>
                          <div class="baseline"></div>
                        </div>
                        <div class="field d-flex align-items-center half-width border border-secondary p-1 rounded ml-2">
                          <div id="card-cvc" class="input empty "></div>
                          <label class="m-0 px-1" for="card-cvc">CVC</label>
                          <div class="baseline"></div>
                        </div>
                      </div>
                      <div class="row px-2">
                        <div class="col-6">
                          <div><p id="error-cardExpiry" class="invalid"></p></div>
                        </div>
                        <div class="col-6">
                          <div><p id="error-cardCvc" class="invalid"></p></div>
                        </div>
                      </div>
                      <button id="submit-strippe" class="button btn btn-modals">
                        <div class="spinner hidden" id="spinner"></div>
                        <span id="button-text">Pagar</span>
                      </button>
                      <p class="error-msg mt-2" role="alert" id="card-error">
                      </p>
                      <p class="result-message hidden">
                        Payment succeeded, see the result in your
                        <a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again.
                      </p>
                    </fieldset>
                    </form>
                  </div>
                </div>
              </div>
              
            </div>

            <div class="col-6">
              <!-- pay with mercado pago -->
              <div class="row justify-content-center">
                <div class="col-12">
                  <a class="btn btn-success" href="{{$preferenceMP->init_point}}">Pagar con Mercado Pago</a>
                </div>
              </div>
            </div>


          </div>
          <!--<div>
            <p>
                !--<i data-feather="lock" class="icon-feather"></i> --
                <i class="fas fa-lock"></i>
              Compra segura.</p>
          </div>-->
          
          
        </div>

        <div class="col-12 col-md-4">

          <!-- Heading -->
          <h5 class="text-center">Productos ({{$count}})</span></h5>

          <!-- Divider -->
          <hr class="my-7">

          <!-- List group -->
          <ul class="list-group list-group-lg list-group-flush-y list-group-flush-x mb-7" id="listCheckout">
            
          </ul>

          <!-- Card -->
          <div class="card mb-9 bg-light">
            <div class="card-body">
              <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                @foreach($productos as $p)
                <li class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-4 p-0">
                      <!-- Image -->
                      <span data-cart-items="{{$p['cantidad']}}">
                        <img src="/storage/{{$p['foto_url']}}" alt="..." class="img-fluid">
                      </span>
                    </div>
                    <div class="col">
                      <!-- Title -->
                      <p style="font-size:0.9rem;">
                        <span>{{$p['nombre']}}</span><br>
                        <span class="text-muted">{{$p['precio_consumidor']}}</span>
                      </p>
                      <!-- Text -->
                      <div style="font-size:0.9rem;">Presentación: {{$p['presentacion']}}
                        <br></div>
                    </div>
                  </div>
                </li>
                @endforeach
                
                <li class="list-group-item d-flex">
                  <span>Subtotal:</span> <span class="ml-auto font-size-sm toPrice">{{$subtotal}}</span>
                </li>
                <li class="list-group-item d-flex">
                  <span>Costo de envío:</span> <span class="ml-auto font-size-sm toPrice">{{$costo_envio}}</span>
                </li>
                <li class="list-group-item d-flex">
                  <span style="font-weight: 500;" class="subtotal-label font-weight-bold">Total:</span> <span class="ml-auto font-size-sm toPrice font-weight-bold monto-subtotal">{{$total}}</span>
                </li>
              </ul>
              <div style="font-size: 0.85rem; text-align: center;">Todos nuestros precios incluyen IVA.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="" id="client_secret" value="{{$intent->client_secret}}">
  </section>


  <!-- Modal response -->
  <div class="modal fade" id="modalResponse" tabindex="-1" role="dialog" aria-labelledby="modalResponseLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content" style="font-family: 'Nunito', sans-serif;">
        
        <div id="payment-succes" class="d-none">
          <div class="modal-header">
            <h5 class="modal-title text-center">Tu pago se ha realizado satisfactoriamente</h5>
          </div>
          
          <div class="modal-body">
            <div class="d-flex justify-content-center text-success "><i data-feather="check-circle" class="w-25 h-auto"></i>
            </div>
            <div class="mt-4 px-2">
              <p class="text-center" id="ok-mensaje">¡Gracias por tu compra!</p>
              <p style="font-size: 0.9rem;"> Se ha enviado un e-mail a tu cuenta para ver los detalles del pedido.</p>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-success btn-block" data-dismiss="modal">Aceptar</button>
          </div>
          
        </div>

        <div id="payment-fayled" class="d-none">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="modalResponseLabelError">Ocurrió un error al procesar tu pago</h5>
          </div>
          <div class="modal-body">
            <div class="d-flex justify-content-center  text-danger">
              <i data-feather="x-circle" class="w-25 h-auto"></i>
            </div>
            <div class="px-2">
              <p class="text-center mt-3">Lamentamos esta situación.</p>
              <p style="font-size: 0.9rem;">Intenta utilizar un método de pago diferente o puedes contactarnos para conocer más detalles sobre nuestros métodos de pago.</p>
              <p class="mt-2 error-msg" ></p>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-dark btn-block" data-dismiss="modal">Aceptar</button>
          </div>
        </div>
        
      </div>
    </div>
  </div>

  
@endsection

@section('scripts')

<script type="text/javascript" src="/js/custom/payment.js"></script>
@endsection
