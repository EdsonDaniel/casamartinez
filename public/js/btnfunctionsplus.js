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