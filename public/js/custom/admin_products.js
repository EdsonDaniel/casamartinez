      p = 1;
      c = 1;

      function upload_img(input){
        var $label = $(input).next();
        var $div_img   = $(input).closest(".input-group").next();
        var img = $div_img.find("img")[0];
        if (input.files && input.files[0]) {
            $label.text(event.target.files[0].name);
            var reader = new FileReader();
            $div_img.removeClass('d-none');
            
            reader.onload = function (e) {
                $(img).attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
        else {
            $label.text("Selecciona un archivo");
            $(input).val("");
            $(img).attr("src","");
            $div_img.addClass("d-none");
        }
    }

    function cancel_upload(btn){
        var input = $(btn).closest("div").prev().find("input.custom-file-input");
        $(input).val("");
        $(input).next().text("Selecciona un archivo");
        $(btn).next().attr("src","");
        $(btn).parent().addClass("d-none");
    }
        

    function addPresentacion(){
        p++;
        var div_card = document.createElement('div');
        div_card.setAttribute('class', 'card card-info card-trans');
        div_card.setAttribute('id','pres'+p);
        div_card.innerHTML = 
        '<div class="card-header">'
        +'<h3 class="card-title mt-1">Presentaciones y precios</h3>'
        +'<span style="float: right;">Presentación '+p
        +'<a style="cursor:pointer" class="btn btn-primary mr-3 ml-3" data-toggle="tooltip"' 
        +'data-placement="top" title="Agregar nueva presentación" onclick="addPresentacion()">'
        +'<i class="fas fa-plus"></i></a>'
        
        +'<a style="cursor:pointer" class="btn btn-danger" data-toggle="tooltip"'
        +'data-placement="top" title="Eliminar nueva presentación" onclick="quitarPres('+p+')">'
        +'<i class="fas fa-minus"></i></a>'
        
        +'</span>'
        +'</div> <!-- /.card-header -->'
        
        +'<div class="card-body" id="presentcion1">'
        +'<div class="row">'
        
        +'<!-- Contenido -->'
        +'<div class="col-sm-4">'
        +'<div class="form-group">'
        +'<label>Contenido neto*</label>'
        +'<div class="input-group"> '
        +'<input type="number" class="form-control" '
        +'name="products[presentacion'+p+'][contenido]" '
        +'required>'
        +'<select class="form-control" '
        +'name="products[presentacion'+p+'][unidad_c]" required > '
        +'<option selected value="ml">ml</option> <option value="g">g</option>'
        +'<option value="l">l</option> <option value="kg">kg</option></select>'
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!-- Contenido-->'
        
        +'<!-- Precio consumidor -->'
        +'<div class="col-sm-4">'
        +'<div class="form-group">'
        +'<label>Precio consumidor*</label>'
        +'<div class="input-group">'
        +'<div class="input-group-prepend">'
        +'<span class="input-group-text"> <i class="fas fa-dollar-sign"></i></span>'
        +'</div>'
        +'<input type="number" class="form-control" required '
        +'name="products[presentacion'+p+'][pre_consu]" >'        
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!-- Precio consumidor-->'

        +'<!-- Precio distribuidor -->'
        +'<div class="col-sm-4"> '
        +'<div class="form-group">'
        +'<label>Precio distribuidor*</label>'
        +'<div class="input-group">'
        +'<div class="input-group-prepend">'
        +'<span class="input-group-text"><i class="fas fa-dollar-sign"></i></span></div>'
        +'<input type="number" class="form-control" '
        +'name="products[presentacion'+p+'][pre_distri]" required>'
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!-- Precio distribuidor-->'
        
        +'<!-- Precio Restaurant -->'
        +'<div class="col-sm-4">'
        +'<div class="form-group">'
        +'<label>Precio restaurant*</label>'
        +'<div class="input-group">'
        +'<div class="input-group-prepend">'
        +'<span class="input-group-text"><i class="fas fa-dollar-sign"></i></span></div>'
        +'<input type="number" class="form-control" '
        +' name="products[presentacion'+p+'][pre_rest]" required>'
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!-- Precio restaurant-->'

        +'<!-- Precio promoción -->'
        +'<div class="col-sm-4">'
        +'<div class="form-group">'
        +'<label>Precio promoción</label>'
        +'<div class="input-group">'
        +'<div class="input-group-prepend">'
        +'<span class="input-group-text"><i class="fas fa-dollar-sign"></i></span></div>'
        +'<input type="number" required class="form-control"'
        +' name="products[presentacion'+p+'][pre_promo]" id="precioP1">'
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!-- Precio promoción-->'
        
        +'<!-- Costo adquissicion -->'
        +'<div class="col-sm-4">'
        +'<div class="form-group">'
        +'<label>Costo adquisición*</label>'
        +'<div class="input-group">'
        +'<div class="input-group-prepend">'
        +'<span class="input-group-text"><i class="fas fa-dollar-sign"></i></span></div>'
        +'<input type="number" class="form-control" '
        +' name="products[presentacion'+p+'][costo]" required>'        
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!-- Costo adquisiscion-->'

        +'<!-- Existencias -->'
        +'<div class="col-sm-4">'
        +'<div class="form-group">'
        +'<label>Existencias*</label>'
        +'<div class="input-group">'
        +'<input type="number" class="form-control"'
        +' name="products[presentacion'+p+'][stock]" required>'
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!-- Existencias-->'

        +'<!-- Existencias minimas -->'
        +'<div class="col-sm-4">'
        +'<div class="form-group">'
        +'<label>Stock mínimo*</label>'
        +'<div class="input-group">'
        +'<input type="number" class="form-control"'
        +' name="products[presentacion'+p+'][stock_min]" required>'
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!-- Existencias minimas-->'

        +'<!-- estado -->'
        +'<div class="col-sm-4">'
        +'<div class="form-group">'
        +'<label>Estado*</label>'
        +'<div class="input-group">'
        +'<select class="form-control"'
        +' name="products[presentacion'+p+'][estado]" required>'
        +'<option selected value="1">Disponible</option> <option value="0">No disponible</option> '
        +'<option value="2">Próximamente</option>'          
        +'</select>'
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!-- estado-->'

        +'<!-- dimensiones -->'
        +'<div class="col-sm-10">'
        +'<div class="form-group">'
        +'<label>Dimensiones del producto</label>'
        +'</div>'
        +'</div>'
        +'<!-- dimensiones-->'

        +'<!-- alto-->'
        +'<div class="col-sm-4"> '
        +'<div class="form-group">'
        +'<label>Alto*</label> '
        +'<div class="input-group">'
        +'<input type="number" class="form-control"'
        +' name="products[presentacion'+p+'][alto]" required>'
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!-- alto--> '

        +'<!-- ancho-->'
        +'<div class="col-sm-4">'
        +'<div class="form-group"> '
        +'<label>Ancho*</label> '
        +'<div class="input-group"> '
        +'<input type="number" class="form-control"'
        +' name="products[presentacion'+p+'][ancho]" required>'
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!-- ancho--> '
        
        +'<!-- largo-->'
        +'<div class="col-sm-4">'
        +'<div class="form-group">'
        +'<label>Largo*</label>'
        +'<div class="input-group">'
        +'<input type="number" class="form-control"'
        +' name="products[presentacion'+p+'][largo]" required>'
        +'</div>'
        +'</div>'
        +'</div> '
        +'<!-- largo-->'

        +'<!-- peso-->'
        +'<div class="col-sm-4"> '
        +'<div class="form-group">'
        +'<label>Peso (kg)*</label> '
        +'<div class="input-group"> '
        +'<input type="number" class="form-control"'
        +' name="products[presentacion'+p+'][peso]" required>'
        +'</div> '
        +'</div>'
        +'</div>'
        +'<!-- peso-->'

        +'<!-- imagen-->'
        +'<div class="col-sm-8">'
        +'<div class="form-group">'
        +'<label >Foto de la presentación*</label>'
        +'<div class="input-group">'
        +'<div class="custom-file">'
        +'<input type="file" class="custom-file-input" name="products[presentacion'+p+'][img]"'
        +'id="img_presentacion'+p+'" accept="image/*" onchange="upload_img(this);" required>'
        +'<label class="custom-file-label" for="img_presentacion'+p
        +'">Selecciona un archivo</label>'
        +'</div>'
        +'</div>'
        +'<div class="d-none border" style="position: relative;">'
        +'<button type="button" class="close" style="position: absolute; top: 0; right: 0;"  aria-label="Close" title="Cancelar" onclick="cancel_upload(this);">'
        +'<i class="fas fa-window-close" style="color: red;"></i>'
        +'</button>'
        +'<img src="" class="img-upload" >'
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!-- imagen-->'
        
        +'</div> <!--row-->'

        +'</div><!-- /.card-body -->'
       
        +'<div class="card-footer" >'
        +'<a class="btn btn-danger" style="float: right; color: white;">Cancelar</a>'
        +'<button type="submit" class="btn btn-success mr-3" style="float: right;">Agregar Producto</button>'
        +'</div><!--card-footer-->'
        +'<!-- /.card -->';

        
        document.getElementById('presentaciones').appendChild(div_card);
        document.getElementById('numPresentaciones').value=p;

        saltarA('#pres'+p);
      }

    function saltarA(id, tiempo) {
        var tiempo = tiempo || 200;
        $("html, body").animate({ scrollTop: $(id).offset().top }, tiempo);
    }

    function addCarac(){
        c++;
        var div_row = document.createElement('div');
        div_row.setAttribute('class', 'row bordes mt-4');
        div_row.setAttribute('id','carac'+c);
        div_row.innerHTML = '<!-- icono borrar-->'
        +'<div class="col-sm-12 mt-2">'
        +'<div class="form-group">'
        +'<span style="float: right; color: #c82333;">'
        +'<a style="cursor: pointer; font-size: 1.3rem; display:inline-block; margin: 0 0.5rem; color: #0069d9;" data-toggle="tooltip" data-placement="top" title="Agregar característica" onclick="addCarac()"><i class="fas fa-plus-square"></i></a>'
        +'<a style="cursor: pointer; font-size: 1.3rem;" data-toggle="tooltip" data-placement="top" title="Quitar característica" onclick="quitarCarac('+c+')"><i class="fas fa-minus-square"></i></a>' 
        +'</span> </div> </div>'
        +'<!-- icono borrar-->'
        +'<!--nombre caracteristica '+c+' -->'
        +'<div class="col-sm-6 mt-2">'
        +'<div class="form-group">'
        +'<label>Seleccione*</label>'
        +'<div class="input-group" id="div_select_caracteristicas'+c+'">'
        +'<select class="form-control" style="padding-left: 3px;"'
        +' name="caracteristicas[caracteristica'+c+'][id]" id="select_caracteristicas'+c+'" onchange="listenerSelect(event)"></select>'
        +'</div> </div> </div> '
        +'<!--nombre caracteristica'+c+'--> '
        +'<!-- val caracteristica'+c+' --> '
        +'<div class="col-sm-6 mt-2"> '
        +'<div class="form-group"> '
        +'<label>Valor de característica*</label> '
        +'<div class="input-group">  '
        +'<input type="text" class="form-control" id="input_val_caract'+c+'"'
        +' name="caracteristicas[caracteristica'+c+'][value]"> '
        +'</div> </div>  </div> '
        +'<!-- val caracteristica '+c+'--> '
        +'<!-- descripcion caracteristica '+c+' --> '
        +'<div class="col-sm-12"> '
        +'<div class="form-group"> '
        +'<label>Descripción de la característica</label> '
        +'<div class="input-group"> '
        +'<textarea class="form-control" id="input_descrip_caract'+c+'" rows="2" disabled></textarea> '
        +'</div> </div> </div> '
        +'<!-- descricion caracteristica'+c+'--> '
        +'<!--fin row-->';

        document.getElementById('caracteristicas').appendChild(div_row);
        document.getElementById('numCaracteristicas').value=c;
        updateSelect('select_caracteristicas'+c,document.getElementById('input_descrip_caract'+c));
        saltarA('#carac'+c);

      }

    function quitarPres(idcard){
        var div = document.getElementById('pres'+idcard);
        div.style.opacity = '0';
        setTimeout(function(){div.parentNode.removeChild(div);}, 700);
        p--;
        document.getElementById('numPresentaciones').value=p;
      }

    function quitarCarac(idboton){
        var div = document.getElementById('carac'+idboton);
        div.style.opacity = '0';
        setTimeout(function(){div.parentNode.removeChild(div);}, 700);
        c--;
        document.getElementById('numCaracteristicas').value=c;
      }

    function enviarForm(){
        $.post('/admin/caracteristicas', $('form').serialize())
        .done(function() {
          alert( "Característica agregada satisfactoriamente." );
          // Set a timeout to hide the element again
          setTimeout(function(){
            $("#modalNewCarac").modal('toggle');
          }, 500);
        })
        .fail(function() {
          // do something here if there is an error ;
          alert( "Ocurrió un error al agregar la característica. \nPor favor, intente agregarla desde la sección de Productos / Otras Caracaterísticas." );
        });
      }

    function listenerSelect(evt){
        var id = ""+evt.target.parentNode.getAttribute('id');
        var id = ""+id.charAt(id.length-1);
        var textarea = document.getElementById('input_descrip_caract'+id);
        
        if (evt.target.value === "Nueva característica") {
          $('#modalNewCarac').on('hidden.bs.modal', function (e) {
            //console.log('ID de generador evento char: '+id);
            updateSelectAndDescrip('select_caracteristicas'+id,textarea);
          });

          $('#modalNewCarac').on('shown.bs.modal', function () {
            $('#nombre_caracteristica').focus();
          });

          $('#modalNewCarac').modal('show');
          //console.log('ID de generador evento: '+evt.target.parentNode.getAttribute('id'));
        }
        else if(evt.target.value === "SELECCIONE"){
          document.getElementById('input_val_caract'+id).removeAttribute('required');
          textarea.setAttribute('placeholder','Descripción breve de lo que representa esta característica.');
        }
        else{
          document.getElementById('input_val_caract'+id).setAttribute('required','true');
          updateTextArea(evt.target.value,textarea);
        }
      }

      function updateSelectAndDescrip(id,textarea){
        $.get('/admin/caracteristicas/ajax', function (data){
          var html_select = '';
          for(var i = 0; i<data.length; i++)
            html_select+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
          html_select+='<option style="font-weight: bold;">Nueva característica</option>';
          $('#'+id).html(html_select);
          textarea.setAttribute('placeholder',data[data.length-1].descripcion);
          var select = document.getElementById(id);
          select.selectedIndex = ""+data.length-1;
        });
      }

      function updateSelect(idselect,textarea){
        $.get('/admin/caracteristicas/ajax', function (data){
          var html_select = '<option>SELECCIONE</option>';
          for(var i = 0; i<data.length; i++)
            html_select+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
          html_select+='<option style="font-weight: bold;">Nueva característica</option>';
          $('#'+idselect).html(html_select);
          textarea.setAttribute('placeholder','Descripción breve de lo que representa esta característica.');
        });
      }

      function updateTextArea(idcarac,textarea){
        //var textarea = document.getElementById('input_descrip_caract'+id);
        //console.log("id a obtener: "+'input_descrip_caract'+idcarac);
        var ruta = "/admin/caracteristicas/ajax/"+idcarac;
        //console.log("ruta a visitar: "+ruta);
        $.get(ruta, function (data){
          textarea.setAttribute('placeholder',data.descripcion);
          //console.log("datos "+data.descripcion);
        });
      }