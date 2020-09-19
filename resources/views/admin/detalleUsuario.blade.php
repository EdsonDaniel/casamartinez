@extends('layouts.admin')
@section('style')
@endsection
@section('content')
	 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="ml-2 text-dark">Detalles de usuario</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button id="btn_editar" type="button" class="btn btn-primary d-none">Editar</button>
              <button id="btn_actualizar" type="button" class="btn btn-success d-none ml-2">Actualizar</button>
              <button id="btn_cancelar" type="button" class="btn btn-secondary d-none ml-3">Cancelar</button>
              <button id="btn_ban" type="button" class="btn btn-danger d-none ml-2">Inhabilitar</button>
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
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-11">
            <form id="form_bajaUsuario" method="post" action="/admin/usuarios/baja/">
              @method('POST')
              @csrf
            </form>
            <form id="form_editUsuario" method="post" action="/admin/usuarios/update/{{$usuario->id}}">
              @method('POST')
              @csrf
            <!-- card -->
            <div class="card @if($usuario->active) card-primary
                  @else card-secondary
                  @endif" id="card_usuario">
              <div class="card-header">
                <h3 class="card-title ">Datos del usuario</h3>
                <span style="float: right;">Usuario
                  @if($usuario->active) habilitado
                  @else Inhabilitado
                  @endif
                </span>
              </div>
              <div class="card-body">
                <div class="row row justify-content-center ">
                  <div class="col-sm-5" style="">
                    <h1 class="display-1 text-center mt-5 text-primary" style="font-size: 14em;">
                      <i id="icon_user" class="{{$icon_class}}" style="{{$color}}"></i>
                    </h1>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group col-sm-12">
                    <label for="name">Nombre(s)*</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{ $usuario->name }}" {{$editable}}>
                    <div class="d-none text-danger error invalid-feedback">Debe rellenar este campo.</div>
                  </div>
                  
                  <div class="form-group col-sm-12">
                    <label for="last_name">Apellidos*</label>
                    <input type="text" class="form-control " name="last_name" id="last_name" placeholder="Apellidos" value="{{ $usuario->last_name }}" {{$editable}}
                    >
                    <div class="d-none text-danger error invalid-feedback">Debe rellenar este campo.</div>
                  </div>
                  
                  <div class="form-group col-sm-12">
                    <label for="email">e-mail*</label>
                    <input type="text" class="form-control " name="email" id="email" placeholder="e-mail" value="{{ $usuario->email }}" {{$editable}}>
                    <div class="d-none text-danger error invalid-feedback">Debe rellenar este campo.</div>
                  </div>

                  <div class="form-group col-sm-12 d-none" id="div_pass">
                    <label for="password">Nueva contraseña</label> (Opcional)
                    <input type="password" class="form-control " name="password" id="password" placeholder="Nueva contraseña" {{$editable}}>
                  </div>
                  
                  <div class="form-group col-sm-12">
                    <label for="tipo_usuario">Tipo de usuario*</label>
                    <select class="form-control " name="tipo_usuario" id="tipo_usuario" value="{{ $usuario->tipo_usuario }}" {{$editable}}>
                      <option value="4">Empleado</option>
                      <option value="3">Distribuidor</option>
                      <option value="2">Cliente mayorista</option>
                      <option value="1">Cliente</option>
                      <option value="5">Administrador</option>
                    </select>
                    <div class="d-none text-danger error invalid-feedback">Debe rellenar este campo.</div>
                  </div>
                </div>
                </div>
              </div>
              <div class="card-footer d-none" id="card_footer">
                <div class="row justify-content-end">
                  <button type="button" id="f-cancel" class="btn btn-secondary">Cancelar</button>
                  <button type="button" id="f-update" class="btn btn-success ml-3">Actualizar</button>
                </div>
              </div>
            </div><!-- card -->
          </form>
          </div><!-- left column -->
        </div><!-- row -->
      </div><!-- container -->
      <!--Modal mensaje -->
      <div class="modal fade" id="modal-mensaje" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog " role="document">
          <div class="modal-content">
            <div class="modal-header pb-0" >
              <h5 class="modal-title" >
                <span icon_title>
                  <i class="fa fa-exclamation-circle" style="color: red;"></i>
                </span>
                <span id="title_modal"></span>
              </h5>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body pt-0 ">
              <div id="nombre_usuario" class="m-1 p-2 text-primary" style="font-size: 1.2em;">
                
              </div>
              <div id="msg" class="m-1 p-2 " >
                
              </div>
            </div>
            <div class="modal-footer" id="modal_footer_msg">
              <button type="button" class="btn btn-primary" 
              id="btn_cancel_borrar" data-dismiss="modal">Cancelar</button>

              <button type="submit" class="btn "
              id="btn_borrar" form="form_bajaUsuario">Aceptar</button>

               <button type="button" class="btn btn-secondary d-none"
              id="btn_secondary" data-dismiss="modal">Aceptar</button>
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
    </section>
@endsection
@section('scripts')
  <script type="text/javascript">
    var editable = {!! json_encode($editable) !!};
    var usuario = {!! json_encode($usuario) !!}
  </script>
  <script type="text/javascript" src="/js/custom/detalle_usuario.js"></script>
@endsection