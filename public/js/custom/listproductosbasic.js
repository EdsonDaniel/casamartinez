var tabla;
$(document).ready( function() {
    var url_ajax;
    tabla = $('#tabla').DataTable( {
        "ajax": {
            url: '/admin/productos/ajax',
            dataSrc: ''
        },
        columns: [
            { "data": "nombre" },
            { "data": "marca" },
            { "data": "presentacion" },
            { "data": "precio_consumidor" },
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
                + '<i class="fa fa-info-circle" ></i></a></div>'
                +'<div style="margin-right: 10px;"> <a class="actions" data-title="Editar">'
                + '<i class="fa fa-edit" style="--fa-primary-color: #F7F356; background-color: white !important; color: magenta; --fa-secondary-color: rgb(218, 41, 28);"></i></a></div>'
                +'<div > <a class="actions" data-title="Eliminar">'
                + '<i class="fa fa-trash-alt" style="color:red;"></i></a></div>'
                +'</div>'
            },
            {
                "data": "producto_id",
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
        var nodes = tabla.column(5).nodes().to$();
        var col_id = tabla.column(6).data();
        var botones = tabla.column(7).nodes().to$();
        
        for (var i = 0; i < nodes.length; i++) {
            switch(nodes[i].innerHTML){
                case '1': 
                $(nodes[i]).html($('<span data-title="Disponible"><i class="fas fa-check-circle" '
                 +'style="color:#20E738;"></i></span>'));
                break;

                case '0': 
                $(nodes[i]).html($('<span data-title="No disponible"><i class="fa fa-ban" '
                    +' style="color:#c82333;"></i></span>'));
                break;

                case '2': 
                $(nodes[i]).html($('<span data-title="Pocas existencias"><i class="fa fa-exclamation-triangle" '
                    +' style="color:#FFFA4B;"></i></span>'));
                break;

                case '3': 
                $(nodes[i]).html($('<span data-title="Próximamente"><i class="fa fa-clock" '
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
            //$(divs[0]).find('a').attr( "href", "/admin/productos/delete/"+col_id[i]);

            console.log("celda: "+botones[i].tagName);

        }
        //tabla.draw();
        
        
        //console.log("columns: "+nodes[0].innerHTML);
        //nodes[0].innerHTML = "cambie";
        //$(nodes[0]).append( $('<i >Aqui escribi</i>') );

        //console.log("element1: "+nodes[0]);
        //.addClass( 'estadook' );
    } ).dataTable();

    });
