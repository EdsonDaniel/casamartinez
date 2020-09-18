@extends('layouts.admin')
@section('style')
  <link rel="stylesheet" href="/css/custom/listaroles.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/css/custom/datatable.css">
@endsection
@section('content')
   <!-- Content Header (Page header) -->
    <div class="content-header" >
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="ml-2 mb-0 text-dark" >Detalles Rol {{$rol->name}}</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="/admin/roles/agregar" class="btn btn-success mr-2">Nuevo rol</a>
              <button type="button" class="btn btn-primary mr-2 edit">Editar Rol</button>
              <button type="button" class="btn btn-secondary mr-2 cancel d-none">Cancelar</button>
              <button type="button" class="btn btn-danger delete">Eliminar Rol</button>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <!-- container -->
      <div class="container-fluid">
        <!-- row -->
        <div class="row ">
          @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
              {{session('error')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: white;">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          <!-- left column -->
          <div class="col-md-5">
            <div class="row justify-content-center">
            <form id="form_deleteRol" method="post" action="/admin/roles/delete/{{$rol->id}}" class="col-md-12">
              @method('POST')
              @csrf
            </form>
            <!-- card -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title ">Datos del rol</h3>
                <span id="id" class="d-none">{{$rol->id}}</span>
                <span style="float: right; line-height: 1.2;">
                  <button type="button" class="btn btn-primary m-0 edit" data-title="Editar" style="line-height: 1.2; padding: 0 0.25rem;">
                    <i class="fa fa-edit icon-edit" ></i>
                  </button>
                  <button type="button" class="btn btn-primary m-0 cancel d-none" data-title="Cancelar" style="line-height: 1.2; padding: 0 0.25rem; font-size: 1.09rem;">
                    <i class="far fa-window-close" ></i>
                  </button>
                  <button type="button" class="btn btn-primary m-0 p-0 delete" data-title="Eliminar" style="line-height: 1.2;">
                      <i class="fa fa-trash-alt" style="color:red;"></i>
                  </button>
                </span>
              </div>
              <div class="card-body">
                <form action="/admin/roles/update/{{$rol->id}}" id="form_update_rol" method="post">
                  @method('POST')
                  @csrf
                <div class="row justify-content-end">
                  <div class="form-group col-sm-12">
                    <label for="name">Nombre*</label>
                    <input type="text" class="form-control" id="name" disabled value="{{$rol->name}}">
                  </div>
                  
                  <div class="form-group col-sm-12">
                    <label for="description">Descripción*</label>
                    <textarea class="form-control" id="description" disabled value="{{ $rol->description }}">{{ $rol->description }}</textarea>
                  </div>
                </div>
                </form>
              </div><!--card body-->
              <div class="card-footer d-none" id="footer-update">
                <button type="submit" class="btn btn-success " style="float: right;">Guardar cambios</button>
                <button type="button" class="btn btn-danger mr-3" id="f-cancel" style="float: right;">Cancelar</button>
              </div>
            </div><!-- card -->

          </div><!--fin row left column-->
          </div><!-- left column -->

          <!-- right column -->
          <div class="col-md-7">
            <!-- card -->
            <div class="card card-primary" id="card_permisos">
              <div class="card-header">
                <h3 class="card-title ">Permisos asignados</h3>
                <span class="float-right">
                  <!--
                  <button type="button" class="btn btn-primary m-0 " id="edit_p" data-title="Editar" style="line-height: 1.2; padding: 0 0.25rem;">
                    <i class="fa fa-edit icon-edit" ></i>
                  </button>
                  <button type="button" id="cancel_p" class="btn btn-primary m-0 p-0" data-title="Eliminar" style="line-height: 1.2;">
                      <i class="fa fa-trash-alt" style="color:red;"></i>
                  </button>
                -->
                  <button type="button" class="btn btn-primary p-0 ml-1" style="padding: 0 0.3rem; line-height: 1.2;" data-title="Expandir todos" id="collapse" ><i class="fas fa-chevron-circle-down"></i></button>
                </span>
                <span class="float-right pr-2">({{$count_permisos}}/26)</span>
              </div>
              <div class="card-body">
                <div class="row ">
                  @foreach($categorias_permisos as $categoria => $permisos)
                  <div class="input-group col-sm-12 ">
                    <button class="collapsible p-2" type="button">
                      <span class="pl-1">Permisos para {{$categoria}} ({{count($permisos)}})</span>
                    </button>
                    <div class="contenido" style="width: 100%;">
                    @foreach($permisos as $permiso )
                      <div class="input-group-prepend" style="width: 100%;">
                        <div class="input-group-text role-element p-0 border-rad" style="width: 100%;">
                          <label class="form-check-label d-block area-label pl-4"style="width:100%; text-align: left;">
                            <i class="fas fa-check-square text-primary"></i>
                            <span class="pl-1">{{$permiso['description']}}</span>
                          </label>
                        </div>
                      </div>
                    @endforeach
                    </div>
                  </div>
                  @endforeach
                </div>
              </div><!--card body-->
              
            </div><!-- card -->
          </div><!-- right column -->
        </div><!-- row -->

        <div class="row">
          <!-- contenedor 2 -->
          <div class="col-12 mt-5" id="contenedor">
            <!-- card data table inactivos-->
            <div class="card card-lightblue">
              <div class="card-header">
                <h3 class="card-title">Usuarios con este rol <span  id="count_users"></span></h3>
                <span style="float: right;">
                  <button type="button" class="btn btn-primary m-0 p-1" data-title="Añadir usuarios"  data-toggle="modal" data-target="#modal-mensaje">
                    <i class="fas fa-plus"></i>
                  </button>
                </span>
              </div>
              <div class="card-body">
                <table id="tabla" class="table-striped table-bordered dataTable data-table">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>e-mail</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                      <th class="hidden">id</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div><!-- card data table inactivos-->
          </div><!-- contenedor 2-->
        </div>
      </div><!-- container -->
      <form id="form_deleteUsuario" method="post" action="">
        @method('POST')
        @csrf
      </form>
    </section>
    <!--Modal mensaje -->
      <div class="modal fade" id="modal-mensaje" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header " >
              <h5 class="modal-title" >
                <span icon_title>
                  <i class="fa fa-exclamation-circle" style="color: blue;"></i>
                </span>
                <span id="title_modal">Usuarios que tienen o pueden tener este rol</span>
              </h5>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body pt-0 " >
              <!-- card data table inactivos-->
              <form id="form_addusuarios" method="post" action="/admin/roles/{{$rol->id}}/add_usuarios/">
                @method('POST')
                @csrf
              </form>
              <div class="card card-lightblue " >
                <div class="card-body p-0">
                  <table id="tabla_empleados" class="table-striped table-bordered dataTable data-table">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>e-mail</th>
                        <th>Añadir</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div><!-- card data table inactivos-->
            </div>
            <div class="modal-footer" id="modal_footer_msg">
              <button type="button" class="btn btn-secondary" 
              id="btn_cancel" data-dismiss="modal">Cancelar</button>

              <button type="submit" class="btn btn-success"
              id="btn_submit" form="form_addusuarios">Aceptar</button>
            </div>
          </div>
        </div>
      </div><!--Modal mensaje -->
      <!-- Modal notify-->
          <div class="modal fade" id="modal-notify" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog " role="document">
              <div class="modal-content">
                <div class="modal-header m-0 p-0" >
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                
                <div class="modal-body text-center pt-0 mt-0 ">
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
                      <h5 class="">Ocurrió un error al actualizar los datos.</h5>
                        <span id="msg_fail" class="pt-2 mt-2 text-left" style="display: block;"></span>
                    </div>
                  </div>

                </div>
                
                <div class="modal-footer d-none pt-0" id="modal_footer">
                  <button id="btn_notify" type="button" class="btn btn-success" style="display:block; margin: 0 auto;" data-dismiss="modal">Aceptar
                  </button>
                </div>                        
            </div>
          </div>
      </div><!-- Modal notify-->
@endsection
@section('scripts')
  <script type="text/javascript">
    var rol = {!! json_encode($rol) !!};
  </script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="/js/custom/detalle_rol.js"></script>
@endsection