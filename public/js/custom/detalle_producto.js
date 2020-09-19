
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
        //console.log(div);
        div.addClass("d-none");
        var padre = $(div).parent();
        //console.log(padre);
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
            /*$("#btn-edit_padre i").removeClass("fa-edit icon-edit")
            .addClass("fa-window-close icon-cancel");*/
            $("#btn-edit_padre ").html('<span class="fa-stack "'
            +' style="width: 1.2rem; font-size: 1em;"> '
            +' <i class="fas fa-square fa-stack-1x"'
            +' style="color: white;"></i>'
            +'<i class="fa fa-window-close fa-stack-1x fa-inverse" '
            +' style="color: red;">'
            +'</i></span>');
            
            btn.attr("data-title", "Cancelar");
            $("#form_padre input,textarea").attr("disabled", false);
            $("#form_padre input")[2].focus();
        }else{
            /*$("#btn-edit_padre i").removeClass("fa-window-close icon-cancel")
            .addClass("fa-edit icon-edit");*/
            $("#btn-edit_padre ").html('<i class="fa fa-edit icon-edit"></i>');

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
        +'name="caracteristicas[caracteristica'+id_select_carac+'][id]"'
        +' id="select_caracteristicas'+id_select_carac
        +'" onchange="listenerSelect2(event)" '
        +'class="form-control mt-1 mb-2" new_select>'
        +'<option value="-1" selected>SELECCIONE</option>';
        for (var i = 0; i < all_caract.length; i++) {
            if(!caract_in_product.includes(all_caract[i].id)){
                html+= '<option indice="'+i+'" value="'+all_caract[i].id+'">'
                +all_caract[i].nombre+'</option>';
            }
            //console.log("no estaba creada");
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
        +'<input type="text" class="form-control mt-1" name="caracteristicas[caracteristica'+id_select_carac+'][value]" '
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

    function cancel_add_pres(btn){
        var div = $(btn).closest("div.card-container")[0];
        div.style.display = 'none';
        setTimeout(function(){div.parentNode.removeChild(div);}, 600);

        var $demas_nuevas_pres = $("#lista_presentaciones .card-container:visible");
        console.log($demas_nuevas_pres);
        if($demas_nuevas_pres.length == 0){
            $("#footer-presentaciones").addClass("d-none");
        }
    }

    function addPresentacion(){
        add_pres++;
        var card = document.createElement('div');
        card.setAttribute('class', 'col-sm-4 mt-2 card-container');
        //card.setAttribute('id', 'div_campo_car'+id_select_carac);
        //card.setAttribute('new_div_caract', '');
        var html = '<div class="card card-info">'
        +'<div class="card-header">'
        +'<span style="display: inline-block; font-size: 1.1rem; line-height: 1.5; '
        +'vertical-align:middle;"'
        +' class="m-0 p-1 "> Nueva presentación </span>'
        +'<span style="float: right; " class="m-0 p-1">'
        +'<button type="button" class="btn btn-danger p-0" data-title="Cancelar" '
        +'style="font-size: 1.15em; line-height: 1; vertical-align: middle;"'
        +' onclick="cancel_add_pres(this);">'
        +'<i class="far fa-window-close" style="color:white; '
        +' text-align:center;"></i>'
        +'</button>'
        +'<button class="btn btn-primary p-0 ml-2" '
        +'data-title="Guardar presentación" type="submit"'
        +' style="font-size: 1.15em; line-height: 1; "'
        +' form="nueva_presentacion" >'
        +'<i class="fa fa-save " style="text-align:center; "></i>'
        +'</button>'
        +'</span>'
        +'</div> <!--card -header-->'
        
        +'<div class="card-body">'
        
        +'<div class="col-sm-12 m-0 p-0" >'
        +'<div class="form-group mb-0 ">'
        +'<label class="mb-0">Contenido neto</label>'
        +'<div class="input-group">'
        +'<input type="number" step=".01"  class="form-control m-1" id="input_contenido'+add_pres+'"'
        +'required name="new_pres[pres'+add_pres+'][contenido]" form="nueva_presentacion">'
        +'<select class="form-control m-1" required '
        +'name="new_pres[pres'+add_pres+'][unidad_c]" form="nueva_presentacion">'
        +'<option value="ml" selected>ml</option>'
        +'<option value="g">g</option>'
        +'<option value="l">l</option>'
        +'<option value="kg">kg</option>'
        +'</select>'
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!--contenido-->'

        +'<!--precios-->'
        +'<div class="col-sm-12 m-0 p-0">'
        +'<label class="mb-0">Precios</label>'
        
        +'<!-- Precio consumidor -->'
        +'<div class="row">'
        +'<div class="col-sm-4">'
        +'<label class="mb-0 label-precios">Consumidor</label>'
        +'<div class="form-group mb-1">'
        +'<div class="input-group">'
        +'<div class="input-group-prepend"> '
        +'<span class="input-group-text p-1 label-precios">'
        +'<i class="fas fa-dollar-sign"></i></span>'
        +'</div>'
        +'<input type="number" step=".01" class="form-control p-1" required '
        +'name="new_pres[pres'+add_pres+'][pre_consu]" form="nueva_presentacion">'
        +'</div> '
        +'</div>'
        +'</div>'
        +'<!-- Precio consumidor-->'
        
        +'<!-- Precio distribuidor-->'
        +'<div class="col-sm-4">'
        +'<div class="form-group mb-1">'
        +'<label class="mb-0 label-precios">Distribuidor</label>'
        +'<div class="input-group">'
        +'<div class="input-group-prepend">'
        +'<span class="input-group-text p-1 label-precios">'
        +'<i class="fas fa-dollar-sign"></i>'
        +'</span>'
        +'</div>'
        +'<input type="number" step=".01" class="form-control p-1" '
        +'required name="new_pres[pres'+add_pres+'][pre_distri]" form="nueva_presentacion">'
        +'</div> '
        +'</div>'
        +'</div>'
        +'<!-- Precio distribuidor-->'
        
        +'<!-- Precio Restaurant -->'
        +'<div class="col-sm-4">'
        +'<div class="form-group mb-1">'
        +'<label class="mb-0 label-precios">Restaurant</label>'
        +'<div class="input-group">'
        +'<div class="input-group-prepend"> '
        +'<span class="input-group-text p-1 label-precios">'
        +'<i class="fas fa-dollar-sign"></i>'
        +'</span>'
        +'</div>'
        +'<input type="number" step=".01"  class="form-control p-1" '
        +'required name="new_pres[pres'+add_pres+'][pre_rest]" form="nueva_presentacion">'
        +'</div> '
        +'</div>'
        +'</div>'
        +'<!-- Precio restaurant-->'
        +'</div><!--row-->'
        +'</div><!--precios-->'
        
        +'<!--stock-->'
        +'<div class="col-sm-12 m-0 p-0 mt-1">'
        +'<label class="mb-0">Stock</label>'
        
        +'<!-- costo adq-->'
        +'<div class="row">'
        +'<div class="col-sm-4">'
        +'<label class="mb-0 label-precios">Costo adq.</label>'
        +'<div class="form-group mb-1">'
        +'<div class="input-group">'
        +'<div class="input-group-prepend"> '
        +'<span class="input-group-text p-1 label-precios">'
        +'<i class="fas fa-dollar-sign"></i></span>'
        +'</div>'
        +'<input type="number" step=".01" class="form-control p-1" '
        +' name="new_pres[pres'+add_pres+'][costo]" form="nueva_presentacion">'
        +'</div> '
        +'</div>'
        +'</div>'
        +'<!-- costo adq-->'
        
        +'<!-- stock-->'
        +'<div class="col-sm-4">'
        +'<div class="form-group mb-1">'
        +'<label class="mb-0 label-precios">Stock</label>'
        +'<input type="number" step="1"  class="form-control " '
        +'required name="new_pres[pres'+add_pres+'][stock]" form="nueva_presentacion">'
        +'</div>'
        +'</div>'
        +'<!-- stock-->'
        +''
        +'<!-- stock min-->'
        +'<div class="col-sm-4">'
        +'<div class="form-group mb-1">'
        +'<label class="mb-0 label-precios">Stock min.</label>'
        +'<input type="number" step="1" class="form-control " '
        +'required name="new_pres[pres'+add_pres+'][stock_min]" form="nueva_presentacion">'
        +'</div>'
        +'</div>'
        +'<!-- stock min-->'
        +'</div><!--row-->'
        
        +'</div><!--stock-->'
        
        +'<!--Dimensiones-->'
        +'<div class="col-sm-12 m-0 p-0 mt-1">'
        +'<label class="mb-0">Dimensiones(cm)</label>'
        
        +'<!-- largo-->'
        +'<div class="row">'
        
        +'<div class="col-sm-4">'
        +'<div class="form-group mb-1">'
        +'<label class="mb-0 label-precios">Largo</label>'
        +'<input type="number" step=".01"  class="form-control "'
        +' name="new_pres[pres'+add_pres+'][largo]" form="nueva_presentacion">'
        +'</div>'
        +'</div>'
        +'<!-- largo-->'
        
        +'<!-- ancho-->'
        +'<div class="col-sm-4">'
        +'<div class="form-group mb-1">'
        +'<label class="mb-0 label-precios">Ancho</label>'
        +'<input type="number" step=".01" class="form-control " '
        +' name="new_pres[pres'+add_pres+'][ancho]" form="nueva_presentacion">'
        +'</div>'
        +'</div>'
        +'<!-- ancho-->'
        
        +'<!-- alto-->'
        +'<div class="col-sm-4">'
        +'<div class="form-group mb-1">'
        +'<label class="mb-0 label-precios">Alto</label>'
        +'<input type="number" step=".01" class="form-control " '
        +' name="new_pres[pres'+add_pres+'][alto]" form="nueva_presentacion">'
        +'</div> '
        +'</div>'
        +'<!-- alto-->'
        
        +'<!-- Peso-->'
        +'<div class="col-sm-4">'
        +'<div class="form-group mb-1">'
        +'<label class="mb-0 label-precios">Peso(Kg)</label>'
        +'<input type="number" step=".01" class="form-control " '
        +' name="new_pres[pres'+add_pres+'][peso]" form="nueva_presentacion">'
        +'</div>'
        +'</div>'
        +'<!-- Peso-->'
        
        +'<!-- estado -->'
        +'<div class="col-sm-8">'
        +'<div class="form-group mb-1 ">'
        +'<label class="mb-0 label-precios">Estado*</label>'
        +'<div class="input-group">'
        +'<select class="form-control p-1" '
        +'required name="new_pres[pres'+add_pres+'][estado]" form="nueva_presentacion">'
        +'<option value="1" selected >Disponible</option>'
        +'<option value="0">Agotado</option>'
        +'<option value="2">Proximamente</option>'
        +'</select>'
        +'</div> '
        +'</div>'
        +'</div>'
        +'<!-- estado-->'
        
        +'</div><!--row-->'
        +'</div><!--Dimensiones-->'
        
        +'<!--imagen-->'
        +'<div class="col-sm-12 m-0 p-0 mt-2 img-wrapper ">'
        +'<label class="mb-0">Foto de la presentación*</label>'
        +'<div class="form-group mb-1">'
        +'<div class="input-group">'
        +'<input type="file" class="custom-file-input" '
        +'id="img_presentacion'+add_pres+'" accept="image/*" '
        +'required name="new_pres[pres'+add_pres+'][img]"'
        +' form="nueva_presentacion" onchange="upload_img(this);" >'
        +'<label class="custom-file-label" for="img_presentacion'+add_pres+'">'
        +'Selecciona un archivo</label>'
        +'</div> '
        +'</div>'
        +'<div class="d-none border" style="position: relative;">'
        +'<button type="button" class="close" '
        +'style="position: absolute; top: 0; right: 0;" aria-label="Close"'
        +' title="Cancelar" onclick="cancel_upload(this);">'
        +'<i class="fas fa-window-close" style="color: red;"></i>'
        +'</button>'
        +'<img src="" class="img-upload" >'
        +'</div>'
        +'</div>'
        +'<!--imagen-->'
        
        +'</div><!-- card body--->'
        +'<div class="card-footer " >'
        +'<div class="d-flex align-items-sm-center justify-content-sm-center">'
        +'<button type="submit" form="nueva_presentacion" class="btn btn-success" '
        +'>Agregar</button>'
        +'</div>'
        +'</div>'
        +'</div><!--card border-->';

        card.innerHTML = html;
        document.getElementById('lista_presentaciones').appendChild(card);
        $('#input_contenido'+add_pres).focus();
        if(!($("#footer-presentaciones").is(":visible"))){
            $("#footer-presentaciones").removeClass("d-none");
        }

    }

    function upload_img(input){
        var $label = $(input).next();
        var $div_img = $(input).closest(".form-group").next();
        var img = $div_img.find("img")[0];
        if (input.files && input.files[0]) {
            $label.text(input.files[0].name);
            var reader = new FileReader();
            $div_img.removeClass('d-none');
            reader.onload = function (e) {
                $(img).attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
            //console.log("ya la subi");
        }
        else {
            $label.text("Selecciona un archivo");
            $(input).val("");
            $(img).attr("src","");
            $div_img.addClass("d-none");
            //console.log("no hay nada");
        }
    }

    function cancel_upload(btn){
        var input = $(btn).closest("div").prev().find("input.custom-file-input");
        $(input).val("");
        $(input).next().text("Selecciona un archivo");
        $(btn).next().attr("src","");
        $(btn).parent().addClass("d-none");
    }

    function editar_carac(){
        var btn = $("#edit_carac");
        //btn.removeAttr("title");
        //$("#footer-carac").toggleClass("d-none");
        //if($("#footer-carac").is(":visible")){
        var dis = $("#form_carac input.form-control").prop("disabled");
        //console.log(dis);
        if(dis){
            $("#footer-carac").removeClass("d-none");
            $("#edit_carac i").removeClass("fa-edit icon-edit")
            .addClass("fa-window-close icon-cancel");
            btn.attr("data-title", "Cancelar");
            
            if(!jQuery.isEmptyObject(presentaciones)){
                //console.log("no estaba vacio");
                $("#form_carac input").attr("disabled",false);
                $("#form_carac input")[3].focus();
            }
        }else
        {
            $("#edit_carac i").removeClass("fa-window-close icon-cancel")
            .addClass("fa-edit icon-edit");
            btn.attr("data-title","Editar");

            var inputs = $("#form_carac input[data-principal]");

            //console.log(inputs);
            //$("#form_carac input").val()

            var valores = new Array();
            for (var i = 0; i < inputs.length; i++) {
                //$("#form_carac input")[i].val(caracteristicas[i].pivot.valor);
                inputs[i].value = caracteristicas[i].pivot.valor;
                valores.push(caracteristicas[i].pivot.valor);
                //console.log("cambie el valor de: "+inputs[i].tagName+" a: "+caracteristicas[i].pivot.valor);
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
        var inputs = div_padre.find('input').attr("disabled",false);
        $(inputs[1]).val(null).removeAttr("required");
        //console.log(inputs);
        contador_caract--;
        $("#contador_caract").text('('+contador_caract+')');
        $("#footer-carac").removeClass("d-none");
    }

    $("[btn-edit-carac]").on("click", function(){

        var div = $(this).closest('div');
        var btn_update = $(div).find("div").find("button");
        //$(btn_update).closest('div').toggleClass("d-none");
        //if($(btn_update).is(":visible")){

        var input = $(div).find("input")[1];
        var dis = $(input).prop("disabled");
        //console.log(dis);
        var text = input.value;
        
        
        if(dis){
            $(this).find('i').removeClass("fa-edit icon-edit2")
            .addClass("fa-window-close icon-cancel");
            $(this).attr("data-title", "Cancelar");

            $(div).find("input").attr("disabled", false);
            $(div).find("input")[1].focus();
            input.value = "";
            input.value = text;
            $("#footer-carac").removeClass("d-none");
        }
        else{
            $(this).find('i').removeClass("fa-window-close icon-cancel")
            .addClass("fa-edit icon-edit2");
            $(this).attr("data-title", "Editar");

            input.value = $(input).attr("placeholder");
            //$(input).attr("disabled", true);
            $(div).find("input").attr("disabled", true);
        }
    });

    $("[btn-edit-pres]").on("click", function(){
        var div = $(this).closest('div.card')[0];
        $(div).find(".ic-estado").toggleClass("d-none");
        $(this).next().toggleClass("d-none");
        $(this).next().next().toggleClass("d-none");
        
        $(div).find("div.card-footer").toggleClass("d-none");
        $(div).find("div.img-wrapper").toggleClass("d-none");
        $(div).find("div.form-group")[0].classList.toggle("d-none");
        $(div).find("div.form-estado")[0].classList.toggle("d-none");

        var btn_update = $(div).find("div.card-footer").find("button");
        
        if($(btn_update).is(":visible")){
            $(this).find('i').removeClass("fa-edit")
            .addClass("fa-window-close");
            $(this).attr("data-title", "Cancelar")
            .addClass("btn-danger").removeClass("btn-primary");
            //$(div).find(".card-body").first().addClass
            $(div).find("input,select").attr("disabled", false);
            $(div).find("input")[4].focus();
            $(div).find("input")[4].select();
            enabled_select($(div));
        }
        else{
            $(this).find('i').removeClass("fa-window-close")
            .addClass("fa-edit");
            $(this).attr("data-title", "Editar")
            .removeClass("btn-danger").addClass("btn-primary");

            $(div).find("input,select").val(function( index, value ) {
                return this.getAttribute("placeholder");
            });
            $(div).find("input,select").attr("disabled", true);
            //$(div).find(":file").attr("disabled", true);
        }
    });

    $("#show-modal-padre").on("click", function(){
        $("#save_generales").removeClass("btn-warning").addClass("btn-primary");
        var html = "";
        if (producto.nombre.localeCompare($("#nombre").val()) != 0) {
            html += "<li><strong>Nombre: </strong>"+$("#nombre").val()+"</li>";
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
            $("#modal_title_padre").html('<span><i class="fa fa-exclamation-circle"'
                +' style="color: blue !important;"></i></span> No se han realizado cambios.');
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
        modal.find('.modal-title').html('<span><i class="fa fa-exclamation-triangle" '
            +' style="color: #e0a800;"></i></span> '
            +' ¿Desea dar de baja este producto con todas sus presentaciones?');
        var msg = '<span class="text-danger">Notas: </span>'
                + '<ul><li>Los datos de todas sus presentaciones dejarán de aparecer '
                + 'en la tienda y los clientes no podrán comprarlas.</li>'
                + '<li>Algunas presentaciones seguirán siendo visibles '
                + 'para los clientes que las compraron anteriormente al revisar sus pedidos, '
                + 'pero no podrán comprarlas de nuevo.</li>'
                + '<li>Podrá dar de alta nuevamente todas sus presentaciones en la sección: '
                + '/Productos/Productos dados de baja.</li></ul>';
        
        modal.find('.modal-body').html(msg);
        $("#btn_delete_product").removeClass("d-none");
        $("#save_generales").addClass("d-none");
        modal.modal({
            backdrop: 'static'
        });
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
        var inputs_borrados = $("#form_carac input[data-principal]:hidden");
        var inputs_agregados = $("#form_carac input[new_input]");
        var nombres_carac = $("#fila_caract_input span[nombre_caracteristica]:visible");
        var nombres_borrados = $("#fila_caract_input span[nombre_caracteristica]:hidden");
        var id_caract_select = $("#form_carac select option:selected");
        var lista_agregados = "";
        var lista_borrados="";
        var lista_editados="";
        
        for (var i = 0; i < inputs_iniciales.length; i++) {

            if (inputs_iniciales[i].value == '' || 
                inputs_iniciales[i].value
                .localeCompare(inputs_iniciales[i].placeholder) == 0) {
                //Si se borro todo el contenido lo restaura a su estado iniciaal
                // Ó si no cambio el contenido se desactiva el input para no mandar datos
                $(inputs_iniciales[i]).attr("disabled","true");
                $(inputs_iniciales[i]).prev().attr("disabled","true");
                $(inputs_iniciales[i]).val(inputs_iniciales[i].placeholder);
                $(inputs_iniciales[i]).closest('div')
                .find('[btn-edit-carac]').find('i')
                .removeClass('fa-window-close icon-cancel')
                .addClass('fa-edit icon-edit2');

                //console.log(inputs_iniciales[i].placeholder);
            } else{ //if (inputs_iniciales[i].value
                //.localeCompare(inputs_iniciales[i].placeholder) != 0) {
                //Si cambiaron los campos
                lista_editados += '<li><strong>'+$(nombres_carac[i]).text()
                +' </strong>'+ inputs_iniciales[i].value+'</li>';
            }
        }
        //lista de agregados
        for (var i = 0; i < id_caract_select.length; i++) {
            if (id_caract_select[i].value != '-1' && inputs_agregados[i].value != '') {
                lista_agregados+='<li><strong>'+id_caract_select[i].text+': </strong>'
                +inputs_agregados[i].value+'</li>';
                //console.log("este esta vacio ");
            }
        }

        for (var i = 0; i < inputs_borrados.length; i++) {
            lista_borrados+='<li><strong>'+$(nombres_borrados[i]).text()
            +' </strong>'
            +inputs_borrados[i].placeholder+'</li>';
                //console.log("este esta vacio ");
        }
        //var ul_editados, ul_borrados, ul_agregados;
        var modal_body = $(modal).find(".modal-body");
        modal_body.html("");
        if(lista_agregados != '' || lista_editados != '' || lista_borrados != ''){
            title.html('<span><i class="fa fa-exclamation-circle"'
                +'style="color: blue !important;"></i>'
                +'</span> ¿Desea aplicar los siguientes cambios?');
            if(lista_borrados != '')
            {
                var div = document.createElement('div');
                $(div).addClass('m-1');
                var $new_p = $( "<p style='margin:0; font-weight:bold; color:#dc3545;'"
                    +">Características eliminadas:</p>" );
                var ul = document.createElement('ul');
                //$(ul).attr("id","list_caract_deleted");
                $(ul).html(lista_borrados);
                $(div).append($new_p);
                $(div).append(ul);
                modal_body.append($(div));
            }
            if(lista_editados != '')
            {
                var div = document.createElement('div');
                $(div).addClass('m-1');
                var $new_p = $( "<p style='margin:0; font-weight:bold; color:#0069d9;'"
                    +">Características editadas:</p>" );
                var ul = document.createElement('ul');
                //$(ul).attr("id","list_caract_deleted");
                $(ul).html(lista_editados);
                $(div).append($new_p);
                $(div).append(ul);
                modal_body.append($(div));
            }
            if(lista_agregados != '')
            {
                var div = document.createElement('div');
                $(div).addClass('m-1');
                var $new_p = $( "<p style='margin:0; font-weight:bold; color:#28a745;'"
                    +">Características agregadas:</p>" );
                var ul = document.createElement('ul');
                //$(ul).attr("id","list_caract_deleted");
                $(ul).html(lista_agregados);
                $(div).append($new_p);
                $(div).append(ul);
                modal_body.append($(div));
            }
            $("#save_new_modal").attr('type','submit');
            $("#save_new_modal").attr('form','form_carac');
            $("#save_new_modal").removeAttr('data-dismiss');
            
        }else{
            modal_body.html("Intente cambiar el valor de alguna característica.");
            title.html('<span><i class="fa fa-exclamation-circle"'
                +'style="color: blue !important;"></i>'
                +'</span> No se registraron cambios.');
            $("#save_new_modal").attr('type','button');
            $("#save_new_modal").attr('form','form_carac');
            $("#save_new_modal").attr('data-dismiss','modal');
            /*$("#form_carac")
            .append('<input id="input_delete_all" type="hidden" name="delete_all" value="1"></input>');*/
        }

        $(modal).modal({
            backdrop: 'static'
        });

    });

    function listener_estado_pres(evt){
        var form = $(evt.target).closest("form");
        var input_stock = $(form).find(".stock");
        
        if(evt.target.value == '0'){
            
            $(input_stock).val(0);
            $(input_stock).attr("value",'0');
        }
        if(evt.target.value == '1' && input_stock[0].value == '0'){
            $(input_stock).val(1);
            $(input_stock).attr("value",'1');
        }
    }
    function on_change_stock(input){
        var form = $(input).closest("form");
        var select_estado = $(form).find(".estado")[0];
        
        if (input.value == "" || input.value == '0') {
            select_estado.options.selectedIndex = 1;
        }
        if (input.value == ""){
            $(input).attr("value","0");
            $(input).val(0);
            return;
        }
        if (parseInt(input.value) > 0){
            select_estado.options.selectedIndex = 2;
        }
    }
    function enabled_select(div_card){
        var select_estado = $(div_card).find(".estado")[0];
        switch(parseInt(select_estado.getAttribute('placeholder'))){
            case -1:
                select_estado.options.selectedIndex = 0;
                break;
            case 0:
                select_estado.options.selectedIndex = 1;
                break;
            case 1:
                select_estado.options.selectedIndex = 2;
                break;
            case 2:
                select_estado.options.selectedIndex = 3;
                break;
        }
        var select_unidad_c = $(div_card).find(".unidad_c")[0];

        switch(select_unidad_c.placeholder){
            case 'ml':
                select_unidad_c.options.selectedIndex = 0;
                break;
            case 'g':
                select_unidad_c.options.selectedIndex = 1;
                break;
            case 'l':
                select_unidad_c.options.selectedIndex = 2;
                break;
            case 'kg':
                select_unidad_c.options.selectedIndex = 3;
                break;
        }
        
    }
    function update_presentacion2(evt){
        var btn = evt.target;
        var form = btn.closest('form');
        var form_id = form.id;
        //console.log(form_id);
        var $card = $("#card_body_presentaciones");
        var modal = $("#modal_presentaciones");
        if(modal.length === 0){
            modal = create_modal($card, "modal_presentaciones");
        }
        var title = $(modal).find(".modal-title");
        var id_presentacion = $(form).find("span.id_pres").text();

        var inputs = $(form).find("input:visible,select option:selected");
        console.log(inputs);
        var lista_editados="";
    }

    function validate_required(inputs){
        $(inputs).removeClass("is-invalid");
        $("div.msg-error").remove();

        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].hasAttribute("required")){
                if(inputs[i].value == ""){
                    var msg = '<div class="text-danger msg-error col-12">'
                    + 'Este campo no puede quedar vacío. </div>';
                    var padre = $(inputs[i]).closest(".form-group").parent().parent();
                    //$(inputs[i]).parent().parent().parent().append(msg);
                    $(padre).append(msg);
                    $(inputs[i]).addClass("is-invalid");
                    return false;
                }
            }
        }
        return true;
    }
    function update_presentacion(evt){
        var btn = evt.target;
        var form = btn.closest('form');
        var form_id = form.id;
        console.log(form_id);
        var inputs = $(form).find("input:visible,select option:selected");
        if (!validate_required(inputs)) {
            return;
        } 

        var $card = $("#card_body_presentaciones");
        var modal = $("#modal_presentaciones");
        if(modal.length === 0){
            modal = create_modal($card, "modal_presentaciones");
        }
        var title = $(modal).find(".modal-title");
        var id_presentacion = $(form).find("span.id_pres").text();
        console.log(id_presentacion);

        
        console.log(inputs);
        var lista_editados="";

        for (var i = 0; i < inputs.length; i++) {

            if(inputs[i].nodeName=='OPTION'){
                if(inputs[i].parentNode.getAttribute("placeholder") != inputs[i].value){
                    //Si cambiaron los campos
                    lista_editados += '<li><strong>'+inputs[i].parentNode.getAttribute("campo")
                    +': </strong>'+ inputs[i].text+'</li>';
                }
            }
            
            if(inputs[i].type == "file" && inputs[i].value != ""){
                lista_editados += '<li><strong>'+inputs[i].getAttribute("campo")
                +': </strong>'+ inputs[i].files[0].name+'</li>';
            }
            
            if (inputs[i].type == 'number'){
                /*if(inputs[i].value == ''){
                    $(inputs[i]).val(inputs[i].placeholder);
                }
                */
                if (inputs[i].value.localeCompare(inputs[i].placeholder) != 0) {
                    //Si cambiaron los campos
                    lista_editados += '<li><strong>'+inputs[i].getAttribute("campo")
                    +': </strong>'+ inputs[i].value+'</li>';
                }
            }
        }

        var modal_body = $(modal).find(".modal-body");
        modal_body.html("");
        if(lista_editados != ''){
            title.html('<span><i class="fa fa-exclamation-circle"'
                +'style="color: #EFB810 !important;"></i>'
                +'</span> ¿Desea aplicar los siguientes cambios?');
            
            var div = document.createElement('div');
            $(div).addClass('m-1');
            var $new_p = $( "<p style='margin:0; font-weight:bold; color:#0069d9;'"
                +">Campos editados:</p>" );
            var ul = document.createElement('ul');
            $(ul).html(lista_editados);
            $(div).append($new_p);
            $(div).append(ul);
            modal_body.append($(div));
            
            $("#save_modal_presentaciones").attr('type','submit');
            $("#save_modal_presentaciones").attr('form',form_id);
            $("#save_modal_presentaciones").removeAttr('data-dismiss');
            
        }else{
            modal_body.html("Intente cambiar el valor de alguna característica.");
            title.html('<span><i class="fa fa-exclamation-circle"'
                +'style="color: blue !important;"></i>'
                +'</span> No se registraron cambios.');
            $("#save_modal_presentaciones").attr('type','button');
            $("#save_modal_presentaciones").attr('form', form_id);
            $("#save_modal_presentaciones").attr('data-dismiss','modal');
        }

        $(modal).modal({
            backdrop: 'static'
        });
    }

    function delete_presentacion(evt){
        var id_pres = evt.target.getAttribute("id_pres_prod");
        var $card = $("#card_body_presentaciones");
        var modal = $("#modal_presentaciones");
        if(modal.length === 0){
            modal = create_modal($card, "modal_presentaciones");
        }
        var title = $(modal).find(".modal-title");
        var modal_body = $(modal).find(".modal-body");
        var msg_delete = '<span class="text-danger" style="font-size: 1.1rem;">Notas:</span>'
                       + '<ul class="pl-4">'
                       + '<li>Los datos de esta presentación dejarán de aparecer en la tienda '
                       + 'y los clientes no podrán comprarla.</li>'
                       + '<li>Algunos datos de esta presentación seguirán siendo visibles '
                       + 'para los clientes que la compraron anteriormente, pero no podrán '
                       + 'comprarla de nuevo.</li>'
                       + '<li>Podrá recuperar los datos de esta presentación en la sección<br>'
                       + '<i>/Productos/Productos dados de baja</i>.</li></ul>';
        
        modal_body.html(msg_delete);
            title.html('<span><i class="fa fa-exclamation-triangle"'
                +'style="color: #e0a800 !important;"></i>'
                +'</span> ¿Desea dar de baja ésta presentación?');
        $("#save_modal_presentaciones").attr('type','submit');
        $("#save_modal_presentaciones").attr('form', 'form_delete_pres_'+id_pres);
        $("#save_modal_presentaciones").removeAttr('data-dismiss');

        $(modal).modal({
            backdrop: 'static'
        });
        
    }

    function upload_presentacion(evt){
        var id_pres = evt.target.getAttribute("id_pres_prod");
        var $card = $("#card_body_presentaciones");
        var modal = $("#modal_presentaciones");
        if(modal.length === 0){
            modal = create_modal($card, "modal_presentaciones");
        }
        var title = $(modal).find(".modal-title");
        var modal_body = $(modal).find(".modal-body");
        var msg_delete = '<span class="text-primary" style="font-size: 1.1rem;">Notas:</span>'
                       + '<ul class="pl-4">'
                       + '<li>Los datos de esta presentación volverán a aparecer en la '
                       + 'tienda y los clientes podrán comprarla, siempre y cuando halla '
                       + 'suficientes existencias.</li></ul>';
        
        modal_body.html(msg_delete);
            title.html('<span><i class="fa fa-exclamation-triangle"'
                +'style="color: #e0a800 !important;"></i>'
                +'</span> ¿Desea dar de baja ésta presentación?');
        $("#save_modal_presentaciones").attr('type','submit');
        $("#save_modal_presentaciones").attr('form', 'form_upload_pres_'+id_pres);
        $("#save_modal_presentaciones").removeAttr('data-dismiss');

        $(modal).modal({
            backdrop: 'static'
        });
        
    }

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
        +'id="cancel_'+id_modal+'" data-dismiss="modal">Cancelar</button>'
        +'<button type="submit" class="btn btn-primary" '
        +'id="save_'+id_modal+'" form="form_carac">Aceptar</button>'
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
        $("#edit_carac i").removeClass("fa-window-close icon-cancel")
            .addClass("fa-edit icon-edit");
        $("#edit_carac i").attr("data-title","Editar");
        $("[btn-edit-carac] i").removeClass("fa-window-close icon-cancel")
            .addClass("fa-edit icon-edit2");
        
        var inputs = $("#form_carac input[data-principal]");
        var div    = $('#form_carac div[div-inicial]');
        //console.log(div);
        //var valores = new Array();
        for (var i = 0; i < inputs.length; i++) {
            //$("#form_carac input")[i].val(caracteristicas[i].pivot.valor);
            $(div[i]).removeClass("d-none");
            inputs[i].value = caracteristicas[i].pivot.valor;
            $(inputs[i]).attr("required",'true');
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
        if(modal.length == 0){
            modal = create_modal($("#form_carac"));
        }
        $("#save_new_modal").attr('form','form_delete_all_caract');
        $("#save_new_modal").attr('type','submit');
        $(modal).find('.modal-title').html('<span><i class="fa fa-exclamation-circle"'
                +'style="color: blue !important;"></i>'
                +'</span> ¿Desea eliminar todas las especificaciones de este producto?');
        $(modal).find('.modal-body').html("Una vez eliminadas no se podrán recuperar,"
            +" pero si añadir de nuevo. ");

        $(modal).modal({
            backdrop: 'static'
        });

    });

    function disabled_inputs(){

        $("#btn-edit_padre").html('<i class="fa fa-edit icon-edit"></i>');
        $("#btn-edit_padre").attr("data-title","Editar");
        $("#nombre").val(producto.nombre);
        $("#marca").val(producto.marca);
        $("#descripcion_producto").val(producto.descripcion);
        $("#form_padre input,textarea").attr("disabled", true);
        $("#footer-padre").addClass("d-none");
    }

    $('form').submit(function(event){
        //event.preventDefault();
        $("div.modal.show").modal('hide');
        $("body").css("cursor","wait");
        $("#modal-notify").modal({
            backdrop: 'static'
        });
    });

    $('.form.whit-msm').submit(function(event){
        event.preventDefault();
        $("body").css("cursor","wait");
        $(".error").remove();
        $(".form-control").removeClass("is-invalid");
        
        var $form = $( this ),
        url = $form.attr( "action" ),
        $modal_notify = $("#modal-notify");
        $("div.modal.show").modal('hide');

        $modal_notify.modal({
            backdrop: 'static'
        });

        // Send the data using post
        var posting = $.post( url, $form.serialize() );
        // Put the results in a div
        posting.done(function( data ) {
            //alert( "Datos actualizados satisfactoriamente." );
            /*$modal_notify.find(".modal-header").html('<button type="button" class="close" '
                +' data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;'
                +'</span></button>');

            $modal_notify.find(".modal-body").html(
                '<div class="container-fluid"><div class="row justify-content-center"><div class="col-4 p-4"><img class="img-fluid" src="/img/success.png" ></div></div>'
                +'<h5 class="modal-title" style="font-weight:400;">Los datos fueron actualizados correctamente.</h5></div>');
            
            $modal_notify.find(".modal-content").append('<div class="modal-footer">'
                +'<button type="button" class="btn btn-success" style="display:block; margin: 0 auto;" data-dismiss="modal">Aceptar</button></div>');
                */
            $("#msg_updating").addClass("d-none");
            $("#update_success").removeClass("d-none");
            $("#modal_footer").removeClass("d-none");
            $("#btn_notify").addClass("btn-success").removeClass("btn-secondary");
            location.reload();
        });
        posting.fail(function(jqXHR, textStatus, errorThrown){
            $("body").css("cursor","default");
            var errors = jqXHR.responseJSON.errors;
            var lista = '';
            for (const prop in errors) {
                lista += '<li>' + errors[prop][0] + '</li>';
                $("[name='"+prop+"']").addClass("is-invalid")
                .closest(".parent")
                .append('<div class="invalid-feedback error">'+errors[prop][0]+'</div>');
            }
            console.log(lista);
            if(lista != ''){
                lista = 'Detalles: <ul style="color:red;">' + lista + '</ul>';
                $("#msg_fail").html(lista);
            }else{
                $("#msg_fail").html("Error inesperado. <br>Recarga la página e inténtalo de nuevo.");
            }
            /*$modal_notify.find(".modal-header").html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
            $("#modal-notify .modal-body").html(
                '<div class="container-fluid"><div class="row justify-content-center"><div class="col-4 p-4"><img class="img-fluid" src="/img/cerrar.png"></div></div>'
                +'<h5>Ocurrió un error inesperado.<br>Recarga la página e intentalo de nuevo.</h5></div>');
            
            $("#modal-notify").find(".modal-content").append('<div class="modal-footer">'
                +'<button type="button" class="btn btn-secondary" data-dismiss="modal" style="display:block; margin: 0 auto;">Aceptar</button></div>');
                */
        });
    });

    $("#modal-notify").on('hidden.bs.modal', function (e) {
      $("#modal_footer").addClass("d-none");
      $("#update_success").addClass("d-none");
      $("#update_fail").addClass("d-none");
      $("#msg_updating").removeClass("d-none");
    });


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
            
            html+= '<option indice="'+i+'" value="'+all_caract[i].id+'">'+all_caract[i].nombre+'</option>';
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
        //console.log(id);
        //console.log(
        //array1.findIndex(element => element == 130));
        var div = $("#div_padre_carac"+id);
        if(evt.target.value === "-1"){
            $('#input_value_car'+id).removeAttr('required');
            div.find('.dropdown-content')
            .html('<p style="margin: 0;">Descripción de la característica</p>');
            //console.log("es seleccione");
        }
        else{
            //console.log("es otro: "+evt.target.selectedIndex);
            var id_value = parseInt(evt.target.selectedIndex);
            div.find('.dropdown-content')
            .html('<p style="margin: 0;">'+all_caract[id_value-1].descripcion+'</p>');
            $('#input_value_car'+id).attr('required','true');
            //console.log(div);
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
        $("#save_generales").removeAttr("data-dismiss").removeClass("d-none");
        $("#btn_upload_product, #btn_delete_product").addClass("d-none");
        $("#form_padre input")[2].focus();

    });

    $('#modal_padre').on('shown.bs.modal', function (e) {
        $("#save_generales").attr("type","submit");
    });

    $('#modal-notify').on('hidden.bs.modal', function (e) {
        location.reload();
    });

    $("#modal_caract").on('show.bs.modal', function (e) {
        if($("#card_list_caract").hasClass("d-none")){
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

function upload_presentaciones(){
    var modal = $("#modal_padre");
    modal.find('.modal-title').html('<span><i class="fa fa-exclamation-triangle" '
                +' style="color: blue;"></i></span> '
                +' ¿Desea dar de Alta este producto con todas sus presentaciones?');
    var msg = '<span class="text-primary">Notas: </span>'
            + '<ul><li>Los datos de todas sus presentaciones (que cuenten con '
            + 'stock) volverán a estar disponibles en la tienda y los clientes '
            + 'podrán adquirirlas.</li></ul>';

    modal.find('.modal-body').html(msg);
    $("#btn_upload_product").removeClass("d-none");
    $("#save_generales").addClass("d-none");
    modal.modal({
        backdrop: 'static'
    });
}
$("#upload_producto").click( function(){
    upload_presentaciones();
});