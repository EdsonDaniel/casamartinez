
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
              
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre del producto*</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="marca">Marca*</label>
                    <input type="text" class="form-control" id="marca" placeholder="Marca" required>
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
                    <textarea class="form-control" id="descripcion" rows="2" placeholder="Mezcal joven de alta calidad" required></textarea>
                  </div>
                  <!--descripcion--->

                </div><!-- /.card-body -->
              </div><!-- fin card datos generales-->

              
              <!--card caracteristicas adicionales-->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title mt-1">Características adicionales</h3>

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
                          <label>Seleccione*</label>
                            <div class="input-group">
                              <select class="form-control" style="padding-left: 3px;">
                                <option>Maestro mezcalero</option>
                                <option>% de alcohol</option>
                                <option>Tiempo de añejado</option>
                                <option>Origen Verde</option>
                              </select>
                            </div> 
                        </div>
                      </div>
                       <!--nombre caracteristica 1-->

                     <!-- val caracteriztica1 -->
                      <div class="col-sm-6 mt-2">
                        <div class="form-group">
                          <label>Valor de característica*</label>
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="Ignacio Martínez" id="valCarac1">
                            </div> 
                          </div>
                      </div>
                      <!-- val caracteriztica1-->

                      <!-- descricion caracteristica1 -->
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Descripción de la característica</label>
                            <div class="input-group">
                              <textarea class="form-control" id="descripCarac1" rows="2" placeholder="Indica el nombre del maestro mezcalero" disabled></textarea>
                            </div> 
                          </div>
                      </div>
                      <!-- descricion caracteristica1-->
                    </div>
                    <!--fin row-->
                  </div>
                  <!--fin card body-->

                  <div class="card-footer">
                    <button type="button" class="btn btn-primary" style="display: block; margin: 0 auto;"  data-toggle="modal" data-target="#modalNewCarac">Agregar nueva característica</button>

                    <div class="modal fade" id="modalNewCarac" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nueva característica de producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form>
                              <div class="form-group">
                                <label for="nom_carac" class="col-form-label">Nombre de la característica*:</label>
                                <input type="text" class="form-control" id="nom_new_carac">
                              </div>
                              <div class="form-group">
                                <label for="descrip_new_carac" class="col-form-label">Descripción*:</label>
                                <textarea class="form-control" id="descrip_new_carac" placeholder="Descripción breve de lo que representa esta característica."></textarea>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Agregar</button>
                          </div>
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
                        <label>Estado*</label>
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
      c = 1;
      function addPresentacion(){
        p++;
        var div_card = document.createElement('div');
        div_card.setAttribute('class', 'card card-info card-trans');
        div_card.setAttribute('id','pres'+p);
        div_card.innerHTML = '<div class="card-header"> <h3 class="card-title mt-1">Presentaciones y precios</h3> <span style="float: right;">'
        +'Presentación '+p                   
        +'<a style="cursor:pointer" class="btn btn-primary mr-3 ml-3" data-toggle="tooltip" data-placement="top" title="Agregar nueva presentación" onclick="addPresentacion()"><i class="fas fa-plus"></i></a>'
        +'<a style="cursor:pointer" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar nueva presentación" onclick="quitarPres('+p+')"><i class="fas fa-minus"></i></a>'
        +' </span> </div> <!-- /.card-header -->  <div class="card-body" id="presentcion1"> <!--<form role="form">--> <div class="row">                     <!-- Contenido --> <div class="col-sm-4"> <div class="form-group"> <label>Contenido neto*</label>  <div class="input-group"> <input type="number" min="100" class="form-control" placeholder="700" id="contenido1"> <select class="form-control"> <option>ml</option> <option>g</option> <option>l</option> <option>kg</option> </select> </div> </div> </div> <!-- Contenido--> <!-- Precio consumidor --> <div class="col-sm-4"> <div class="form-group"> <label>Precio consumidor*</label> <div class="input-group"> <div class="input-group-prepend">  <span class="input-group-text"> <i class="fas fa-dollar-sign"></i> </span> </div> <input type="number" min="100" class="form-control" id="precioC1"> </div> </div> </div> <!-- Precio consumidor--> <!-- Precio distribuidor --> <div class="col-sm-4"> <div class="form-group"> <label>Precio distribuidor*</label> <div class="input-group"> <div class="input-group-prepend">  <span class="input-group-text"> <i class="fas fa-dollar-sign"></i></span> </div> <input type="number" min="100" class="form-control" id="precioD1">                        </div>                         </div>                     </div>                    <!-- Precio distribuidor-->          <!-- Precio Restaurant -->                     <div class="col-sm-4">                       <div class="form-group">                         <label>Precio restaurant*</label>                          <div class="input-group">                          <div class="input-group-prepend">                             <span class="input-group-text">                             <i class="fas fa-dollar-sign"></i>                            </span>                          </div>                        <input type="number" min="100" class="form-control" id="precioR1">                       </div>                         </div>                    </div>                    <!-- Precio restaurant-->                   <!-- Precio Restaurant -->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Precio promoción</label>                          <div class="input-group">                          <div class="input-group-prepend">                             <span class="input-group-text">                             <i class="fas fa-dollar-sign"></i>                            </span>                          </div>                        <input type="number" min="100" class="form-control" id="precioP1">                       </div>                         </div>                    </div>                    <!-- Precio restaurant-->                    <!-- Costo adquissicion -->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Costo adquisición*</label>                          <div class="input-group">                          <div class="input-group-prepend">                             <span class="input-group-text">                             <i class="fas fa-dollar-sign"></i>                            </span>                          </div>                        <input type="number" min="100" class="form-control" id="costo1">                       </div>                         </div>                    </div>                    <!-- Costo adquisiscion-->                    <!-- Existencias -->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Existencias*</label>                          <div class="input-group">                        <input type="number" min="100" class="form-control" id="stock1">                       </div>                         </div>                    </div>                    <!-- Existencias-->                     <!-- Existencias minimas -->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Stock mínimo*</label>                          <div class="input-group">                        <input type="number" min="100" class="form-control" id="stockM1">                       </div>                         </div>                    </div>                    <!-- Existencias minimas-->                    <!-- estado -->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Estado*</label>                          <div class="input-group">                            <select class="form-control">                              <option>Disponible</option>                              <option>Agotado</option>                              <option>Proximamente</option>                           </select>                          </div>                         </div>                    </div>                    <!-- estado-->                    <!-- dimensiones -->                    <div class="col-sm-10">                      <div class="form-group">                        <label>Dimensiones del producto</label>                        </div>                    </div>                    <!-- dimensiones-->                     <!-- alto-->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Alto*</label>                          <div class="input-group">                        <input type="number" min="100" class="form-control" id="alto1">                       </div>                         </div>                    </div>                    <!-- alto-->                    <!-- ancho-->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Ancho*</label>                          <div class="input-group">                        <input type="number" min="100" class="form-control" id="ancho1">                       </div>                         </div>                    </div>                    <!-- ancho-->                    <!-- largo-->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Largo*</label>                          <div class="input-group">                        <input type="number" min="100" class="form-control" id="largo1">                       </div>                         </div>                    </div>                    <!-- largo-->                    <!-- peso-->                    <div class="col-sm-4">                      <div class="form-group">                        <label>Peso (kg)*</label>                          <div class="input-group">                        <input type="number" min="100" class="form-control" id="peso1">                       </div>                         </div>                    </div>                    <!-- peso-->                  </div>                                 <!--</form>-->              </div>              <!-- /.card-body --><!-- /.card -->';

        
        document.getElementById('presentaciones').appendChild(div_card);

        saltarA('#pres'+p);
      }

       function saltarA(id, tiempo) {
        var tiempo = tiempo || 200;
        $("html, body").animate({ scrollTop: $(id).offset().top }, tiempo);
      }

      function addCarac(){
        c++;
        var div_row = document.createElement('div');
        div_row.setAttribute('class', 'row bordes mt-4');
        div_row.setAttribute('id','carac'+c);
        div_row.innerHTML = '<!-- icono borrar-->'
        +'<div class="col-sm-12 mt-2">'
        +'<div class="form-group">'
        +'<span style="float: right; color: #c82333;">'
        +'<a style="cursor: pointer; font-size: 1.3rem; display:inline-block; margin: 0 0.5rem; color: #0069d9;" data-toggle="tooltip" data-placement="top" title="Agregar característica" onclick="addCarac()"><i class="fas fa-plus-square"></i></a>'
        +'<a style="cursor: pointer; font-size: 1.3rem;" data-toggle="tooltip" data-placement="top" title="Quitar característica" onclick="quitarCarac('+c+')"><i class="fas fa-minus-square"></i></a>' 
        +'</span> </div> </div>'
        +'<!-- icono borrar-->'
        +'<!--nombre caracteristica '+c+' -->'
        +'<div class="col-sm-6 mt-2">'
        +'<div class="form-group">'
        +'<label>Seleccione*</label>'
        +'<div class="input-group">'
        +'<select class="form-control" style="padding-left: 3px;">'
        +'<option>Maestro mezcalero</option>'
        +'<option>% de alcohol</option>'
        +'<option>Tiempo de añejado</option> '
        +'<option>Origen Verde</option> '
        +'</select>'
        +'</div> </div> </div> '
        +'<!--nombre caracteristica'+c+'--> '
        +'<!-- val caracteriztica'+c+' --> '
        +'<div class="col-sm-6 mt-2"> '
        +'<div class="form-group"> '
        +'<label>Valor de característica*</label> '
        +'<div class="input-group">  '
        +'<input type="text" class="form-control" placeholder="Ignacio Martínez" id="valCarac'+c+'"> '
        +'</div> </div>  </div> '
        +'<!-- val caracteriztica '+c+'--> '
        +'<!-- descricion caracteristica '+c+' --> '
        +'<div class="col-sm-12"> '
        +'<div class="form-group"> '
        +'<label>Descripción de la característica</label> '
        +'<div class="input-group"> '
        +'<textarea class="form-control" id="descripCarac'+c+'" rows="2" placeholder="Indica el nombre del maestro mezcalero" required></textarea> '
        +'</div> </div> </div> '
        +'<!-- descricion caracteristica'+c+'--> '
        +'<!--fin row-->';

        document.getElementById('caracteristicas').appendChild(div_row);

      }

      function quitarPres(idcard){
        var div = document.getElementById('pres'+idcard);
        div.style.opacity = '0';
        setTimeout(function(){div.parentNode.removeChild(div);}, 700);
        p--;
      }

      function quitarCarac(idboton){
        var div = document.getElementById('carac'+idboton);
        div.style.opacity = '0';
        setTimeout(function(){div.parentNode.removeChild(div);}, 700);
        c--;
      }
    </script>
@stop