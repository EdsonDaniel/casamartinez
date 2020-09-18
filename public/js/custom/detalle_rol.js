  var rol_id = $("#id").text();
  var tabla;
  var tabla_empleados;
  var id_usuarios_rol;
  //var checked;

  $(document).ready(function() {
    tabla = $('#tabla').DataTable( {
        "ajax": {
            url: '/admin/roles/ajax/' + rol_id,
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
                  var html = '<div> <button class="btn btn_delete_user " data-title="Eliminar de rol" '
                    +' onclick="eliminar_usuario(this)" type="button" form="form_deleteUsuario"'
                    +' idUser="' + row.id + '" >'
                    +'<i class="fas fa-folder-minus" style="color:red;"></i></button></div>'
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
    $('#tabla').on( 'init.dt', function () {
      $("#count_users").html("(" + tabla.data().count() + ")");
      id_usuarios_rol = tabla.column(4).data().toArray();
    });

    tabla_empleados = $("#tabla_empleados").DataTable( {
      'ajax' : {
        url: '/admin/usuarios/empleados/ajax/',
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
                "className":      'details-control text-center',
                "orderable":      false,
                "data":           'id',
                render: function( data, type, row ){
                  var html = '<input type="checkbox" '
                  +'name="usuarios[]" form="form_addusuarios" '
                  +'value="'+data+'" id="'+data+'"> ';
                  return html;
                }
            }
        ],
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching" : false,
        "language": configIdioma
    } );

    $('#tabla_empleados').on( 'init.dt', function () {
     check_usuarios();
     validateAdminPrincipal();
    });

    tabla.on( 'draw', function () {
      id_usuarios_rol = tabla.column(4).data().toArray();
      $("#count_users").html("(" + tabla.data().count() + ")");
    });
    tabla_empleados.on('draw', function(){
      check_usuarios();
      validateAdminPrincipal();
    });

  });

  $('#modal-mensaje').on('hidden.bs.modal', function (e) {
    check_usuarios();
    });

  $("form_addusuarios").submit( function(event){
    event.preventDefault();
    $.post('/admin/roles/'+rol_id+'/add_usuarios/', $("#form_addusuarios").serialize())
    .done(function() {
      alert( "Usuarios actualizados satisfactoriamente." );
      tabla.ajax.reload();
      tabla_empleados.ajax.reload();
      // Set a timeout to hide the element again
      setTimeout(function(){
        $("#modal-mensaje").modal('hide');
      }, 300);
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
      // do something here if there is an error ;
      alert( "Ocurrió un error al actualizar los usuarios para el rol. "
        +"\nPor favor, intente recargar la página e intentarlo de nuevo."
        +"\n\nError: No se encontró al usuario seleccionado para añadir ó \n"
        +"éste no puede ser eliminado del rol." );
      $("#modal-mensaje").modal('hide');
    });
  });

  $("#collapse").click( function(){
    if($(this).children().hasClass("fa-chevron-circle-down")){
      expand_all();
      $("#collapse").children()
      .removeClass("fa-chevron-circle-down")
      .addClass("fa-chevron-circle-up");
      $(this).attr("data-title","Ocultar todos");
    }
    else{
      $("#collapse").children()
      .addClass("fa-chevron-circle-down")
      .removeClass("fa-chevron-circle-up");
      collapse_all();
      $(this).attr("data-title","Expandir todos");
    }
  });


  

  var coll = document.getElementsByClassName("collapsible");
  var i;
  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      if (content.style.maxHeight){
        content.style.maxHeight = null;
      } else {
        content.style.maxHeight = content.scrollHeight + "px";
      }
      content.classList.toggle("mb-3");
      if($(".active").length == $(".collapsible").length){
        $("#collapse").children()
        .removeClass("fa-chevron-circle-down")
        .addClass("fa-chevron-circle-up");
        $("#collapse").attr("data-title","Ocultar todos");
      }

      if($(".active").length == 0){
        $("#collapse").children()
        .addClass("fa-chevron-circle-down")
        .removeClass("fa-chevron-circle-up");
        $("#collapse").attr("data-title","Expandir todos");
      }
    });
  }
  function expand_all(){
    $(".collapsible").addClass('active');
    $(".contenido").addClass("mb-3");
    $.each( $(".contenido"), function() {
      this.style.maxHeight = this.scrollHeight + "px";
    });
  }
  function collapse_all(){
    $(".collapsible").removeClass('active');
    $(".contenido").removeClass("mb-3").css("max-height","");
    //$("html, body").animate({ scrollTop: $("#card_permisos").offset().top }, 200);
  }
  
  function launch_modal(){
    $("#nombre_rol").html($("#name").val());
    var seleccionados = $("input:checked");
    var lista = "";
    for (var i = 0; i < seleccionados.length; i++) {
      lista += '<li>' + $(seleccionados[i]).next().text() + '</i>';
    }
    $("#lista_permisos").html('<ul>' + lista + '</ul>');

    $('#modal-mensaje').modal({
      backdrop: 'static'
    });
  }

  $(".submit").click( function(){
    if( isValid($("#name")) && isValid($("#description")) && havePermissions() )
      launch_modal();
  });

  function isValid(campo){
    if( campo.val() != ""){
      campo.removeClass("border-danger").next().addClass("d-none");
      return true;
    }
    campo.addClass("border-danger").focus();
    campo.next().removeClass("d-none");
    return false;
  }
  function havePermissions(){
    if($("input:checked").length > 0){
      $("#e-p").addClass("d-none");
      return true;
    }
    $("#e-p").removeClass("d-none");
    $("html, body").animate({ scrollTop: $("#card_permisos").offset().top }, 800);
    return false;

  }

  $('#form_addusuarios').submit(function(event){
    event.preventDefault();
    var $form = $( this ),
    url = $form.attr( "action" ),
    $modal_notify = $("#modal-notify");
    $("#modal-mensaje").modal('hide');
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
        tabla_empleados.ajax.reload();
    });
    posting.fail(function(jqXHR, textStatus, errorThrown){
        $("#update_fail").removeClass("d-none");
        $("#btn_notify").removeClass("btn-success").addClass("btn-secondary");
        $("#modal_footer").removeClass("d-none");
        $("#msg_updating").addClass("d-none");
        $("#msg_fail").html("Error inesperado. <br>Recarga la página e inténtalo de nuevo.");
        $("#msg_fail").removeClass("d-none");
    });
});

  $(".delete").click( function(){
    var msg = "Al eliminar un rol, los usuarios relacionados al mismo, "+
    "perderán todos los permisos que tenían otorgados por medio de este.  ";
    if (confirm("¿Desea ELIMINAR este rol?\n- "
      + msg)) {
      $("#form_deleteRol").submit();
    }
  })

  $('#form_deleteUsuario').submit(function(event){
    //event.preventDefault();
    //launch_modal_result($( this ));
  });

  function eliminar_usuario(button){
    var url = '/admin/roles/'+ rol_id + '/delete_usuarios/' + $(button).attr("idUser");
    if (confirm("¿Desea remover este usuario del rol?")) {
      $("#form_deleteUsuario").attr("action",url);
      $("#form_deleteUsuario").submit();
    }
  }

function launch_modal_result(form){
  var url = form.attr( "action" ),
  $modal_notify = $("#modal-notify");
  $modal_notify.modal({
        backdrop: 'static'
    });

    // Send the data using post
    var posting = $.post( url, form.serialize() );
    posting.done(function( data ) {
        $("#update_success").removeClass("d-none");
        $("#modal_footer").removeClass("d-none");
        $("#btn_notify").addClass("btn-success").removeClass("btn-secondary");
        $("#msg_updating").addClass("d-none");
        tabla.ajax.reload();
        tabla_empleados.ajax.reload();
    });
    posting.fail(function(jqXHR, textStatus, errorThrown){
        $("#update_fail").removeClass("d-none");
        $("#btn_notify").removeClass("btn-success").addClass("btn-secondary");
        $("#modal_footer").removeClass("d-none");
        $("#msg_updating").addClass("d-none");
        $("#msg_fail").html("Error inesperado. <br>Recarga la página e inténtalo de nuevo.");
        $("#msg_fail").removeClass("d-none");
        console.log(jqXHR);
    });
}
  
  var empleados;
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


 function check_usuarios() {
    var checkbox = tabla_empleados.column(2).nodes().to$();
    for (var i = 0; i < checkbox.length; i++) {
      if(id_usuarios_rol.includes(parseInt($(checkbox[i]).children()[0].id))){
        $(checkbox[i]).children()[0].checked = true;
      }
    }
  }

function validateAdminPrincipal(){
  if(rol_id == 1 && id_usuarios_rol.includes(1)){
    $td = $("#1").parent();
    $("#1").attr("type","hidden")
             .addClass("d-none");
    $td.html($("#1"));
    $td.append('<i class="fas fa-check-square text-primary"></i>');
    $td.attr("data-title","Este usuario no \npuede ser removido del rol.");
  }
}

function enabled_campos(){
  $(".edit").addClass("d-none");
  $(".cancel, #footer-update").removeClass("d-none");
  $("#name, #description").removeAttr("disabled");
}

function cancel(){
  $(".cancel, #footer-update").addClass("d-none");
  $(".edit").removeClass("d-none");
  $("#name, #description").attr("disabled","true");
  $("#name").val(rol.name);
  $("#description").val(rol.description);
}

$(".edit").click( function(){
  enabled_campos();
});

$(".cancel, #f-cancel").click( function(){
  cancel();
});