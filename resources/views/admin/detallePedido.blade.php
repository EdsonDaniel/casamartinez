@extends('layouts.admin')
@section('content')
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detalles de Pedido</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
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
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- card -->
            <div class="card card-primary">
              @switch($pedido->estado)
                @case(0)
                  <div class="card-header bg-warning">
                    <h3 class="card-title w-100">Información general <span class="d-block float-right">Estado: Pendiente de envío</span></h3>
                  </div>
                  @break
                @case(1)
                  <div class="card-header ">
                    <h3 class="card-title w-100">Información general <span class="d-block float-right">Estado: Enviado</span></h3>
                  </div>
                  @break
                @case(2)
                  <div class="card-header bg-success">
                    <h3 class="card-title w-100">Información general <span class="d-block float-right">Estado: Recibido</span></h3>
                  </div>
                  @break
                @case(3)
                  <div class="card-header bg-gray">
                    <h3 class="card-title w-100">Información general <span class="d-block float-right">Estado: Reemplazo solicitado</span></h3>
                  </div>
                  @break
                @case(-1)
                  <div class="card-header bg-danger">
                    <h3 class="card-title w-100">Información general <span class="d-block float-right">Estado: Cancelado</span></h3>
                  </div>
                  @break

              @endswitch
              <div class="card-body">
                <div class="row"><!--row card inf general-->
                  <div class="col-7">
                    <div class="form-group">
                      <label for="nombre_producto">Número de pedido</label>
                      <input type="text" class="form-control" disabled="" value="{{$pedido->id}}">
                    </div>
                  </div>

                  <div class="col-5">
                    <div class="form-group">
                      <label for="monto">Monto:</label>
                      <input type="text" class="form-control @error('monto') is-invalid @enderror" name="monto" id="monto" readonly="" placeholder="$1000" required value="$ {{ $pedido->monto_total }}">
                      @error('monto')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="fec_creacion">Fecha de Creación</label>
                      <input type="date" class="form-control @error('fec_creacion') is-invalid @enderror" name="fec_creacion" id="fec_creacion" required value="{{ date('Y-m-d', strtotime($pedido->created_at)) }}">
                      @error('fec_creacion')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>


                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Fecha de envío</label>
                      <input type="date" class="form-control @error('') is-invalid @enderror" name="" id="" placeholder="" required value="{{ date('Y-m-d', strtotime($pedido->fecha_envio)) }}">
                      @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Fecha de entrega</label>
                      <input type="date" class="form-control @error('') is-invalid @enderror" name="" id="" placeholder="" required value="{{date('Y-m-d', strtotime($pedido->fecha_entrega)) }}">
                      @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Última actualización</label>
                      <input type="date" class="form-control @error('') is-invalid @enderror" name="" id="" placeholder="" required value="{{ date('Y-m-d', strtotime($pedido->updated_at)) }}">
                      @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="marca">Paquetería</label>
                      <input type="text" class="form-control @error('') is-invalid @enderror" name="" id="" placeholder="" required value="{{$pedido->paqueteria}}">
                      @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="">ID de rastreo</label>
                      <input type="text" class="form-control @error('') is-invalid @enderror" name="" id="" placeholder="" required value="{{ $pedido->id_rastreo }}">
                      @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Costo de envío</label>
                      <input type="text" class="form-control @error('') is-invalid @enderror" name="" id="" placeholder="" required value="$ {{ $pedido->costo_envio }}">
                      @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Método de pago</label>
                      <input type="text" class="form-control @error('') is-invalid @enderror" name="" id="" placeholder="" required value="{{ old('') }}">
                      @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="">ID de pago</label>
                      <input type="text" class="form-control @error('') is-invalid @enderror" name="" id="" placeholder="" required value="{{ $pedido->id_pago }}">
                      @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  
                </div>
              </div>
              <div class="card-footer">
                
              </div>
            </div><!-- card -->

             <!-- card productos-->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title ">Productos comprados</h3>
              </div>
              <div class="card-body">
                <table class="w-100">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Nombre</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($productos as $p)
                    <tr>
                      <td class="text-center">
                        <!--<img src="/img/logo-casa-martinez.png" style="width: 80px; height: 80px;">-->
                        <img src="/storage/{{$p->foto_url}}" style="width: 80px; height: 80px;">
                      </td>
                      <!--<td >Mezcal Sinai Reserva Especial (Añejo) 750 ml</td>-->
                      <td>{{$p->producto->nombre. " " . $p->contenido . " " . $p->unidad_c}}</td>
                      <td class="text-center">$ {{$p->pivot->precio_unitario}}</td>
                      <td class="text-center">{{$p->pivot->cantidad}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                
              </div>
            </div><!-- card productos-->
          </div><!-- left column -->

          <!-- right column -->
          <div class="col-md-6">
            <!-- card envio-->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title ">Información de envío</h3>
              </div>
              <div class="card-body">
                <div class="row">

                  <div class="col-12">
                    <div class="form-group">
                      <label for="">Destinatario</label>
                      <input type="text" class="form-control @error('') is-invalid @enderror" name="" id="" placeholder="" required value="{{$direccion->nombre_residente}}">
                      @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="">e-mail de contacto</label>
                      <input type="text" class="form-control @error('') is-invalid @enderror" name="" id="" placeholder="" required value="{{ $pedido->email }}">
                      @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Teléfono</label>
                      <input type="text" class="form-control @error('') is-invalid @enderror" name="" id="" placeholder="" required value="{{ $direccion->telefono }}">
                      @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="">Calle y número</label>
                      <textarea type="text" class="form-control @error('') is-invalid @enderror" name="" id="" placeholder="" required value="{{$direccion->calle . " #" . $direccion->numero}}">{{$direccion->calle . " #" . $direccion->numero}}
                      </textarea>
                      @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="">CP</label>
                      <input type="text" class="form-control @error('') is-invalid @enderror" name="" id="" placeholder="" required value="{{ $direccion->codigo_postal }}">
                      @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Colonia</label>
                      <input type="text" class="form-control @error('') is-invalid @enderror" name="" id="" placeholder="" required value="{{ $direccion->colonia }}">
                      @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>


                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Municipio</label>
                      <input type="text" class="form-control @error('') is-invalid @enderror" name="" id="" placeholder="" required value="{{ $direccion->municipio }}">
                      @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Estado</label>
                      <input type="text" class="form-control @error('') is-invalid @enderror" name="" id="" placeholder="" required value="{{ $direccion->estado }}">
                      @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                </div>
              </div>


              <div class="card-footer">
                
              </div>
            </div><!-- card envio-->

            <!-- card facturacion-->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title ">Información de Facturación</h3>
              </div>
              <div class="card-body">
                <p><i class="fa fa-check"></i> <span>Los mismos que los datos de envío</span></p>
              </div>
              <div class="card-footer">
                
              </div>
            </div><!-- card facturacion-->
          </div><!-- right column -->
        </div><!-- row -->
      </div><!-- container -->
    </section>
@stop