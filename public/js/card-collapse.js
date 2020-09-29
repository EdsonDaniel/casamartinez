// A $( document ).ready() block.
function isBreakpoint( alias ) {
    return $('.device-' + alias).is(':visible');
}
//eventoo de open marcas agregar margen al fondo
if( isBreakpoint('xs') || isBreakpoint('sm')) {
    $("#rowProducts div.col-6").addClass("p-3");
    $("img[img-modal]").addClass("img-product-modal");
    $("#branchCollapse, #linkBranchCollapse").addClass("border");
}
else{
    $('#rowFilters, #rowProducts').removeClass("no-gutters");
    $("#linkBranchCollapse").attr("aria-expanded","true");
    $("#branchCollapse").addClass("show");
}

function hideBackdrop(){
    $("body").removeClass("preload");
    $("#backdrop").removeClass("show").addClass("d-none");
}

$( document ).ready(function() {

    $(".input-cantidad").each(function( index ) {
        var divParent = $(this).closest("div.input-group");
        if($( this ).val() == 1){
            $(divParent)
            /*.find("div.input-group-prepend button.btn-minus").addClass("d-none");*/
            $(divParent)
            .find("div.input-group-prepend button.btn-trash").removeClass("d-none");
        }
    });

    $("#buttonPlus").click( function(){
        $("#buttonMinus").prop("disabled",false).removeClass("disabled");
        var value = $("#inputCantidad").val();
        if (value < 10) {$("#inputCantidad").val(++value); return;}
        if (value > 10) {$("#inputCantidad").val("10");}
        $("#buttonPlus").addClass("disabled").prop("disabled",true);
    });
    $("#buttonMinus").click( function(){
        $("#buttonPlus").prop("disabled",false).removeClass("disabled");
        var value = $("#inputCantidad").val();
        if (value > 1) {$("#inputCantidad").val(--value); return;}
        if (value < 1) {$("#inputCantidad").val("1");}
        $("#buttonMinus").addClass("disabled").prop("disabled",true);
    });

    $(".btn-plus").click( function(){
        var divParent = $(this).closest("div.input-group");
        var btnMinus  = $(divParent).find("div.input-group-prepend button.btn-minus");
        var input = $(divParent).find(".input-cantidad");
        var value = $(input).val();
        console.log("value: ",value);

        $(btnMinus).prop("disabled",false).removeClass("disabled");

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
        console.log("value: ",value);

        $(btnPlus).prop("disabled",false).removeClass("disabled");

        if (value > 1) { $(input).val(--value);}
        if (value == 1) { 
            $(input).val("1"); 
            $(this).addClass("disabled d-none").prop("disabled",true);
            $(this).next().removeClass("d-none");
        }
        
    });

    $("#inputCantidadCart").change( function(){
        console.log("cambie",$(this).val());
        var value = $(this).val();
        if (value == 1 ) {

        }
    });

    
});



