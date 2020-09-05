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
            <h1 class="m-0 text-dark">Especificaciones para productos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="">
                <button type="button" id="add_new_caract" class="btn btn-success mr-3">Nueva Característica</button>
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
                <div class="col-md-12" id="contenedor">
                    <!-- card data table -->
                    <div class="card">
                        <div class="card-body">
                            <table id="tabla" class="table-striped table-bordered dataTable data-table" >
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Acciones</th>
                                        <th class="hidden">id</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- card data table -->
                </div>
                <form method="post" id="form_carac">
                  @method('POST')
                  @csrf
                </form>
                <div>
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
            </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript" src="/js/custom/crudcaracteristicas.js"></script>
@endsection


