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

var parents_presentations = { parent:{ } };

$( document ).ready(function() {
	addListeners();
	loadData();
	firstLI();
});

function loadData() {
  	//var parents = new Array();
  	
  	for (var i = 0; i < productos.length; i++) {
  	//parents.push( productos[i].producto_id );
  		if( parents_presentations.parent[ productos[i].producto_id ] === undefined){
  			parents_presentations.parent[ productos[i].producto_id ] = 
  			{ presentations: { } };     
  		}
	    parents_presentations.parent[ productos[i].producto_id ]
	      .presentations[productos[i].id_presentacion] = productos[i];
	}
	//console.log(parents_presentations);
}

function firstLI(){
	if( isBreakpoint('xs') || isBreakpoint('sm')) {
		let li = $("#listCarrito li:first-child");
		li.addClass("pt-0");
		li.find('hr').addClass("mt-0");
	}
}




 