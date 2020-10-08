function toPay(){

	var cart = localStorage.getItem("shoppingCart");
    //cart = JSON.parse(cart);
    console.log($("#formDireccion").serialize());
    
    if(Object.keys(cart).length && logged ){
    	var data = $('#formDireccion').serializeArray();
    	data.push({name:'cart', value: cart});
    	console.log(data);
    	$.post('/checkout', data);
    }
    
}


function loadInfoCP(input){
	var terminacion="";
	if($(input).val() < 10000){
		$(input).addClass("is-invalid");
		$(input).parent().next().addClass("d-block");
		return;
	}
	getInfoCP(input);
}

function getInfoCP(input){
	var url = "https://api-sepomex.hckdrk.mx/query/info_cp/" + $(input).val() +"?type=simplified";
	var jqxhr = $.get( url, function(data) {
		$(input).removeClass("is-invalid");
		$(input).parent().next().removeClass("d-block");
		loadAllInfoCP(input,data);
	})
	.fail(function() {
		alert( "Codigo postal inválido." );
		invalidCP(input);
	});
}

function loadAllInfoCP(input, data){
	var inputs = $("[data-codigo='"+input.id+"']");
	var colonia = $(inputs[0]).html("");
	var municipio = $(inputs[1]).html("");
	var estado = $(inputs[2]);
	if(!data.error){
		var colonias = data.response.asentamiento;
		for (var i = 0; i < colonias.length; i++) {
			colonia.append('<option value="' + colonias[i] +'">' + colonias[i] + '</option>' );
		}
		inputs.prop("disabled",false);
		municipio.val(data.response.municipio).prop("readonly",true).css("background-color","white");
		estado.val(data.response.estado).prop("readonly",true).css("background-color","white");
		colonia.prop("disabled",false);
	}
	else{
		invalidCP(input);
	}
}
function invalidCP(input){
	var inputs = $("[data-codigo='"+input.id+"']");
	inputs.prop("disabled");
	$(input).addClass("is-invalid");
	$(input).parent().next().addClass("d-block");
}