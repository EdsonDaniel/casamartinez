// A $( document ).ready() block.
function isBreakpoint( alias ) {
    return $('.device-' + alias).is(':visible');
}
//eventoo de open marcas agregar margen al fondo
if( isBreakpoint('xs') || isBreakpoint('sm')) {
    /*$('#linkBranchCollapse').addClass("shadow-sm");*/
    
    /*$("#rowBranch").addClass("border rounded");*/
    
    //$("#li-listSide").removeClass("shadow-sm");
    /*$('#branchCollapse').removeClass("shadow");*/
    
    /*$('#rowFilters, #rowProducts').addClass("no-gutters");*/

    /*$('#collapseFilter').addClass("border rounded");*/
    /*$("#linkCollapseFilter").addClass("font-size-md");*/
    /*$("#filterBar").addClass("border shadow-sm");*/
    $("#rowProducts div.col-6").addClass("p-1");
    $("img[img-modal]").addClass("img-product-modal");
    //quitar borde superior
    //juntar los dos botones
}
else{
    /*$("#listSide").addClass("shadow");*/
    $('#rowFilters, #rowProducts').removeClass("no-gutters");
    $("#linkBranchCollapse").attr("aria-expanded","true");
    $("#branchCollapse").addClass("show");
}

$( document ).ready(function() {



    /*
    var t = $('[data-toggle="card-collapse"]'),
        e = $(".card-collapse");
    t.on({
        mouseenter: function() {
            $(this).find(".card-collapse").collapse("show")
        },
        mouseleave: function() {
            var t = $(this).find(".card-collapse");
            t.hasClass("collapsing") ? setTimeout(function() {
                    t.collapse("hide")
                }, 350) :
                t.collapse("hide")
        }
    }), e.on({
        "show.bs.collapse": function() {
            var t = $(this),
                e = t.closest(".card-collapse-parent"),
                a = t.outerHeight(!0);
            e.css({
                "-webkit-transform": "translateY(-" + a + "px)",
                transform: "translateY(-" + a + "px)"
            })
        },
        "hide.bs.collapse": function() {
            $(this).closest(".card-collapse-parent").css({
                "-webkit-transform": "",
                transform: ""
            })
        }
    });
    */
});


