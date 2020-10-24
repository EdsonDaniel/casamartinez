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
              <!-- card origen-->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title ">Origen</h3>
                </div>
                <div class="card-body">
                  <div class="row row justify-content-end">
                    <div class="form-group col-sm-6">
                      <label for="parcela">Parcela*</label>
                      <input type="text" class="form-control @error('parcela') is-invalid @enderror" id="parcela" name="parcela" placeholder="Nombre" required value="{{ old('parcela') }}">
                      @error('parcela')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="form-group col-sm-6">
                      <label for="ubicacion">Ubicación*</label>
                      <input type="text" class="form-control @error('ubicacion') is-invalid @enderror" name="ubicacion" id="ubicacion" placeholder="Ubicación" required value="{{ old('ubicacion') }}">
                      @error('ubicacion')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="form-group col-sm-4">
                      <label for="fecha_cultivo">Fecha de Cultivo*</label>
                      <input type="date" class="form-control @error('fecha_cultivo') is-invalid @enderror" name="fecha_cultivo" id="fecha_cultivo" required value="{{ old('fecha_cultivo') }}">
                      @error('fecha_cultivo')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group col-sm-4">
                      <label for="fecha_corte">Fecha de Corte*</label>
                      <input type="date" class="form-control @error('fecha_corte') is-invalid @enderror" name="fecha_corte" id="fecha_corte" required value="{{ old('fecha_corte') }}">
                      @error('fecha_corte')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group col-sm-4">
                      <label for="tipo_maguey">Tipo de Maguey*</label>
                      <select class="form-control @error('tipo_maguey') is-invalid @enderror" name="tipo_maguey" id="tipo_maguey" required value="{{ old('tipo_maguey') }}">
                        <option value="Angustifolia, Maguey Espadín" selected>Angustifolia, Maguey Espadín</option>
                        <option value="Potatorum, Maguey Tobalá">Potatorum, Maguey Tobalá</option>
                        <option value="2">Convallis, Jabalí</option>
                      </select>
                      @error('tipo_maguey')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group col-sm-4">
                      <label for="magueyes_cortados">Magueyes cortados*</label>
                      <input type="number" class="form-control @error('magueyes_cortados') is-invalid @enderror" name="magueyes_cortados" id="magueyes_cortados" required value="{{ old('magueyes_cortados') }}">
                      @error('magueyes_cortados')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group col-sm-4">
                      <label for="kilogramos">Kilogramos*</label>
                      <input type="number" class="form-control @error('kilogramos') is-invalid @enderror" name="kilogramos" id="kilogramos" required value="{{ old('kilogramos') }}">
                      @error('kilogramos')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group col-sm-4">
                      <label for="maestro_magueyero">Maestro Magueyero*</label>
                      <input type="text" class="form-control @error('maestro_magueyero') is-invalid @enderror" name="maestro_magueyero" id="maestro_magueyero" required value="{{ old('maestro_magueyero') }}">
                      @error('maestro_magueyero')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    
                  </div>
                </div>
              </div><!-- card origen-->

              <h5 class="w-100 my-3 text-center">Ingreso a Fábrica</h5>
              <!-- card coccion-->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title ">Cocción</h3>
                </div>
                <div class="card-body">
                  <div class="row row justify-content-end">

                    <div class="form-group col-sm-4">
                      <label for="maestro_mezcalero">Maestro Mezcalero*</label>
                      <input type="text" class="form-control @error('maestro_mezcalero') is-invalid @enderror" name="maestro_mezcalero" id="maestro_mezcalero" required value="{{ old('maestro_mezcalero') }}">
                      @error('maestro_mezcalero')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group col-sm-4">
                      <label for="ingreso_coccion">Fecha de Ingreso*</label>
                      <input type="date" class="form-control @error('ingreso_coccion') is-invalid @enderror" name="ingreso_coccion" id="ingreso_coccion" required value="{{ old('ingreso_coccion') }}">
                      @error('ingreso_coccion')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group col-sm-4">
                      <label for="salida_coccion">Fecha de Salida*</label>
                      <input type="date" class="form-control @error('salida_coccion') is-invalid @enderror" name="salida_coccion" id="salida_coccion" required value="{{ old('salida_coccion') }}">
                      @error('salida_coccion')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    
                  </div>
                </div>
                
              </div><!-- card  coccion-->

              <!-- card molienda-->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title ">Molienda</h3>
                </div>
                <div class="card-body">
                  <div class="row row justify-content-end">
                    <div class="form-group col-sm-4">
                      <label for="inicio_molienda">Fecha de inicio*</label>
                      <input type="date" class="form-control @error('inicio_molienda') is-invalid @enderror" id="inicio_molienda" name="inicio_molienda" required value="{{ old('inicio_molienda') }}">
                      @error('inicio_molienda')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="form-group col-sm-4">
                      <label for="termino_molienda">Fecha terminación*</label>
                      <input type="date" class="form-control @error('termino_molienda') is-invalid @enderror" name="termino_molienda" id="termino_molienda" required value="{{ old('termino_molienda') }}">
                      @error('termino_molienda')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="form-group col-sm-4">
                      <label for="tinas_molienda">Número de tinas*</label>
                      <input type="number" class="form-control @error('tinas_molienda') is-invalid @enderror" name="tinas_molienda" id="tinas_molienda" required value="{{ old('tinas_molienda') }}">
                      @error('tinas_molienda')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    
                  </div>
                </div>
              </div><!-- card molienda-->

              <!-- card fermentacion-->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title ">Fermentación</h3>
                </div>
                <div class="card-body">
                  <div class="row row justify-content-end">
                    <div class="form-group col-sm-4">
                      <label for="inicio_fermentacion">Fecha de Inicio*</label>
                      <input type="date" class="form-control @error('inicio_fermentacion') is-invalid @enderror" name="inicio_fermentacion" id="inicio_fermentacion" required value="{{ old('inicio_fermentacion') }}">
                      @error('inicio_fermentacion')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group col-sm-4">
                      <label for="salida_fermentacion">Fecha de Salida*</label>
                      <input type="date" class="form-control @error('salida_fermentacion') is-invalid @enderror" name="salida_fermentacion" id="salida_fermentacion" required value="{{ old('salida_fermentacion') }}">
                      @error('salida_fermentacion')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group col-sm-4">
                      <label for="volumen_fermentacion">Volumen(litros)*</label>
                      <input type="number" class="form-control @error('volumen_fermentacion') is-invalid @enderror" name="volumen_fermentacion" id="volumen_fermentacion" required value="{{ old('volumen_fermentacion') }}">
                      @error('volumen_fermentacion')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
              </div><!-- card fermentacion-->

              <!-- card destilacion 1-->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title ">Destilación</h3>
                </div>
                <div class="card-body">
                  <fieldset class="border border-primary p-3 rounded">
                    <legend class="text-md w-auto px-2">Destilación 1</legend>
                    <div class="row row justify-content-end">
                      <div class="form-group col-sm-4">
                        <label for="fecha_destilacion1">Fecha de Destilación*</label>
                        <input type="date" class="form-control @error('fecha_destilacion1') is-invalid @enderror" name="fecha_destilacion1" id="fecha_destilacion1" required value="{{ old('fecha_destilacion1') }}">
                        @error('fecha_destilacion1')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group col-sm-4">
                        <label for="volumen_destilacion1">Volumen(litros)*</label>
                        <input type="number" class="form-control @error('volumen_destilacion1') is-invalid @enderror" name="volumen_destilacion1" id="volumen_destilacion1" required value="{{ old('volumen_destilacion1') }}">
                        @error('volumen_destilacion1')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group col-sm-4">
                        <label for="alcohol_destilacion1">Porcentaje de alcohol*</label>
                        <input type="number" class="form-control @error('alcohol_destilacion1') is-invalid @enderror" name="alcohol_destilacion1" id="alcohol_destilacion1" required value="{{ old('alcohol_destilacion1') }}">
                        @error('alcohol_destilacion1')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </fieldset>

                  <fieldset class="border border-primary p-3 rounded mt-3">
                    <legend class="text-md w-auto px-2">Destilación 2 (Opcional)</legend>
                    <div class="row row justify-content-end">
                      <div class="form-group col-sm-4">
                        <label for="fecha_destilacion2">Fecha de Destilación</label>
                        <input type="date" class="form-control @error('fecha_destilacion2') is-invalid @enderror" name="fecha_destilacion2" id="fecha_destilacion2"  value="{{ old('fecha_destilacion2') }}">
                        @error('fecha_destilacion2')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group col-sm-4">
                        <label for="volumen_destilacion2">Volumen(litros)</label>
                        <input type="number" class="form-control @error('volumen_destilacion2') is-invalid @enderror" name="volumen_destilacion2" id="volumen_destilacion2"  value="{{ old('volumen_destilacion2') }}">
                        @error('volumen_destilacion2')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group col-sm-4">
                        <label for="alcohol_destilacion2">Porcentaje de alcohol</label>
                        <input type="number" class="form-control @error('alcohol_destilacion2') is-invalid @enderror" name="alcohol_destilacion2" id="alcohol_destilacion2"  value="{{ old('alcohol_destilacion2') }}">
                        @error('alcohol_destilacion2')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </fieldset>
                </div>
              </div><!-- card destilacion 1-->


              <h5 class="w-100 my-3 text-center">Ingreso a Envasadora</h5>

               <!-- card card envasado-->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title ">Envasado</h3>
                </div>
                <div class="card-body">
                  <div class="row row justify-content-end">
                    <div class="form-group col-sm-3">
                      <label for="traslado_envasadora">Fecha de traslado*</label>
                      <input type="date" class="form-control @error('traslado_envasadora') is-invalid @enderror" id="traslado_envasadora" name="traslado_envasadora" required value="{{ old('traslado_envasadora') }}">
                      @error('traslado_envasadora')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="form-group col-sm-3">
                      <label for="lote_granel">Lote a granel*</label>
                      <input type="text" class="form-control @error('lote_granel') is-invalid @enderror" name="lote_granel" id="lote_granel" required value="{{ old('lote_granel') }}">
                      @error('lote_granel')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group col-sm-3">
                      <label for="lote_envasado">Lote de envasado*</label>
                      <input type="text" class="form-control @error('lote_envasado') is-invalid @enderror" name="lote_envasado" id="lote_envasado" required value="{{ old('lote_envasado') }}">
                      @error('lote_envasado')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group col-sm-3">
                      <label for="analisis">Análisis*</label>
                      <input type="text" class="form-control @error('analisis') is-invalid @enderror" name="analisis" id="analisis" required value="{{ old('analisis') }}">
                      @error('analisis')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="form-group col-sm-2">
                      <label for="botellas_envasadas">Número de botellas*</label>
                      <input type="number" class="form-control @error('botellas_envasadas') is-invalid @enderror" name="botellas_envasadas" id="botellas_envasadas" required value="{{ old('botellas_envasadas') }}">
                      @error('botellas_envasadas')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    

                    <div class="form-group col-sm-2">
                      <label for="clase_mezcal">Clase Mezcal*</label>
                      <select class="form-control @error('clase_mezcal') is-invalid @enderror" name="clase_mezcal" id="clase_mezcal" required value="{{ old('clase_mezcal') }}">
                        <option value="Joven" selected>Joven</option>
                        <option value="Reposado">Reposado</option>
                        <option value="Añejo">Añejo</option>
                      </select>
                      @error('clase_mezcal')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                   
                    <div class="form-group col-sm-2">
                      <label for="porcentaje_alc_env">% Alcohol al envasar*</label>
                      <input type="text" class="form-control @error('porcentaje_alc_env') is-invalid @enderror" name="porcentaje_alc_env" id="porcentaje_alc_env" required value="{{ old('porcentaje_alc_env') }}">
                      @error('porcentaje_alc_env')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group col-sm-3">
                      <label for="clase_mezcal">Nombre del producto*</label>
                      <select class="form-control @error('clase_mezcal') is-invalid @enderror" name="clase_mezcal" id="clase_mezcal" required value="{{ old('clase_mezcal') }}">
                        <option value="Joven" selected>Joven</option>
                        <option value="Reposado">Reposado</option>
                        <option value="Añejo">Añejo</option>
                      </select>
                      @error('clase_mezcal')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group col-sm-3">
                      <label for="clase_mezcal">Presentación*</label>
                      <select class="form-control @error('clase_mezcal') is-invalid @enderror" name="clase_mezcal" id="clase_mezcal" required value="{{ old('clase_mezcal') }}">
                        <option value="Joven" selected>Joven</option>
                        <option value="Reposado">Reposado</option>
                        <option value="Añejo">Añejo</option>
                      </select>
                      @error('clase_mezcal')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    
                  </div>
                </div>

                <div class="d-flex justify-content-end">
                  <a href="/admin" class="btn btn-secondary mr-3">Cancelar</a>
                  <button type="submit" class="btn btn-success">Registrar</button>
                </div>


              </div><!-- card card envasado-->


              <!-- card codigo qr-->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title ">Generar Código QR</h3>
                </div>
                <div class="card-body">
                  <div class="row row justify-content-center">
                    
                    <div class="col-6">
                      
                    </div>
                    
                  </div>
                </div>

                <div class="d-flex justify-content-end">
                  <a href="/admin" class="btn btn-secondary mr-3">Cancelar</a>
                  <button type="submit" class="btn btn-success">Registrar</button>
                </div>


              </div><!-- card codigo qr-->

            </form>
          
          </div><!-- column -->
        </div><!-- row -->
      
      </div><!-- container -->
    </section>
@stop