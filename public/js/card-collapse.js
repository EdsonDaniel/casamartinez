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
});


