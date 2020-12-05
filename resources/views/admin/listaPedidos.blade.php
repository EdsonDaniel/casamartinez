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
            <h1 class="m-0 text-dark">Pedidos</h1>
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
                <div class="col-md-12" id="contenedor">
                    <!-- card data table -->
                    <div class="card">
                        <div class="card-body">
                            <table id="tabla" class="table-bordered dataTable data-table" >
                                <thead>
                                    <tr>
                                        <th>No. <br>Pedido</th>
                                        <th>Método<br>de Pago</th>
                                        <th>Estado</th>
                                        <th>Fecha de<br>Creación</th>
                                        <th>Fecha de <br>Entrega</th>
                                        <th>Paqueteria</th>
                                        <th>Monto <br>Pedido</th>
                                        <th>Última <br>Modificación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- card data table -->
                </div>
                <form method="post" id="form_pedidos">
                  @method('POST')
                  @csrf
                </form>
              </div>
        </div>

    </section>

    <!--Modal acciones -->
    <div class="modal fade" id="modal_acciones" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          
          <div class="modal-header " >
            <h5 class="modal-title" >
              <span icon_title>
                <i class="fa fa-exclamation-circle" style="color: darkblue;"></i>
              </span>
              <span id="titulo_acciones"></span>
           </h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          
          <div class="modal-body pt-0">
            <p style="font-size: 1.1rem; margin: 0;">Detalles del pedido:</p>
            <div id="modelo" class="m-1 p-2 text-primary"></div>
            <div class="row bordes d-none m-1 " id="div_form_update">
              <div class="col-sm-12 mt-2">
                <p>Datos de Envío</p>
                <div class="form-group">
                  <label>ID rastreo:*</label>
                  <div class="input-group" >
                    <input form="form_pedidos" class="form-control" name="id_rastreo" id="id_rastreo" >
                  </div>
                </div>
              </div> 
              <!-- descripcion del rol  --> 
              <div class="col-sm-12"> 
                <div class="form-group"> 
                  <label>Paqueteria:</label> 
                  <div class="input-group"> 
                    <input form="form_pedidos" class="form-control" name="paqueteria" id="paqueteria" >
                  </div>
                </div>
              </div> 
              <!-- descricion del rol--> 
            </div>
            <!--fin row-->
            <div id="msg" class="m-1 p-2" ></div>
          </div>
          
          <div class="modal-footer" id="modal_footer_acciones">
            <button type="button" class="btn btn-secondary" 
            id="btn_cancel_borrar" data-dismiss="modal">Cancelar</button>

            <button type="submit" class="btn btn-success "
            id="btn_eliminar" form="form_pedidos">Aceptar</button>
            
          </div>
        </div>
      </div>
    </div><!--Modal acciones -->

    <!-- Modal notify-->
    <div class="modal fade" id="modal-notify" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header m-0 p-0" >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
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
@endsection

@section('scripts')
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript" src="/js/custom/crudPedidos.js"></script>
@endsection


