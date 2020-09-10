@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/css/custom/datatable.css">
@endsection

@section('content')

<!-- Content Header (Page header) -->

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lista de productos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="">
                    <!--<a href="#">Home</a>-->
                    <a href="/admin/productos/agregar" class="btn btn-success mr-3">Agregar Producto</a>
                </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- card data table -->
                    <div class="card">
                        <!-- <div class="card-header">
                            <h3>Lista de productos</h3>
                        </div> -->

                        <div class="card-body">
                            <table id="tabla" class="table-striped table-bordered dataTable data-table" >
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Presentación</th>
                                        @can('prices.list')
                                        <!-- The Current User Can list The prices -->
                                        <th oculto>Costo<br>adq.</th>
                                        @endcan
                                        <th><span>Precio</span><br>Consumidor</th>
                                        @can('prices.list')
                                            <!-- The Current User Can list The prices -->
                                            <th oculto>Precio<br>Distribuidor</th>
                                            <th oculto>Precio<br>Restaurant</th>
                                        @endcan
                                        <th>Stock</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                        <th class="hidden">id</th>
                                    </tr>
                                </thead>
                                <!--
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Presentación</th>
                                        <th>Costo adq.</th>
                                        <th>Precio Consumidor</th>
                                        <th>Precio Distribuidor</th>
                                        <th>Precio Restaurant</th>
                                        <th>Stock</th>
                                        <th>Estado</th>
                                    </tr>
                                </tfoot>
                            -->
                            </table>
                        </div>
                    </div>
                    <!-- card data table -->
                </div>
            </div>
        </div>
    </section>

    @endsection

    @section('scripts')
    
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    @can('prices.list')
        <script type="text/javascript" src="/js/custom/listproductos.js"></script>
    @elsecannot('prices.list')
        <script type="text/javascript" src="/js/custom/listproductosbasic.js"></script>
    @endcan
    <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    @endsection


