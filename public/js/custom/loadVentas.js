var datos, datosMasVendidos;
var dataGrafica1, dataGrafica2, labelsGrafica2, dataGrafica3, dias;
var now = new Date();
var days = daysInMonth( now.getMonth() + 1, now.getFullYear());
inicializarArrays();
loadDatos();
loadDatos2();
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
	          backgroundColor: [
	              'rgba(75, 192, 192, 0.2)'
	          ],
	          borderColor: [
	              'rgba(75, 192, 192, 1)',
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
	      }
	  },
	  backgroundColor:'rgba(75, 192, 192, 0.2)'
	});
}

function dibujarGrafica2(){
	var ctx = document.getElementById('masVendidos').getContext('2d');
	var ventas = new Chart(ctx, {
	  type: 'bar',
	  data: {
	      labels: ['No. 5 Mezcal Sinahi Reposado 750 ml', 'No. 4', 'No. 3', 'No.2', 'No. 1'],
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
	  	/*
	  	tooltips: {
	  		callbacks: {
	  			label: function(ttitem, data) {
	  				return ttitem.xLabel + ": " + ttitem.yLabel
	  			}
	  		}
	  	}*/
	  }
	});
}

function getDataGrafica1() {
	for (var i = 0; i < datos.length; i++) {
		//console.log( data[i]);
		dataGrafica1[datos[i].dia-1] = datos[i].suma;
		//datosGrafica[data[i].dia-1] = data[i].suma;
	}
	console.log(dataGrafica1);
	//console.log(data);
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
	console.log(dataGrafica2);
	console.log(labelsGrafica2);
	//console.log(data);
	return dataGrafica2;
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
		//dataGrafica2[i] = 0;
		dataGrafica3[i] = 0;
		dias[i] = i;
	}
}

function loadDatos(){
	$.get( "/admin/ventas/ajax",
		{"_token": $("meta[name='csrf-token']").attr("content")})
	.done(function(data) {
	//alert( "second success" );
	  console.log("success");
	  datos = data;
	  console.log(datos);
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
	//alert( "second success" );
	  console.log("success");
	  datosMasVendidos = data;
	  console.log(datosMasVendidos);
	  dibujarGrafica2();
	})
	.fail(function() {
	  alert( "Error al cargar los datos" );
	});
}
function daysInMonth (month, year) { 
	return new Date(year, month, 0).getDate();
}

/*function generaEtiquetas(){
	var item = 
	{
		text: 
	}
}*/