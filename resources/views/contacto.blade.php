@extends('layouts.layout-tienda')

@section('title')
	Contacto | Casa Martínez
@endsection

@section('stylesheet')
  <link rel="stylesheet" href="/css/custom/accountUser.css">
@endsection

@section('content')

	<div id="head-tienda" class="pt-5 pt-md-4">
	  <div class="row justify-content-center no-gutters">
	    <div class="col-10 col-md-2 row justify-content-center mb-2">
	      <div class="col-4 col-md-6 col-lg-7">
	        <img src="/img/logo-casa-martinez-svg.svg" class="img-fluid" alt="Logo Casa Martínez">
	      </div>
	    </div>
	  </div>
	  <h2 class="titulo text-center m-0 p-0">CONTACTO</h2>    
	</div>

	<section class="mt-3 px-3">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<p class="text-center font-size-lg">Contáctanos</p>
					<p>Estamos para ayudarte y resolver todas tus dudas.</p>
					<p><i class="fas fa-phone text-success pr-2"></i> 951-106-4061</p>
					<p><i class="far fa-envelope pr-2"></i> info@casamartinez.mx</p>
					<p class="mt-4 text-center font-size-lg">Síguenos en nuestras redes sociales:</p>
					<div class="row justify-content-center mb-5 mb-md-0">
						<div class="mx-2">
							<a href="https://www.facebook.com/Mezcal.Sinai"> <i class="fab fa-facebook-square" style="color: #3b5997; font-size: 3rem;"></i> </a>
						</div>
						<div class="mx-2">
							<a href="https://twitter.com/MezcalSinai"> <i class="fab fa-twitter-square" style="color: #41b7d8; font-size: 3rem;"></i> </a>
						</div>
						<div class="mx-2">
							<a href="https://www.instagram.com/mezcal.sinai"> <i class="fab fa-instagram" style="color: #E1306C; font-size: 3rem;"></i> </a>
						</div>
					</div>
				</div>

				<div class="col-12 col-md-6 d-flex align-items-center">
					<div class="row ">
						<div class="col-4 d-flex align-items-center"><img src="/img/logo-casa-martinez-svg.svg" class="img-fluid" title="Casa Martínez" alt="Logo Casa Martínez"></div>
						<div class="col-4 d-flex align-items-center"><img src="/img/SINAI_bird2019.jpg" class="img-fluid" title="Mezcal Sinái" alt="Logo Mezcal Sinái"></div>
						<div class="col-4 d-flex align-items-center"><img src="/img/logo-habitante.png" class="img-fluid" title="Mezcal Habitante" alt="Logo Mezcal Habitante"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

@section('scripts')
	<script type="text/javascript">
		$( document ).ready(function() {
			fadeNav();
		});
	</script>

@endsection