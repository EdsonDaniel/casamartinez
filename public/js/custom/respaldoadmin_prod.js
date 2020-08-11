      p = 1;
      c = 1;
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
        +'<input type="number" min="100" class="form-control @error(\'products[presentacion'+p+'][contenido]\')'
        +' is-invalid @enderror" name="products[presentacion'+p+'][contenido]" '
        +'placeholder="700" id="contenido'+p+'">'
        +'<select class="form-control @error(\'products[presentacion'+p+'][unidad_c]\') is-invalid @enderror"'
        +' name="products[presentacion'+p+'][unidad_c]" required > '
        +'<option>ml</option> <option>g</option> <option>l</option><option>kg</option></select>'
        
        +'@error(\'products[presentacion'+p+'][contenido]\')'
        +'<div class="alert alert-danger">{{ $message }}</div>'
        +'@enderror'

        +'@error(\'products[presentacion'+p+'][unidad_c]\')'
        +'<div class="alert alert-danger">{{ $message }}</div>'
        +'@enderror'
        
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
        +'<input type="number" min="100" class="form-control @error(\'products[presentacion'+p+'][pre_consu]\')'
        +' is-invalid @enderror" name="products[presentacion'+p+'][pre_consu]" id="precioC1" >'
        
        +'@error(\'products[presentacion'+p+'][pre_consu]\')'
        +'<div class="alert alert-danger">{{ $message }}</div>'
        +'@enderror'
        
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
        +'<input type="number" min="100" class="form-control @error(\'products[presentacion'+p+'][pre_distri]\')'
        +' is-invalid @enderror"'
        +' name="products[presentacion'+p+'][pre_distri]" >'
        
        +'@error(\'products[presentacion'+p+'][pre_distri]\')'
        +'<div class="alert alert-danger">{{ $message }}</div>'
        +'@enderror'
        
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
        +'<input type="number" min="100" class="form-control @error(\'products[presentacion'+p+'][pre_rest]\')'
        +' is-invalid @enderror"'
        +' name="products[presentacion'+p+'][pre_rest]">'
        
        +'@error(\'products[presentacion'+p+'][pre_rest]\')'
        +'<div class="alert alert-danger">{{ $message }}</div>'
        +'@enderror'
        
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
        +'<input type="number" min="100" class="form-control @error(\'products[presentacion'+p+'][pre_promo]\')'
        +' is-invalid @enderror"'
        +' name="products[presentacion'+p+'][pre_promo]" id="precioP1">'
        
        +'@error(\'products[presentacion'+p+'][pre_promo]\')'
        +'<div class="alert alert-danger">{{ $message }}</div>'
        +'@enderror'
        
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
        +'<input type="number" class="form-control @error(\'products[presentacion'+p+'][costo]\')"'
        +' is-invalid @enderror'
        +' name="products[presentacion'+p+'][costo]">'
        
        +'@error(\'products[presentacion'+p+'][costo]\')'
        +'<div class="alert alert-danger">{{ $message }}</div>'
        +'@enderror'
        
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!-- Costo adquisiscion-->'

        +'<!-- Existencias -->'
        +'<div class="col-sm-4">'
        +'<div class="form-group">'
        +'<label>Existencias*</label>'
        +'<div class="input-group">'
        +'<input type="number" class="form-control @error(\'products[presentacion'+p+'][stock]\')"'
        +' is-invalid @enderror '
        +' name="products[presentacion'+p+'][stock]">'
        
        +'@error(\'products[presentacion'+p+'][stock]\')'
        +'<div class="alert alert-danger">{{ $message }}</div>'
        +'@enderror'
        
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!-- Existencias-->'

        +'<!-- Existencias minimas -->'
        +'<div class="col-sm-4">'
        +'<div class="form-group">'
        +'<label>Stock mínimo*</label>'
        +'<div class="input-group">'
        +'<input type="number" class="form-control @error(\'products[presentacion'+p+'][stock_min]\')"'
        +' is-invalid @enderror'
        +' name="products[presentacion'+p+'][stock_min]">'
        
        +'@error(\'products[presentacion'+p+'][stock_min]\')'
        +'<div class="alert alert-danger">{{ $message }}</div>'
        +'@enderror'
        
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!-- Existencias minimas-->'

        +'<!-- estado -->'
        +'<div class="col-sm-4">'
        +'<div class="form-group">'
        +'<label>Estado*</label>'
        +'<div class="input-group">'
        +'<select class="form-control @error(\'products[presentacion'+p+'][estado]\')"'
        +' name="pro'
        +' is-invalid @enderrorducts[presentacion'+p+'][estado]">'
        +'<option>Disponible</option> <option>No disponible</option> <option>Próximamente</option>'          
        +'</select>'
        
        +'@error(\'products[presentacion'+p+'][estado]\')'
        +'<div class="alert alert-danger">{{ $message }}</div>'
        +'@enderror'
        
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
        +'<input type="number" class="form-control @error(\'products[presentacion'+p+'][alto]\')"'
        +' is-invalid @enderror' 
        +' name="products[presentacion'+p+'][alto]">'
        
        +'@error(\'products[presentacion'+p+'][alto]\')'
        +'<div class="alert alert-danger">{{ $message }}</div>'
        +'@enderror'
        
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!-- alto--> '

        +'<!-- ancho-->'
        +'<div class="col-sm-4">'
        +'<div class="form-group"> '
        +'<label>Ancho*</label> '
        +'<div class="input-group"> '
        +'<input type="number" class="form-control @error(\'products[presentacion'+p+'][ancho]\')"'
        +' is-invalid @enderror' 
        +' name="products[presentacion'+p+'][ancho]">'
        
        +'@error(\'products[presentacion'+p+'][ancho]\')'
        +'<div class="alert alert-danger">{{ $message }}</div>'
        +'@enderror'
        
        +'</div>'
        +'</div>'
        +'</div>'
        +'<!-- ancho--> '
        
        +'<!-- largo-->'
        +'<div class="col-sm-4">'
        +'<div class="form-group">'
        +'<label>Largo*</label>'
        +'<div class="input-group">'
        +'<input type="number" class="form-control @error(\'products[presentacion'+p+'][largo]\')"'
        +' is-invalid @enderror' 
        +' name="products[presentacion'+p+'][largo]" >'
        
        +'@error(\'products[presentacion'+p+'][largo]\')'
        +'<div class="alert alert-danger">{{ $message }}</div>'
        +'@enderror'
        
        +'</div>'
        +'</div>'
        +'</div> '
        +'<!-- largo-->'

        +'<!-- peso-->'
        +'<div class="col-sm-4"> '
        +'<div class="form-group">'
        +'<label>Peso (kg)*</label> '
        +'<div class="input-group"> '
        +'<input type="number" class="form-control @error(\'products[presentacion'+p+'][peso]\')"'
        +' is-invalid @enderror' 
        +' name="products[presentacion'+p+'][peso]" >'
        
        +'@error(\'products[presentacion'+p+'][peso]\')'
        +'<div class="alert alert-danger">{{ $message }}</div>'
        +'@enderror'
        
        +'</div> '
        +'</div>'
        +'</div>'
        +'<!-- peso-->'
        
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
        +'<select class="form-control" style="padding-left: 3px;" name="select_caracteristicas[]" id="select_caracteristicas'+c+'" onchange="listenerSelect(event)"></select>'
        +'</div> </div> </div> '
        +'<!--nombre caracteristica'+c+'--> '
        +'<!-- val caracteristica'+c+' --> '
        +'<div class="col-sm-6 mt-2"> '
        +'<div class="form-group"> '
        +'<label>Valor de característica*</label> '
        +'<div class="input-group">  '
        +'<input type="text" class="form-control" id="input_val_caract'+c+'" name="input_val_caract[]"> '
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
        $.post('/admin/caracteristicas', $('form').serialize()
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
        }));
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
            html_select+='<option value="'+data[i].id_caract+'">'+data[i].nombre+'</option>';
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
            html_select+='<option value="'+data[i].id_caract+'">'+data[i].nombre+'</option>';
          html_select+='<option style="font-weight: bold;">Nueva característica</option>';
          $('#'+idselect).html(html_select);
          textarea.setAttribute('placeholder','Descripción breve de lo que representa esta característica.');
        });
      }

      function updateTextArea(idcarac,textarea){
        //var textarea = document.getElementById('input_descrip_caract'+id);
        console.log("id a obtener: "+'input_descrip_caract'+idcarac);
        var ruta = "/admin/caracteristicas/ajax/"+idcarac;
        console.log("ruta a visitar: "+ruta);
        $.get(ruta, function (data){
          textarea.setAttribute('placeholder',data[0].descripcion);
          console.log("datos "+data[0].descripcion);
        });
      }