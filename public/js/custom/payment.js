var stripe = Stripe("pk_test_51HWep7BQhjFyWJ1MECyoekgLuFd9kqS2jVgbbtOX9wlMtCootWROVQui9lAgRzZUB3zCCslYm99EEySZaXJB5obi00JPg6JE36");
var success = false;
  var clientSecret = $("#client_secret").val();
  var elements;
  $( document ).ready(function() {
    fadeNav();
    loadStyles();
    changeToPrice();
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
      var name = $("#customer_name").data("name");
      console.log(name);
      var zip_code = $("#zip_code").data("code");
      stripe
      .confirmCardPayment(clientSecret, {
        payment_method: {
          type: 'card',
          card: card,
          billing_details: {
            name: name,
            address: {
              postal_code: zip_code
            }
          },
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
      success = true;
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
      if (success) {
        flushCart();
        window.location.replace("/tienda");
      }
      else
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

  function flushCart(){
    localStorage.removeItem("shoppingCart");
  }