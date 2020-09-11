
@extends('layouts.admin')
@section('style')
<link rel="stylesheet" href="/css/custom/productos_crud.css">
@endsection

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
                <button type="submit" form="addProduct" class="btn btn-success mr-3">Agregar Producto</button>
              </li>
              <li class="">
                <a href="/admin/productos/" class="btn btn-danger">Cancelar</a>
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
      <form id="addProduct" method="post" action="/admin/productos/guardar" name="products" enctype="multipart/form-data">
        @method('POST')
        @csrf
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
                    <label for="nombre_producto">Nombre del producto*</label>
                    <input type="text" class="form-control @error('nombre_producto') is-invalid @enderror" id="nombre_producto" name="nombre_producto" placeholder="Nombre" required value="{{ old('nombre_producto') }}">
                    @error('nombre_producto')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="marca">Marca*</label>
                    <input type="text" class="form-control @error('marca') is-invalid @enderror" name="marca" id="marca" placeholder="Marca" required value="{{ old('marca') }}">
                    @error('marca')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label >Fotografía principal</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input @error('imagen') is-invalid @enderror" name="imagen"  value="{{ old('imagen') }}"
                        id="img_principal" accept="image/*" onchange="upload_img(this);">
                        <label class="custom-file-label" for="img_principal">Selecciona un archivo</label>
                         @error('imagen')
                          <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                      </div>
                      <!-- <div class="input-group-append">
                        <span class="input-group-text" id="">Subir</span>
                      </div>
                    -->
                    </div>
                    <div class="d-none border" style="position: relative;">
                      <button type="button" class="close" style="position: absolute; top: 0; right: 0;"  aria-label="Close" title="Cancelar" onclick="cancel_upload(this);">
                        <i class="fas fa-window-close" style="color: red;"></i>
                      </button>
                      <img src="" class="img-upload" >
                    </div>
                  </div>
                  
                  <!--descripcion-->
                  <div class="form-group">
                   <label for="descripcion">Breve descripción*</label>
                    <textarea class="form-control @error('descripcion_producto') is-invalid @enderror" id="descripcion_producto" name="descripcion_producto" rows="2" placeholder="Mezcal joven de alta calidad" required value="{{ old('descripcion_producto') }}">{{ old('descripcion_producto') }}</textarea>
                    @error('descripcion_producto')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <!--descripcion--->
                  <span class="text-secondary">*Campos obligatorios</span>
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
                          <label for="select_caracteristicas1">Característica</label>
                            <div class="input-group" id="div_select_caracteristicas1">
                              <select class="form-control" style="padding-left: 3px;" onchange="listenerSelect(event)" id="select_caracteristicas1" name="caracteristicas[caracteristica1][id]">
                                <option selected="" value="0">SELECCIONE</option>
                                @foreach ($caracteristicas as $caracteristica)
                                <option value="{{$caracteristica->id}}">{{ $caracteristica->nombre }}</option>
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
                              <input type="text" class="form-control" placeholder="Ignacio Martínez" id="input_val_caract1" name="caracteristicas[caracteristica1][value]" value="{{ old('select_caracteristicas.value') }}">
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
                          <div class="modal-body">
                              <div class="form-group">
                                <label for="nombre_caracteristica" class="col-form-label">Nombre de la característica*:</label>
                                <input type="text" class="form-control" id="nombre_caracteristica" form="formModal" name="nombre_caracteristica" required>
                              </div>
                              <div class="form-group">
                                <label for="descripcion_caracteristica" class="col-form-label">Descripción*:</label>
                                <textarea class="form-control" id="descripcion_caracteristica" placeholder="Descripción breve de lo que representa esta característica." form="formModal" name="descripcion_caracteristica" required></textarea>
                              </div>
                              <span class="text-secondary">*Campos obligatorios</span>
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
                          <input type="number" step=".01" min="1" class="form-control @error('products.presentacion1.contenido') is-invalid @enderror" value="750" id="contenido1" required name="products[presentacion1][contenido]">
                          <select class="form-control @error('products.presentacion1.unidad_c') is-invalid @enderror" required name="products[presentacion1][unidad_c]">
                            <option value="ml" selected="">ml</option>
                            <option value="g">g</option>
                            <option value="l">l</option>
                            <option value="kg">kg</option>
                          </select>
                          @error('products.presentacion1.contenido')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          @error('products.presentacion1.unidad_c')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
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
                              <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            </div>
                            <input type="number" step=".01" class="form-control @error('products.presentacion1.pre_consu') is-invalid  @enderror" id="precioC1" required name="products[presentacion1][pre_consu]" value="{{ old('products.presentacion1.pre_consu') }}">
                            @error('products.presentacion1.pre_consu')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
                            <input type="number" step=".01" class="form-control @error('products.presentacion1.pre_distri') is-invalid  @enderror" id="precioD1" required name="products[presentacion1][pre_distri]" value="{{ old('products.presentacion1.pre_distri') }}">
                            @error('products.presentacion1.pre_distri')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
                        <input type="number" step=".01" class="form-control @error('products.presentacion1.pre_rest') is-invalid  @enderror" id="precioR1" required name="products[presentacion1][pre_rest]" value="{{ old('products.presentacion1.pre_rest') }}">

                        @error('products.presentacion1.pre_rest')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
                        <input type="number" step=".01" class="form-control @error('products.presentacion1.pre_promo') is-invalid @enderror"id="precioP1" name="products[presentacion1][pre_promo]" value="{{ old('products.presentacion1.pre_promo') }}">

                        @error('products.presentacion1.pre_promo')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                       </div> 
                        </div>
                    </div>
                    <!-- Precio restaurant-->

                    <!-- Costo adquissicion -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Costo adquisición</label>
                          <div class="input-group">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text">
                             <i class="fas fa-dollar-sign"></i>
                            </span>
                          </div>
                        <input type="number" step=".01" class="form-control @error('products.presentacion1.costo') is-invalid  @enderror" id="costo1" name="products[presentacion1][costo]" value="{{ old('products.presentacion1.costo') }}">
                        @error('products.presentacion1.costo')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                       </div> 
                        </div>
                    </div>
                    <!-- Costo adquisiscion-->

                    <!-- Existencias -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Existencias*</label>
                          <div class="input-group">
                        <input type="number"  class="form-control @error('products.presentacion1.stock') is-invalid  @enderror" id="stock1" required name="products[presentacion1][stock]" value="{{ old('products.presentacion1.stock') }}">
                        @error('products.presentacion1.stock')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                       </div> 
                        </div>
                    </div>
                    <!-- Existencias-->
                     <!-- Existencias minimas -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Stock mínimo*</label>
                          <div class="input-group">
                        <input type="number"  class="form-control @error('products.presentacion1.stock_min') is-invalid  @enderror" id="stockM1" required name="products[presentacion1][stock_min]" value="{{ old('products.presentacion1.stock_min') }}">
                        @error('products.presentacion1.stock_min')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                       </div> 
                        </div>
                    </div>
                    <!-- Existencias minimas-->

                    <!-- estado -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Estado*</label>
                          <div class="input-group">
                            <select class="form-control @error('products.presentacion1.estado') is-invalid @enderror" required name="products[presentacion1][estado]" >
                              <option value="1" selected="">Disponible</option>
                              <option value="0">Agotado</option>
                              <option value="2">Proximamente</option>
                            </select>

                            @error('products.presentacion1.estado')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
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
                        <label>Alto</label>
                          <div class="input-group">
                        <input type="number" step=".01" class="form-control @error('products.presentacion1.alto') is-invalid @enderror" id="alto1" name="products[presentacion1][alto]" value="{{ old('products.presentacion1.alto') }}">
                        @error('products.presentacion1.alto')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                       </div> 
                        </div>
                    </div>
                    <!-- alto-->

                    <!-- ancho-->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Ancho</label>
                          <div class="input-group">
                        <input type="number" step=".01" class="form-control @error('products.presentacion1.ancho') is-invalid @enderror" id="ancho1" name="products[presentacion1][ancho]" value="{{ old('products.presentacion1.ancho') }}">

                        @error('products.presentacion1.ancho')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                       </div> 
                        </div>
                    </div>
                    <!-- ancho-->

                    <!-- largo-->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Largo</label>
                          <div class="input-group">
                        <input type="number" step=".01" class="form-control @error('products.presentacion1.largo') is-invalid @enderror" id="largo1" name="products[presentacion1][largo]" value="{{ old('products.presentacion1.largo') }}">
                        @error('products.presentacion1.largo')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                       </div> 
                        </div>
                    </div>
                    <!-- largo-->

                    <!-- peso-->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Peso (kg)</label>
                          <div class="input-group">
                        <input type="number" step=".01" class="form-control @error('products.presentacion1.peso') is-invalid @enderror" id="peso1" name="products[presentacion1][peso]" value="{{ old('products.presentacion1.peso') }}">
                        @error('products.presentacion1.peso')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                       </div> 
                        </div>
                    </div>
                    <!-- peso-->

                    <!-- imagen-->
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label >Foto de la presentación*</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input @error('products.presentacion1.img') is-invalid @enderror" 
                            id="img_presentacion1" name="products[presentacion1][img]"
                            accept="image/*" onchange="upload_img(this);" value="{{ old('products.presentacion1.img') }}" required="true">
                            <label class="custom-file-label" for="img_presentacion1">Selecciona un archivo</label>
                             @error('products.presentacion1.img')
                              <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                          </div>
                        </div>
                        <div class="d-none border" style="position: relative;">
                          <button type="button" class="close" style="position: absolute; top: 0; right: 0;"  aria-label="Close" title="Cancelar" onclick="cancel_upload(this);">
                            <i class="fas fa-window-close" style="color: red;"></i>
                          </button>
                          <img src="" class="img-upload" >
                        </div>
                      </div>
                    </div>
                    <!-- imagen-->
                  </div><!--row-->
                  <span class="text-secondary">*Campos obligatorios</span>
                 
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

        <!--seccion de errores-->

        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $key => $val)
                <li>{{ $val}} </li>
            @endforeach
          </ul>
        </div>
        @endif
        <!--seccion de errores-->


      </div><!-- /.container-fluid -->
    </form><!--fin del form-->
    </section>
    <form action="/admin/caracteristicas/" method="post" id="formModal">
      @method('POST')
      @csrf
    </form>
    <!-- /.content -->
    <script src="/js/custom/admin_products.js"></script>
@endsection