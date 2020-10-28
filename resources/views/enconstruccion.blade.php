@extends('layouts.plantilla')

@section('title')
	Sitio en Construcción | Casa Martínez
@endsection

@section('stylesheet')
<link href="css/custom/bebidas.css" rel="stylesheet" type="text/css" />
@endsection

@section('id-container')
  id="wh-bg"
@endsection

@section('content')

<div style="height: 90vh;">
	<div class="d-flex flex-column justify-content-center h-100">
		<h2 class="h2 text-center pt-0 mt-0 mb-2">PRÓXIMAMENTE</h2>
		<img src="img/logo-casa-martinez.png" class="img-centered mt-0 mb-5 pb-2" style="max-width: 200px;">
	</div>
</div>


@endsection

@section('scripts')
	<script type="text/javascript">
		$( document ).ready(function() {
			$("#div-foot").addClass("position-fixed fixed-bottom");
		});
	</script>

@endsection