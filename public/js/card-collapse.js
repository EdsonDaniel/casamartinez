
function isBreakpoint( alias ) {
    return $('.device-' + alias).is(':visible');
}

function hideBackdrop(){
    $("body").removeClass("preload");
    $("#backdrop").removeClass("show").addClass("d-none");
}

//$( document ).ready(function() {
function addListeners() {
    loadCart();

    $(".input-cantidad").each(function( index ) {
        var divParent = $(this).closest("div.input-group");
        if($( this ).val() == 1){
            /*.find("div.input-group-prepend button.btn-minus").addClass("d-none");*/
            $(divParent)
            .find("div.input-group-prepend button.btn-trash").removeClass("d-none");
        }
        else{
            $(divParent)
            .find("div.input-group-prepend button.btn-minus").removeClass("d-none");
        }
    });

    $(".btn-plus").click( function(){
        var divParent = $(this).closest("div.input-group");
        var btnMinus  = $(divParent).find("div.input-group-prepend button.btn-minus");
        var input = $(divParent).find(".input-cantidad");
        var value = $(input).val();
        //console.log("value: ",value);
        $(btnMinus).next().addClass("d-none");
        $(btnMinus).prop("disabled",false).removeClass("disabled d-none");

        if (value < 10) { $(input).val(++value);}
        if (value >= 10) { 
            $(input).val("10"); 
            $(this).addClass("disabled").prop("disabled",true);
        }
        
    });

    $(".btn-minus").click( function(){
        var divParent = $(this).closest("div.input-group");
        var btnPlus  = $(divParent).find("div.input-group-append button.btn-plus");
        var input = $(divParent).find(".input-cantidad");
        var value = $(input).val();
        //console.log("value: ",value);

        $(btnPlus).prop("disabled",false).removeClass("disabled");

        if (value > 1) { $(input).val(--value);}
        if (value == 1) { 
            $(input).val("1"); 
            $(this).addClass("disabled d-none").prop("disabled",true);
            $(this).next().removeClass("d-none");
        }
        
    });

    $(".input-cantidad").change( function(){
        //console.log("cambie",$(this).val());
        var value = $(this).val();
        var divParent = $(this).closest("div.input-group");
        if($( this ).val() <= 1){
            $(this).val(1);
            $(divParent)
            .find("div.input-group-prepend button.btn-minus").addClass("d-none");
            $(divParent)
            .find("div.input-group-prepend button.btn-trash").removeClass("d-none");
            $(divParent)
            .find("div.input-group-append button.btn-plus")
            .prop("disabled",false);
            return;
        }

        if($( this ).val() >= 10){
            $(this).val(10);
            $(divParent)
            .find("div.input-group-append button.btn-plus")
            .prop("disabled",true);
            $(divParent)
            .find("div.input-group-prepend button.btn-trash").addClass("d-none");
            $(divParent)
            .find("div.input-group-prepend button.btn-minus").removeClass("d-none");
            return;
        }

        $(divParent)
        .find("div.input-group-prepend button.btn-trash").addClass("d-none");
        $(divParent)
        .find("div.input-group-prepend button.btn-minus").removeClass("d-none");
        $(divParent)
        .find("div.input-group-append button.btn-plus")
        .prop("disabled",false);
        return;

    });

    listenerModal();
    listenerAddToCart();
    
}

function listenerModal(){
    $('#modalProduct').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var idProduct = button.data('product');
        var idPresentation = button.data('presentation');
        var product = parents_presentations.parent[idProduct];
        var presentation = product.presentations[idPresentation];
        
        var modal = $(this);
        modal.find('h4.title-product-modal')
             .text(presentation.nombre + " " + presentation.presentacion);
        modal.find('h4.price-product-modal')
             .text(presentation.formated_price + " MXN");

        createPresentationsModal(product.presentations);
        addlistenerRadio();
    });

    $('#modalProduct').on('hide.bs.modal', function(event){
        $("#modalImgContainer").html("");
        $("#div-presentations").html("");
    });
}

function createPresentationsModal(presentations){
    for (const prop in presentations) {
       $("#div-presentations")
        .append( createRadioPresentation( presentations[prop] ));
    }
    $("#div-presentations").find(":radio").first().prop("checked",true);
    $("#modalImgContainer").find("img").first().addClass("show");
    //console.log($("#div-presentations").find(":radio").first());

}

function createRadioPresentation(presentacion){
    $("#modalImgContainer").append(
        ' <img class="img-fluid my-md-5 fade transition-img" id="img-'
        + presentacion.id_presentacion +'" '
        +'src="/storage/' + presentacion.foto_url + '" alt="Fotografía del producto">');
    var div =
         '<div class="custom-control custom-control-inline '
        + 'custom-control-img">\n'
        + '<input type="radio" class="custom-control-input" '
        + 'id="modalPresentation' + presentacion.id_presentacion +'" '
        + 'name="modalProductPresentacion" '
        + 'data-toggle="form-caption" data-target="#img-'
        + presentacion.id_presentacion + '" '
        + 'value="' + presentacion.presentacion +'" > '
        + '<label class="custom-control-label pb-1" for="modalPresentation'
        + presentacion.id_presentacion +'">'
        + '<span class="embed-responsive embed-responsive-1by1 bg-cover" '
        + 'style="background-image: url('+ '/storage/' + presentacion.foto_url
        + ');"></span>'
        + '</label></div>';
    
    return div;

}

function addlistenerRadio(){
    $('[data-toggle="form-caption"]').change( function(){
        $("#modalProductPresentationCaption").text($(this).val());
        $("#modalImgContainer img").removeClass("show");
        $($(this).data("target")).addClass("show");
    });
}


function CheckBrowser() {
    return ('localStorage' in window && window['localStorage'] !== null);
}

function createStorage() {
    if (CheckBrowser()) {
        var key = "";
        var list = "<tr><th>Item</th><th>Value</th></tr>\n";
        var i = 0;
        //For a more advanced feature, you can set a cap on max items in the cart.
        for (i = 0; i <= localStorage.length-1; i++) {
            key = localStorage.key(i);
            list += "<tr><td>" + key + "</td>\n<td>"
                    + localStorage.getItem(key) + "</td></tr>\n";
        }
        //If no item exists in the cart.
        if (list == "<tr><th>Item</th><th>Value</th></tr>\n") {
            list += "<tr><td><i>empty</i></td>\n<td><i>empty</i></td></tr>\n";
        }
        //Bind the data to HTML table.
        //You can use jQuery, too.
        document.getElementById('list').innerHTML = list;
    } else {
        alert('Cannot save shopping list as your browser does not support HTML 5');
    }
}

function listenerAddToCart(){
    $("button.toCart").click( function(){
        var div_parent = $(this).closest(".card-actions");
        div_parent.addClass("loading");
        var idPresentation = $(this).data("presentation");
        $.post('/add-to-cart/' + idPresentation, $('form').serialize())
        .done(function() {
          div_parent.removeClass("loading");
          $("#modalShoppingCart").modal();
        })
        .fail(function() {
          div_parent.removeClass("loading");
        });
    });
}

function pushProsduct(id){
    $.post('/add-to-cart/' + id, $('form').serialize())
        .done(function() {
          
        })
        .fail(function() {
          // do something here if there is an error ;
          alert( "Ocurrió un error al agregar la característica. \nPor favor, intente agregarla desde la sección de Productos / Otras Caracaterísticas." );
        });
}


function loadCart(){
    if(logged){
        var list = $("#listProducts");
        var count = 0;
        var subtotal = 0;
        var listItem ="";
        for (var i = inCart.length - 1; i >= 0; i--) {
            count += inCart[i].cantidad;
            subtotal += createProductCart(
                inCart[i].presentacion_producto_id,inCart[i].cantidad);
            
        }
        $("#footer-modal-cart").removeClass("d-none");
        $("#monto-subtotal").text("$"+ toPrice(subtotal) );
        $("#countCart").text('(' + count + ')');
    }
}

function createProductCart(id, cantidad){
    var prod = getDataProd(id);
    var html = '<li class="list-group-item">'
             + '<div class="row align-items-center">'
             + '<div class="col-3 px-0 col-img">'
             + '<!-- Image -->'
             + '<a href="">'
             + '<img class="img-fluid" src="/storage/' + prod.foto_url 
             + '" alt="...">'
             + '</a>'
             + '</div>'
             + '<div class="col-9 pl-0">'
             + '<!-- Title -->'
             + '<p class="font-size-sm font-weight-bold mb-2 mb-md-0">'
             + '<a class="text-body title-product-cart" href="">'
             + prod.nombre + ' ' + prod.presentacion + '<br>'
             + '<span class="price-cart d-block mt-2">' + prod.formated_price 
             + '</span></a>'
             + '</p>'
             + '<!--Footer -->'
             + '<div class="d-flex align-items-md-center align-items-end mt-md-2">'
             + '<div class="d-flex align-items-md-center align-items-start '
             + ' flex-column flex-md-row">'
             + '<label class="d-block mr-2 my-0 mb-1 mb-md-0 cantidad-label" >'
             + 'Cantidad: </label>'
             + '<div class="input-group ">'
             + '<div class="input-group-prepend">'
             + '<div class="input-group-text p-0 rounded-0">'
             + '<button type="button" class="btn icon-input-number rounded-0'
             + ' btn-minus d-none h-100">-</button>'
             + '<button type="button" class="btn rounded-0 btn-trash d-none h-100">'
             + '<i class="icon-trash-product far fa-trash-alt"></i></button>'
             + '</div>'
             + '</div>'
             + '<input type="number" class="form-control input-cantidad '
             + ' font-sans-serif"  '
             + 'value="' + cantidad + '" min="1" max="10">'
             + '<div class="input-group-append">'
             + '<div class="input-group-text p-0 rounded-0">'
             + '<button type="button" class="btn icon-input-number rounded-0 h-100 '
             + 'btn-plus">+</button>'
             + '</div></div></div></div>'
             + '<span class="price-cantidad text-muted ml-auto" >$'
             + toPrice(prod.precio_consumidor*cantidad);
             + '</span>'
             + '</div>'
             + '</div>'
             + '</div>'
             + '</li>';
    $("#listProducts").append(html);

    return prod.precio_consumidor*cantidad;
}

function getDataProd(id){
    for (var i = productos.length - 1; i >= 0; i--) {
        if(productos[i].id_presentacion == id)
            return productos[i];
    }
    return null;
}

function toPrice(number){
    return number.toLocaleString("en", 
        {minimumFractionDigits: 2, maximumFractionDigits:2});
}