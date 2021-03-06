@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" type="text/css" href="/css/custom/datatable.css">
@endsection
@section('content')

<!-- Content Header (Page header) -->

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detalles del producto @if($producto->estado < 1)
                <span class="text-danger">(Dado de baja)</span>
             @endif</h1>
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
                @if ($errors->any())
                    <div class="alert alert-danger col-12 alert-dismissible fade show" role="alert">
                        <span class="d-block p-1">Ocurrió un error al actualizar los datos.
                            <br>Detalles:</span>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="color: white; font-size: 1.6em; opacity: 1; ">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-md-6">
                    <!-- card datos generales -->
                    <form id="form_delete_producto" class="whit-msg" method="post" action="/admin/productos/delete/{{$producto->id}}">
                        @method('POST')
                        @csrf
                    </form>
                    <form id="form_upload_producto" class="whit-msg" method="post" action="/admin/productos/restore/{{$producto->id}}">
                        @method('POST')
                        @csrf
                    </form>
                    <form action="/admin/productos/update/{{$producto->id}}" method="post" id="form_padre" enctype="multipart/form-data" class="whit-msg">
                        @method('POST')
                        @csrf
                    <div class="card
                      @if($producto->estado < 1)
                        card-secondary
                      @else
                        card-primary
                      @endif

                     " id="card-padre">
                        <div class="card-header">
                            <h3 class="card-title m-0 p-1" style="font-size: 1.1em; line-height: 1.3;">Datos generales</h3>
                            <span style="float: right;">
                                <button type="button" id="btn-edit_padre" class="btn @if($producto->estado == 1) btn-primary @endif m-0 p-0" data-title="Editar" onclick="editar_padre()">
                                    <i class="fa fa-edit icon-edit" ></i>
                                </button>
                                <button type="button" id="eliminar_producto" class="btn @if($producto->estado == 1) btn-primary @else d-none @endif m-0 p-1" data-title="Dar de baja">
                                    <i class="fa fa-trash-alt" style="color:red;"></i>
                                </button>
                                <button type="button" id="upload_producto" class="btn @if($producto->estado == 1) d-none @else btn-success @endif m-0 p-1" data-title="Dar de alta">
                                    <i class="fa fa-upload" style="color:blanchedalmond;"></i>
                                </button>
                            </span>
                        </div>

                        <div class="card-body">
                            <div class="container-fluid pl-0">
                                <div class="row pl-0">
                                    <div class="col-md-5 p-0 mt-1">
                                        @if($producto->foto_url == "")
                                            @switch(strtolower($producto->marca))
                                                @case("sinai")
                                                @case("sinaí")
                                                @case("sinái")
                                                    <img src="/storage/img/marca-sinai.jpg" class="img-fluid" >
                                                    @break
                                                @default
                                                    <img src="/storage/img/logo-casa-martinez.jpg" class="img-fluid" >
                                            @endswitch
                                        @else
                                            <img src="/storage/{{$producto->foto_url}}" class="img-fluid" >
                                        @endif
                                    </div>
                                    
                                    <div class="col-7 mt-2 pl-0">
                                        <div class="form-group parent">
                                            <label for="nombre_producto">Nombre</label>
                                            <input type="text" class="form-control @error('nombre_producto') is-invalid @enderror" name="nombre_producto" required value="{{ $producto->nombre }}" disabled="" id="nombre">
                                            @error('nombre_producto')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group parent">
                                            <label for="marca">Marca</label>
                                            <input type="text" class="form-control @error('marca') is-invalid @enderror" name="marca" required value="{{$producto->marca}}" disabled="" id="marca">
                                            @error('marca')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group parent">
                                            <label for="descripcion">Descripción</label>
                                            <textarea class="form-control @error('descripcion_producto') is-invalid @enderror" name="descripcion_producto" rows="2"  required disabled="" id="descripcion_producto">{{$producto->descripcion}}</textarea>
                                            @error('descripcion_producto')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div> <!--fin row-->
                            </div> <!--fin container-->
                        </div>

                        <div class="card-footer d-none" id="footer-padre">
                            <div class="d-flex align-items-sm-center justify-content-sm-center">
                                <button form="form_padre" type="button" class="btn btn-success" id="show-modal-padre">Actualizar datos</button>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modal_padre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal_title_padre">
                                        <span>
                                            <i class="fa fa-exclamation-circle" style="--fa-secondary-color: blue !important; color: blue;"></i></span>
                                    Se actualizarán los siguientes datos: </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body pt-0"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="cancel_padre" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary" id="save_generales">Guardar cambios</button>
                                    <button type="submit" id="btn_delete_product" class="btn btn-warning d-none" form="form_delete_producto">Dar de Baja</button>
                                    <button type="submit" id="btn_upload_product" class="btn btn-success d-none" form="form_upload_producto">Dar de Alta</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    </form>
                    <!-- card datos generales -->
                </div>

                <div class="col-md-6">
                    <!-- card otras caracteristicas -->
                    <div class="card
                     @if($producto->estado < 1)
                        card-secondary
                      @else
                        card-primary
                      @endif

                     " id="card_caracteristicas">
                        <div class="card-header">
                            <h3 class="card-title m-0 p-1">Otras características
                                <span id="contador_caract">({{count($carac)}})</span>
                            </h3>
                            <span style="float: right;">
                                 <button type="button" class="btn @if($producto->estado == 1) btn-primary @endif m-0 p-1" data-title="Nueva característica" onclick="addcaracteristica()">
                                    <i class="fas fa-plus"></i>
                                </button>
                                @if(!$carac->isEmpty())
                                <button type="button" class="btn @if($producto->estado == 1) btn-primary @endif m-0 p-1" id="edit_carac" data-title="Editar todas" onclick="editar_carac()">
                                    <i class="fa fa-edit icon-edit"></i>
                                </button>
                                <button id="delete_all_caract" type="button" class="btn @if($producto->estado == 1) btn-primary @endif m-0 p-0" data-title="Eliminar todas" onclick="">
                                    <i class="fas fa-ban pt-2" style="color: red;"></i>
                                </button>
                                @endif
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row " id="fila_caract">
                                    @if(!$carac->isEmpty())
                                    <form class="whit-msg" id="form_delete_all_caract" 
                                    method="POST" action="/admin/productos/delete_caracteristicas/{{$producto->id}}" enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                    </form>
                                    <form id="form_carac" class="whit-msg" action="/admin/productos/update_caracteristicas/{{$producto->id}}" style="width: 100%;" method="post" enctype="multipart/form-data">
                                        <div class="row " id="fila_caract_input">
                                    @method('POST')
                                    @csrf
                                        @foreach($carac as $caracteristica)
                                            <div class="col-sm-6 p-2 mb-2 parent" div-inicial >
                                                <div class="form-group mb-0 p-2 bordes">
                                                    <span nombre_caracteristica style="max-width: 70%; display: inline-block;">{{$caracteristica->nombre.":"}}</span>
                                                    <span style="float: right; margin: 0;">
                                                        <span >
                                                            <button type="button" class="btn-carac m-0 p-0" data-title="Editar" btn-edit-carac>
                                                                <i class="fa fa-edit icon-edit2" style="color: darkblue;"></i>
                                                            </button>

                                                            <button type="button" class="btn-carac m-0 p-0" data-title="Eliminar" onclick="eliminar_caract(event)">
                                                                <i class="fa fa-trash-alt" style="color:red;"></i>
                                                            </button>
                                                            
                                                            <button type="button"  class="btn-help help m-0 p-0" data-title="Info característica">
                                                                <i class="fas fa-question-circle"></i>
                                                  
                                                            </button>
                                                            <div class="dropdown-content">
                                                                <p style="margin: 0;">{{$caracteristica->descripcion}}</p>
                                                            </div>
                                                        </span>
                                                    </span>
                                                    <input id_caract name="carac_iniciales[caract{{$loop->iteration}}][id]" value="{{$caracteristica->id}}" type="text" disabled class="d-none"></input>
                                                    <input type="text" class="form-control mt-1" name="carac_iniciales[caract{{$loop->iteration}}][value]" required disabled value="{{ $caracteristica->pivot->valor }}" placeholder="{{$caracteristica->pivot->valor}}" data-principal>
                                                    <!--<div class="mt-2 d-none">
                                                        <button type="button" class="btn btn-success btn-sm" style="display: block; margin: 0 auto;">Actualizar</button>
                                                    </div>-->
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    </form>
                                    @else

    <form id="form_add_carac" class="whit-msg" action="/admin/productos/update_caracteristicas/{{$producto->id}}" method="post" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <!-- Modal add carac-->
        <div class="modal fade" id="modal_caract" tabindex="-1" role="dialog" aria-labelledby="modal_caract" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal_title_caract">
                Agregar especificaciones.
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fa fa-window-close icon-cancel"></i></span>
            </button>
        </div>
      <div class="modal-body pt-0">
            <!--card caracteristicas adicionales-->
              <div class="card card-info" id="card_list_caract">
                <div class="card-header">
                  <h3 class="card-title mt-1">Lista de características <span id="count_carac">(1)</span></h3>

                  <span style="float: right;">
                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Agregar característica" onclick="addCarac()"><i class="fas fa-plus"></i>
                    </a>

                  </span>
                </div>
                <!-- /.card-header -->

                <div class="card-body" id="caracteristicas" style="transition: height 1.5s;">
                  <!--<form role="form">-->
                    <div class="row bordes parent" id="carac1">
                        <div class="col-sm-12 mt-2" style="border-bottom-color: rgb(222, 226, 230) !important; border-bottom-style: solid;border-bottom-width: 4px;">
                            <div class="form-group">
                                <span style="font-weight:500; display:inline-block;" class="pt-0 mt-1">Característica #1</span>
                                <span style="float: right; color: #c82333;">
                                    <a style="cursor: pointer; font-size: 1.3rem; display:inline-block; color: #0069d9;"  
                                    data-toggle="tooltip" data-placement="top" title="Agregar característica" onclick="addCarac()"><i class="fas fa-plus-square"></i>
                                </a>
                            </div>
                        </div>
                      <!--nombre caracteristica1 -->
                      <div class="col-sm-6 mt-2 parent">
                        <div class="form-group">
                          <label for="select_caracteristicas1">Característica*</label>
                            <div class="input-group" indice="1" id="div_select_caracteristicas1">
                              <select class="form-control" style="padding-left: 3px;" onchange="listenerSelect(event)" id="select_caracteristicas1" name="caracteristicas[caracteristica1][id]">
                                <option selected="" value="-1">SELECCIONE</option>
                                @foreach($all_caract as $car)
                                    <option value="{{$car->id}}">{{$car->nombre}}</option>
                                @endforeach
                              </select>
                            </div> 
                        </div>
                      </div>
                       <!--nombre caracteristica 1-->

                     <!-- val caracteristica1 -->
                      <div class="col-sm-6 mt-2">
                        <div class="form-group parent">
                          <label>Valor de característica*</label>
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="Ignacio Martínez" id="input_val_caract1" name="caracteristicas[caracteristica1][value]" value="{{ old('select_caracteristicas.value') }}">
                            </div> 
                          </div>
                      </div>
                      <!-- val caracteristica1-->

                      <!-- descripcion caracteristica1 -->
                      <div class="col-sm-12">
                        <div class="form-group parent">
                          <label>Descripción de la característica</label>
                            <div class="input-group">
                              <textarea class="form-control" id="input_descrip_caract1" name="input_descrip_caract1" rows="2" placeholder="Descripción breve de lo que representa esta característica." disabled></textarea>
                            </div> 
                          </div>
                      </div>
                      <!-- descripcion caracteristica1-->
                    </div>
                    <!--fin row-->
                  </div>
                  <!--fin card body-->
              </div><!-- fin card caracteristicas-->
              <div id="contenido"></div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="save_add_caract">Guardar cambios</button>
        <button type="button" class="btn btn-success d-none" id="save_caract" data-dismiss="modal" form="form_add_carac">Aceptar</button>
      </div>
    </div>
  </div>
</div>
</form>

                                        <div class="col-sm-12">
                                            <div class="d-flex align-items-sm-center justify-content-sm-center">
                                                <div>
                                                    <p style="color: gray;">(No se han especificado caractrerísticas para este producto.)</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-sm-center justify-content-sm-center">
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_caract">Agregar características
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                    
                                </div> <!--fin row-->
                            </div> <!--fin container-->
                        
                        </div><!--fin card body-->
                        <div class="card-footer d-none" id="footer-carac">
                            <div class="d-flex align-items-sm-center justify-content-sm-center">
                                <button form="form_carac" type="button" class="btn btn-success mr-3" id="save_changes_caract">Actualizar datos</button>
                                <button form="form_carac" type="button" class="btn btn-danger" id="cancel_changes_caract" onclick="cancel_card_caract()">Cancelar</button>
                            </div>
                        </div>
                    </div>
                    <!-- card otras caracteristicas -->
                </div>

                <div class="col-md-12 mt-3">
                    <!-- card presentaciones-->
                    <div class="card
                    @if($producto->estado < 1)
                        card-secondary
                      @else
                        card-info
                      @endif
                    ">
                        <div class="card-header">
                            <h3 class="card-title m-0 p-1">
                                Presentaciones ({{count($presentaciones)}})
                            </h3>
                            <span style="float: right;">
                                 <button type="button" class="btn @if($producto->estado == 1) btn-primary @endif m-0 p-1" data-title="Nueva presentación" onclick="addPresentacion()">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </span>
                        </div>

                        <div class="card-body" id="card_body_presentaciones">
                            @if ($errors->any())
                            <div class="alert alert-danger col-12 alert-dismissible fade show" role="alert">
                                <span class="d-block p-1">No se pudieron agregar/editar la(s) nueva(s) presentacion(es) debido a los siguientes errores: </span>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" style="color: white; font-size: 1.6em; opacity: 1; ">&times;</span>
                                </button>
                            </div>
                            @endif
                            
                            <div class="row justify-content-center" id="lista_presentaciones">
                                @foreach ($presentaciones as $presentacion)
                                    <div class="col-sm-4 mt-2">
                                        <div class="card" id="card_{{$presentacion->id}}">
                                            <form class="whit-msg" id="form_upload_pres_{{$presentacion->id}}" action="/admin/productos/upload_presentacion/{{$presentacion->id}}" method="post" card-form="card-presentaciones" enctype="multipart/form-data">
                                                @method('POST')
                                                @csrf
                                            </form>
                                            <form class="whit-msg" id="form_delete_pres_{{$presentacion->id}}" action="/admin/productos/delete_presentacion/{{$presentacion->id}}" method="post" card-form="card-presentaciones" enctype="multipart/form-data">
                                                @method('POST')
                                                @csrf
                                            </form>
                                            <form id="form_pres_{{$presentacion->id}}" action="/admin/productos/update_presentacion/{{$presentacion->id}}" method="post" card-form="card-presentaciones" enctype="multipart/form-data" class="whit-msg">
                                                @method('POST')
                                                @csrf
                                                <span class="d-none id_pres">{{$presentacion->id}}</span>
                                            <div class="card-header"
                                            @switch($presentacion->estado)
                                                @case(1)
                                                    @if($presentacion->stock < $presentacion->stock_min)
                                                    style="background-color: #ffc107;">
                                                    <span data-title="Pocas existencias" style="display: inline-block;vertical-align: middle; font-size: 1.1rem; line-height: 1.5;" class="m-0">
                                                        <a style="color: #343a40; display: inline-block;">
                                                            Presentación 
                                                            {{$presentacion->contenido.' '.$presentacion->unidad_c}}
                                                        </a>
                                                    </span>
                                                    <span data-title="Pocas existencias" class="btn p-0 btn-headers ic-estado">
                                                        <i class="fa fa-exclamation-triangle"></i>
                                                    </span>
                                                    @else
                                                    style="background-color: #28a745;">
                                                    <span data-title="Estado: Disponible" style="display: inline-block;vertical-align: middle; font-size: 1.1rem; line-height: 1.5;" class="m-0 ">
                                                        <a style="color: white; display: inline-block;"  >
                                                            Presentación
                                                            {{$presentacion->contenido.' '.$presentacion->unidad_c}}
                                                        </a>
                                                    </span>
                                                    <span data-title="Estado: Disponible" class="btn p-0 btn-headers ic-estado">
                                                            <i class="far fa-check-circle" style="color: white;"></i>
                                                        </span>
                                                    @endif
                                                    @break
                                                @case(0)
                                                    style="background-color: #dc3545;">
                                                    <span data-title="Estado: No disponible" style="display: inline-block;vertical-align: middle; font-size: 1.1rem; line-height: 1.5;" class="m-0">
                                                        <a  style="color: white; display: inline-block;">
                                                            Presentación 
                                                            {{$presentacion->contenido.' '.$presentacion->unidad_c}}
                                                        </a>
                                                    </span>
                                                    <span data-title="Estado: No disponible" class="btn p-0 btn-headers ic-estado">
                                                        <i class="fa fa-ban" style="color:white;"></i>
                                                    </span>
                                                    @break
                                                @case(-1)
                                                    style="background-color: #d6d8d9;">
                                                    <span data-title="Estado: Dado de baja" style="display: inline-block;vertical-align: middle; font-size: 1.1rem; line-height: 1.5;" class="m-0 p-1">
                                                        <a style="color: black; display: inline-block;">
                                                            Presentación 
                                                            {{$presentacion->contenido.' '.$presentacion->unidad_c}}
                                                        </a>
                                                    </span>
                                                    <span data-title="Estado: Dado de baja" class="btn p-0 btn-headers ic-estado">
                                                        <i class="fa fa-ban" style="color:black; font-size: 1.14em;"></i>
                                                    </span>
                                                    @break
                                                @case(2)
                                                    style="background-color: #A1A194;">
                                                    <span data-title="Estado: Próximamente" style="display: inline-block;vertical-align: middle; font-size: 1.1rem; line-height: 1.5;" class="m-0 p-1">
                                                        <a style="color: white; display: inline-block;" >
                                                            Presentación 
                                                            {{$presentacion->contenido.' '.$presentacion->unidad_c}}
                                                        </a>
                                                    </span>
                                                    <span data-title="Estado: Próximamente" class="btn p-0 btn-headers ic-estado">
                                                        <i class="fa fa-clock" style="color:white;"></i>
                                                    </span>
                                                    @break
                                                @default
                                                    >
                                                    <span style="display: inline-block;vertical-align: middle; font-size: 1.1rem; line-height: 1.5;" class="m-0 p-1">
                                                        <a style="color: black; display: inline-block;" >
                                                            Presentación 
                                                            {{$presentacion->contenido.' '.$presentacion->unidad_c}}
                                                        </a>
                                                    </span>
                                            @endswitch
                                                <span style="float: right;vertical-align: middle;">
                                                    <button type="button" btn-edit-pres class="btn btn-primary p-0 btn-headers" data-title="Editar">
                                                        <i class="fa fa-edit " style="font-weight: 100; padding: 0.1em;"></i>
                                                    </button>
                                                    @if($presentacion->estado != -1)
                                                    <button type="button" class="btn btn-danger p-0 btn-headers"  data-title="Dar de baja" id_pres_prod="{{$presentacion->id}}" onclick="delete_presentacion(event)">
                                                        <i class="fa fa-folder-minus" style="padding: 0.1em;"></i>
                                                    </button>
                                                    @else 
                                                    <button type="button" class="btn btn-success p-0 btn-headers" data-title="Dar de alta" id_pres_prod="{{$presentacion->id}}" onclick="upload_presentacion(event)" >
                                                        <i class="fa fa-upload" style="padding: 0.1em;"></i>
                                                    </button>
                                                    @endif
                                                    <button class="btn btn-primary d-none p-0 btn-headers" data-title="Guardar cambios" >
                                                        <i class="far fa-save " style="padding: 0.1em; font-size: 1.1em;"></i>
                                                    </button>
                                                </span>

                                            </div> <!--card -header-->
                                            
                                            <div class="card-body">
                                                <div class="col-12 img-wrapper">
                                                    @if($presentacion->foto_url == "")
                                                        <img src="/img/botellas/anejo-sq.jpg" class="img-fluid">
                                                    @else <img src="/storage/{{$presentacion->foto_url}}" class="img-fluid" style="max-height: 15em; display: block; margin: 0 auto;">
                                                    @endif
                                                </div>
                                            <div class="col-sm-12 m-0 p-0 parent" >
                                                <div class="form-group mb-0 d-none ">
                                                    <label class="mb-0">Contenido neto</label>
                                                    <div class="input-group">
                                                        <input type="number" step=".01"  class="form-control m-1"
                                                        placeholder="{{$presentacion->contenido}}" value="{{$presentacion->contenido}}"
                                                        required name="contenido" disabled="" 
                                                        campo="Contenido">
                                                        <select class="form-control m-1 unidad_c" required name="unidad_c" 
                                                        placeholder="{{$presentacion->unidad_c}}" value="{{$presentacion->unidad_c}}"
                                                        disabled campo="Unidad de contenido">
                                                            <option value="ml" >ml</option>
                                                            <option value="g">g</option>
                                                            <option value="l">l</option>
                                                            <option value="kg">kg</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--contenido-->

                                            <!--precios-->
                                            <div class="col-sm-12 m-0 p-0">
                                                <label class="mb-0">Precios</label>
                                                <!-- Precio consumidor -->
                                                <div class="row parent">
                                                <div class="col-sm-4">
                                                    <label class="mb-0 label-precios">Consumidor</label>
                                                    <div class="form-group mb-1">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"> 
                                                              <span class="input-group-text p-1 label-precios"><i class="fas fa-dollar-sign"></i></span>
                                                            </div>
                                                            <input type="number" step=".01"  class="form-control p-1" required name="pre_consu" 
                                                            
                                                            placeholder="{{$presentacion->precio_consumidor}}" value="{{$presentacion->precio_consumidor}}"

                                                             disabled campo="Precio a consumidor">
                                                        </div> 
                                                    </div>
                                                </div>
                                                <!-- Precio consumidor-->

                                                <!-- Precio distribuidor-->
                                                <div class="col-sm-4">
                                                  <div class="form-group mb-1">
                                                    <label class="mb-0 label-precios">Distribuidor</label>
                                                      <div class="input-group">
                                                        <div class="input-group-prepend">
                                                          <span class="input-group-text p-1 label-precios">
                                                            <i class="fas fa-dollar-sign"></i>
                                                          </span>
                                                        </div>
                                                        <input type="number" step=".01" class="form-control p-1" 
                                                        placeholder="{{$presentacion->precio_distribuidor}}" value="{{$presentacion->precio_distribuidor}}" 
                                                        disabled campo="Precio a distribuidor" name="pre_distri" required>
                                                      </div> 
                                                    </div>
                                                  </div>
                                                <!-- Precio distribuidor-->

                                                <!-- Precio Restaurant -->
                                                <div class="col-sm-4">
                                                    <div class="form-group mb-1">
                                                        <label class="mb-0 label-precios">Restaurant</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"> 
                                                                <span class="input-group-text p-1 label-precios">
                                                                    <i class="fas fa-dollar-sign"></i>
                                                                </span>
                                                            </div>
                                                            <input type="number" step=".01"  class="form-control p-1" required name="pre_rest" 
                                                            placeholder="{{$presentacion->precio_restaurant}}" value="{{$presentacion->precio_restaurant}}" 
                                                            disabled campo="Precio a restaurant">
                                                        </div> 
                                                    </div>
                                                </div>
                                                <!-- Precio restaurant-->
                                                </div><!--row-->
                                            </div><!--precios-->

                                            <!--stock-->
                                            <div class="col-sm-12 m-0 p-0 mt-1">
                                                <label class="mb-0">Stock</label>
                                                <!-- costo adq-->
                                                <div class="row parent">
                                                <div class="col-sm-4">
                                                    <label class="mb-0 label-precios">Costo adq.</label>
                                                    <div class="form-group mb-1">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"> 
                                                              <span class="input-group-text p-1 label-precios"><i class="fas fa-dollar-sign"></i></span>
                                                            </div>
                                                            <input type="number" step=".01"  class="form-control p-1" name="costo_adquisicion" placeholder="{{$presentacion->costo_adquisicion}}" value="{{$presentacion->costo_adquisicion}}"
                                                             disabled campo="Costo de adquisición">
                                                        </div> 
                                                    </div>
                                                </div>
                                                <!-- costo adq-->

                                                <!-- stock-->
                                                <div class="col-sm-4">
                                                  <div class="form-group mb-1">
                                                    <label class="mb-0 label-precios">Stock</label>
                                                    @if($presentacion->stock < $presentacion->stock_min)
                                                    <div class="input-group">
                                                        <input type="number" onchange="on_change_stock(this)" step="1" class="form-control stock" 
                                                    required name="stock" 
                                                    placeholder="{{$presentacion->stock}}" value="{{$presentacion->stock}}"
                                                    disabled campo="Stock actual">
                                                    <div class="input-group-append" data-title="Pocas existencias"> 
                                                        <span class="input-group-text p-1 label-precios text-danger"><i class="fa fa-exclamation-triangle"></i>
                                                        </span>
                                                    </div>
                                                    </div>
                                                    @else 
                                                    <input type="number" onchange="on_change_stock(this)" step="1" class="form-control stock" 
                                                    required name="stock" 
                                                    placeholder="{{$presentacion->stock}}" value="{{$presentacion->stock}}"
                                                    disabled campo="Stock actual">
                                                    @endif
                                                   </div>
                                                </div>
                                                <!-- stock-->

                                                <!-- stock min-->
                                                <div class="col-sm-4">
                                                    <div class="form-group mb-1">
                                                        <label class="mb-0 label-precios">Stock min.</label>
                                                        <input type="number" step="1"  class="form-control " required name="stock_min" placeholder="{{$presentacion->stock_min}}" value="{{$presentacion->stock_min}}" disabled campo="Stock mínimo">
                                                    </div>
                                                </div>
                                                <!-- stock min-->
                                                </div><!--row-->


                                            </div><!--stock-->

                                            <!--Dimensiones-->
                                            <div class="col-sm-12 m-0 p-0 mt-1">
                                                <label class="mb-0">Dimensiones(cm)</label>
                                                <!-- largo-->
                                                <div class="row parent">
                                                <div class="col-sm-4">
                                                    <div class="form-group mb-1">
                                                        <label class="mb-0 label-precios">Largo</label>
                                                        <input type="number" step=".01"  class="form-control "  name="largo"  value="{{$presentacion->largo}}"
                                                            placeholder="{{$presentacion->largo}}" disabled campo="Largo">
                                                    </div> 
                                                </div>
                                                <!-- largo-->

                                                <!-- ancho-->
                                                <div class="col-sm-4">
                                                  <div class="form-group mb-1">
                                                    <label class="mb-0 label-precios">Ancho</label>
                                                      <input type="number" step=".01"  class="form-control "  name="ancho" placeholder="{{$presentacion->ancho}}" value="{{$presentacion->ancho}}" disabled campo="Ancho" >
                                                   </div>
                                                </div>
                                                <!-- ancho-->

                                                <!-- alto-->
                                                <div class="col-sm-4">
                                                    <div class="form-group mb-1">
                                                        <label class="mb-0 label-precios">Alto</label>
                                                        <input type="number" step=".01"  class="form-control " name="alto"  value="{{$presentacion->alto}}" placeholder="{{$presentacion->alto}}" disabled campo="Alto">
                                                    </div>
                                                </div>
                                                <!-- alto-->
                                            </div><!-- row -->
                                            <div class="row parent">
                                                <!-- Peso-->
                                                <div class="col-sm-4">
                                                    <div class="form-group mb-1">
                                                        <label class="mb-0 label-precios">Peso(Kg)</label>
                                                        <input type="number" step=".01"  class="form-control "  name="peso"  value="{{$presentacion->peso}}" disabled
                                                            placeholder="{{$presentacion->peso}}" campo="Peso">
                                                    </div>
                                                </div>
                                                <!-- Peso-->
                                                <!-- estado -->
                                                <div class="col-sm-8">
                                                    <div class="form-group mb-1 form-estado d-none">
                                                        <label class="mb-0 label-precios">Estado*</label>
                                                        <div class="input-group">
                                                            <select onchange="listener_estado_pres(event)" class="form-control p-1 estado" required name="estado" value="{{$presentacion->estado}}" placeholder="{{$presentacion->estado}}" disabled="" campo="Estado">
                                                                <option value="-1">Dado de baja</option>
                                                                <option value="0">Agotado</option>
                                                                <option value="1">Disponible</option>
                                                                <option value="2">Proximamente</option>
                                                            </select>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <!-- estado-->
                                            </div><!--row-->
                                            </div><!--Dimensiones-->
                                            <!--imagen-->
                                            <div class="col-sm-12 m-0 p-0 mt-2 img-wrapper d-none parent">
                                                <label class="mb-0">Foto de la presentación*</label>
                                                <div class="form-group mb-1">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"> 
                                                          <span class="input-group-text p-1 label-precios"><i class="fas fa-file-image"></i></span>
                                                        </div>
                                                        <input type="file" class="custom-file-input" id="img_presentacion{{$loop->iteration}}" name="img_presentacion" accept="image/*" 
                                                        onchange="upload_img(this);" campo="Foto de presentación" >
                                                        <label class="custom-file-label" for="img_presentacion{{$loop->iteration}}">Selecciona un archivo</label>
                                                    </div> 
                                                </div>
                                                <div class="d-none border" style="position: relative;">
                                                    <button type="button" class="close" style="position: absolute; top: 0; right: 0;"  aria-label="Close" title="Cancelar" onclick="cancel_upload(this);">
                                                        <i class="fas fa-window-close" style="color: red;"></i>
                                                    </button>
                                                    <img src="" class="img-upload" >
                                                </div>
                                            </div>
                                            <!--imagen-->
                                        </div><!-- card body--->

                                        <div class="card-footer d-none" >
                                            <div class="d-flex align-items-sm-center justify-content-sm-center">
                                                <button type="button" class="btn btn-success" onclick="update_presentacion(event)">Actualizar</button>
                                            </div>
                                        </div>
                                        
                                        </form>
                                        </div><!--card border-->
                                    </div>
                                @endforeach
                            </div> <!--endd row-->
                        </div><!--end card body-->
                        
                        <div class="card-footer d-none" id="footer-presentaciones">
                            <div class="d-flex align-items-sm-center justify-content-sm-center">
                                <button id="btn_add_new_pres" type="submit" form="nueva_presentacion" class="btn btn-success" >Agregar nuevas presentaciones</button>
                            </div>
                        </div>
                    
                    </div>
                    <!-- card presentaciones -->

                    <form class="unreload" id="nueva_presentacion" action="/admin/productos/add_presentaciones/{{$producto->id}}" enctype="multipart/form-data" method="post">
                        @method('POST')
                        @csrf
                    </form>
                </div>
                
            </div>

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
        </div>
    </section>

    @endsection

    @section('scripts')
    <script type="text/javascript">
        var producto = {!! json_encode($producto) !!};
        var caracteristicas = {!! json_encode($carac) !!};
        var all_caract = {!! json_encode($all_caract) !!};
        var presentaciones = {!! json_encode($presentaciones) !!};
        var add_pres = 0;

        var caract_in_product = getIdCaract(caracteristicas);

        function getIdCaract(obj){
            array_elements = new Array();
            for (var i = 0; i < obj.length; i++) {
                array_elements.push(obj[i].id);
            }
            return array_elements;
        }
    </script>
    <script type="text/javascript" src="/js/custom/detalle_producto.js"></script>

    @endsection


