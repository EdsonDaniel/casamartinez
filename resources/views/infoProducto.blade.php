@extends('layouts.layout-tienda')

@section('title')
	Información de Producto | Casa Martínez
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
  <h2 class="titulo text-center m-0 p-0">INFORMACIÓN DE PRODUCTO</h2>
</div>
<section class="p-1 pt-2 pt-md-3">
  <div class="container p-md-0">
    <div class="row justify-content-center">
      <div class="col-12 col-md-4">
        <img src="/storage/img/fotos-productos/KGjw6pPsgFCNNpg9uJecFjpfSN7kQarbQyhUHBVs.jpeg" class="img-fluid">
      </div>

      <div class="col-12 col-md-5 d-flex align-items-center">
        <!-- Table -->
        <div class="table-responsive">
          <h5 class="w-100 titulo text-center mb-3" style="font-size: 1rem !important;">ESPECIFICACIONES</h5>
          <table class="table table-bordered table-sm table-hover mb-5 rounded">
            <tbody>
              <tr>
                <td class="px-2">Maestro Mezcalero</td>
                <td class="text-secondary px-2">Ignacio Martpinez</td>
              </tr>
              <tr>
                <td class="px-2">Maguey</td>
                <td class="text-secondary px-2">Angustifolia, Maguey Espadín</td>
              </tr>
              <tr>
                <td>Edad de maguey</td>
                <td class="text-secondary">10 años.</td>
              </tr>
              <tr>
                <td>Destilación</td>
                <td class="text-secondary">
                  Doble, en ollas de cobre.
                </td>
              </tr>
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            <a href="/tienda" class="btn btn-next">Ir a la tienda <i class="fas fa-long-arrow-alt-right"></i></a>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')
<!--change navbar bg color-->

@endsection