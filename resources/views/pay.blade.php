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
        <div class="col-6">
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
            </div>
          </div>

          <!--<div class="row">
            <div class="col-12">
              <div class="sr-root">
                <div class="sr-main">
                  <form id="payment-form" class="sr-payment-form shadow-sm p-1">
                    <fieldset class="m-1 p-3 border border-secondary rounded">
                      <legend class="w-auto px-2 font-size-md">Pagar con tarjeta</legend>
                      <div class="sr-combo-inputs-row">
                        <div class="sr-input sr-card-element" id="card-element">
                          <div class="col-12">
                            <fieldset class="mx-0 p-2 border border-secondary rounded">
                              <div class="" id="inputCardNumber"></div>
                            </fieldset>
                          </div>
                          <div class="col-5 my-2 ">
                            <fieldset class="mx-0 p-2 border border-secondary rounded">
                              <div class="" id="inputCardExpiry"></div>
                            </fieldset>
                          </div>
                          <div class="col-5 my-2 ">
                            <fieldset class="mx-0 p-2 border border-secondary rounded">
                              <div class="" id="inputCardCvc"></div>
                            </fieldset>
                            
                          </div>
                        </div>
                      </div>
                      
                      <div class="sr-field-error" id="card-errors" role="alert"></div>
                      
                      <button id="submit" class="my-2">
                        <div class="spinner hidden" id="spinner"></div>
                        <span id="button-text">Pay</span><span id="order-amount"></span>
                      </button>
                    </fieldset>
                  </form>
                  <div class="sr-result hidden">
                    <p>Payment completed<br /></p>
                    <pre>
                      <code></code>
                    </pre>
                  </div>
                </div>
              </div>
            </div>
          </div>-->

          <div>
            <p>
                <!--<i data-feather="lock" class="icon-feather"></i> -->
                <i class="fas fa-lock"></i>
              Compra segura.</p>
          </div>
          
          <div class="row">
            <div class="col-12">
              <div class="inputs-card" id="example-2">
                <form id="payment-form">
                  <fieldset class="m-1 p-3 border border-secondary rounded">
                    <legend class="card-only w-auto font-size-md px-2" >Pagar con tarjeta</legend>
                    
                  <div class="rowCard">
                    <div class="field d-flex align-items-center border border-secondary p-2 rounded">
                      <div id="card-number" class="input empty"></div>
                      <label class="m-0 px-1" for="card-number">Card number</label>
                      <div class="baseline"></div>
                    </div>
                  </div>
                  <div class="row px-2">
                    <div class="col-12">
                    <div><p id="error-cardNumber" class="invalid"></p></div></div>
                  </div>
                  
                  <div class="rowCard d-flex justify-content-between">
                    <div class="field d-flex align-items-center half-width border border-secondary p-2 rounded mr-2">
                      <div id="card-expiry" class="input empty"></div>
                      <label class="m-0 px-1" for="card-expiry">Vencimiento</label>
                      <div class="baseline"></div>
                    </div>
                    <div class="field d-flex align-items-center half-width border border-secondary p-2 rounded ml-2">
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

        <div class="col-4">
          
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

<!--<script type="text/javascript" src="/js/custom/tiendaEfectos.js"></script>-->
<!--<script type="text/javascript" src="/js/custom/listCheckout.js"></script>-->
<script type="text/javascript">
  //var stripe = Stripe('pk_test_51HWep7BQhjFyWJ1MECyoekgLuFd9kqS2jVgbbtOX9wlMtCootWROVQui9lAgRzZUB3zCCslYm99EEySZaXJB5obi00JPg6JE36');
  //var stripe = Stripe('pk_test_6pRNASCoBOKtIshFeQd4XMUh');
  var stripe = Stripe("pk_test_51HWep7BQhjFyWJ1MECyoekgLuFd9kqS2jVgbbtOX9wlMtCootWROVQui9lAgRzZUB3zCCslYm99EEySZaXJB5obi00JPg6JE36");

  var clientSecret = $("#client_secret").val();
  var elements;
  $( document ).ready(function() {
    fadeNav();
    loadStyles();
  });

  function loadStyles(){
    'use strict';

  var elements = stripe.elements();
    // Floating labels
    var inputs = document.querySelectorAll('.inputs-card .input');
    document.getElementById("submit-strippe").disabled = true;
    Array.prototype.forEach.call(inputs, function(input) {
      input.addEventListener('focus', function() {
        input.classList.add('focused');
      });
      input.addEventListener('blur', function() {
        input.classList.remove('focused');
      });
      input.addEventListener('keyup', function() {
        if (input.value.length === 0) {
          input.classList.add('empty');
        } else {
          input.classList.remove('empty');
        }
      });
    });

    var elementStyles = {
      base: {
        color: '#32325D',
        fontWeight: 500,
        fontSize: '16px',
        fontSmoothing: 'antialiased',

        '::placeholder': {
          color: '#CFD7DF',
        },
        ':-webkit-autofill': {
          color: '#e39f48',
        },
      },
      invalid: {
        color: '#E25950',

        '::placeholder': {
          color: '#FFCCA5',
        },
      },
    };

    var elementClasses = {
      focus: 'focused',
      empty: 'empty',
      invalid: 'invalid',
    };

    var cardNumber = elements.create('cardNumber', {
      style: elementStyles,
      classes: elementClasses,
      showIcon:true
    });
    cardNumber.mount('#card-number');

    var cardExpiry = elements.create('cardExpiry', {
      style: elementStyles,
      classes: elementClasses
    });
    cardExpiry.mount('#card-expiry');

    var cardCvc = elements.create('cardCvc', {
      style: elementStyles,
      classes: elementClasses
    });
    cardCvc.mount('#card-cvc');

    //registerElements([cardNumber, cardExpiry, cardCvc], 'example2');

    cardNumber.on("change", function (event) {
      document.querySelector("#submit-strippe").disabled = event.empty || !event.complete ||  event.error;
      document.querySelector("#error-cardNumber").textContent = event.error ? event.error.message : "";
    });
    cardExpiry.on("change", function (event) {
      document.querySelector("#submit-strippe").disabled = event.empty || !event.complete ||  event.error;
      document.querySelector("#error-cardExpiry").textContent = event.error ? event.error.message : "";
    });
    cardCvc.on("change", function (event) {
      document.querySelector("#submit-strippe").disabled = event.empty || !event.complete ||  event.error;
      document.querySelector("#error-cardCvc").textContent = event.error ? event.error.message : "";
    });

    var form = document.getElementById("payment-form");
    form.addEventListener("submit", function(event) {
      event.preventDefault();
      payWithCard(stripe, cardNumber, clientSecret);
    });

    var payWithCard = function(stripe, card, clientSecret) {
      loading(true);
      stripe
      .confirmCardPayment(clientSecret, {
        payment_method: {
          card: card
        }
      })
      .then(function(result) {
        if (result.error) {
          showError(result.error.message);
        } else {
          orderComplete(result.paymentIntent.id);
        }
      });
  };
    var orderComplete = function(paymentIntentId) {
      loading(false);
      document
        .querySelector(".result-message a")
        .setAttribute(
          "href",
          "https://dashboard.stripe.com/test/payments/" //+ paymentIntentId
        );
      document.querySelector(".result-message").classList.remove("hidden");
      $("#pageContent button").prop("disabled", true);
      launchModal(true);
    };
    
    var showError = function(errorMsgText) {
      loading(false);
      //var errorMsg = document.querySelector("#card-error");
      //errorMsg.textContent = errorMsgText;
      $(".error-msg").text(errorMsgText);
      launchModal(false);
    };
    
    var loading = function(isLoading) {
      if (isLoading) {
        $("#submit-strippe").addClass("btn-loadding").prop("disabled",true);
        $(":input").prop("readonly", true);
        document.querySelector("#spinner").classList.remove("hidden");
        document.querySelector("#button-text").classList.add("hidden");
      } else {
        $(":input").prop("readonly", false);
        $("#submit-strippe").removeClass("btn-loadding").prop("disabled",false);
        document.querySelector("#spinner").classList.add("hidden");
        document.querySelector("#button-text").classList.remove("hidden");
      }
    };

    $("#modalResponse").on('hidden.bs.modal', function (e) {
      setTimeout(function() {
        $("#card-error").text("");
      }, 6000);
    });
  }

  function launchModal(result){
    if(result){ 
      $("#payment-succes").removeClass("d-none"); 
      $("#payment-fayled").addClass("d-none");
    }
    else{
      $("#payment-succes").addClass("d-none");
      $("#payment-fayled").removeClass("d-none");
    }
    $("#modalResponse").modal();
  }


  
</script>
@endsection
