// A $( document ).ready() block.
$( document ).ready(function() {
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