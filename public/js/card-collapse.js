// A $( document ).ready() block.
function isBreakpoint( alias ) {
    return $('.device-' + alias).is(':visible');
}


$( document ).ready(function() {

    if( isBreakpoint('xs') || isBreakpoint('sm')) {
        $('#linkBranchCollapse').attr("aria-expanded",false);
        $('#branchCollapse').removeClass("show");
        $('#rowFilters').addClass("no-gutters");
        $('#collapseFilter').addClass("border pt-2");
        //quitar borde superior
        //juntar los dos botones
    }
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
});


function isBreakpoint( alias ) {
    return $('.device-' + alias).is(':visible');
}