var subtotal = 0;
var count = 0;
//var change = false;
var updates={};

function isBreakpoint( alias ) {
    return $('.device-' + alias).is(':visible');
}

function hideBackdrop(){
    $("body").removeClass("preload");
    $("#backdrop").removeClass("show").addClass("d-none");
}

function addListeners() {
    checkCart();
    $("#vaciarCarrito").click( function(){
        localStorage.removeItem("shoppingCart");
        $("#listProducts").html("");
        if(logged) deleteAll();
        emptyCart();
    });
    listenerModal();   
    listenerBtnCart();
    if($("#listCarrito").length > 0){
        loadLisCart();
        loadCantidad();
    }
    if ($("#listCheckout").length > 0) {
        loadChecoutItems();
    }
    fadeNav();
}
function btnPlus(btn){
    var divParent = $(btn).closest("div.input-group");
    var btnMinus  = $(divParent).find("div.input-group-prepend button.btn-minus");
    var input = $(divParent).find(".input-cantidad");
    var value = $(input).val();
    var id = $(input).data("product");
    var price_label = $(divParent).parent();
    price_label = price_label.next();
    var price = price_label.data("price");
    $(btnMinus).next().addClass("d-none");
    $(btnMinus).prop("disabled",false).removeClass("d-none");

    if (value < 10) {
        value++;
        $(input).val(value); 
        price_label.text("$" + toPrice(price*value));
        subtotal += price;
        $("#monto-subtotal, #monto-subtotal2").text("$" + toPrice(subtotal));
        count++;
        $("#countCart").text('(' + count +')');
        updateLocalCart(id,value);
    }
    if (value >= 10) { 
        $(input).val("10"); 
        $(this).addClass("disabled").prop("disabled",true);
    }
}
function btnMinus(btn){
    var divParent = $(btn).closest("div.input-group");
    var btnPlus  = $(divParent).find("div.input-group-append button.btn-plus");
    var input = $(divParent).find(".input-cantidad");
    var value = $(input).val();
    var id = $(input).data("product");
    var price_label = $(divParent).parent();
    price_label = price_label.next();
    var price = price_label.data("price");
    

    $(btnPlus).prop("disabled",false).removeClass("disabled");

    if (value > 1) { 
        value--;
        $(input).val(value);
        price_label.text("$" + toPrice(price*value));
        subtotal -= price;
        $("#monto-subtotal, #monto-subtotal2").text("$" + toPrice(subtotal));
        count--;
        $("#countCart").text('(' + count +')');
        updateLocalCart(id,value);
    }
    if (value == 1) { 
        $(input).val("1"); 
        $(btn).addClass("disabled d-none").prop("disabled",true);
        $(btn).next().removeClass("d-none");
    }
}
function btnTrash(btn){
    var listitem = $(btn).closest("li");
    var input = $(listitem).find(".input-cantidad");
    var value = $(input).val();
    var price_label = $(listitem).find(".price-cantidad");
    var price = price_label.data("price");
    subtotal -= price*value;
    count -= value;
    $("#countCart").text('(' + count +')');
    $("#monto-subtotal, #monto-subtotal2").text("$" + toPrice(subtotal));
    var id = listitem.data("product");
    //console.log("id",id);
    //console.log("lis",listitem);
    listitem.addClass("listItemHide");
    setTimeout(
        function(){ 
            updateLocalCart(id,0);
            $(listitem).remove();
            if(subtotal == 0){ emptyCart(); }
        }
        , 400);
}
function btnTrashCart(btn){
    var listitem = $(btn).closest("li");
    var input = $(listitem).find(".input-cantidad");
    var value = $(input).val();
    var price_label = $(listitem).find(".price-cantidad");
    var price = price_label.data("price");
    subtotal -= price*value;
    count -= value;
    $("#countCart").text('(' + count +')');
    $("#monto-subtotal, #monto-subtotal2").text("$" + toPrice(subtotal));
    var id = listitem.data("product");
    //console.log("id",id);
    //console.log("lis",listitem);
    listitem.addClass("listHide");
    setTimeout(
        function(){ 
            updateLocalCart(id,0);
            $(listitem).remove();
            if(subtotal == 0){ emptyCart(); }
        }
        , 300);
}
function changeCantidad(input){
    //console.log("cambie",$(input).val());
    var value = $(input).val();
    var divParent = $(input).closest("div.input-group");
    var id = $(input).data("product");
    if($( input ).val() <= 1){
        $(input).val(1);
        updateLocalCart(id, 1);
        $(divParent)
        .find("div.input-group-prepend button.btn-minus").addClass("d-none");
        $(divParent)
        .find("div.input-group-prepend button.btn-trash").removeClass("d-none");
        $(divParent)
        .find("div.input-group-append button.btn-plus")
        .prop("disabled",false);
        return;
    }

    if($( input ).val() >= 10){
        $(input).val(10);
        updateLocalCart(id, 10);
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
    updateLocalCart(id, $(input).val());
    return;
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
        //addlistenerRadio();
    });

    $('#modalProduct').on('hidden.bs.modal', function(event){
        $("#modalImgContainer").html("");
        $("#div-presentations").html("");
    });

    $("#modalShoppingCart").on('show.bs.modal', function(event){
        if($("#cartContent").hasClass("d-none"))
            return;
        //$("#vaciarCarrito").removeClass("d-none");
        $(".card-actions").removeClass("loading");
        var inputs = $("#listProducts .input-cantidad");
        var price  = $("#listProducts span[data-price]");
        var price_cantidad = $("#listProducts span[data-price]");
        
        count = 0;
        subtotal = 0;
        var suma = 0;
        for (var i = inputs.length - 1; i >= 0; i--) {
            var cantidad = parseInt($(inputs[i]).val());
            count = count + cantidad;
            sum = cantidad * $(price[i]).data('price');
            subtotal += sum;
            $(price[i]).text('$' + toPrice(sum));
        }
        $("#monto-subtotal, #monto-subtotal2").text("$"+ toPrice(subtotal) );
        $("#countCart").text('(' + count + ')');
        $(".btn-minus:not(.d-none)").next().next().addClass("d-none");
        $(".btn-trash:not(.d-none)").next().removeClass("d-none");

    });
    $('#modalShoppingCart').on('hide.bs.modal', function(event){
        if (logged && Object.keys(updates).length)
            syncCart();
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
        + 'value="' + presentacion.presentacion +'" onchange="listenerRadio(this)"> '
        + '<label class="custom-control-label pb-1" for="modalPresentation'
        + presentacion.id_presentacion +'">'
        + '<span class="embed-responsive embed-responsive-1by1 bg-cover" '
        + 'style="background-image: url('+ '/storage/' + presentacion.foto_url
        + ');"></span>'
        + '</label></div>';
    
    return div;

}
//function addlistenerRadio(){
function listenerRadio(input){
    /*$('[data-toggle="form-caption"]').change( function(){
        $("#modalProductPresentationCaption").text($(this).val());
        $("#modalImgContainer img").removeClass("show");
        $($(this).data("target")).addClass("show");
    });*/
    $("#modalProductPresentationCaption").text($(input).val());
    $("#modalImgContainer img").removeClass("show");
    $($(input).data("target")).addClass("show");
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

function loadCantidad(){
    var shoppingCart = localStorage.getItem("shoppingCart");
    shoppingCart = JSON.parse(shoppingCart);
    //console.log(shoppingCart);
    var subtotalProduct = $("#listCarrito .price-cantidad");
    var inputs = $("#listCarrito .input-cantidad").val( function(i, val){
        var monto = shoppingCart[i].cantidad * $(subtotalProduct[i]).data("price");
        $(subtotalProduct[i]).text("$" + toPrice(monto));
        if(shoppingCart[i].cantidad == 1){
            $(this).prev().find(".btn-trash").removeClass("d-none");
            $(this).prev().find(".btn-minus").addClass("d-none");
        }
        return shoppingCart[i].cantidad;
    });
}

function loadChecoutItems(){
    //$("#formDireccion :input").removeAttr("required");
    var productsInCart = localStorage.getItem('shoppingCart');
    if(productsInCart == null || productsInCart == "[]"){
        emptyCart();
        return;
    }
    productsInCart = JSON.parse(productsInCart);
    var subtotall = 0;
    var countp = 0;
    for (var i = 0; i < productsInCart.length; i++) {
        subtotall = subtotall + createListCheckout( 
            productsInCart[i].presentacion_producto_id, 
            productsInCart[i].cantidad );
        countp = countp + productsInCart[i].cantidad;
        //console.log(countp)
        //console.log(subtotall);
    }
    $("#monto-subtotal3").text("$"+toPrice(subtotall));
    $("#countp").text("("+ countp +")");
    $("#direccionFacturacion :input, #password").prop("required", false);
    $("#mismaDireccion").change( function(){
        $("#direccionFacturacion :input").prop("required", $(this).prop("checked"));
    });
    $("#registrarse").change( function(){
        $("#password").prop("required", $(this).prop("checked"));
    })
}

function listenerBtnCart(){
    $("#cartButtons button, #toCheck").click( function(){
        $("#backdrop").removeClass("d-none").addClass("show");
        submitCart($(this).data("redirect"));
    });
    $("#backToShop").click( function(){
        if (logged)
        syncCart();
    });
}
function submitCart(redirect){
    if(Object.keys(updates).length && logged){
        $.post('/validate-cart', 
        {
            "_token": $("meta[name='csrf-token']").attr("content"),
            "updates"  : updates
        })
        .always(function() {
            if(redirect=="cartView")
                window.location.href = '/carrito-de-compras';
            else window.location.href = '/informacion-de-envio';
        });
    }
    else{
        if(redirect=="cartView")
            window.location.href = '/carrito-de-compras';
        else window.location.href = '/informacion-de-envio';
    }
}

/***********************************************account*///////////////////////

function validarCP(btn){
    $(btn).prop('disabled', true);
    var input = $(btn).data('input');
    $(input).change();

    setTimeout( function(){ $(btn).prop('disabled', false);} , 400);
}


/*********************************cart*****************************************/
function emptyCart(){
    $("#countCart").text("(0)");
    $("#cartEmpty").removeClass("d-none");
    $("#cartContent, #tooltip-cart, #cartNotEmpty").addClass("d-none");
    //$("#headEmpty, #btnEmpty").removeClass("d-none");
}

function checkCart(){
    if(logged){ loadCart(); }
    loadLocalCart();
    pushToLocalCart();
}

function updateLocalCart(id, cantidad){
    var localCart = localStorage.getItem("shoppingCart");
    localCart = JSON.parse(localCart);
    for (var i = localCart.length - 1; i >= 0; i--) {
        if(localCart[i].presentacion_producto_id == id){
            if (cantidad <= 0) { 
                console.log(localCart.splice(i, 1),"eliminado");
                pushRemoteCart(id,0);
                delete updates[id];
            }
            else if(cantidad <= 12){
                localCart[i].cantidad = cantidad;
                updates[id] = cantidad;
            }
            
            localCart = JSON.stringify(localCart);
            localStorage.setItem("shoppingCart",localCart);
            //console.log(updates);
            //pushRemoteCart(id,cantidad);
            //change = true;
            return;
        }
    }

}
function loadLocalCart(){
    var productsInCart = localStorage.getItem('shoppingCart');
    if(productsInCart == null || productsInCart == "[]"){
        emptyCart();
        return;
    }
    productsInCart = JSON.parse(productsInCart);
    subtotal = 0;
    for (var i = 0; i < productsInCart.length; i++) {
        subtotal+= createProductCart( 
            productsInCart[i].presentacion_producto_id, 
            productsInCart[i].cantidad );
    }
    $("#cartContent, #tooltip-cart").removeClass("d-none");
    $("#monto-subtotal2").text("$"+toPrice(subtotal));

}
function loadCart(){
    var shoppingCart = JSON.stringify(inCart);
    localStorage.setItem("shoppingCart",shoppingCart);
}

function pushToLocalCart(){
    $("button.toCart").click( function(){
        var div_parent = $(this).closest(".card-actions");
        div_parent.addClass("loading");
        var idPresentation = $(this).data("presentation");
        var productsInCart = localStorage.getItem('shoppingCart');
        var cantidad = 1;
        $("#cartContent, #tooltip-cart").removeClass("d-none");
        $("#cartEmpty").addClass("d-none");
        if(productsInCart == null){
            productsInCart = '[{"presentacion_producto_id":'
                           + idPresentation +', "cantidad":1}]';
            createProductCart(idPresentation, 1);
        }
        else{
            productsInCart = JSON.parse(productsInCart);
            var exist = false;
            for (var i = productsInCart.length - 1; i >= 0; i--) {
                if (productsInCart[i].presentacion_producto_id == idPresentation){
                    if(productsInCart[i].cantidad < 12){
                        cantidad = productsInCart[i].cantidad +1;
                        productsInCart[i].cantidad += 1;
                        updateCartItems(idPresentation, cantidad);
                    }
                    exist = true;
                    break;
                }
            }
            if(!exist){
                productsInCart.push(
                    {
                        presentacion_producto_id: idPresentation,
                        cantidad: 1
                    });
                createProductCart(idPresentation, 1);
            }
            productsInCart = JSON.stringify(productsInCart);

        }
        localStorage.setItem("shoppingCart",productsInCart);
        
        div_parent.removeClass("loading");
        if(logged)pushRemoteCart(idPresentation, cantidad);
        $("#modalShoppingCart").modal();
    });
}
function updateCartItems(idPresentation,cantidad){
    if(cantidad < 12 && cantidad > 1){
        $("#modalShoppingCart input[data-product='"+ idPresentation +"']")
        .val( cantidad );
    }
}
function pushRemoteCart(idPresentation, cantidad){
   $.post('/add-to-cart/' + idPresentation, 
    {
        "_token": $("meta[name='csrf-token']").attr("content"),
        "cantidad": cantidad
    })
    .done(function( data ) {
        //inCart = data;
        //loadCart();
    });
}

function createProductCart(id, cantidad){
    var prod = getDataProd(id);
    var html = '<li class="list-group-item" data-product=' 
             + prod.id_presentacion
             + ' >'
             + '<div class="row align-items-center">'
             + '<div class="col-3 px-0 col-img">'
             + '<!-- Image -->'
             + '<a href="">'
             + '<img class="img-fluid" src="/storage/' + prod.foto_url 
             + '" alt="...">'
             + '</a>'
             + '</div>'
             + '<div class="col-9 pl-0">'
             + '<div class="tooltip float-right">'
             + '<button class="btn close border btn-trash close p-1" '
             + 'onclick="btnTrash(this)">'
             + '<i class="icon-trash-product far fa-trash-alt" ></i>'
             + '</button>'
             + '<span class="tooltiptext tooltiptext-lg tooltip-left">Eliminar del carrito</span>'
             + '</div>'
             + '<!-- Title -->'
             + '<p class="font-size-sm font-weight-bold mb-2 mb-md-0">'
             + '<a class="text-body title-product-cart" href="">'
             + prod.nombre + ' ' + prod.presentacion + '</a><br>'
             + '<span class="price-cart d-block mt-2">' + prod.formated_price 
             + '</span>'
             + '</p>'
             + '<!--Footer -->'
             + '<div class="d-flex align-items-md-center align-items-end mt-md-2">'
             + '<div class="d-flex align-items-md-center align-items-start '
             + ' flex-column flex-md-row">'
             + '<label class="d-block mr-2 my-0 mb-1 mb-md-0 cantidad-label" >'
             + 'Cantidad: </label>'
             + '<div class="input-group ">'
             + '<div class="input-group-prepend">'
             + '<div class="input-group-text p-0 rounded-0 tooltip">'
             + '<button type="button" class="btn icon-input-number rounded-0'
             + ' btn-minus  ';
             if (cantidad == 1) { html += 'd-none '; }
             html += 'h-100" onclick="btnMinus(this)">-</button>'
             + '<button type="button" onclick="btnTrash(this)" class="'
             + 'btn rounded-0 btn-trash h-100 ';

             if (cantidad >1) { html += 'd-none '; }
             
             html += '">'
             + '<i class="icon-trash-product far fa-trash-alt"></i></button>'
             + '<span class="tooltiptext tooltiptext-lg tooltip-left">Eliminar del carrito</span>'
             + '</div>'
             + '</div>'
             + '<input type="number" class="form-control input-cantidad '
             + ' font-sans-serif" data-product="' + prod.id_presentacion + '" '
             + 'value="' + cantidad + '" min="1" max="10" '
             + 'onchange="changeCantidad(this)">'
             + '<div class="input-group-append">'
             + '<div class="input-group-text p-0 rounded-0">'
             + '<button type="button" class="btn icon-input-number rounded-0 h-100 '
             + 'btn-plus" onclick="btnPlus(this)">+</button>'
             + '</div></div></div></div>'
             + '<span class="price-cantidad text-muted ml-auto" data-price=' 
             + prod.precio_consumidor + ' >$'
             + toPrice(prod.precio_consumidor*cantidad);
             + '</span>'
             + '</div>'
             + '</div>'
             + '</div>'
             + '</li>';
    $("#listProducts").append(html);
    return prod.precio_consumidor*cantidad;
}

function loadLisCart(){
    if(!logged){
        var productsInCart = localStorage.getItem('shoppingCart');
        if(productsInCart == null || productsInCart == "[]"){
            emptyCart();
            return;
        }
        productsInCart = JSON.parse(productsInCart);
        subtotal = 0;
        for (var i = 0; i < productsInCart.length; i++) {
            subtotal+= createListItemCart( 
                productsInCart[i].presentacion_producto_id, 
                productsInCart[i].cantidad );
        }
        $("#cartContent, #tooltip-cart").removeClass("d-none");
        $("#monto-subtotal2").text("$"+toPrice(subtotal));
    }
}

function deleteAll(){
    $.post('/empty-cart', 
    {
        "_token": $("meta[name='csrf-token']").attr("content")        
    })
    .done(function( data ) {
        console.log(data);
    });
}
function syncCart(){
    if(Object.keys(updates).length)
    $.post('/update-cart', 
    {
        "_token": $("meta[name='csrf-token']").attr("content"),
        "updates"  : updates
    })
    .done(function( data ) {
        //change=false;
        updates={};
    });
}

function createListItemCart(id, cantidad){
    var prod = getDataProd(id);
    var html = '<li class="list-group-item border-0" data-product="' + prod.id_presentacion +'">'
             + '<hr>'
             + '<div class="row align-items-center">'
             + '<div class="col-3">'
             + '<!-- Image -->'
             + '<a href="product.html">'
             + '<img src="/storage/' + prod.foto_url +'" alt="..." class="img-fluid">'
             + '</a>'
             + '</div>'
             + '<div class="col">'
             + '<!-- Title -->'
             + '<div class="d-flex mb-2 font-weight-bold">'
             + '<a class="title-product-cart "  href="product.html">'
             + prod.nombre
             + '</a>'
             + '<button class="ml-auto btn close btn-trash close p-1" onclick="btnTrashCart(this)">'
             + '<i class="icon-trash-product far fa-trash-alt" ></i>'
             + '</button>'
             + '</div>'
             + ''
             + '<!-- Text -->'
             + '<p class="m-0 cantidad-label" style="font-weight: 500;">'
             + 'Presentación: ' + prod.presentacion
             + '</p>'
             + '<p class="my-1 price-cart">' + prod.formated_price + '</p>'
             + '<!--Footer -->'
             + '<div class="d-flex justify-content-center align-items-end">'
             + '<div class="form-group d-flex flex-column align-items-start '
             + ' mb-0" style="font-weight: 500;">'
             + '<label class="cantidad-label text-center mr-3 mr-md-0 my-0" '
             + ' style="font-size: 0.9rem;">Cantidad:</label>'
             + '<div class="input-group mt-md-1">'
             + '<div class="input-group-prepend">'
             + '<div class="input-group-text p-0 rounded-0">'
             + '<button type="button" class="btn icon-input-number '
             + 'h-100 rounded-0 btn-minus " onclick="btnMinus(this)" >-</button>'
             + '<button type="button" onclick="btnTrash(this)" class="btn rounded-0 btn-trash '
             + 'h-100 d-none"> <i class="icon-trash-product far fa-trash-alt"></i></button>'
             + '</div>'
             + '</div>'
             + '<input type="number" class="form-control input-cantidad" placeholder="1" '
             + ' value="' + cantidad +'" min="1" max="10" onchange="changeCantidad(this)" '
             + 'data-product="' + prod.id_presentacion +'">'
             + '<div class="input-group-append">'
             + '<div class="input-group-text p-0 rounded-0">'
             + '<button type="button" onclick="btnPlus(this)" class="btn icon-input-number '
             + 'btn-plus h-100" >+</button>'
             + '</div></div></div></div>'
             + '<span data-price="' + prod.precio_consumidor +'" class="ml-auto price-cantidad">'
             + '</span> </div></div></div></li>';

             $("#listCarrito").append(html);

    return prod.precio_consumidor*cantidad;
}

function createListCheckout(id, cantidad){
    var prod = getDataProd(id);
    var html = '<li class="list-group-item"> '
             + ' <div class="row align-items-center"> '
             + ' <div class="col-4 p-0"> '
             + ' <!-- Image --> '
             + ' <a href="product.html" data-cart-items="' + cantidad + '"> '
             + ' <img src="/storage/'+ prod.foto_url +'"  alt="..." class="img-fluid"> '
             + ' </a> '
             + ' </div> '
             + ' <div class="col"> '
             + '  '
             + ' <!-- Title --> '
             + ' <p style="font-size:0.9rem;"> '
             + ' <a href="product.html">'
             + prod.nombre+'</a> <br> '
             + ' <span class="text-muted">$' + toPrice(prod.precio_consumidor * cantidad) 
             + '</span> '
             + ' </p> '
             + ' <!-- Text --> '
             + ' <div style="font-size:0.9rem;" text-muted"> '
             + ' Presentación:' + prod.presentacion +'<br> '
             + ' </div> '
             + ' </div> '
             + ' </div> '
             + ' </li> ';
    $("#listCheckout").append(html);
    return prod.precio_consumidor*cantidad;
}
function saltarA(id, tiempo) {
    var tiempo = tiempo || 200;
    $("html, body").animate({ scrollTop: $(id).offset().top - 70 }, tiempo);
}
function onChangeNewAddress(input){
    if($(input).is(":checked")){
        var contrario = $($(input).data("relative"));
        contrario.prop("checked",false);
        contrario.next().attr("aria-expanded", false);
        $(contrario.next().data("target")).removeClass("show");
        saltarA($(input));
        if ($(input).hasClass("toF"))
        $("#form-nueva-direccion input").first().focus();
    }
}

function fadeNav(){
    $(window).scroll(function(){
        var alto = $("#head-tienda").outerHeight();
        $("#topbar").toggleClass('nav-white', $(this).scrollTop()>alto);
    });
}

function changeToPrice(){
    var prices = $(".toPrice");
    for (var i = prices.length - 1; i >= 0; i--) {
        $(prices[i]).text( '$' + toPrice( parseFloat( prices[i].innerText) ) );
    }
}