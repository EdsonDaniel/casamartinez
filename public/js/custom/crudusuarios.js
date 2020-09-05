var tabla;
var tabla2;

  $(document).ready(function() {
    tabla = $('#tabla').DataTable( {
        "ajax": {
            url: '/admin/usuarios/activos/ajax',
            dataSrc: ''
        },
        columns: [
            { 
              "data": "name",
              "className": 'text-left' 
            },
            { 
              "data": "last_name",
              "className": 'text-left'
            },
            { 
              "data": "email",
              "className": 'text-left'
            },
            { 
              "data": "created_at",
              "orderable": false,
               render: function ( data, type, row ) {
                var date = new Date(data);
                return date.getDate()+"/"+date.getMonth()+"/"+date.getFullYear();
              }
            },
            { 
              "data": "tipo_usuario",
              "orderable": false,
              render: function ( data, type, row ) {
                switch(data){
                  case 1:
                    return '<span data-title="Cliente">'
                    +'<i class="fas fa-user-tag" style="color: blue;"></i></span>';
                    break;
                  case 2:
                    return '<span data-title="Cliente mayorista">'
                    +'<i class="fas fa-user-plus" style="color: darkblue;"></i></span>';
                    break;
                  case 3: 
                    return '<span data-title="Distribuidor">'
                    +'<i class="fas fa-dolly" style="color: darkgreen;"></i></span>';
                    break;
                  case 4:
                    return '<span data-title="Empleado">'
                    +'<i class="fas fa-user-cog" style="color: purple;"></i></span>';
                    break;
                  case 5:
                    return '<span data-title="Administrador">'
                    +'<i class="fas fa-user-shield" style="color: darkred;"></i></span>';
                    break;
                }
              }
            },
            { 
              "data": "active",
              "orderable": false,
              render: function ( data, type, row ) {
                if(data){
                  return '<span data-title="Activo"><i class="fas fa-check-circle" '
                  +'style="color:#20E738;"></i></span>';
                }
                return'<span data-title="Inactivo"><i class="fa fa-ban" '
                +' style="color:#c82333;"></i></span>';
              }
            },
            {
                "className":      'details-control text-center',
                "orderable":      false,
                "data":           null,
                render: function( data, type, row ){
                  var html = '<div class="botones">'
                  +'<div style="margin-right: 10px;">'
                  +' <a href="/admin/usuarios/detalles/'+row.id+'" class="actions" '
                  +' data-title="Detalles" >'
                  +'<i class="fas fa-info-circle" style="color:blue;"></i></a></div>'
                  
                  +'<div style="margin-right: 10px;">'
                  +' <a href="/admin/usuarios/detalles/'+row.id+'/?editar" class="actions"'
                  +' data-title="Editar" >'
                  +'<i class="fa fa-edit" style="background-color: white !important;'
                  +' color: darkblue;"></i></a></div>'
                  
                  +'<div> <button class="actions " data-title="Inhabilitar" '
                  +' onclick="baja_usuario(this)" >'
                  +'<i class="fas fa-folder-minus" style="color:red;"></i></button></div>'
                  +'</div>';
                  return html;
                }
            },
            {
                "data": "id",
                "className": "hidden"
            }

        ],
        "language": configIdioma
      });

    tabla2 = $('#tabla2').DataTable( {
        "ajax": {
            url: '/admin/usuarios/inactivos/ajax',
            dataSrc: ''
        },
        columns: [
            { 
              "data": "name",
              "className": 'text-left',
              render: function ( data, type, row ) {
                return data = row.name + " " + row.last_name;
              }
            },
            { 
              "data": "email",
              "className": 'text-left'
            },
            { 
              "data": "created_at",
              "orderable": false,
               render: function ( data, type, row ) {
                var date = new Date(data);
                return date.getDate()+"/"+date.getMonth()+"/"+date.getFullYear();
              }
            },
            { 
              "data": "updated_at",
              "orderable": false,
               render: function ( data, type, row ) {
                var date = new Date(data);
                return date.getDate()+"/"+date.getMonth()+"/"+date.getFullYear();
              }
            },
            { 
              "data": "tipo_usuario",
              "orderable": false,
              render: function ( data, type, row ) {
                switch(data){
                  case 1:
                    return '<span data-title="Cliente">'
                    +'<i class="fas fa-user-tag" style="color: blue;"></i></span>';
                    break;
                  case 2:
                    return '<span data-title="Cliente mayorista">'
                    +'<i class="fas fa-user-plus" style="color: darkblue;"></i></span>';
                    break;
                  case 3: 
                    return '<span data-title="Distribuidor">'
                    +'<i class="fas fa-dolly" style="color: darkgreen;"></i></span>';
                    break;
                  case 4:
                    return '<span data-title="Empleado">'
                    +'<i class="fas fa-user-cog" style="color: purple;"></i></span>';
                    break;
                  case 5:
                    return '<span data-title="Administrador">'
                    +'<i class="fas fa-user-shield" style="color: darkred;"></i></span>';
                    break;
                }
              }
            },
            { 
              "data": "active",
              "orderable": false,
              render: function ( data, type, row ) {
                if(data){
                  return '<span data-title="Activo"><i class="fas fa-check-circle" '
                  +'style="color:#20E738;"></i></span>';
                }
                return'<span data-title="Inactivo"><i class="fa fa-ban" '
                +' style="color:#c82333;"></i></span>';
              }
            },
            {
                "className":      'details-control text-center',
                "orderable":      false,
                "data":           null,
                "defaultContent": 
                '<div class="botones">'

                +'<div style="margin-right: 10px;">'
                +' <button class="actions" '
                +' data-title="Detalles" >'
                +'<i class="fas fa-info-circle" style="color:blue;"></i></button></div>'
                
                +'<div style="margin-right: 10px;">'
                +' <button class="actions" '
                +' data-title="Editar" >'
                +'<i class="fa fa-edit" style="background-color: white !important;'
                +' color: darkblue;"></i></button></div>'
                
                +'<div> <button class="actions " data-title="Habilitar" '
                +' onclick="baja_usuario(this)" >'
                +'<i class="fas fa-upload" style="color:green;"></i></button></div>'
                +'</div>'
            },
            {
                "data": "id",
                "className": "hidden"
            }

        ],
        "language": configIdioma
      });
         
    });

    var titulo_baja = "¿Desea Inhabilitar este usuario?";
    var titulo_alta = "¿Desea Habilitar este usuario?";

    var msg_baja    = "Una vez inhabilitado, el usuario no"
    +" podrá iniciar sesión ni utilizar las funcionalidades del sistema.";

    var msg_alta    = "Una vez habilitado, el usuario "
    +" podrá iniciar sesión y utilizar las funcionalidades del sistema con normalidad.";

    var tipos_usuario = ["No definido","Cliente","Cliente mayorista",
      "Distribuidor","Empleado","Administrador"];


    function baja_usuario(btn){
      var td = $(btn).closest("td")[0];
      var fila;
      var id_usuario;
      var usuario;

      //console.log($(btn).attr("data-title"));

      if($(btn).attr("data-title") == "Inhabilitar"){
        fila = tabla.cell(td).index().row;
        id_usuario = tabla.cell( fila, 7 ).data();
        usuario = tabla.cell(fila, 0).data() + " "
        + tabla.cell(fila, 1).data() + " (" 
        + tipos_usuario[tabla.cell(fila, 4).data()] + ")";
        
        $("#form_user").attr("action",'/admin/usuarios/baja/'+id_usuario);
        $("#title_eliminar").html(titulo_baja);
        $("#msg").html(msg_baja);
        $("#msg").css("color","red");
        $("#btn_borrar").addClass("btn-danger").removeClass("btn-success");
        $("#btn_borrar").text("Inhabilitar");
      }
      else {
        fila = tabla2.cell(td).index().row;
        //console.log(tabla2.cell(fila,0).data());
        id_usuario = tabla2.cell( fila, 7 ).data();
        //console.log(tabla2.cell(fila, 0));
        //console.log(tabla2.cell(fila, 0).node().innerText);
        usuario = tabla2.cell(fila, 0).node().innerText 
        + " (" + tipos_usuario[tabla2.cell(fila, 4).data()] + ")";
        
        $("#form_user").attr("action",'/admin/usuarios/alta/'+id_usuario);
        $("#title_eliminar").html(titulo_alta);
        $("#msg").html(msg_alta);
        $("#msg").css("color","darkblue");
        $("#btn_borrar").removeClass("btn-danger").addClass("btn-success");
        $("#btn_borrar").text("Habilitar");
      }
      
      $("#nombre_usuario").html('<ul><li>'+usuario+'</li></ul>');
     
      $('#modal-eliminar').modal({
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
        $("#modal-eliminar").modal('hide');
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
            tabla2.ajax.reload();
        });
        posting.fail(function(){
            $("#update_fail").removeClass("d-none");
            $("#btn_notify").removeClass("btn-success").addClass("btn-secondary");
            $("#modal_footer").removeClass("d-none");
            $("#msg_updating").addClass("d-none");
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