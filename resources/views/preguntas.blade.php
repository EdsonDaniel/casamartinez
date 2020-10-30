@extends('layouts.layout-tienda')

@section('title')
	Preguntas Frecuentes | Casa Martínez
@endsection

@section('stylesheet')
<style type="text/css">
	.btn-link:focus{ box-shadow: none; }
</style>
@endsection


@section('content')

<div id="head-tienda">
  <div class="row justify-content-center no-gutters">
    <div class="col-10 col-md-2 row justify-content-center">
      <div class="col-7 col-md-9 col-lg-10 ">
        <img src="/img/logo-casa-martinez-svg.svg" class="img-fluid" alt="Logo Casa Martínez">
      </div>
    </div>
  </div>
  <h2 class="titulo text-center px-3 m-0">PREGUNTAS FRECUENTES</h2>
</div>

<section class="mt-md-4 mt-3">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="accordion" id="accordion">
					<div class="card">
					    <div class="card-header py-0 bg-dark " id="pregunta1">
					      <h5 class="mb-0">
					        <button class="collapsed btn btn-link btn-block d-flex justify-content-between align-items-center text-white" type="button" data-toggle="collapse" data-target="#respuesta1" aria-expanded="false" aria-controls="respuesta1">
					        	¿Cómo realizo una compra en en casamartinez.mx?
					        	<i class="fas fa-angle-down"></i>
					        </button>
					      </h5>
					    </div>

					    <div id="respuesta1" class="collapse " aria-labelledby="pregunta1" data-parent="#accordion">
					      <div class="card-body">
					       <p class="m-0">Para poder realizar una compra, primero debes seleccionar el/los  producto(s) que te gustaría adquirir disponible(s) en la <a href="/tienda">tienda.</a> Después lo(s) agregas al carrito y seleccionas la opción de proceder al pago. Posteriormente, se te solicitará ingresar una dirección de envío, y un método de pago. Una vez acreditado el pago recibirás un e-mail de confirmación de tu compra. También se te notificará cuando el pedido halla sido enviado. </p>
					      </div>
					    </div>
					</div>
				  
					<div class="card">
						<div class="card-header py-0 bg-dark" id="pregunta2">
					      <h5 class="mb-0">
					        <button class="btn btn-link btn-block d-flex justify-content-between align-items-center text-white collapsed" type="button" data-toggle="collapse" data-target="#respuesta2" aria-expanded="false" aria-controls="respuesta2">
					        	¿Cúal es el costo de envío?
					          <i class="fas fa-angle-down"></i>
					        </button>
					      </h5>
					    </div>
					    <div id="respuesta2" class="collapse" aria-labelledby="pregunta2" data-parent="#accordion">
					      <div class="card-body">
					        El costo de envío es calculado a partir del número de botellas que se deseen adquirir.
					      </div>
					    </div>
					</div>
					
					<div class="card">
					    <div class="card-header py-0 bg-dark" id="pregunta3">
					      <h5 class="mb-0">
					        <button class="btn btn-link btn-block d-flex justify-content-between align-items-center text-white collapsed" type="button" data-toggle="collapse" data-target="#respuesta3" aria-expanded="false" aria-controls="respuesta3">
					          ¿Cómo puedo consultar el estado de mi pedido?
					          <i class="fas fa-angle-down"></i>
					        </button>
					      </h5>
					    </div>
					    <div id="respuesta3" class="collapse" aria-labelledby="pregunta3" data-parent="#accordion">
					      <div class="card-body">
					        Una vez enviado, se te notificará vía e-mail el número de rastreo y la paquetería con la cual fue enviado. Con esa información podrás revisar en la página de la paquetería el estado de tu pedido. 
					      </div>
					    </div>
					</div>

					<div class="card">
						<div class="card-header py-0 bg-dark" id="pregunta4">
					      <h5 class="mb-0">
					        <button class="btn btn-link btn-block d-flex justify-content-between align-items-center text-white collapsed" type="button" data-toggle="collapse" data-target="#respuesta4" aria-expanded="false" aria-controls="respuesta4">
					        	¿Realizan envíos a toda la República Mexicana?
					          <i class="fas fa-angle-down"></i>
					        </button>
					      </h5>
					    </div>
					    <div id="respuesta4" class="collapse" aria-labelledby="pregunta4" data-parent="#accordion">
					      <div class="card-body">
					        El costo de envío es calculado a partir del número de botellas que se deseen adquirir.
					      </div>
					    </div>
					</div>

					<div class="card">
						<div class="card-header py-0 bg-dark" id="pregunta5">
					      <h5 class="mb-0">
					        <button class="btn btn-link btn-block d-flex justify-content-between align-items-center text-white collapsed" type="button" data-toggle="collapse" data-target="#respuesta5" aria-expanded="false" aria-controls="respuesta5">
					        	¿Cuáles son los métodos de pago disponibles?
					          <i class="fas fa-angle-down"></i>
					        </button>
					      </h5>
					    </div>
					    <div id="respuesta5" class="collapse" aria-labelledby="pregunta5" data-parent="#accordion">
					      <div class="card-body">
					        Aceptamos pagos con tarjetas de débito y crédito. O a través de la plataforma de Mercado Pago. 
					      </div>
					    </div>
					</div>

					<div class="card">
						<div class="card-header py-0 bg-dark" id="pregunta6">
					      <h5 class="mb-0">
					        <button class="btn btn-link btn-block d-flex justify-content-between align-items-center text-white collapsed" type="button" data-toggle="collapse" data-target="#respuesta6" aria-expanded="false" aria-controls="respuesta6">
					        	¿Cómo puedo obtener ayuda personalizada?
					          <i class="fas fa-angle-down"></i>
					        </button>
					      </h5>
					    </div>
					    <div id="respuesta6" class="collapse" aria-labelledby="pregunta6" data-parent="#accordion">
					      <div class="card-body">
					        Puedes ponerte en contacto con nosotros a través del e-mail <a href="mailto:info@casamartinez.mx?subject=Ayuda">info@casamartinez.mx</a> o llamándonos al número 951-106-4061
					      </div>
					    </div>
					</div>
				
				</div>
			</div>
		</div>
		
	</div>
</section>
@endsection
