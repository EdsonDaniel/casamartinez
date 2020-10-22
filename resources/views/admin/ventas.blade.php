@extends('layouts.admin')

@section('content')
	 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Estadísticas</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
      <div class="card">
        <div class="card-header w-100 text-center">Ventas del presente mes agrupadas por día.</div>
        <div class="card-body">
          <canvas id="ventas" width="400" height="100"></canvas>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-header w-100 text-center">Top 5 Productos más vendidos en los últimos días</div>
              <div class="card-body">
                <canvas id="masVendidos" width="400" height="200"></canvas>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="card">
              <div class="card-header w-100 text-center">Ventas del presente año agrupadas por mes</div>
              <div class="card-body">
                <canvas id="ventasAnio" width="400" height="200"></canvas>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript" src="/js/custom/loadVentas.js">
</script>
@endsection