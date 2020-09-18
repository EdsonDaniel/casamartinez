selectedOption();

var tipos_usuario = ["No definido","Cliente","Cliente mayorista",
      "Distribuidor","Empleado","Administrador"];
 var msg_update;
 var css_class_btn;
 var css_text_btn;
 
$("#nombre_usuario").html( '<span class="mt-0 pt-0 text-dark">Usuario: </span><br>' +
	usuario.name + " " + usuario.last_name + " ("+ tipos_usuario[usuario.tipo_usuario] + ")");

if(editable == "disabled"){
	$("#btn_editar").removeClass("d-none");
}else{
	$("#btn_actualizar, #btn_cancelar, #div_pass, #card_footer").removeClass("d-none");
	$("#name").focus();
}

if(usuario.active){
	$("#btn_ban").removeClass("d-none");
	$("#form_bajaUsuario").attr("action","/admin/usuarios/baja/"+usuario.id);
	css_class_btn = "btn-danger";
	css_text_btn  = "Inhabilitar";
}else{
	$("#btn_ban").removeClass("d-none btn-danger")
	.addClass("btn-success").text("Habilitar");
	$("#form_bajausuario").attr("action","/admin/usuarios/alta/"+usuario.id);
	css_class_btn = "btn-success";
	css_text_btn  = "Habilitar";
}


$("#btn_editar").click( function() {
	$(this).addClass("d-none");
	$("#btn_actualizar, #btn_cancelar, #div_pass, #card_footer").removeClass("d-none");
	$(":input").removeAttr("disabled");
	$("#name").focus();
} );

$("#btn_cancelar, #f-cancel").click( function() {
	$("#btn_editar").removeClass("d-none");
	$("#btn_actualizar, #btn_cancelar, #div_pass, #card_footer").addClass("d-none");
	reset_inputs();
	$(":text, select").attr("disabled","true").removeClass("is-invalid");
	$(".error").addClass("d-none");
	
} );

$("#btn_ban").click( function(){
	launch_modal(true);
} );


$("#btn_actualizar, #f-update").click( function(){
	var lista = getListChanges();
	if(lista != null){
		var title;
		var msg;
		var css_class;
		if(lista == " "){
			title = "No se encontraron cambios para actualizar";
			msg = "Intente cambiar el valor de algún campo.";
			$("#msg").removeClass("text-danger").addClass("text-dark");
			$("#btn_secondary").removeClass("d-none");
			$("#btn_borrar").addClass("d-none");
			//$(":text, select").removeAttr("disabled");
		}
		else{
			title = "Se actualizarán los siguientes datos:";
			msg   = '<ul style="color:black;">'+ lista +'</ul>' 
			+'<p class="mt-4 text-danger">Esta acción podría dificultar el acceso '
			+'al sistema para este usuario. <br>Se recomienda contactarlo antes de realizar '
			+'cualquier cambio.';
			$("#msg").addClass("text-danger").removeClass("text-dark");
		}
		launch_modal(false,msg,title);
	}
	/*else{
		$(":text, select").removeAttr("disabled");
	}*/
});



function launch_modal(baja, msg="", title=""){
	if(baja){
		$("#title_modal").html(titulo_estado[usuario.active]);
		$("#msg").text(msg_estado[usuario.active]);
		$("#btn_borrar").addClass(css_class_btn).text(css_text_btn);
		$("#btn_borrar").attr("form","form_bajaUsuario");
		$("#msg").addClass("text-danger").removeClass("text-dark");
	}
	else
	{
		$("#title_modal").html(title);
		$("#msg").html(msg);
		$("#btn_borrar").addClass("btn-warning").text("Actualizar");
		$("#btn_borrar").attr("form","form_editUsuario");
	}

	$('#modal-mensaje').modal({
          backdrop: 'static'
    });
}

function getListChanges(){
	var inputs = $("#card_usuario :text,select");
	var labels = $("#card_usuario label:visible");
	$("div.error").addClass("d-none");
	var lista = " ";
	//console.log(labels);
	for (var i = 0; i < inputs.length; i++) {
		if(inputs[i].value == ""){
			$(inputs[i]).next().removeClass("d-none").html("Debe rellenar este campo.");
			$(inputs[i]).focus();
			return null;
		}
		if (inputs[i].value.localeCompare(usuario[inputs[i].name]) != 0){
			lista += "<li><strong>"+labels[i].innerText+": </strong>"+inputs[i].value+"</li>";
			//console.log(lista);
		} 
		/*else{
			inputs[i].setAttribute("disabled","true");
		}
		*/
	}
	return lista;
}

function reset_inputs(){
	$("#name").val(usuario.name);
	$("#last_name").val(usuario.last_name);
	$("#email").val(usuario.email);
	$("#tipo_usuario").val(usuario.tipo_usuario);
}

function update_success(){
	usuario.name = $("#name").val();
	usuario.last_name = $("#last_name").val();
	usuario.email = $("#email").val();
	usuario.tipo_usuario = $("#tipo_usuario").val();

	reset_inputs();
	selectedOption();
	$("#btn_editar").removeClass("d-none");
	$("#btn_actualizar, #btn_cancelar, #div_pass, #card_footer").addClass("d-none");
	$(":text, select").attr("disabled","true").removeClass("is-invalid");
	$(".error").addClass("d-none");
}

function selectedOption(){
	var options = $("#tipo_usuario")[0].options;
	for (var i = 0; i < options.length; i++) {
		if ( options[i].value == usuario.tipo_usuario){
			$("#tipo_usuario")[0].selectedIndex = ""+i;
			return;
		}
	}
}

 var titulo_estado = ["¿Desea Habilitar este usuario?","¿Desea Inhabilitar este usuario?"];
 var msg_estado    = ["Una vez habilitado, el usuario podrá iniciar sesión y utilizar las"
   					  +" funcionalidades del sistema con normalidad.",
   					  "Una vez inhabilitado, el usuario no podrá iniciar sesión "
   					  +"ni utilizar las funcionalidades del sistema."];

$("#modal-mensaje").on('hidden.bs.modal', function (e) {
      $("#btn_secondary").addClass("d-none");
      $("#btn_borrar").removeClass("d-none");
      /*if($("#btn_actualizar").is(":visible")){
      	$(":text, select").removeAttr("disabled");
      }else{
      	$(":text, select").attr("disabled");
      }*/
    }); 

 $("#modal-notify").on('hidden.bs.modal', function (e) {
      $("#modal_footer").addClass("d-none");
      $("#update_success").addClass("d-none");
      $("#update_fail").addClass("d-none");
      $("#msg_updating").removeClass("d-none");
    });

 $("#btn_secondary, #btn_cancel_borrar").click( function(){
 	$("#name").focus();
 });

$('form').submit(function(event){
    event.preventDefault();
    var $form = $( this ),
    url = $form.attr( "action" ),
    $modal_notify = $("#modal-notify");
    $("#modal-mensaje").modal('hide');
    $modal_notify.modal({
        backdrop: 'static'
    });

    $(".error").html("").addClass("d-none");
    $(".form-control").removeClass("is-invalid");

    // Send the data using post
    var posting = $.post( url, $form.serialize() );
    posting.done(function( data ) {
        $("#update_success").removeClass("d-none");
        $("#modal_footer").removeClass("d-none");
        $("#btn_notify").addClass("btn-success").removeClass("btn-secondary");
        $("#msg_updating").addClass("d-none");
        update_success();
    });
    posting.fail(function(jqXHR, textStatus, errorThrown){
        $("#update_fail").removeClass("d-none");
        $("#btn_notify").removeClass("btn-success").addClass("btn-secondary");
        $("#modal_footer").removeClass("d-none");
        $("#msg_updating").addClass("d-none");
        $("#msg_fail").removeClass("d-none");
        var errors = jqXHR.responseJSON.errors;
        
        var lista = '';
        for (const prop in errors) {
        	lista += '<li>' + errors[prop][0] + '</li>';
        	$("[name='"+prop+"']").addClass("is-invalid")
        	.next().html(errors[prop][0]).removeClass("d-none");
        }
        console.log(lista);
        if(lista != ''){
        	lista = 'Detalles: <ul style="color:red;">' + lista + '</ul>';
        	$("#msg_fail").html(lista);
        }else{
        	$("#msg_fail").html("Error inesperado. <br>Recarga la página e inténtalo de nuevo.");
        }
    });
});
