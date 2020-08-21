
        $("button.btn-help").on("click", function (){
            $(this).next().toggleClass("show");
        });

        function help_btn(event){
            //$(this).next().toggleClass("show");
            $(event.target).next().toggleClass("show");
        }

        function btn_cancel_car(event){
            var div = $(event.target).closest("div");
            div = div.closest("div");
            console.log(div);
            div.addClass("d-none");
            var padre = $(div).parent();
            console.log(padre);
            $(padre).remove();
            //console.log(div);
            contador_caract--;
            $('#contador_caract').html("("+contador_caract+")");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.btn-help') ) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

        function editar_padre(){
            var btn = $("#btn-edit_padre");
            $("#footer-padre").toggleClass("d-none");
            if($("#footer-padre").is(":visible")){
                $("#btn-edit_padre svg").removeClass("fa-edit icon-edit")
                .addClass("fa-window-close icon-cancel");
                
                btn.attr("data-title", "Cancelar");
                $("#form_padre input,textarea").attr("disabled", false);
                $("#form_padre input")[2].focus();
            }else{
                $("#btn-edit_padre svg").removeClass("fa-window-close icon-cancel")
                .addClass("fa-edit icon-edit");
                //btn.removeAttr("title");
                btn.attr("data-title","Editar");
                $("#nombre").val(producto.nombre);
                $("#marca").val(producto.marca);
                $("#descripcion_producto").val(producto.descripcion);
                $("#form_padre input,textarea").attr("disabled", true);
            }
            
        }

        var contador_caract = id_select_carac = caracteristicas.length;

        function addcaracteristica(){
            contador_caract++;
            id_select_carac++;
            var div_row = document.createElement('div');
            div_row.setAttribute('class', 'col-sm-6 p-2 mb-2');
            div_row.setAttribute('id', 'div_campo_car'+id_select_carac);
            div_row.setAttribute('new_div_caract', '');
            var html = '<div class="form-group mb-0 p-2 bordes" index="'
            +id_select_carac+'" id="div_padre_carac'+id_select_carac+'">'
            +'<select style="max-width: 76%; display: inline-block; padding-left: 3px;" '
            +'name=caracteristicas[caracteristica'+id_select_carac+'][id]"'
            +' id="select_caracteristicas'+id_select_carac
            +'" onchange="listenerSelect2(event)" '
            +'class="form-control mt-1 mb-2" new_select>'
            +'<option value="-1" selected>SELECCIONE</option>';
            for (var i = 0; i < all_caract.length; i++) {
                html+= '<option indice="'+i+'" value="'+all_caract[i].id_caract+'">'+all_caract[i].nombre+'</option>';
            }
            
            html+='</select>'
            +'<span style="float: right; margin: 0;" class="mt-1"><span >'
            +'<button type="button" class="btn-carac m-1 p-0" '
            +' data-title="Cancelar" onclick="btn_cancel_car(event)">'
            +'<i class="fa fa-window-close" style="color:red;"></i></button>'
            +'<button type="button"  class="btn-help help m-0 p-0" '
            +'data-title="Info característica" onclick="help_btn(event)" >'
            +'<i class="fas fa-question-circle"></i></button>'
            +'<div class="dropdown-content">'
            +'<p style="margin: 0;">Descripción de la característica</p>'
            +'</div></span></span>'
            +'<input type="text" class="form-control mt-1" name="value" '
            +' form="form_carac" id="input_value_car'+id_select_carac+'" new_input>'
            +'<div class="mt-2 d-none">'
            +'<button type="button" class="btn btn-success btn-sm" '
            +'style="display: block; margin: 0 auto;">Actualizar</button></div></div></div>';

            div_row.innerHTML = html;
            document.getElementById('fila_caract_input').appendChild(div_row);
            $('#select_caracteristicas'+id_select_carac).focus();
            $('#contador_caract').html("("+contador_caract+")");
            if(!($("#footer-carac").is(":visible"))){
                $("#footer-carac").removeClass("d-none");
            }

        }

        function editar_carac(){
            var btn = $("#edit_carac");
            //btn.removeAttr("title");
            //$("#footer-carac").toggleClass("d-none");
            //if($("#footer-carac").is(":visible")){
            var dis = $("#form_carac input.form-control").attr("disabled");
            console.log(dis);
            if(dis == 'disabled'){
                $("#footer-carac").removeClass("d-none");
                $("#edit_carac svg").removeClass("fa-edit icon-edit")
                .addClass("fa-window-close icon-cancel");
                btn.attr("data-title", "Cancelar");
                
                if(!jQuery.isEmptyObject(presentaciones)){
                    console.log("no estaba vacio");
                    $("#form_carac input").attr("disabled",false);
                    $("#form_carac input")[2].focus();
                }
            }else
            {
                $("#edit_carac svg").removeClass("fa-window-close icon-cancel")
                .addClass("fa-edit icon-edit");
                btn.attr("data-title","Editar");

                var inputs = $("#form_carac input[data-principal]");

                console.log(inputs);
                //$("#form_carac input").val()

                var valores = new Array();
                for (var i = 0; i < inputs.length; i++) {
                    //$("#form_carac input")[i].val(caracteristicas[i].pivot.valor);
                    inputs[i].value = caracteristicas[i].pivot.valor;
                    valores.push(caracteristicas[i].pivot.valor);
                    console.log("cambie el valor de: "+inputs[i].tagName+" a: "+caracteristicas[i].pivot.valor);
                }

                inputs.attr("disabled",true);
                $('#form_carac div[new_div_caract]').remove();
                contador_caract = inputs.length;
                $("#contador_caract").text('('+contador_caract+')');
                $("#footer-carac").addClass("d-none");
            }
            
        }

        function eliminar_caract(event){
            var div_padre = $(event.target).closest('div');
            div_padre = $(div_padre).parent();
            div_padre.addClass("d-none");
            contador_caract--;
            $("#contador_caract").text('('+contador_caract+')');
            $("#footer-carac").removeClass("d-none");
        }

        $("[btn-edit-carac]").on("click", function(){

            var div = $(this).closest('div');
            var btn_update = $(div).find("div").find("button");
            //$(btn_update).closest('div').toggleClass("d-none");
            //if($(btn_update).is(":visible")){

            var input = $(div).find("input")[0];
            var dis = $(input).attr("disabled");
            var text = input.value;
            
            
            if(dis == 'disabled'){
                $(this).find('svg').removeClass("fa-edit icon-edit2")
                .addClass("fa-window-close icon-cancel");
                $(this).attr("data-title", "Cancelar");

                $(div).find("input").attr("disabled", false);
                $(div).find("input")[0].focus();
                input.value = "";
                input.value = text;
                $("#footer-carac").removeClass("d-none");
            }
            else{
                $(this).find('svg').removeClass("fa-window-close icon-cancel")
                .addClass("fa-edit icon-edit2");
                $(this).attr("data-title", "Editar");

                input.value = $(input).attr("placeholder");
                $(input).attr("disabled", true);
            }
        });

        $("[btn-edit-pres]").on("click", function(){
            var div = $(this).closest('div.card')[0];
            $(this).prev().toggleClass("d-none m-0 p-1");
            $(this).next().toggleClass("d-none m-0 p-1");
            $(this).next().next().toggleClass("d-none m-0 p-1");
            
            $(div).find("div.card-footer").toggleClass("d-none");
            $(div).find("div.form-group")[0].classList.toggle("d-none");
            $(div).find("div.form-estado")[0].classList.toggle("d-none");

            var btn_update = $(div).find("div.card-footer").find("button");
            
            if($(btn_update).is(":visible")){
                $(this).find('svg').removeClass("fa-edit icon-edit")
                .addClass("fa-window-close icon-cancel");
                $(this).attr("data-title", "Cancelar");

                $(div).find("input,select").attr("disabled", false);
                $(div).find("input")[0].focus();
                $(div).find("input")[0].select();
            }
            else{
                $(this).find('svg').removeClass("fa-window-close icon-cancel")
                .addClass("fa-edit icon-edit");
                $(this).attr("data-title", "Editar");

                $(div).find("input,select").val(function( index, value ) {
                    return this.getAttribute("placeholder");
                });
                $(div).find("input,select").attr("disabled", true);
            }
        });

        $("#show-modal-padre").on("click", function(){
            $("#save_generales").removeClass("btn-warning").addClass("btn-primary");
            var html = "";
            if (producto.nombre.localeCompare($("#nombre").val()) != 0) {
                html = "<li><strong>Nombre: </strong>"+$("#nombre").val()+"</li>";
            }
            if (producto.marca.localeCompare($("#marca").val()) != 0) {
                html += "<li><strong>Marca: </strong>"+$("#marca").val()+"</li>";
            }
            if (producto.descripcion.localeCompare($("#descripcion_producto").val()) != 0) {
                html += "<li><strong>Descripción: </strong>"
                    +$("#descripcion_producto").val()+"</li>";
            }
            var lista = "";
            if (html.localeCompare("") != 0) {
                lista = "<ul>"+html+"</ul>";
                $("#save_generales").html("Guardar cambios").attr("type","submit");
            }else{
                $("#save_generales").attr("data-dismiss","modal").html("Aceptar");
                $("#modal_title_padre").html('<span><i class="fad fa-exclamation-circle" style="--fa-secondary-color: blue !important;"></i></span> No se han realizado cambios.');
                lista = 'Intente cambiar el valor de algún campo para actualizar:<br>"Datos generales".';
            }
            
            var contenido = $("#modal_padre div.modal-body").html(lista);
            $("#modal_padre").modal({
                backdrop: 'static'
            });
        });

        $("#cancel_padre").on("click", function(){
            $('#modal_padre').modal('hide');
            disabled_inputs();
        });
        
        $("#eliminar_producto").on("click" , function(){
            var modal = $("#modal_padre");
            modal.find('.modal-title').html('<span><i class="fad fa-exclamation-triangle" style="--fa-secondary-color: yellow; --fa-secondary-opacity: 1;"></i></span> ¿Desea eliminar este producto?');
            modal.find('.modal-body').html('También se eliminarán todas sus presentaciones y demás información.');
            modal.modal({
                backdrop: 'static'
            });
            $("#save_generales").removeClass("btn-primary").addClass("btn-warning")
            .html("Eliminar");
        });

        //boton guardar cambios en card caracteristicas
        $("#save_changes_caract").click(function(){
            var modal = $("#new_modal");
            if(modal.length === 0){
                modal = create_modal($("#form_carac"));
                $("#new_modal").on('hidden.bs.modal', function(e){
                    $("#input_delete_all").remove();
                });
            }
            var title = $(modal).find(".modal-title");

            var inputs_iniciales = $("#form_carac input[data-principal]:visible");
            var inputs_agregados = $("#form_carac input[new_input]");
            var nombres_carac = $("#fila_caract_input span[nombre_caracteristica]:visible");
            var id_caract_select = $("#form_carac select option:selected");
            var lista = "";
            for (var i = 0; i < inputs_iniciales.length; i++) {
                lista+='<li><strong>'+$(nombres_carac[i]).text()+' </strong>';
                if (inputs_iniciales[i].value == '') {
                    lista+=inputs_iniciales[i].placeholder+'</li>';
                    //console.log(inputs_iniciales[i].placeholder);
                }else {
                    lista+=inputs_iniciales[i].value+'</li>';
                    //console.log(inputs_iniciales[i].value);
                }
            }
            for (var i = 0; i < id_caract_select.length; i++) {
                if (id_caract_select[i].value != '-1' && inputs_agregados[i].value != '') {
                    lista+='<li><strong>'+id_caract_select[i].text+': </strong>'
                    +inputs_agregados[i].value+'</li>';
                    //console.log("este esta vacio ");
                }
            }
            var ul;
            var modal_body = $(modal).find(".modal-body");
            if(lista != ''){
                ul = document.createElement('ul');
                $(ul).attr("id","list_caract");
                $(ul).html(lista);
                modal_body.html(ul);
                title.html('<span><i class="fad fa-exclamation-circle"'
                    +'style="--fa-secondary-color: blue !important;"></i>'
                    +'</span> Se establecerán las siguientes características: ');

                
            }else{
                modal_body.html("Se eliminaron todas las características para el producto");
                title.text('<span><i class="fad fa-exclamation-circle"'
                    +'style="--fa-secondary-color: blue !important;"></i>'
                    +'</span> Especificaciones eliminadas');
                $("#form_carac")
                .append('<input id="input_delete_all" type="hidden" name="delete_all" value="1"></input>');
            }

            $(modal).modal({
                backdrop: 'static'
            });

        });

        function create_modal(parent_element){
            var div_modal = document.createElement('div');
            $(div_modal).attr('class', 'modal fade');
            $(div_modal).attr('id', 'new_modal');
            $(div_modal).attr('tabindex', '1');
            $(div_modal).attr('aria-hidden', 'true');
            $(div_modal).attr('role', 'dialog');

            var html= '<!--new Modal -->'
            +'<div class="modal-dialog" role="document">'
            +'<div class="modal-content">'
            +'<div class="modal-header">'
            +'<h5 class="modal-title" id="new_modal_title">'
            +'<span id="icon_title">'
            +'<i class="fad fa-exclamation-circle" '
            +'style="--fa-secondary-color: blue !important;">'
            +'</i></span>'
            +'Se actualizarán los siguientes datos: </h5>'
            +'<button type="button" class="close" data-dismiss="modal" '
            +'aria-label="Close">'
            +'<span aria-hidden="true">&times;</span>'
            +'</button>'
            +'</div>'
            +'<div class="modal-body pt-0"></div>'
            +'<div class="modal-footer">'
            +'<button type="button" class="btn btn-danger" '
            +'id="cancel_new_modal" data-dismiss="modal">Cancelar</button>'
            +'<button type="submit" class="btn btn-primary" '
            +'id="save_new_modal" form="form_carac">Aceptar</button>'
            +'</div>'
            +'</div>'
            +'</div>'
            +'</div>'
            +'<!--new Modal -->';

            $(div_modal).html(html);
            parent_element.append(div_modal);
            return div_modal;
        }

        //boton cancelar en footer card caracteristicas
        function cancel_card_caract(){
            var card = $("#card_caracteristicas");
            $("#edit_carac svg").removeClass("fa-window-close icon-cancel")
                .addClass("fa-edit icon-edit");
            $("#edit_carac svg").attr("data-title","Editar");
            
            var inputs = $("#form_carac input[data-principal]");
            var div    = $('#form_carac div[div-inicial]');
            console.log(div);
            //var valores = new Array();
            for (var i = 0; i < inputs.length; i++) {
                //$("#form_carac input")[i].val(caracteristicas[i].pivot.valor);
                $(div[i]).removeClass("d-none");
                inputs[i].value = caracteristicas[i].pivot.valor;
                //valores.push(caracteristicas[i].pivot.valor);
            }

            inputs.attr("disabled",true);
            $('#form_carac div[new_div_caract]').remove();
            contador_caract = inputs.length;
            $("#contador_caract").text('('+contador_caract+')');
            $("#footer-carac").addClass("d-none");
        }


        //boton borrar todas caract
        $("#delete_all_caract").click(function(){
            var modal = $("#new_modal");
            $("#form_carac")
                .append('<input id="input_delete_all" type="hidden" name="delete_all" value="1"></input>');
            if(modal.length == 0){
                modal = create_modal($("#form_carac"));
                $('new_modal').on('hidden.bs.modal', function(e){
                    $("#input_delete_all").remove();
                });
            }
            $(modal).find('.modal-title').html('<span><i class="fad fa-exclamation-circle"'
                    +'style="--fa-secondary-color: blue !important;"></i>'
                    +'</span> ¿Desea eliminar todas las especificaciones de este producto?');
            $(modal).find('.modal-body').html("Una vez eliminadas no se podrán recuperar,"
                +", pero si añadir de nuevo. ");

            $(modal).modal({
                backdrop: 'static'
            });

        });

        function disabled_inputs(){
            $("#btn-edit_padre svg").removeClass("fa-window-close icon-cancel")
                .addClass("fa-edit icon-edit");
            $("#btn-edit_padre svg").attr("data-title","Editar");
            $("#nombre").val(producto.nombre);
            $("#marca").val(producto.marca);
            $("#descripcion_producto").val(producto.descripcion);
            $("#form_padre input,textarea").attr("disabled", true);
            $("#footer-padre").addClass("d-none");
        }

        /*$('form').submit(function(event){
            event.preventDefault();
            var $form = $( this ),
            url = $form.attr( "action" ),
            $modal_notify = $("#modal-notify");
            $form.find(".modal").modal('hide');

            $modal_notify.modal({
                backdrop: 'static'
            });

            // Send the data using post
            var posting = $.post( url, $form.serialize() );
            // Put the results in a div
            posting.done(function( data ) {
                //alert( "Datos actualizados satisfactoriamente." );
                $modal_notify.find(".modal-header").html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>');

                $modal_notify.find(".modal-body").html(
                    '<div class="container-fluid"><div class="row justify-content-center"><div class="col-4 p-4"><img class="img-fluid" src="/img/success.png" ></div></div>'
                    +'<h5 class="modal-title" style="font-weight:400;">Los datos fueron actualizados correctamente.</h5></div>');
                
                $modal_notify.find(".modal-content").append('<div class="modal-footer">'
                    +'<button type="button" class="btn btn-success" style="display:block; margin: 0 auto;" data-dismiss="modal">Aceptar</button></div>');
            });
            posting.fail(function(){
                $modal_notify.find(".modal-header").html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                $("#modal-notify .modal-body").html(
                    '<div class="container-fluid"><div class="row justify-content-center"><div class="col-4 p-4"><img class="img-fluid" src="/img/cerrar.png"></div></div>'
                    +'<h5>Ocurrió un error inesperado.<br>Recarga la página e intentalo de nuevo.</h5></div>');
                
                $("#modal-notify").find(".modal-content").append('<div class="modal-footer">'
                    +'<button type="button" class="btn btn-secondary" data-dismiss="modal" style="display:block; margin: 0 auto;">Aceptar</button></div>');
            });
        });*/

        var count_carac = 1;
        var id_card_carac = 1;

        function addCarac(){
            count_carac++;
            id_card_carac++;
            var div_row = document.createElement('div');
            div_row.setAttribute('class', 'row bordes mt-4');
            div_row.setAttribute('id','carac'+id_card_carac);
            //div_row.innerHTML = '<!-- icono borrar-->'
            var html = '<!-- icono borrar-->'
            +'<div class="col-sm-12 mt-2" style="border-bottom-color: rgb(222, 226, 230) !important; border-bottom-style: solid;border-bottom-width: 4px;">'
            +'<div class="form-group"><span style="font-weight:500; display:inline-block;" class="pt-0 mt-1">Característica #'+id_card_carac+'</span>'
            +'<span style="float: right; color: #c82333;">'
            +'<a style="cursor: pointer; font-size: 1.3rem; display:inline-block; margin: 0 0.5rem; color: #0069d9;" data-toggle="tooltip" data-placement="top" title="Agregar característica" onclick="addCarac()"><i class="fas fa-plus-square"></i></a>'
            +'<a style="cursor: pointer; font-size: 1.3rem;" data-toggle="tooltip" data-placement="top" title="Quitar característica" onclick="quitarCarac('+id_card_carac+')"><i class="fas fa-minus-square"></i></a>' 
            +'</span> </div> </div>'
            +'<!-- icono borrar-->'
            +'<!--nombre caracteristica '+id_card_carac+' -->'
            +'<div class="col-sm-6 mt-2">'
            +'<div class="form-group">'
            +'<label>Seleccione*</label>'
            +'<div class="input-group" indice="'+id_card_carac+'" id="div_select_caracteristicas'+id_card_carac+'">'
            +'<select class="form-control" style="padding-left: 3px;"'
            +' name="caracteristicas[caracteristica'+id_card_carac+'][id]" id="select_caracteristicas'+id_card_carac+'" onchange="listenerSelect(event)">'
            +'<option value="-1" selected>SELECCIONE</option>';
            
            for (var i = 0; i < all_caract.length; i++) {
                
                html+= '<option indice="'+i+'" value="'+all_caract[i].id_caract+'">'+all_caract[i].nombre+'</option>';
            }
            html += '</select>'
            +'</div> </div> </div> '
            +'<!--nombre caracteristica'+id_card_carac+'--> '
            +'<!-- val caracteristica'+id_card_carac+' --> '
            +'<div class="col-sm-6 mt-2"> '
            +'<div class="form-group"> '
            +'<label>Valor de característica*</label> '
            +'<div class="input-group">  '
            +'<input type="text" class="form-control" id="input_val_caract'+id_card_carac+'"'
            +' name="caracteristicas[caracteristica'+id_card_carac+'][value]"> '
            +'</div> </div>  </div> '
            +'<!-- val caracteristica '+id_card_carac+'--> '
            +'<!-- descripcion caracteristica '+id_card_carac+' --> '
            +'<div class="col-sm-12"> '
            +'<div class="form-group"> '
            +'<label>Descripción de la característica</label> '
            +'<div class="input-group"> '
            +'<textarea class="form-control" id="input_descrip_caract'+id_card_carac+'" rows="2" disabled placeholder="Descripción breve de lo que representa esta característica"></textarea> '
            +'</div> </div> </div> '
            +'<!-- descricion caracteristica'+id_card_carac+'--> '
            +'<!--fin row-->';

            div_row.innerHTML = html;
            document.getElementById('caracteristicas').appendChild(div_row);
            $('#modal_caract').modal('handleUpdate');
            $('#select_caracteristicas'+id_card_carac).focus();
            $('#count_carac').html("("+count_carac+")");
        }

        function listenerSelect(evt){
            var id = ""+evt.target.parentNode.getAttribute('indice');
            id = parseInt(id);

            if(evt.target.value === "-1"){
              document.getElementById('input_val_caract'+id).removeAttribute('required');
              document.getElementById('input_descrip_caract'+id).setAttribute('placeholder','Descripción breve de lo que representa esta característica.');
            }
            else{
                var id_value = parseInt(evt.target.selectedIndex);
                document.getElementById('input_descrip_caract'+id).setAttribute('placeholder',all_caract[id_value-1].descripcion);
                $('#input_val_caract'+id).attr('required','true').focus();
            }
        }

        function listenerSelect2(evt){
            var id = ""+evt.target.parentNode.getAttribute('index');
            id = parseInt(id);
            console.log(id);
            var div = $("#div_padre_carac"+id);
            if(evt.target.value === "-1"){
                $('#input_value_car'+id).removeAttr('required');
                div.find('.dropdown-content')
                .html('<p style="margin: 0;">Descripción de la característica</p>');
                console.log("es seleccione");
            }
            else{
                console.log("es otro: "+evt.target.selectedIndex);
                var id_value = parseInt(evt.target.selectedIndex);
                div.find('.dropdown-content')
                .html('<p style="margin: 0;">'+all_caract[id_value-1].descripcion+'</p>');
                $('#input_value_car'+id).attr('required','true');
                console.log(div);
                div.find('input')[0].focus();
            }
        }

        function getCaractByAjax(){
            $.get('/admin/caracteristicas/ajax', function (data){
                all_caract = data;
            });
        }

        //eventos modal

        $('#modal_padre').on('hidden.bs.modal', function (e) {
            $("#save_generales").removeAttr("data-dismiss");
            $("#form_padre input")[2].focus();
        });

        $('#modal_padre').on('shown.bs.modal', function (e) {
            $("#save_generales").attr("type","submit");
        });

        $('#modal-notify').on('hidden.bs.modal', function (e) {
            location.reload();
        });

        $("#modal_caract").on('show.bs.modal', function (e) {
            console.log("me llamo");
            if($("#card_list_caract").hasClass("d-none")){
                console.log("estoy invisible");
                $("#contenido").html("");
                $("#card_list_caract").removeClass("d-none");
                $("#select_caracteristicas1").focus();
                $("#save_caract").addClass("d-none");
                $("#save_add_caract").removeClass("d-none");
                $(this).find(".modal-title").text("Agregar características.");
            }
        });

        //Boton agregar carcteristicas en modal caracteristicas
        $("#save_add_caract").click(function(){
            var modal = $("#modal_caract");
            $("#card_list_caract").addClass("d-none");
            var contenido = $("#contenido");
            var title = modal.find(".modal-title");

            $("#save_caract").removeClass("d-none");
            //$("#modal_caract .modal-footer button[type='button']").addClass("d-none");
            $(this).addClass("d-none");

            var select_caract = $("#modal_caract select option:selected");
            var values = $("#modal_caract :text");

            var lista = '';

            for (var i = 0; i < select_caract.length; i++) {
                //console.log(select_caract[i].value);
                if (select_caract[i].value != '-1' && values[i].value != '') {
                    lista+='<li><strong>'+select_caract[i].text+': </strong>'
                    +values[i].value+'</li>';
                    //console.log("este esta vacio ");
                } 
            }
            var ul;

            if(lista != ''){
                ul = document.createElement('ul');
                $(ul).attr("id","list_caract");
                $(ul).html(lista);
                contenido.html(ul);
                title.text("Se agregarán las siguientes especificaciones: ");
                $("#save_caract").attr("type","submit");
                $("#save_caract").removeAttr("data-dismiss");
            }else{
                contenido.html("No se especificó ninguna característica.");
                title.text("Especificaciones no agregadas.");
            }
           
        });


        

        /*$("#modal_caract select").on('focus', function (e) {
            //$("#select_caracteristicas1").focus();
        });
        */
        /*$('#modal_caract select').focus(function () {
            $("#modal_caract").animate({
                scrollTop: $(this).offset().top + 'px'
            }, 'fast');
            console.log($(this).offset().top);
            console.log($("#modal_caract").offset().top);
        });
        */
       

        function quitarCarac(idboton){
            var div = document.getElementById('carac'+idboton);
            div.style.opacity = '0';
            $('#modal_caract').modal('handleUpdate');
            setTimeout(function(){div.parentNode.removeChild(div);}, 700);
            count_carac--;
            $('#count_carac').html("("+count_carac+")");

      }
        
