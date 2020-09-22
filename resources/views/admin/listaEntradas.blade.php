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
            <h1 class="m-0 text-dark">Historial de Entradas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="">
                <a href="/admin/entradas/agregar/" id="add_rol" class="btn btn-success mr-3">Registrar entrada</a>
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
                    <!-- card data table activos -->
                    <div class="card">
                      <div class="card-body">
                        <table id="tabla" class="table-striped table-bordered dataTable data-table">
                          <thead>
                            <tr>
                              <th>Fecha de entrada</th>
                              <th>Nombre del Producto</th>
                              <th>Cantidad</th>
                              <th>Lote a granel</th>
                              <th>Lote de envasado</th>
                              <th>Acciones</th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                    </div><!-- card data table activos-->
                  </div><!-- contenedor 1 -->

                  <form method="post" id="form_entradas" action="/admin/entradas/delete/">
                    @method('POST')
                    @csrf
                  </form>

                <!--Modal acciones -->
                <div class="modal fade" id="modal_acciones" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog " role="document">
                    <div class="modal-content">
                      
                      <div class="modal-header " >
                        <h5 class="modal-title" >
                          <span icon_title>
                            <i class="fa fa-exclamation-circle" style="color: red;"></i>
                          </span>
                          <span id="titulo_acciones"></span>
                       </h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      
                      <div class="modal-body ">
                        <div id="modelo" class="m-1 p-2 text-primary" style="font-size: 1.2em;"></div>
                        <div id="msg" class="m-1 p-2 text-danger" ></div>
                      </div>
                      
                      <div class="modal-footer" id="modal_footer_acciones">
                        <button type="button" class="btn btn-secondary" 
                        id="btn_cancel_borrar" data-dismiss="modal">Cancelar</button>

                        <button type="submit" class="btn btn-danger "
                        id="btn_eliminar" form="form_entradas">Eliminar</button>
                        
                      </div>
                    </div>
                  </div>
                </div><!--Modal acciones -->

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
                            <h5>Ocurrió un error al elimninar.</h5>
                            <span class="text-left d-block">Detalles:</span>
                            <span id="msg_fail" class="text-left text-danger" style="display: block;"></span>
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
        </div>
      </div>
    </section>
@endsection

@section('scripts')
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript" src="/js/custom/crudentradas.js"></script>
@endsection
