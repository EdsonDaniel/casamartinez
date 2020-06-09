
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Form add products -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos del producto</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre y/o marca">
                  </div>
                  <div class="form-group">
                    <label for="presentacion">Presentación</label>
                    <input type="text" class="form-control" id="presentacion" placeholder="750 ml">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Fotografía</label>
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
                    <textarea class="form-control" id="descripcion" rows="2" placeholder="Mezcal joven de alta calidad"></textarea>
                  </div>
                  <!--descripcion--->

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
          <!--/.col (left) -->
          
          <!-- right column -->
          <div class="col-md-6">
            <!-- Card precios -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Precios y Stock</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                  	
                  	<!-- Precio a consumidor -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>A consumidor</label>
	                        <div class="input-group">
	                  			<div class="input-group-prepend">	
	                    			<span class="input-group-text">
	                     			 <i class="fas fa-dollar-sign"></i>
	                    			</span>
	                  			</div>
                 				<input type="number" min="100" class="form-control" placeholder="">
               				 </div> 
                      	</div>
                     </div>
                     <!-- Precio a consumidor-->


					         <!-- Precio distribuidor -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>A distribuidor</label>
	                        <div class="input-group">
	                  			<div class="input-group-prepend">	
	                    			<span class="input-group-text">
	                     			 <i class="fas fa-dollar-sign"></i>
	                    			</span>
	                  			</div>
                 				<input type="number" min="100" class="form-control" placeholder="">
               				 </div> 
                      	</div>
                    </div>
                    <!-- Precio distribuidor-->

                    <!-- Precio Restaurant -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>A restaurant</label>
                          <div class="input-group">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text">
                             <i class="fas fa-dollar-sign"></i>
                            </span>
                          </div>
                        <input type="number" min="100" class="form-control" placeholder="">
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
                        <input type="number" min="100" class="form-control" placeholder="">
                       </div> 
                        </div>
                    </div>
                    <!-- Costo adquisiscion-->

                    <!-- Existencias -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Existencias</label>
                          <div class="input-group">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text">
                             <i class="fas fa-dollar-sign"></i>
                            </span>
                          </div>
                        <input type="number" min="100" class="form-control" placeholder="">
                       </div> 
                        </div>
                    </div>
                    <!-- Existencias-->

                     <!-- Existencias minimas -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Stock mínimo</label>
                          <div class="input-group">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text">
                             <i class="fas fa-dollar-sign"></i>
                            </span>
                          </div>
                        <input type="number" min="100" class="form-control" placeholder="">
                       </div> 
                        </div>
                    </div>
                    <!-- Existencias minimas-->
                  </div>
                 
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Card dimensiones -->

            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Dimensiones</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">

                    <!-- Alto-->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Alto</label>
                          <div class="input-group">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text">
                             <i class="fas fa-dollar-sign"></i>
                            </span>
                          </div>
                        <input type="number" min="100" class="form-control" placeholder="">
                       </div> 
                        </div>
                     </div>
                     <!--Alto-->


                   <!-- Largo -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Largo</label>
                          <div class="input-group">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text">
                             <i class="fas fa-dollar-sign"></i>
                            </span>
                          </div>
                        <input type="number" min="100" class="form-control" placeholder="">
                       </div> 
                        </div>
                    </div>
                    <!-- Largo-->

                    <!--Ancho-->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Ancho</label>
                          <div class="input-group">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text">
                             <i class="fas fa-dollar-sign"></i>
                            </span>
                          </div>
                        <input type="number" min="100" class="form-control" placeholder="">
                       </div> 
                        </div>
                    </div>
                    <!-- Ancho-->

                    <!-- Peso -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Peso</label>
                          <div class="input-group">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text">
                             <i class="fas fa-dollar-sign"></i>
                            </span>
                          </div>
                        <input type="number" min="100" class="form-control" placeholder="">
                       </div> 
                        </div>
                    </div>
                    <!-- Peso-->
                  </div>
                 
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop