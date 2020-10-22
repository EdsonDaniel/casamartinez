var datos, datosMasVendidos, datosAnio;
var dataGrafica1, dataGrafica2, labelsGrafica2, dataGrafica3, dias;
var now = new Date();
var days = daysInMonth( now.getMonth() + 1, now.getFullYear());
var mes = now.toLocaleString('default', { month: 'long' });
var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
			'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
inicializarArrays();
loadDatos();
loadDatos2();
loadDatos3();
$( document ).ready(function() {

});


function dibujarGrafica1(){
	var ctx = document.getElementById('ventas').getContext('2d');
	var ventas = new Chart(ctx, {
		type: 'line',
		data: {
			//labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
			labels: dias,
			datasets: [{
				label: '$ Monto total',
				//data: [12, 19, 3, 5, 2, 3],
				data: getDataGrafica1(),
				backgroundColor: [ 'rgba(75, 192, 192, 0.2)' ],
				borderColor: [ 'rgba(75, 192, 192, 1)', ],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: { beginAtZero: true }
				}]
			},
			tooltips: {
				callbacks: {
					title: function(data, object){
						return data[0].xLabel + " de " + mes ;
					}
				}
			},
		},

		backgroundColor:'rgba(75, 192, 192, 0.2)'
	});
}

function dibujarGrafica2(){
	var ctx = document.getElementById('masVendidos').getContext('2d');
	var ventas = new Chart(ctx, {
	  type: 'bar',
	  data: {
	      labels: ['No. 5', 'No. 4', 'No. 3', 'No.2', 'No. 1'],
	      datasets: [{
	          label: '# Botellas compradas',
	          //data: [12, 19, 3, 5, 2, 3],
	          data: getDataGrafica2(),
	          backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
              ],
	          borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
              ],
	          borderWidth: 1
	      }]
	  },
	  options: {
	  	scales: {
	  		yAxes: [{
	  			ticks: {
	  				beginAtZero: true
	  			}
	  		}]
	  	},
	  	tooltips: {
	  		callbacks: {
	  			title: function(data, object){
	  				return data[0].xLabel + " " + labelsGrafica2[data[0].index];
	  			}
	  		}
	  	}
	  	
	  }
	});
}

function dibujarGrafica3(){
	var ctx = document.getElementById('ventasAnio').getContext('2d');
	var ventas = new Chart(ctx, {
		type: 'line',
		data: {
			labels: meses,
			datasets: [{
				label: '$ Monto total',
				data: getDataGrafica3(),
				backgroundColor: [ 'rgba(75, 192, 192, 0.2)' ],
				borderColor: [ 'rgba(75, 192, 192, 1)', ],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: { beginAtZero: true }
				}]
			},
		},

		backgroundColor:'rgba(75, 192, 192, 0.2)'
	});
}


function getDataGrafica1() {
	for (var i = 0; i < datos.length; i++) {
		dataGrafica1[datos[i].dia-1] = datos[i].suma;
	}
	return dataGrafica1;
}
function getDataGrafica2() {
	//var datosGrafica = iniciarArray(days);
	var max = 0;
	if (datosMasVendidos.length < 5) {
		max = datosMasVendidos.length;
	}else max = 5;
	
	for (var i = 0; i < max; i++) {		
		dataGrafica2[i] = datosMasVendidos[i].suma;
		labelsGrafica2[i] = datosMasVendidos[i].nombre + " " 
							+ datosMasVendidos[i].presentacion;
	}
	//console.log(dataGrafica2);
	//console.log(labelsGrafica2);
	//console.log(data);
	return dataGrafica2;
}
function getDataGrafica3() {
	dataGrafica3 = iniciarArray(12);
	for (var i = 0; i < datosAnio.length; i++) {		
		dataGrafica3[datosAnio[i].mes-1] = datosAnio[i].suma;
	}
	return dataGrafica3;
}
function iniciarArray(dias){
	var arreglo = [];
	for (var i = 0; i < dias; i++) {
		arreglo[i] = 0;
	}
	return arreglo;
}
function inicializarArrays(){
	
	dataGrafica1 = [];
	dataGrafica2 = [];
	labelsGrafica2=[];
	dataGrafica3 = [];
	dias = [];
	for (var i = 0; i < days; i++) {
		dataGrafica1[i] = 0;
		dias[i] = i;
	}
}

function loadDatos(){
	$.get( "/admin/ventas/ajax",
		{"_token": $("meta[name='csrf-token']").attr("content")})
	.done(function(data) {
	  datos = data;
	  dibujarGrafica1();
	})
	.fail(function() {
		alert( "Error al cargar los datos" );
	});
}
function loadDatos2(){
	$.get( "/admin/mas-vendidos/ajax",
		{"_token": $("meta[name='csrf-token']").attr("content")})
	.done(function(data) {
		datosMasVendidos = data;
		dibujarGrafica2();
	})
	.fail(function() {
	  alert( "Error al cargar los datos" );
	});
}
function loadDatos3(){
	$.get( "/admin/ventas-anio/ajax",
		{"_token": $("meta[name='csrf-token']").attr("content")})
	.done(function(data) {
		datosAnio = data;
		console.log(datosAnio);
		dibujarGrafica3();
	})
	.fail(function() {
	  alert( "Error al cargar los datos" );
	});
}
function daysInMonth (month, year) { 
	return new Date(year, month, 0).getDate();
}
