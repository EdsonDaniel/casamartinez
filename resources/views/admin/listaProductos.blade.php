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
                               
                            </table>
                        </div>
                    </div>
                    <!-- card data table -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- card data table -->
                    <div class="card">
                        <div class="card-header">
                            <h3>Productos dados de baja</h3>
                        </div>

                        <div class="card-body">
                            <table id="tabla2" class="table-striped table-bordered dataTable data-table" >
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
                               
                            </table>
                        </div>
                    </div>
                    <!-- card data table -->
                </div>
            </div>
        </div>

        <form method="post" id="form_delete_product" action="/admin/productos/delete_presentacion/">
            @method('POST')
            @csrf
        </form>
        <form method="post" id="form_upload_product" action="/admin/productos/upload_presentacion/">
            @method('POST')
            @csrf
        </form>

        <!--Modal eliminar -->
        <div class="modal fade" id="modal-eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog " role="document">
            <div class="modal-content">
              <div class="modal-header " >
                <h5 class="modal-title" >
                  <span icon_title>
                    <i class="fa fa-exclamation-circle" style="color: red;"></i>
                  </span>
                  <span id="title_baja" class="d-none"> ¿Desea dar de baja este producto?</span>
                  <span id="title_alta" class="d-none"> ¿Desea dar de alta este producto?</span>
               </h5>

               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              
              <div class="modal-body ">
                <div id="nombre_producto" class="text-danger" style="font-size: 1.1rem;">
                  
                </div>
                <div id="msg_baja" class="m-1 p-2 d-none" >
                    <span class="text-danger" style="font-size: 1.1rem;">Notas:</span>
                    <ul class="pl-4">
                        <li>Los datos de esta presentación dejarán de aparecer en la tienda y los clientes no podrán comprarla.</li>
                        <li>Algunos datos de esta presentación seguirán siendo visibles para los clientes que la compraron anteriormente, pero no podrán comprarla de nuevo.</li>
                        <li>Podrá recuperar los datos de esta presentación en la sección <br>
                         <i>/Productos/Productos dados de baja</i>.</li>
                    </ul>
                    
                </div>
                <div id="msg_alta" class="m-1 p-2 d-none" >
                    <span class="text-primary" style="font-size: 1.1rem;">Notas:</span>
                    <ul class="pl-4">
                        <li>Los datos de esta presentación volverán a aparecer en la tienda y los clientes podrán comprarla, siempre y cuando halla suficientes existencias.</li>
                    </ul>
                    
                </div>
              </div>
              
              <div class="modal-footer" id="modal_footer_borrar">
                <button type="button" class="btn btn-secondary" 
                id="btn_cancel_borrar" data-dismiss="modal">Cancelar</button>

                <button type="submit" class="btn btn-danger d-none"
                id="btn_baja" form="form_delete_product">Aceptar</button>

                <button type="submit" class="btn btn-success d-none"
                id="btn_alta" form="form_upload_product">Aceptar</button>
              </div>
            </div>
          </div>
        </div><!--Modal eliminar -->

        <!-- Modal notify-->
        <div class="modal fade" id="modal-notify" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog " role="document">
            <div class="modal-content">
              <div class="modal-header m-0 p-0" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              
              <div class="modal-body text-center">
                <div id="msg_updating">
                  <div class="p-2 pb-3">
                    <img src="/img/ajax-loader.gif">
                  </div>
                  Actualizando datos...<br>Un momento, por favor.
                </div>

                <div id="update_success" class="d-none">
                  <div class="container-fluid">
                    <div class="row justify-content-center">
                      <div class="col-4 p-4">
                        <img class="img-fluid" src="/img/success.png" >
                      </div>
                    </div>
                    <h5 class="modal-title" style="font-weight:400;">Los datos fueron actualizados correctamente.</h5>
                  </div>
                </div>

                <div id="update_fail" class="d-none">
                  <div class="container-fluid">
                    <div class="row justify-content-center">
                      <div class="col-4 p-4">
                        <img class="img-fluid" src="/img/cerrar.png">
                      </div>
                    </div>
                    <h5>Ocurrió un error inesperado.<br>Recarga la página e intentalo de nuevo.</h5>
                  </div>
                </div>

              </div>
              
              <div class="modal-footer d-none" id="modal_footer">
                <button id="btn_notify" type="button" class="btn btn-success" style="display:block; margin: 0 auto;" data-dismiss="modal">Aceptar
                </button>
              </div>                        
          </div>
        </div>
    </div><!-- Modal notify-->
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


