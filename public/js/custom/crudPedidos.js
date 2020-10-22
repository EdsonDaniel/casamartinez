var tabla;
var click_agregar = false;
    $(document).ready(function() {
      tabla = $('#tabla').DataTable( {
          "ajax": {
              url: '/admin/pedidos/ajax',
              dataSrc: ''
          },
          "order": [[ 7, "desc" ]],
          columns: [
              { 
                "data": "id"
              },
              { 
                "data": "metodo_pago",
                "className": 'text-left'
              },
              { 
                "data": "estado",
                render: function ( data, type, row ) {
                  switch(data){
                    case 0: 
                      return '<span data-status="0" class="text-warning">Pendiente de envío</span>';
                    case 1: 
                      return '<span data-status="1" class="text-primary">Enviado</span>';
                    case 2: 
                      return '<span data-status="2" class="text-success">Entregado</span>';
                    case 3: 
                      return '<span data-status="3" class="text-secondary">Devuelto</span>';
                    case -1: 
                      return '<span data-status="-1" class="text-danger">Cancelado</span>';
                    default:
                      return data;
                  }
                }
              },
              { 
                "data": "created_at",
                "className": 'text-left',
                render: function ( data, type, row ) {
                  var d = new Date(data);
                  return d.toLocaleString();
                }
              },
              { 
                "data": "fecha_entrega",
                render: function ( data, type, row ) {
                  if (data) {
                    var d = new Date(data);
                    return d.toLocaleString();
                  }
                  return '---';
                }
              },
              { 
                "data": "paqueteria",
                render: function ( data, type, row ) {
                  if (!data)
                    return '---';
                  return data;
                },
              },
              { 
                "data": "monto_total",
                render: function ( data, type, row ) {
                  return '$'+ data;
                }
              },
              { 
                "data": "updated_at",
                "className": 'text-left',
                render: function ( data, type, row ) {
                  var d = new Date(data);
                  return d.toLocaleString();
                }
              },
              {
                  "className":      'details-control text-center',
                  "orderable":      false,
                  "data":           "id",
                  render: function (data, type, row){
                    var html = '<div class="botones">';
                    var id = row.id;
                    switch(row.estado){
                      case 0: 
                        html += ('<div style="margin-right: 5px;">'
                            +' <button class="actions" '
                            +' data-title="Marcar como enviado" data-id="' + id +'" '
                            +' onclick="enviar(this)">'
                            +'<i class="fas fa-truck-loading text-success" '
                            + 'style="background-color: white !important;" ></i>'
                            +'</button></div>');
                      break;
                      
                      case 1: 
                        html += ('<div style="margin-right: 5px;">'
                            +' <button class="actions" '
                            +' data-title="Marcar como entregado" data-id="' + id +'" '
                            +' onclick="entregado(this)">'
                            +'<i class="fas fa-user-check text-blue"  '
                            + 'style="background-color: white !important;" ></i>'
                            +'</button></div>');
                      break;
                      
                      case 2: 
                        html += ('<div style="margin-right: 5px;">'
                            +' <button class="actions" '
                            +' data-title="Crear Devolución" data-id="' + id +'" '
                            +' >'
                            +'<i class="fas fa-exchange-alt text-gray" '
                            + 'style="background-color: white !important;" ></i>'
                            +'</button></div>');
                      break;
                    }
                    /*if (row.estado == 0) {
                      html += ('<div style="margin-right: 10px;">'
                      +' <button class="actions" '
                      +' data-title="Marcar como enviado" data-id="' + id +'" '
                      +' onclick="enviar(this)">'
                      +'<i class="fas fa-truck-loading text-success" '
                      + 'style="background-color: white !important;" ></i>'
                      +'</button></div>');
                    }*/
                    html += '<div style="margin-right: 5px;">'
                      +' <button class="actions" data-id="' + id +'" '
                      +' data-title="Detalles" onclick="edit_caract(this)">'
                      +'<i class="fas fa-info-circle" style="background-color: white !important;'
                      +' color: darkblue;"></i></button></div>';
                      
                    if (row.estado != 3 && row.estado != -1){
                      html += '<div> <button class="actions " data-id="' + id +'" '
                      +'data-title="Cancelar pedido" '
                      +' onclick="cancelarPedido(this)" >'
                      +'<i class="far fa-window-close" style="color:red;"></i></button></div>'
                      +'</div>';
                    }
                    return html;
                  }
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

      $('#tabla').on( 'draw.dt', function () {
        setStatus();
      });
           
    });

    function setStatusRow(){
      $("span[data-status]").each( function(){
        var row = $(this).closest('tr');
        switch ($(this).data("status")){
          case 0: 
            row.addClass('row-warning');
            return;
          case 1: 
            row.addClass('row-primary');
            return;
          case 2: 
            row.addClass('row-success');
            return;
          case 3: 
            row.addClass('row-secondary');
            return;
          case -1: 
            row.addClass('row-danger');
            return;
          default:
            row.addClass('row-danger');
            return;
        }
      });
    }

    function setStatus(){
      $("span[data-status]").each( function(){
        var row = $(this).closest('td');
        switch ($(this).data("status")){
          case 0: 
            row.addClass('row-warning');
            return;
          case 1: 
            row.addClass('row-primary');
            return;
          case 2: 
            row.addClass('row-success');
            return;
          case 3: 
            row.addClass('row-secondary');
            return;
          case -1: 
            row.addClass('row-danger');
            return;
          default:
            row.addClass('row-danger');
            return;
        }
      });
    }

     //listener btn on datatable
  function enviar(btn){
    var pedido_id = $(btn).data("id");
    var td = $(btn).closest("td")[0];
    var fila = tabla.cell(td).index().row;
    
    var no_pedido = tabla.cell(fila, 0 ).data();
    var fecha_creacion = new Date( tabla.cell(fila, 3 ).data()).toLocaleString();
    var monto = tabla.cell(fila, 6 ).data();
    //console.log(nombre, " ", description);
    
    $("#modelo").html('<span class="mt-0 pt-0 text-dark">No. pedido: </span>'
      + no_pedido + '<br> <span class="mt-0 pt-0 text-dark">Fecha de creación: </span>'
      + fecha_creacion + '<br> <span class="mt-0 pt-0 text-dark">Monto: </span>'
      + '$'+monto);
    var msg = "Al dar click en Aceptar se enviará un e-mail al cliente para " 
            + "notificarle que su pedido ha sido enviado. ";
    $("#form_pedidos").attr("action","/admin/pedidos/enviar/"+pedido_id);
    
    launch_modal(1, "Enviar confirmación de envío", msg);
  }

function entregado(btn){
    var pedido_id = $(btn).data("id");
    var td = $(btn).closest("td")[0];
    var fila = tabla.cell(td).index().row;
    
    var no_pedido = tabla.cell(fila, 0 ).data();
    var fecha_creacion = new Date( tabla.cell(fila, 3 ).data()).toLocaleString();
    var monto = tabla.cell(fila, 6 ).data();
    //console.log(nombre, " ", description);
    
    $("#modelo").html('<span class="mt-0 pt-0 text-dark">No. pedido: </span>'
      + no_pedido + '<br> <span class="mt-0 pt-0 text-dark">Fecha de creación: </span>'
      + fecha_creacion + '<br> <span class="mt-0 pt-0 text-dark">Monto: </span>'
      + '$'+monto);
    var msg = "Este pedido será marcado como entregado.";
    $("#form_pedidos").attr("action","/admin/pedidos/entregado/"+pedido_id);
    $("#form_pedidos :input").prop("required", "true");
    
    launch_modal(2, "Envío entregado", msg);
}

function cancelarPedido(btn){
    var pedido_id = $(btn).data("id");
    var td = $(btn).closest("td")[0];
    var fila = tabla.cell(td).index().row;
    
    var no_pedido = tabla.cell(fila, 0 ).data();
    var fecha_creacion = new Date( tabla.cell(fila, 3 ).data()).toLocaleString();
    var monto = tabla.cell(fila, 6 ).data();
    //console.log(nombre, " ", description);
    
    $("#modelo").html('<span class="mt-0 pt-0 text-dark">No. pedido: </span>'
      + no_pedido + '<br> <span class="mt-0 pt-0 text-dark">Fecha de creación: </span>'
      + fecha_creacion + '<br> <span class="mt-0 pt-0 text-dark">Monto: </span>'
      + '$'+monto);
    var msg = "Este pedido será cancelado.";
    $("#form_pedidos").attr("action","/admin/pedidos/cancelado/"+pedido_id);
    $("#form_pedidos :input").prop("required", "true");
    
    launch_modal(3, "Cancelar pedido", msg);
}


  function launch_modal(accion, title, msg=""){
    if(accion == 1){
      $("#div_form_update").removeClass("d-none");
    }
    $("#titulo_acciones").html(title);
    $("#msg").html(msg);
    $('#modal_acciones').modal({
        backdrop: 'static'
    });
  }
  $("#modal_acciones").on('hidden.bs.modal', function (e) {
    $("#form_pedidos :input").prop("required", "false");
  });
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

   
    function addListener(){
      $("#update_new_modal").click(function(){
        var lista_editados="";
        var error = false;

        if($("#nombre").val() == "" || $("#descripcion").val() == "")
          error = true;

        else
        {
          if($("#nombre").val().localeCompare(
          tabla.cell($(this).attr("fila"), 0 ).data()) != 0)
          {
            lista_editados+="<li><strong>Nombre: </strong>"+$("#nombre").val()+"</li>";
          }
          if($("#descripcion").val().localeCompare(
          tabla.cell($(this).attr("fila"), 1 ).data()) != 0)
          {
            lista_editados+="<li><strong>Descripción: </strong>"
            +$("#descripcion").val()+"</li>";
          }
        }
        
        if(lista_editados != '')
        {
          $("#div_form_update").addClass("d-none");

          $("#new_modal").find(".modal-title").html('<span><i class="fa fa-exclamation-circle"'
              +'style="color: #EFB810 !important;"></i>'
              +'</span> ¿Desea aplicar los siguientes cambios?');
          
          var $new_p = $( "<p style='margin:0; font-weight:bold; color:#0069d9;'"
              +">Campos editados:</p>" );
          var ul = document.createElement('ul');
          $(ul).html(lista_editados);
          $("#msg").html("");
          $("#msg").css("color","inherit");
          $("#msg").append($new_p);
          $("#msg").append(ul);
          $("#msg2").removeClass("d-none");
          
          $("#save_new_modal").removeClass('d-none');
          $("#update_new_modal").addClass('d-none');

          var id_caract = tabla.cell($(this).attr("fila"), 3 ).data();
          $("#form_carac").attr("action",'/admin/caracteristicas/update/'+id_caract);
        } 
        else
        {
          var msg = "Intente cambiar el valor de alguna característica.";
          var title_modal = " No se registraron cambios";
          if (error){
            msg = "Debe llenar todos los campos."
            title_modal = " Datos inválidos";
          }
          $("#msg").html(msg);
          $("#msg").css("color","red");
          $("#new_modal").find(".modal-title").html('<span><i class="fa fa-exclamation-circle"'
              +'style="color: #EFB810 !important;"></i>'
              +'</span>'+title_modal);
          $("#save_new_modal").addClass('d-none');
          $("#update_new_modal").removeClass('d-none');
        }
      });
      $('#new_modal').on('shown.bs.modal', function (e) {
        if(click_agregar)
          $("#nombre").focus();
        else
          $("#descripcion").focus();
      });
      $('#new_modal').on('hidden.bs.modal', function (e) {
        $("#msg2").addClass("d-none");
        $("#form_carac").removeAttr("action");
        $("#delete_new_modal").addClass("d-none");
        $("#add_new_modal").addClass("d-none");
        $("#update_new_modal").removeClass("d-none");
        $("#cancel_new_modal").addClass("btn-danger").removeClass("btn-primary");
        $("#div_form_update input,textarea").attr("disabled", false);
        $("#div_form_update").removeClass("d-none");
        click_agregar = false;
      });
    }

    
    $("#modal-notify").on('hidden.bs.modal', function (e) {
      $("#modal_footer").addClass("d-none");
      $("#update_success").addClass("d-none");
      $("#update_fail").addClass("d-none");
      $("#msg_updating").removeClass("d-none");
    });

   
   