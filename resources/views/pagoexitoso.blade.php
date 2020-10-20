@extends('layouts.layout-tienda')

@section('title')
	Pago exitoso | Casa Martínez
@endsection

@section('content')

	<div class="container mt-5" style="font-family: 'Nunito', sans-serif;">
		<div class="row justify-content-center">
			<div class="col-12 col-md-4 mb-2">
				<div class="card mt-3 mb-5">
					<div class="card-header">
						<h5 class="text-success w-100 text-center">¡Tu pago se ha realizado satisfactoriamente!</h5>
					</div>
					<div class="card-body mt-2">
						<div class="d-flex justify-content-center  text-success">
							<i data-feather="check-circle" class="w-25 h-auto"></i>
						</div>
						<div class="mt-3">
							<p class="text-muted">Te acabamos de enviar un email con los detalles de tu compra.</p>
						</div>
					</div>
					
					<div class="card-footer">
						<p class="text-center text-muted m-0">¡Gracias por comprar en Casa Martínez!</p>
					</div>
				</div>
			</div>
			
		</div>
		
	</div>
@endsection