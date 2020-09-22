@extends('layouts.admin')
@section('content')
	 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Registrar entrada</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="">
                <button type="submit" class="btn btn-success mr-3">Registrar</button>
              </li>
              <li class="">
                <a href="/admin/entradas/" class="btn btn-danger">Cancelar</a>
              </li>
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
          <div class="col-md-12">
            <form id="form_addUsuario" method="post" action="/admin/usuarios/store">
              @method('POST')
              @csrf
            <!-- card -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title ">Nueva entrada</h3>
              </div>
              <div class="card-body">
                <div class="row row justify-content-end">
                  <div class="form-group col-sm-6">
                    <label for="name">Nombre(s)*</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nombre" required value="{{ old('name') }}">
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="form-group col-sm-6">
                    <label for="last_name">Apellidos*</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" placeholder="Apellidos" required value="{{ old('last_name') }}">
                    @error('last_name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="form-group col-sm-6">
                    <label for="email">e-mail*</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="e-mail" required value="{{ old('email') }}">
                    @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group col-sm-6">
                    <label for="password">Contraseña*</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="contraseña" required value="{{ old('password') }}">
                    @error('password')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="form-group col-sm-6">
                    <label for="tipo_usuario">Tipo de usuario*</label>
                    <select class="form-control @error('tipo_usuario') is-invalid @enderror" name="tipo_usuario" id="tipo_usuario" required value="{{ old('tipo_usuario') }}">
                      <option value="4" selected>Empleado</option>
                      <option value="3">Distribuidor</option>
                      <option value="2">Cliente mayorista</option>
                      <option value="1">Cliente</option>
                      <option value="5">Administrador</option>
                    </select>
                    @error('tipo_usuario')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  
                </div>
              </div>
              <div class="card-footer">
                <div class="row justify-content-end">
                  <button type="reset" class="btn btn-secondary">Limpiar campos</button>
                  <button type="submit" class="btn btn-primary ml-3">Agregar</button>
                </div>
              </div>
            </div><!-- card -->
          </form>
          </div><!-- left column -->
        </div><!-- row -->
      </div><!-- container -->
    </section>
@stop