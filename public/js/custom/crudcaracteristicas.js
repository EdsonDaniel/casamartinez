var tabla;
var click_agregar = false;
    $(document).ready(function() {
      tabla = $('#tabla').DataTable( {
          "ajax": {
              url: '/admin/caracteristicas/ajax',
              dataSrc: ''
          },
          columns: [
              { 
                "data": "nombre",
                "className": 'text-left' 
              },
              { 
                "data": "descripcion",
                "className": 'text-left'
              },
              {
                  "className":      'details-control text-center',
                  "orderable":      false,
                  "data":           null,
                  "defaultContent": 
                  '<div class="botones">'
                  +'<div style="margin-right: 10px;">'
                  +' <button class="actions" '
                  +' data-title="Editar" onclick="edit_caract(this)">'
                  +'<i class="fa fa-edit" style="background-color: white !important;'
                  +' color: darkblue;"></i></button></div>'
                  
                  +'<div> <button class="actions " data-title="Eliminar" '
                  +' onclick="delete_caract(this)" >'
                  +'<i class="fa fa-trash-alt" style="color:red;"></i></button></div>'
                  +'</div>'
              },
              {
                  "data": "id",
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
        var col_id = tabla.column(3).data();
        var botones = tabla.column(2).nodes().to$();
        
        for (var i = 0; i < botones.length; i++) {                    
            var divs = botones[i].childNodes;
            $(divs[0]).find('button')
            .attr( "id_caracteristica", col_id[i] );
            $(divs[1]).find('button')
            .attr( "id_caracteristica", col_id[i] );
        }
    } ).dataTable();
           
    });

    function delete_caract(btn){
      var modal = $("#new_modal");
      var td = $(btn).closest("td")[0];
      var indices_celda = tabla.cell(td).index();
      
      if(modal.length == 0){
        modal = create_modal($("#form_carac"));
        addListener();
      }
      $(modal).find(".modal-title")
      .html('<span><i class="fa fa-exclamation-circle"'
              +'style="color: red !important;"></i>'
              +'</span> ¿Desea Elimnar ésta caracteristica?');

      $("#nombre").val(tabla.cell( indices_celda.row, 0 ).data());
      $("#descripcion").val(tabla.cell( indices_celda.row, 1 ).data());
      
      $("#save_new_modal").addClass("d-none");
      $("#update_new_modal").addClass("d-none");
      $("#div_form_update input,textarea").attr("disabled", true);
      $("#cancel_new_modal").removeClass("btn-danger").addClass("btn-primary");
      $("#delete_new_modal").removeClass("d-none");
      
      $("#msg").html('<ul style="color:red;" class="p-4">'
        +'<li>Los datos de ésta característica para '
        +'los productos relacionados se perderán.</li>'
        +'<li><strong>No se podrán recuperar los datos'
        +' una vez eliminados.</strong></li>');

      var id_caract = tabla.cell(indices_celda.row, 3 ).data();
      $("#form_carac").attr("action",'/admin/caracteristicas/delete/'+id_caract);
     
      $(modal).modal({
          backdrop: 'static'
      });
    }

    function edit_caract(btn){
      var modal = $("#new_modal");
      var td = $(btn).closest("td")[0];
      var indices_celda = tabla.cell(td).index();
      if(modal.length == 0){
        modal = create_modal($("#form_carac"));
        addListener();
      }
      //console.log(new Date("2020-03-24 06:17:58").toString());
      $(modal).find(".modal-title")
      .html('<span><i class="fa fa-exclamation-circle"'
              +'style="color: #EFB810 !important;"></i>'
              +'</span> Editar característica');

      $("#nombre").val(tabla.cell( indices_celda.row, 0 ).data());
      
      //$("#descripcion").text(tabla.cell( indices_celda.row, 1 ).data());
      $("#descripcion").val("");
      $("#descripcion").val(tabla.cell( indices_celda.row, 1 ).data());
      $("#update_new_modal").attr("fila",indices_celda.row);
      $("#update_new_modal").removeClass("d-none");
      $("#save_new_modal").addClass("d-none");
      $("#div_form_update").removeClass("d-none");
      $("#msg").html("");
     
      $(modal).modal({
          backdrop: 'static'
      });
    }

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

    $("#add_new_caract").click(function(){
      var modal = $("#new_modal");
      if(modal.length == 0){
        modal = create_modal($("#form_carac"));
        addListener();
      }
      $(modal).find(".modal-title")
      .html('<span><i class="fa fa-exclamation-circle"'
              +'style="color: darkblue !important;"></i>'
              +'</span> Agregar nueva característica');

      $("#nombre").val("");
      $("#descripcion").val("");

      $("#save_new_modal").addClass("d-none");
      $("#update_new_modal").addClass("d-none");
      $("#add_new_modal").removeClass("d-none");

      $("#form_carac").attr("action",'/admin/caracteristicas/');
      $("#msg").html("");
      click_agregar = true;
     
      $(modal).modal({
          backdrop: 'static'
      });
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
        $("#new_modal").modal('hide');
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
        posting.fail(function(){
            $("#update_fail").removeClass("d-none");
            $("#btn_notify").removeClass("btn-success").addClass("btn-secondary");
            $("#modal_footer").removeClass("d-none");
            $("#msg_updating").addClass("d-none");
        });
    });

    function create_modal(parent_element, id_modal = 'new_modal'){
        var div_modal = document.createElement('div');
        $(div_modal).attr('class', 'modal fade');
        $(div_modal).attr('id', id_modal);
        $(div_modal).attr('tabindex', '1');
        $(div_modal).attr('aria-hidden', 'true');
        $(div_modal).attr('role', 'dialog');

        var html= '<!--new Modal -->'
        +'<div class="modal-dialog" role="document">'
        +'<div class="modal-content">'
        +'<div class="modal-header">'
        +'<h5 class="modal-title" id="'+id_modal+'_title">'
        +'<span icon_title>'
        +'<i class="fa fa-exclamation-circle" '
        +'style="color: blue !important;">'
        +'</i></span></h5>'
        +'<button type="button" class="close" data-dismiss="modal" '
        +'aria-label="Close">'
        +'<span aria-hidden="true">&times;</span>'
        +'</button>'
        +'</div>'
        
        +'<div class="modal-body pt-0">'
        +'<div class="row bordes m-1 " id="div_form_update">'
        +'<div class="col-sm-12 mt-2">'
        +'<div class="form-group">'
        +'<label>Nombre*</label>'
        +'<div class="input-group" >'
        +'<input class="form-control" '
        +' name="nombre_caracteristica" id="nombre" required>'
        +'</div> </div> </div> '
        
        +'<!-- descripcion caracteristica  --> '
        +'<div class="col-sm-12"> '
        +'<div class="form-group"> '
        +'<label>Descripción de la característica*</label> '
        +'<div class="input-group"> '
        +'<textarea class="form-control" name="descripcion_caracteristica"'
        +' id="descripcion" rows="2" required></textarea> '
        +'</div> </div> </div> '
        +'<!-- descricion caracteristica--> '
        +'</div>'
        +'<!--fin row-->'
        
        +'<div id="msg" class="m-1"></div>'

        +'<div id="msg2" class="m-1 mt-5 d-none"><strong style="color:red;">Nota: </strong>'
        +'La actualización de cualquier campo afectará a todos los productos'
        +'a los que se les especificó ésta característica.</div>'
        
        +'</div> <!--fin modal_body-->'
        
        +'<div class="modal-footer">'
        
        +'<button type="button" class="btn btn-danger" '
        +'id="cancel_'+id_modal+'" data-dismiss="modal">Cancelar</button>'
        
        +'<button type="button" class="btn btn-primary " '
        +'id="update_'+id_modal+'" >Actualizar</button>'
        
        +'<button type="submit" class="btn btn-success d-none" '
        +'id="save_'+id_modal+'" form="form_carac">Aceptar</button>'

        +'<button type="submit" class="btn btn-danger d-none" '
        +'id="delete_'+id_modal+'" form="form_carac">Eliminar</button>'

        +'<button type="submit" class="btn btn-success d-none" '
        +'id="add_'+id_modal+'" form="form_carac">Agregar</button>'
        
        +'</div>'
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!--new Modal -->';

        $(div_modal).html(html);
        parent_element.append(div_modal);
        return div_modal;
    }
