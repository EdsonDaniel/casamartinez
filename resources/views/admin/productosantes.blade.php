
@extends('layouts.admin')
@section('content')
	 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Agregar nuevo producto</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="">
                <!--<a href="#">Home</a>-->
                <button type="submit" class="btn btn-success mr-3">Agregar Producto</button>
              </li>
              <li class="">
                <button type="submit" class="btn btn-danger">Cancelar</button>
              </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Form add products -->

    <!-- Main content -->
    <section class="content">
      <!-- form start -->
      <form id="addProduct">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-5">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title mt-1">Datos del producto</h3>
              </div>
              <!-- /.card-header -->
              
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre del producto*</label>
                    <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Nombre" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="marca">Marca*</label>
                    <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca" required>
                  </div>
                  
                  <div class="form-group">
                    <label >Fotografía principal*</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputFile">
                        <label class="custom-file-label" for="inputFile">Selecciona un archivo</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Subir</span>
                      </div>
                    </div>
                  </div>
                  
                  <!--descripcion-->
                  <div class="form-group">
                   <label for="descripcion">Breve descripción*</label>
                    <textarea class="form-control" id="descripcion_producto" name="descripcion_producto" rows="2" placeholder="Mezcal joven de alta calidad" required></textarea>
                  </div>
                  <!--descripcion--->

                </div><!-- /.card-body -->
              </div><!-- fin card datos generales-->

              
              <!--card caracteristicas adicionales-->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title mt-1">Características adicionales (opcional)</h3>

                  <span style="float: right;">
                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Agregar característica" onclick="addCarac()"><i class="fas fa-plus"></i>
                    </a>
                  </span>
                </div>
                <!-- /.card-header -->

                <div class="card-body" id="caracteristicas" style="transition: height 1.5s;">
                  <!--<form role="form">-->
                    <div class="row bordes" id="carac1">
                      <!--nombre caracteristica1 -->
                      <div class="col-sm-6 mt-2">
                        <div class="form-group">
                          <label for="select_caracteristicas1">Característica*</label>
                            <div class="input-group" id="div_select_caracteristicas1">
                              <select class="form-control" style="padding-left: 3px;" onchange="listenerSelect(event)" id="select_caracteristicas1" name="select_caracteristicas1">
                                <option>SELECCIONE</option>
                                @foreach ($caracteristicas as $caracteristica)
                                <option value="{{$caracteristica->id_caract}}">{{ $caracteristica->nombre }}</option>
                                @endforeach
                                <!--<option>Maestro mezcalero</option>
                                <option>% de alcohol</option>
                                <option>Tiempo de añejado</option>
                                <option>Origen Verde</option>
                                <option>Nueva característica</option>-->
                                <option style="font-weight: bold; border-top: double;" class="bordes">Nueva característica</option>
                              </select>
                            </div> 
                        </div>
                      </div>
                       <!--nombre caracteristica 1-->

                     <!-- val caracteristica1 -->
                      <div class="col-sm-6 mt-2">
                        <div class="form-group">
                          <label>Valor de característica*</label>
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="Ignacio Martínez" id="input_val_caract1" name="input_val_caract1">
                            </div> 
                          </div>
                      </div>
                      <!-- val caracteristica1-->

                      <!-- descripcion caracteristica1 -->
                      <div class="col-sm-12">
                        <div class="form-group">
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

                  <div class="card-footer">
                    <!--<button type="button" class="btn btn-primary" style="display: block; margin: 0 auto;"  data-toggle="modal" data-target="#modalNewCarac">Crear nueva característica</button>-->

                    <div class="modal fade" id="modalNewCarac" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          
                          <div class="modal-header">
                            <h5 class="modal-title">Agregar nueva característica para producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <form action="/admin/caracteristicas/" method="post" id="formModal">
                          @csrf
                          <div class="modal-body">
                              <div class="form-group">
                                <label for="nombre_caracteristica" class="col-form-label">Nombre de la característica*:</label>
                                <input type="text" class="form-control" id="nombre_caracteristica" form="formModal" name="nombre_caracteristica" required>
                              </div>
                              <div class="form-group">
                                <label for="descripcion_caracteristica" class="col-form-label">Descripción*:</label>
                                <textarea class="form-control" id="descripcion_caracteristica" placeholder="Descripción breve de lo que representa esta característica." form="formModal" name="descripcion_caracteristica" required></textarea>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="addCharBtn" onclick="return enviarForm()" data-toggle="tooltip" data-placement="top" title="Agrega una nueva  característica que no ha sido definidia.">Agregar</button>
                          </div>

                        </form>
                        </div>
                      </div>
                    </div><!--fin modal-->
                  </div><!--fin card footer-->

                </div><!-- fin card caracteristicas-->


                <!--<div class="card-footer">
                  <button type="submit" class="btn btn-primary">Agregar</button>
                </div>-->
              <!--</form>-->
        </div>
          <!--/.col (left) -->
          
          <!-- right column -->
          <div class="col-md-7" id="presentaciones" style="transition: height 1.5s;">
            <!-- Card presentacion -->
            <div class="card card-info" id="pres1">
              <div class="card-header">
                <h3 class="card-title mt-1">Presentaciones y precios</h3>

                <span style="float: right;">
                  <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Agregar nueva presentación" onclick="addPresentacion()"><i class="fas fa-plus"></i>
                  </a>
                </span>
                <span style="float: right;" class="mr-3 mt-1">Presentacion 1</span>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="presentcion1">
                <!--<form role="form">-->
                  <div class="row">
                    
                    <!-- Contenido -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Contenido neto*</label>
                          <div class="input-group">
                        <input type="number"  class="form-control" value="750" id="contenido1" required>
                        <select class="form-control" required>
                          <option>ml</option>
                          <option>g</option>
                          <option>l</option>
                          <option>kg</option>
                        </select>
                       </div> 
                        </div>
                     </div>
                     <!-- Contenido-->

                   <!-- Precio consumidor -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Precio consumidor*</label>
                          <div class="input-group">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text">
                             <i class="fas fa-dollar-sign"></i>
                            </span>
                          </div>
                        <input type="number" min="100" class="form-control" id="precioC1" required>
                       </div> 
                        </div>
                    </div>
                    <!-- Precio consumidor-->

                     <!-- Precio distribuidor -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Precio distribuidor*</label>
                          <div class="input-group">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text">
                             <i class="fas fa-dollar-sign"></i>
                            </span>
                          </div>
                        <input type="number" min="100" class="form-control" id="precioD1" required>
                       </div> 
                        </div>
                    </div>
                    <!-- Precio distribuidor-->

                    <!-- Precio Restaurant -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Precio restaurant*</label>
                          <div class="input-group">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text">
                             <i class="fas fa-dollar-sign"></i>
                            </span>
                          </div>
                        <input type="number" min="100" class="form-control" id="precioR1" required>
                       </div> 
                        </div>
                    </div>
                    <!-- Precio restaurant-->

                    <!-- Precio Restaurant -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Precio promoción</label>
                          <div class="input-group">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text">
                             <i class="fas fa-dollar-sign"></i>
                            </span>
                          </div>
                        <input type="number" min="100" class="form-control" id="precioP1">
                       </div> 
                        </div>
                    </div>
                    <!-- Precio restaurant-->

                    <!-- Costo adquissicion -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Costo adquisición*</label>
                          <div class="input-group">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text">
                             <i class="fas fa-dollar-sign"></i>
                            </span>
                          </div>
                        <input type="number" min="100" class="form-control" id="costo1" required>
                       </div> 
                        </div>
                    </div>
                    <!-- Costo adquisiscion-->

                    <!-- Existencias -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Existencias*</label>
                          <div class="input-group">
                        <input type="number" min="100" class="form-control" id="stock1" required>
                       </div> 
                        </div>
                    </div>
                    <!-- Existencias-->
                     <!-- Existencias minimas -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Stock mínimo*</label>
                          <div class="input-group">
                        <input type="number" min="100" class="form-control" id="stockM1" required>
                       </div> 
                        </div>
                    </div>
                    <!-- Existencias minimas-->

                    <!-- estado -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Estado*</label>
                          <div class="input-group">
                            <select class="form-control" required>
                              <option>Disponible</option>
                              <option>Agotado</option>
                              <option>Proximamente</option>
                            </select>
                          </div> 
                        </div>
                    </div>
                    <!-- estado-->

                    <!-- dimensiones -->
                    <div class="col-sm-10">
                      <div class="form-group">
                        <label>Dimensiones del producto</label>
                        </div>
                    </div>
                    <!-- dimensiones-->

                     <!-- alto-->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Alto*</label>
                          <div class="input-group">
                        <input type="number" min="100" class="form-control" id="alto1" required>
                       </div> 
                        </div>
                    </div>
                    <!-- alto-->

                    <!-- ancho-->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Ancho*</label>
                          <div class="input-group">
                        <input type="number" min="100" class="form-control" id="ancho1" required>
                       </div> 
                        </div>
                    </div>
                    <!-- ancho-->

                    <!-- largo-->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Largo*</label>
                          <div class="input-group">
                        <input type="number" min="100" class="form-control" id="largo1" required>
                       </div> 
                        </div>
                    </div>
                    <!-- largo-->

                    <!-- peso-->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Peso (kg)*</label>
                          <div class="input-group">
                        <input type="number" min="100" class="form-control" id="peso1" required>
                       </div> 
                        </div>
                    </div>
                    <!-- peso-->
                  </div>
                 
                <!--</form>-->
              </div>
              <!-- /.card-body -->

              <!--card footer-->
              <div class="card-footer" >
                <a class="btn btn-danger" style="float: right; color: white;">Cancelar</a>
                <button type="submit" class="btn btn-success mr-3" style="float: right;">Agregar Producto</button>
              </div>
              <!--card footer-->
            </div>
            <!-- /.card -->
          </div>
          <div>
            <input type="hidden" id="numPresentaciones" name="numPresentaciones" value="1">
            <input type="hidden" id="numCaracteristicas" name="numCaracteristicas" value="0">
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </form><!--fin del form-->
    </section>
    <!-- /.content -->
    <script src="/js/custom/admin_products.js"></script>
@endsection