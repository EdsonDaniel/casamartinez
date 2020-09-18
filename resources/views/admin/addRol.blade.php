@extends('layouts.admin')
@section('style')
  <link rel="stylesheet" href="/css/custom/listaroles.css">
@endsection
@section('content')
	 <!-- Content Header (Page header) -->
    <div class="content-header" >
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="ml-2 mb-0 text-dark" >Agregar rol</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="/admin/roles" class="btn btn-danger btn-sm">Cancelar</a>
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
          <div class="col-md-5">
            <div class="row justify-content-center">
                @if ($errors->any())
                  <!-- left column -->
                  <div class="col-md-12" id="div-error">
                    <!-- card -->
                    <div class="card card-danger">
                      <div class="card-header">
                        <h3 class="card-title">Rol no agregado</h3>
                      </div>
                      <div class="card-body pt-2">
                        No se pudo agregar el Rol debido a los siguientes motivos:
                        <div class="pt-2">
                          <ul class="text-danger">
                            @foreach ($errors->all() as $key => $val)
                              <li>{{ $val}} </li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="button" id="btn-error" class="btn btn-secondary float-right">Aceptar</button>
                      </div>
                    </div><!-- card -->
                  </div><!-- left column -->
                @endif
            <form id="form_addRol" method="post" action="/admin/roles/store" class="col-md-12">
              @method('POST')
              @csrf
            <!-- card -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title ">Detalles del rol</h3>
              </div>
              <div class="card-body">
                <div class="row justify-content-end">
                  <div class="form-group col-sm-12">
                    <label for="name">Nombre*</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nombre" required value="{{ old('name') }}">
                    <div class="d-none error text-danger">Debes rellenar este campo</div>
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="form-group col-sm-12">
                    <label for="description">Descripción*</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" required placeholder="Descripción" value="{{ old('description') }}" >{{ old('description') }}</textarea>
                    <div class="d-none error text-danger">Debes rellenar este campo</div>
                    @error('description')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div><!--card body-->
              <div class="card-footer">
                <div class="row justify-content-end">
                  <button type="button" id="reset" class="btn btn-secondary">Limpiar campos</button>
                  <button type="button" form="form_addRol" class="btn btn-primary ml-3 submit">Agregar rol</button>
                </div>
              </div>
            </div><!-- card -->
          </form>

          </div><!--fin row left column-->
          </div><!-- left column -->

          <!-- right column -->
          <div class="col-md-7">
            <!-- card -->
            <div class="card card-primary" id="card_permisos">
              <div class="card-header">
                <h3 class="card-title ">Permisos para el rol</h3>
                <span style="float: right;">(<span id="seleccionados">0</span>/26)</span>
              </div>
              <div class="card-body">
                <div class="d-none mb-2 error text-danger" id="e-p">Debes asignar al menos un permiso.</div>
                @error('permisos')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="row ">
                  @foreach($categorias_permisos as $categoria => $permisos)
                  <div class="input-group col-sm-12 ">
                    <button class="collapsible p-2" type="button">
                      <span class="pl-1">Permisos para {{$categoria}} </span>
                    </button>
                    <div class="contenido" style="width: 100%;">
                    @foreach($permisos as $permiso )
                      <div class="input-group-prepend" style="width: 100%;">
                        <div class="input-group-text role-element p-0 border-rad" style="width: 100%;">
                          <label for="p-{{$permiso['id']}}" class="form-check-label d-block area-label pl-4"style="width:100%; text-align: left;">
                            <input type="checkbox" id="p-{{$permiso['id']}}" name="permisos[{{$permiso['id']}}]" form="form_addRol">
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
              
              <div class="card-footer">
                <div class="row justify-content-end">
                  <button type="button" id="select_all" class="btn btn-secondary">Seleccionar todos</button>
                  <button type="button" form="form_addRol" class="btn btn-primary ml-3 submit">Agregar rol</button>
                  <!--<button type="button" id="expand_all" class="btn btn-secondary">Seleccionar todos</button>-->
                </div>
              </div>
            </div><!-- card -->
          </div><!-- right column -->

        </div><!-- row -->
      </div><!-- container -->
    </section>
    <!--Modal mensaje -->
      <div class="modal fade" id="modal-mensaje" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog " role="document">
          <div class="modal-content">
            <div class="modal-header pb-0" >
              <h5 class="modal-title" >
                <span icon_title>
                  <i class="fa fa-exclamation-circle" style="color: blue;"></i>
                </span>
                <span id="title_modal">¿Desea agregar este rol al Sistema?</span>
              </h5>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body pt-0 ">
              <div id="nombre_rol" class="ml-2 p-2" style="font-size: 1.25em; color: darkblue">
                
              </div>
              <div id="msg" class="pl-3 " >
                <span class="text-primary">Permisos otorgados:</span>
                <div id="lista_permisos" ></div>
              </div>
            </div>
            <div class="modal-footer" id="modal_footer_msg">
              <button type="button" class="btn btn-secondary" 
              id="btn_cancel" data-dismiss="modal">Cancelar</button>

              <button type="submit" class="btn btn-success"
              id="btn_submit" form="form_addRol">Aceptar</button>
            </div>
          </div>
        </div>
      </div><!--Modal mensaje -->
@endsection
@section('scripts')
  <script type="text/javascript">
    var todo = $( "input[type='checkbox']" ).length;

    $( "input[type='checkbox']" ).change(function() {
      $(this).closest("div").toggleClass("element-selected");
      var seleccionados = $("input:checked").length;
      //console.log(seleccionados);
      $("#seleccionados").html(seleccionados);
      if(seleccionados == todo ){
        $("#select_all").text("Deseleccionar todo");
      }
    });
    
    $("#select_all").click( function(){
      var seleccionados = $("input:checked").length;
      if(seleccionados < todo ){
        expand_all();
        $( "input[type='checkbox']" ).prop('checked', function(){
          $(this).closest("div").addClass("element-selected");
          return true;
        });
        $(this).text("Deseleccionar todo");
      }
      else
      {
        collapse_all();
        $( "input[type='checkbox']" ).prop('checked', function(){
          $(this).closest("div").removeClass("element-selected");
          return false;
        });
        $(this).text("Seleccionar todo");
      }
      $("#seleccionados").html($("input:checked").length);
     
    });

    var coll = document.getElementsByClassName("collapsible");
    var i;
    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight){
          content.style.maxHeight = null;
        } else {
          content.style.maxHeight = content.scrollHeight + "px";
        }
        content.classList.toggle("mb-3"); 
      });
    }
    function expand_all(){
      $(".collapsible").addClass('active');
      $(".contenido").addClass("mb-3");
      $.each( $(".contenido"), function() {
        this.style.maxHeight = this.scrollHeight + "px";
      });
    }
    function collapse_all(){
      $(".collapsible").removeClass('active');
      $(".contenido").removeClass("mb-3").css("max-height","");
      $("html, body").animate({ scrollTop: $("#card_permisos").offset().top }, 800);
    }
    $("#reset").click( function(){
      $("#name, #description").val("");
    });

    $("#btn-error").click( function(){ $("#div-error").addClass("d-none"); });

    function launch_modal(){
      $("#nombre_rol").html($("#name").val());
      var seleccionados = $("input:checked");
      var lista = "";
      for (var i = 0; i < seleccionados.length; i++) {
        lista += '<li>' + $(seleccionados[i]).next().text() + '</i>';
      }
      $("#lista_permisos").html('<ul>' + lista + '</ul>');

      $('#modal-mensaje').modal({
        backdrop: 'static'
      });
    }

    $(".submit").click( function(){
      if( isValid($("#name")) && isValid($("#description")) && havePermissions() )
        launch_modal();
    });

    
    function isValid(campo){
      if( campo.val() != ""){
        campo.removeClass("border-danger").next().addClass("d-none");
        return true;
      }
      campo.addClass("border-danger").focus();
      campo.next().removeClass("d-none");
      return false;
    }
    function havePermissions(){
      if($("input:checked").length > 0){
        $("#e-p").addClass("d-none");
        return true;
      }
      $("#e-p").removeClass("d-none");
      $("html, body").animate({ scrollTop: $("#card_permisos").offset().top }, 800);
      return false;

    }

    /*$("#form_addRol").submit( function(event){
      //event.preventDefault();
      launch_modal();
    });*/

  </script>
@endsection