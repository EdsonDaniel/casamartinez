
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
      <form role="form" id="addProduct">
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
              <!-- form start --
              <form role="form">-->
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre del producto*</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
                  </div>
                  <div class="form-group">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control" id="marca" placeholder="Marca" required>
                  </div>
                  <div class="form-group">
                    <label >Fotografía principal</label>
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
                   <label for="descripcion">Breve descripción</label>
                    <textarea class="form-control" id="descripcion" rows="2" placeholder="Mezcal joven de alta calidad" required></textarea>
                  </div>
                  <!--descripcion--->

                </div>
                <!-- /.card-body -->

                <!--<div class="card-footer">
                  <button type="submit" class="btn btn-primary">Agregar</button>
                </div>-->
              <!--</form>-->
            </div>
            <!-- /.card -->
        </div>
          <!--/.col (left) -->
          
          <!-- right column -->
          <div class="col-md-7" id="presentaciones">
            <!-- Card presentacion -->
            <div class="card card-info" id="pres1">
              <div class="card-header">
                <h3 class="card-title mt-1">Presentaciones y precios</h3>

                <span style="float: right;">
                  <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Agregar nueva presentación" onclick="addPresentacion()"><i class="fas fa-plus"></i>
                  </a>
                </span>
                <span style="float: right;" class="mr-3 mt-1">Presentacion1</span>
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
                        <input type="number" min="100" class="form-control" placeholder="700" id="contenido1">
                        <select class="form-control">
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
                        <input type="number" min="100" class="form-control" id="precioC1">
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
                        <input type="number" min="100" class="form-control" id="precioD1">
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
                        <input type="number" min="100" class="form-control" id="precioR1">
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
                        <input type="number" min="100" class="form-control" id="costo1">
                       </div> 
                        </div>
                    </div>
                    <!-- Costo adquisiscion-->

                    <!-- Existencias -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Existencias*</label>
                          <div class="input-group">
                        <input type="number" min="100" class="form-control" id="stock1">
                       </div> 
                        </div>
                    </div>
                    <!-- Existencias-->
                     <!-- Existencias minimas -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Stock mínimo*</label>
                          <div class="input-group">
                        <input type="number" min="100" class="form-control" id="stockM1">
                       </div> 
                        </div>
                    </div>
                    <!-- Existencias minimas-->

                    <!-- estado -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Estado</label>
                          <div class="input-group">
                            <select class="form-control">
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
                        <input type="number" min="100" class="form-control" id="alto1">
                       </div> 
                        </div>
                    </div>
                    <!-- alto-->

                    <!-- ancho-->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Ancho*</label>
                          <div class="input-group">
                        <input type="number" min="100" class="form-control" id="ancho1">
                       </div> 
                        </div>
                    </div>
                    <!-- ancho-->

                    <!-- largo-->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Largo*</label>
                          <div class="input-group">
                        <input type="number" min="100" class="form-control" id="largo1">
                       </div> 
                        </div>
                    </div>
                    <!-- largo-->

                    <!-- peso-->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Peso (kg)*</label>
                          <div class="input-group">
                        <input type="number" min="100" class="form-control" id="peso1">
                       </div> 
                        </div>
                    </div>
                    <!-- peso-->
                  </div>
                 
                <!--</form>-->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </form><!--fin del form-->
    </section>
    <!-- /.content -->
    <script>
      p = 1;
      function addPresentacion(){
        p++;
        var div_card = document.createElement('div');
        div_card.setAttribute('class', 'card card-info');
        div_card.innerHTML = '<div class="card card-info" id="pres2"> <div class="card-header"> <h3 class="card-title">Presentaciones y precios</h3> <span style="float: right;">                   <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Agregar nueva presentación"><i class="fas fa-plus"></i>  </button> </span> </div> <!-- /.card-header -->  <div class="card-body" id="presentcion1"> <!--<form role="form">--> <div class="row">                     <!-- Contenido --> <div class="col-sm-4"> <div class="form-group"> <label>Contenido neto*</label>  <div class="input-group"> <input type="number" min="100" class="form-control" placeholder="700" id="contenido1"> <select class="form-control"> <option>ml</option> <option>g</option> <option>l</option> <option>kg</option> </select> </div> </div> </div> <!-- Contenido--> <!-- Precio consumidor --> <div class="col-sm-4"> <div class="form-group"> <label>Precio consumidor*</label> <div class="input-group"> <div class="input-group-prepend">  <span class="input-group-text"> <i class="fas fa-dollar-sign"></i> </span> </div> <input type="number" min="100" class="form-control" id="precioC1"> </div> </div> </div> <!-- Precio consumidor--> <!-- Precio distribuidor --> <div class="col-sm-4"> <div class="form-group"> <label>Precio distribuidor*</label> <div class="input-group"> <div class="input-group-prepend">  <span class="input-group-text"> <i class="fas fa-dollar-sign"></i></span> </div> <input type="number" min="100" class="form-control" id="precioD1">                        </div>                         </div>                     </div>                    <!-- Precio distribuidor-->          <!-- Precio Restaurant -->                     <div class="col-sm-4">                       <div class="form-group">                         <label>Precio restaurant*</label>                          <div class="input-group">                          <div class="input-group-prepend">                             <span class="input-group-text">                             <i class="fas fa-dollar-sign"></i>                            </span>                          </div>                        <input type="number" min="100" class="form-control" id="precioR1">                       </div>                         </div>                    </div>                    <!-- Precio restaurant-->                   <!-- Precio Restaurant -->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Precio promoción</label>                          <div class="input-group">                          <div class="input-group-prepend">                             <span class="input-group-text">                             <i class="fas fa-dollar-sign"></i>                            </span>                          </div>                        <input type="number" min="100" class="form-control" id="precioP1">                       </div>                         </div>                    </div>                    <!-- Precio restaurant-->                    <!-- Costo adquissicion -->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Costo adquisición*</label>                          <div class="input-group">                          <div class="input-group-prepend">                             <span class="input-group-text">                             <i class="fas fa-dollar-sign"></i>                            </span>                          </div>                        <input type="number" min="100" class="form-control" id="costo1">                       </div>                         </div>                    </div>                    <!-- Costo adquisiscion-->                    <!-- Existencias -->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Existencias*</label>                          <div class="input-group">                        <input type="number" min="100" class="form-control" id="stock1">                       </div>                         </div>                    </div>                    <!-- Existencias-->                     <!-- Existencias minimas -->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Stock mínimo*</label>                          <div class="input-group">                        <input type="number" min="100" class="form-control" id="stockM1">                       </div>                         </div>                    </div>                    <!-- Existencias minimas-->                    <!-- estado -->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Estado</label>                          <div class="input-group">                            <select class="form-control">                              <option>Disponible</option>                              <option>Agotado</option>                              <option>Proximamente</option>                           </select>                          </div>                         </div>                    </div>                    <!-- estado-->                    <!-- dimensiones -->                    <div class="col-sm-10">                      <div class="form-group">                        <label>Dimensiones del producto</label>                        </div>                    </div>                    <!-- dimensiones-->                     <!-- alto-->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Alto*</label>                          <div class="input-group">                        <input type="number" min="100" class="form-control" id="alto1">                       </div>                         </div>                    </div>                    <!-- alto-->                    <!-- ancho-->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Ancho*</label>                          <div class="input-group">                        <input type="number" min="100" class="form-control" id="ancho1">                       </div>                         </div>                    </div>                    <!-- ancho-->                    <!-- largo-->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Largo*</label>                          <div class="input-group">                        <input type="number" min="100" class="form-control" id="largo1">                       </div>                         </div>                    </div>                    <!-- largo-->                    <!-- peso-->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Peso (kg)*</label>                          <div class="input-group">                        <input type="number" min="100" class="form-control" id="peso1">                       </div>                         </div>                    </div>                    <!-- peso-->                  </div>                                 <!--</form>-->              </div>              <!-- /.card-body -->            </div>            <!-- /.card -->'

        
        document.getElementById('presentaciones').appendChild(div_card);

        var animado = document.getElementById('pres2');
        //var tiempo = 600;
        //$("html, body").animate({ scrollTop: $(animado).offset().top }, tiempo);
        //$("html, body").animate({ scrollTop: $(id).offset().top - coord }, tiempo);
        saltarA('#pres2');
      }

       function saltarA(id, tiempo) {
        var tiempo = tiempo || 200;
        $("html, body").animate({ scrollTop: $(id).offset().top }, tiempo);
      }
    </script>
@stop