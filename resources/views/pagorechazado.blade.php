@extends('layouts.layout-tienda')

@section('title')
	Pago rechazado | Casa Martínez
@endsection

@section('content')

	<div class="container mt-5" style="font-family: 'Nunito', sans-serif;">
		<div class="row justify-content-center">
			<div class="col-12 col-md-4 mb-2">
				<div class="card mt-3 mb-5">
					<div class="card-header">
						<h5 class="text-danger w-100 text-center">Ocurrió un error al procesar tu pago</h5>
					</div>
					<div class="card-body mt-2">
						<div class="d-flex justify-content-center  text-danger">
							<i data-feather="x-circle" class="w-25 h-auto"></i>
						</div>
						<div class="mt-3">
							<p class="text-muted text-center">Lamentamos esta situación.</p>
							<p style="font-size: 0.9rem;">Intenta utilizar un método de pago diferente o puedes contactarnos para conocer más detalles sobre nuestros métodos de pago.</p>
						</div>
					</div>
					
					<div class="card-footer">
						<p class="text-center text-muted m-0">¡Gracias por visitar Casa Martínez!</p>
					</div>
				</div>
			</div>
			
		</div>
		
	</div>
@endsection