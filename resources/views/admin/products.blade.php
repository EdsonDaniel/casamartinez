@extends('layouts.admin')
@section('content')

<!-- Content Header (Page header) -->

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lista de productos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
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
                        <div class="card-header">
                            <h3>Lista de productos</h3>
                        </div>

                        <div class="card-body">
                            <table id="example" class="display" >
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Presentación</th>
                                        <th>Costo adq.</th>
                                        <th>Precio Consumidor</th>
                                        <th>Precio Distribuidor</th>
                                        <th>Precio Restaurant</th>
                                        <th>Estado</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Presentación</th>
                                        <th>Costo adq.</th>
                                        <th>Precio Consumidor</th>
                                        <th>Precio Distribuidor</th>
                                        <th>Precio Restaurant</th>
                                        <th>Estado</th>
                                        <th>Stock</th>
                                    </tr>
                                </tfoot>
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable( {
                "ajax": "https://casa-martinez.herokuapp.com/admin/productos/ajax",
                "columns": [
                    { "data": "nombre" },
                    { "data": "marca" },
                    { "data": "presentacion" },
                    { "data": "costo_adquisicion" },
                    { "data": "precio_consumidor" },
                    { "data": "precio_distribuidor" },
                    { "data": "precio_restaurant"},
                    { "data": "estado"},
                    { "data": "stock"}
                ]
            } );
        } );
    </script>

    @endsection


