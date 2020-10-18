$( document ).ready(function() {
    fadeNav();
});

function showUpdateForm(btn){
	var card = $(btn).
	$("#collapse-form-update");
}

function updateDireccion(btn){
	var data = $(btn).parent().prev();

	$("#nombre_envio_u").val(data.find("span.name").text());
	$("#email_envio").val(data.find("span.email").text());
	$("#telefono_u").val(data.find("span.telefono").text());
	$("#calle_u").val(data.find("span.calle").text());
	$("#numero_u").val(data.find("span.numero").text());
	$("#numero_interior_u").val(data.find("span.no_int").text());
	$("#apartamento_u").val(data.find("span.apartamento").text());
	$("#codigo_postal_u").val(data.find("span.cod_postal").text());
	$("#id_dir_u").val(data.data('id'));
	//$("#colonia_u").val(data.find("span.colonia").text());
	//$("#municipio_u").val(data.find("span.municipio").text());
	//$("#estado_u").val(data.find("span.estado").text());

	$("#collapse-form-update").removeClass("d-none");

}

function deleteDireccion(btn){
	var data = $(btn).parent().prev();
	var form = $("#delete_dir");
	form.attr("action","/delete-direccion/" + data.data("id"));
	$("#modal_name").text(data.find("span.name").text());
	$("#modal_calle").text(data.find("span.calle").text());
	$("#modal_colonia").text(data.find("span.colonia").text());
	$("#modal_municipio").text(data.find("span.municipio").text());
	$("#modal_codigo_postal").text(data.find("span.cod_postal").text());
	$("#modal_telefono").text(data.find("span.telefono").text());
	$("#modalDeleteDir").modal();

}

$("form").submit( function(){
	$("#backdrop").removeClass("d-none").addClass("show");
});

$("#btn_nd").click( function(){
	$("#collapse-form-update").addClass("d-none");
});