@extends('layouts.admin')
@section('style')
  <link rel="stylesheet" href="/css/custom/listaroles.css">
@endsection
@section('content')
	 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="ml-2 text-dark">Agregar rol</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="/admin/roles" class="btn btn-danger">Cancelar</a>
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
          <div class="col-md-6">
            <form id="form_addUsuario" method="post" action="/admin/roles/store">
              @method('POST')
              @csrf
            <!-- card -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title ">Detalles del rol</h3>
              </div>
              <div class="card-body">
                <div class="row row justify-content-end">
                  <div class="form-group col-sm-12">
                    <label for="name">Nombre*</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nombre" required value="{{ old('name') }}">
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="form-group col-sm-12">
                    <label for="description">Descripción</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Descripción" value="{{ old('description') }}">
                    @error('description')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div><!--card body-->
              <div class="card-footer">
                <div class="row justify-content-end">
                  <button type="reset" class="btn btn-secondary">Limpiar campos</button>
                  <button type="submit" class="btn btn-primary ml-3">Agregar</button>
                </div>
              </div>
            </div><!-- card -->
          </form>
          </div><!-- left column -->


          <!-- right column -->
          <div class="col-md-6">
            <form id="form_addPermisos" method="post" action="/admin/permisos/store">
              @method('POST')
              @csrf
            <!-- card -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title ">Permisos para el rol</h3>
              </div>
              <div class="card-body">
                <div class="row ">
                  @foreach($permisos as $permiso)
                  <div class="input-group col-sm-12">
                    <div class="input-group-prepend" style="width: 100%;">
                      <div class="input-group-text role-element p-0" style="width: 100%;">
                        <label for="p-{{$permiso->id}}" class="form-check-label d-block area-label"style="width:100%; text-align: left;">
                          <input type="checkbox" id="p-{{$permiso->id}}">
                          <span class="pl-1">{{$permiso->description}}</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div><!--card body-->
              
              <div class="card-footer">
                <div class="row justify-content-end">
                  <button type="button" id="select_all" class="btn btn-secondary">Seleccionar todos</button>
                </div>
              </div>
            </div><!-- card -->
          </form>
          </div><!-- right column -->

        </div><!-- row -->
      </div><!-- container -->
    </section>
@endsection
@section('scripts')
  <script type="text/javascript">
    var todo = $( "input[type='checkbox']" ).length;

    $( "input[type='checkbox']" ).change(function() {
      $(this).closest("div").toggleClass("element-selected");
      if($("input:checked").length == todo ){
        $("#select_all").text("Deseleccionar todo");
      }
    });
    
    $("#select_all").click( function(){
      if($("input:checked").length < todo ){
        $( "input[type='checkbox']" ).prop('checked', function(){
          $(this).closest("div").addClass("element-selected");
          return true;
        });
        $(this).text("Deseleccionar todo");
      }
      else
      {
        $( "input[type='checkbox']" ).prop('checked', function(){
          $(this).closest("div").removeClass("element-selected");
          return false;
        });
        $(this).text("Seleccionar todo");
      }
     
    });
  </script>
@endsection