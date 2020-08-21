@extends('layouts.admin')
@section('content')

<!-- Content Header (Page header) -->

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lista de productos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- card data table -->
                    <div class="card">
                        <!-- <div class="card-header">
                            <h3>Lista de productos</h3>
                        </div> -->

                        <div class="card-body">
                            <table id="tabla" class="table-striped table-bordered dataTable data-table" >
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Presentación</th>
                                        <th>Costo<br>adq.</th>
                                        <th><span>Precio</span><br>Consumidor</th>
                                        <th>Precio<br>Distribuidor</th>
                                        <th>Precio<br>Restaurant</th>
                                        <th>Stock</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                        <th class="hidden">id</th>
                                    </tr>
                                </thead>
                                <!--
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Presentación</th>
                                        <th>Costo adq.</th>
                                        <th>Precio Consumidor</th>
                                        <th>Precio Distribuidor</th>
                                        <th>Precio Restaurant</th>
                                        <th>Stock</th>
                                        <th>Estado</th>
                                    </tr>
                                </tfoot>
                            -->
                            </table>
                        </div>
                    </div>
                    <!-- card data table -->
                </div>
            </div>
        </div>
    </section>

    @endsection

    @section('scripts')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var tabla = $('#tabla').DataTable( {
                "ajax": {
                    url: '/admin/productos/ajax',
                    dataSrc: ''
                },
                columns: [
                    { "data": "nombre" },
                    { "data": "marca" },
                    { "data": "presentacion" },
                    { "data": "costo_adquisicion" },
                    { "data": "precio_consumidor" },
                    { "data": "precio_distribuidor" },
                    { "data": "precio_restaurant"},
                    { "data": "stock"},
                    { "data": "estado",
                        "className": 'estado',
                        "orderable": false
                    },
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": 
                        '<div class="botones">'
                        +'<div style="margin-right: 10px;"> <a class="actions" data-title="Ver detalles">'
                        + '<i class="fad fa-info-circle" style="color:green;"></i></a></div>'
                        +'<div style="margin-right: 10px;"> <a class="actions" data-title="Editar">'
                        + '<i class="fad fa-edit" style="--fa-primary-color: #F7F356; --fa-secondary-color: rgb(218, 41, 28);"></i></a></div>'
                        +'<div > <button class="actions" data-title="Eliminar">'
                        + '<i class="fad fa-trash-alt" style="color:red;"></i></button></div>'
                        +'</div>'
                    },
                    {
                        "data": "id_product",
                        "className": "hidden"
                    }

                ],
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                }

            });

                   
            $('#tabla').on( 'init.dt', function () {
                var nodes = tabla.column(8).nodes().to$();
                var col_id = tabla.column(10).data();
                var botones = tabla.column(9).nodes().to$();
                
                for (var i = 0; i < nodes.length; i++) {
                    switch(nodes[i].innerHTML){
                        case '1': 
                        $(nodes[i]).html($('<span data-title="Disponible"><i class="fas fa-check-circle" '
                         +'style="color:#20E738;"></i></span>'));
                        break;

                        case '0': 
                        $(nodes[i]).html($('<span data-title="No disponible"><i class="fad fa-ban" '
                            +' style="color:#c82333;"></i></span>'));
                        break;

                        case '2': 
                        $(nodes[i]).html($('<span data-title="Pocas existencias"><i class="fad fa-exclamation-triangle" '
                            +' style="color:#FFFA4B;"></i></span>'));
                        break;

                        case '3': 
                        $(nodes[i]).html($('<span data-title="Próximamente"><i class="fad fa-clock" '
                            +'style="color:black;"></i></span>'));
                        break;

                    }
                    //Agregar enlace para editar o ver
                    /*var tr = $(nodes[i]).closest('tr');
                    var row = tabla.row( tr );*/
                    var divs = botones[i].childNodes;
                    //divs = 
                    $(divs[0]).find('a').attr( "href", "/admin/productos/detalles/"+col_id[i] );
                    $(divs[1]).find('a').attr( "href", col_id[i] );
                    //$(divs[0]).find('a').attr( "href", col_id[i] );

                    console.log("celda: "+botones[i].tagName);

                }
                //tabla.draw();
                
                
                console.log("columns: "+nodes[0].innerHTML);
                //nodes[0].innerHTML = "cambie";
                //$(nodes[0]).append( $('<i >Aqui escribi</i>') );

                //console.log("element1: "+nodes[0]);
                //.addClass( 'estadook' );
            } ).dataTable();
        });

    </script>
    <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/css/custom/datatable.css">

    @endsection


