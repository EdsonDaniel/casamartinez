var tabla;

$(document).ready(function() {
  tabla = $('#tabla').DataTable( {
      "ajax": {
          url: '/admin/entradas/ajax',
          dataSrc: ''
      },
      columns: [
        { 
          "data": "created_at",
          "orderable": false,
           render: function ( data, type, row ) {
            var date = new Date(data);
            return date.getDate()+"/"+date.getMonth()+"/"+date.getFullYear();
          }
        },
        { 
          "data": "nombre_producto",
          "className": 'text-left' 
        },
        { 
          "data": "cantidad",
          "orderable":false,
          "className": 'text-left'
        },
        { 
          "data": "lote_granel",
          "orderable": false
        },
        { 
          "data": "lote_envasado",
          "orderable": false
        },
        {
          "className":      'details-control text-center',
          "orderable":      false,
          "data":           'id',
          render: function( data, type, row ){
            var html = '<div class="botones">'
            +'<div style="margin-right: 10px;">'
            +' <a href="/admin/roles/detalles/'+data+'" class="actions"'
            +' data-title="Detalles" " >'
            +'<i class="fas fa-info-circle" style="color: blue;">'
            +'</i></a></div>'
            

            +'<div style="margin-right: 10px;">'
            +' <a href="/admin/roles/detalles/'+data+'/" class="actions"'
            +' data-title="Editar" " >'
            +'<i class="fa fa-edit" style="background-color: white !important;'
            +' color: darkblue;"></i></a></div>'
            
            +'<div> <button class="actions " data-title="Eliminar" '
            +' onclick="eliminar_entrada(this)"'
            +' entrada_id="'+data+'" producto_id = "'+row.producto_id+'">'
            +'<i class="far fa-trash-alt" style="color:red;"></i></button></div>'
            +'</div>';
            return html;
          }
        }
      ],
      "language": configIdioma
  });

  

});


  //listener btn on datatable
  function eliminar_entrada(btn){
    var entrada_id = $(btn).attr("entrada_id");
    var producto_id = $(btn).attr("producto_id");
    var td = $(btn).closest("td")[0];
    var fila = tabla.cell(td).index().row;
    
    var fecha_entrada = tabla.cell(fila, 0 ).data();
    var nombre = tabla.cell(fila, 1 ).data();
    var cantidad = tabla.cell(fila, 2 ).data();
    console.log(nombre, " ", description);
    
    $("#modelo").html('<span class="mt-0 pt-0 text-dark">Fecha de entrada: </span>'
      + fecha_entrada + '<br> <span class="mt-0 pt-0 text-dark">Producto: </span>'
      + nombre + '<br> <span class="mt-0 pt-0 text-dark">Cantidad: </span>'
      + cantidad);
    var msg = '<span style="font-size:1.2rem;">ADVERTENCIA:</span><BR>'+
    "<ul><li>Una vez eliminada, <strong>NO SE PODRÁN RECUPERAR LOS DATOS.</strong><li>"
    + '<li>Al eliminar esta entrada no se modificará el stock actual del producto. <br></li>'
    'Si necesita actualizar el stock ANTES DE ELIMINAR LA ENTRADA, haga <a href="/admin/productos/detalles/'+producto_id
    + '" >click aquí.</a> Después puede proceder a eliminar la entrada.</li>';
    $("#form_roles").attr("action","/admin/roles/delete/"+rol_id);
    
    launch_modal(1, "¿Desea eliminar esta entrada?", msg);
  }


  function launch_modal(accion, title, msg=""){
    $("#titulo_acciones").html(title);
    $("#msg").html(msg);
    $('#modal_acciones').modal({
        backdrop: 'static'
    });
}
  $("#modal-notify").on('hidden.bs.modal', function (e) {
    $("#modal_footer").addClass("d-none");
    $("#update_success").addClass("d-none");
    $("#update_fail").addClass("d-none");
    $("#msg_updating").removeClass("d-none");
  });

  $('form').submit(function(event){
      event.preventDefault();
      var $form = $( this ),
      url = $form.attr( "action" ),
      $modal_notify = $("#modal-notify");
      $("#modal_acciones").modal('hide');
      $modal_notify.modal({
          backdrop: 'static'
      });

      // Send the data using post
      var posting = $.post( url, $form.serialize() );
      posting.done(function( data ) {
          $("#update_success").removeClass("d-none");
          $("#modal_footer").removeClass("d-none");
          $("#btn_notify").addClass("btn-success").removeClass("btn-secondary");
          $("#msg_updating").addClass("d-none");

          tabla.ajax.reload();
      });
      posting.fail(function(jqXHR, textStatus, errorThrown){
          $("#update_fail").removeClass("d-none");
          $("#btn_notify").removeClass("btn-success").addClass("btn-secondary");
          $("#modal_footer").removeClass("d-none");
          $("#msg_updating").addClass("d-none");
          console.log(jqXHR);
          $("#msg_fail").html(jqXHR.responseText);
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