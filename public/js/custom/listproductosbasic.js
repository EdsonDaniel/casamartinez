var tabla, tabla2;
$(document).ready( function() {
    tabla = $('#tabla').DataTable( {
        "ajax": {
            url: '/admin/productos/ajax',
            dataSrc: ''
        },
        columns: [
            { "data": "nombre", "className": 'text-left'},
            { "data": "marca" },
            { "data": "presentacion" },
            { "data": "precio_consumidor",
              render: function ( data, type, row ) {
                return "$"+data;
              }
            },
            { "data": "stock"},
            { "data": "estado_presentacion",
                "className": 'estado',
                "orderable": false
            },
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           "id_presentacion",
                render: function ( data, type, row){
                    var html = '<div class="botones">'
                      +'<div style="margin-right: 10px;"> '
                      +'<a class="actions" data-title="Ver detalles" '
                      +'href="/admin/productos/detalles/' + row.producto_id +'" >'
                      + '<i class="fa fa-info-circle" style="color: blue;"></i></a></div>'
                      +'<div style="margin-right: 10px;"> '
                      +' <a class="actions" data-title="Editar" '
                      +' href="/admin/productos/detalles/' + row.producto_id +'" >'
                      + '<i class="fa fa-edit" style="background-color: white; color: darkblue;">'
                      +' </i></a></div>'
                      +'<div > <button class="btn actions" data-title="Dar de baja" '
                      +' onclick="delete_producto(this)" idPresentacion="'+data+'">'
                      + '<i class="fa fa-trash-alt" style="color:red;"></i></button></div>'
                      +'</div>';
                    return html;
                }
            },
            {
                "data": "producto_id",
                "className": "hidden"
            }

        ],
        "language": configIdioma
    });

           
    $('#tabla').on( 'init.dt', function () {
        var nodes = tabla.column(5).nodes().to$();
        var col_id = tabla.column(7).data();
        var botones = tabla.column(6).nodes().to$();
        
        for (var i = 0; i < nodes.length; i++) {
            switch(nodes[i].innerHTML){

                case '-1': 
                $(nodes[i]).html($('<span data-title="Dado de baja"><i class="fas fa-folder-minus" '
                    +' style="color:#c82333;"></i></span>'));
                break;

                case '0': 
                $(nodes[i]).html($('<span data-title="Agotado"><i class="fa fa-ban" '
                    +' style="color:#c82333;"></i></span>'));
                break;

                case '1': 
                $(nodes[i]).html($('<span data-title="Disponible"><i class="fas fa-check-circle" '
                 +'style="color:#20E738;"></i></span>'));
                break;
                /*
                case '2': 
                $(nodes[i]).html($('<span data-title="Pocas existencias"><i class="fa fa-exclamation-triangle" '
                    +' style="color:#FFFA4B;"></i></span>'));
                break;
                
                case '3': 
                $(nodes[i]).html($('<span data-title="Próximamente"><i class="fa fa-clock" '
                    +'style="color:black;"></i></span>'));
                break;
                */

            }
        }
    } ).dataTable();

    tabla2 = $('#tabla2').DataTable( {
        "ajax": {
            url: '/admin/productos/baja/ajax',
            dataSrc: ''
        },
        columns: [
            { "data": "nombre", "className": 'text-left'},
            { "data": "marca" },
            { "data": "presentacion" },
            { "data": "precio_consumidor",
              render: function ( data, type, row ) {
                return "$"+data;
              }
            },
            { "data": "stock"},
            { "data": "estado_presentacion",
                "className": 'estado',
                "orderable": false
            },
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           "id_presentacion",
                render: function ( data, type, row){
                    var html = '<div class="botones">'
                      +'<div style="margin-right: 10px;"> '
                      +'<a class="actions" data-title="Ver detalles" '
                      +'href="/admin/productos/detalles/' + row.producto_id +'" >'
                      + '<i class="fa fa-info-circle" style="color:blue;"></i></a></div>'
                      +'<div style="margin-right: 10px;"> '
                      +' <a class="actions" data-title="Editar" '
                      +'href="/admin/productos/detalles/' + row.producto_id +'" >'
                      + '<i class="fa fa-edit" style="background-color: white; color: darkblue;">'
                      +' </i></a></div>'
                      +'<div > <button class="btn actions" data-title="Dar de alta" '
                      +' onclick="upload_producto(this)" idPresentacion="'+data+'">'
                      + '<i class="fas fa-upload" style="color:green;"></i></button></div>'
                      +'</div>';
                    return html;
                }
            },
            {
                "data": "producto_id",
                "className": "hidden"
            }

        ],
        "language": configIdioma
    });

    $('#tabla2').on( 'init.dt', function () {
        var nodes = tabla2.column(5).nodes().to$();
        var col_id = tabla2.column(7).data();
        var botones = tabla2.column(6).nodes().to$();
        
        for (var i = 0; i < nodes.length; i++) {
            switch(nodes[i].innerHTML){
                case '-1': 
                $(nodes[i]).html($('<span data-title="Dado de baja"><i class="fas fa-folder-minus" '
                    +' style="color:#c82333;"></i></span>'));
                break;

                case '0': 
                $(nodes[i]).html($('<span data-title="Agotado"><i class="fa fa-ban" '
                    +' style="color:#c82333;"></i></span>'));
                break;

                case '1': 
                $(nodes[i]).html($('<span data-title="Disponible"><i class="fas fa-check-circle" '
                 +'style="color:#20E738;"></i></span>'));
                break;

            }
        }
    } ).dataTable();
    

});

function delete_producto(button){
    var id = $(button).attr("idPresentacion");
    var url = "/admin/productos/delete_presentacion/" + id;
    $("#form_delete_product").attr("action",url);

    var td = $(button).closest("td")[0];
    var fila = tabla.cell(td).index().row;
    var nombre = tabla.cell( fila, 0 ).data();
    nombre += " " + tabla.cell( fila, 2 ).data();
    
    $("#nombre_producto").html('<ul><li>'+nombre+'</li></ul>');
    
    $("#title_baja").removeClass("d-none");
    $("#title_alta").addClass("d-none");
    $("#msg_baja").removeClass("d-none");
    $("#msg_alta").addClass("d-none");
    $("#btn_baja").removeClass("d-none");
    $("#btn_alta").addClass("d-none");
    
    $('#modal-eliminar').modal({
      backdrop: 'static'
  });
}

function upload_producto(button){
    var id = $(button).attr("idPresentacion");
    var url = "/admin/productos/upload_presentacion/" + id;
    $("#form_upload_product").attr("action",url);

    var td = $(button).closest("td")[0];
    var fila = tabla2.cell(td).index().row;
    var nombre = tabla2.cell( fila, 0 ).data();
    nombre += " " + tabla2.cell( fila, 2 ).data();
    
    $("#nombre_producto").html('<ul><li>'+nombre+'</li></ul>');

    $("#title_alta").removeClass("d-none");
    $("#title_baja").addClass("d-none");
    $("#msg_alta").removeClass("d-none");
    $("#msg_baja").addClass("d-none");
    $("#btn_alta").removeClass("d-none");
    $("#btn_baja").addClass("d-none");
    $('#modal-eliminar').modal({
      backdrop: 'static'
  });
}

$('form').submit(function(event){
    event.preventDefault();
    var $form = $( this ),
    url = $form.attr( "action" ),
    $modal_notify = $("#modal-notify");
    $("#modal-eliminar").modal('hide');
    $modal_notify.modal({
        backdrop: 'static'
    });

    // Send the data using post
    var posting = $.post( url, $form.serialize() );
    posting.done(function( data ) {
        tabla.ajax.reload();
        tabla2.ajax.reload();
        $("#update_success").removeClass("d-none");
        $("#modal_footer").removeClass("d-none");
        $("#btn_notify").addClass("btn-success").removeClass("btn-secondary");
        $("#msg_updating").addClass("d-none");
    });
    posting.fail(function(jqXHR, textStatus, errorThrown){
        $("#update_fail").removeClass("d-none");
        $("#btn_notify").removeClass("btn-success").addClass("btn-secondary");
        $("#modal_footer").removeClass("d-none");
        $("#msg_updating").addClass("d-none");
        $("#msg_fail").removeClass("d-none");
        $("#msg_fail").html("Error inesperado. <br>Recarga la página e inténtalo de nuevo.");
    });
});

var configIdioma = {
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
};