/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS
=============================================*/

// $.ajax({

// 	url: "ajax/datatable-productos.ajax.php",
// 	success:function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	}

// })


/*=============================================
CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO
=============================================*/
var codigoTela = "000";
var codigoColor = "000";
var codigoMetros = "00";

$("#nuevoTipoTela").change(function(){

	
	codigoTela = $(this).val();

	var datos = new FormData();
	datos.append("codigoTela", codigoTela);

	$.ajax({

		url:"ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){

		if(!respuesta ) {
			var codigoTela =  codigoTela + codigoColor + codigoMetros;
			$("#nuevoCodigo").val(codigoTela);
		}else{
			var codigoTela = respuesta["id"] + codigoColor + codigoMetros;;
			$("#nuevoCodigo").val(codigoTela);
		}

			

		}
	
	})


	
})


$("#nuevoColorTela").change(function(){
	
	codigoColor = $(this).val();

	var nuevoCodigo = codigoTela + codigoColor + codigoMetros;
	
	$("#nuevoCodigo").val(nuevoCodigo);

	console.log("codigoColor", codigoColor);
	
})


$("#nuevoMetros").change(function(){
	
	codigoMetros = $(this).val();

	var nuevoCodigo = codigoTela + codigoColor + codigoMetros;
	
	$("#nuevoCodigo").val(nuevoCodigo);

	console.log("codigoMetros", codigoMetros);
	
})


	






	// var datos = new FormData();
	// datos.append("idProducto", idProducto);

	// $.ajax({

	// 	url:"ajax/productos.ajax.php",
	// 	method: "POST",
	// 	data: datos,
	// 	cache: false,
	// 	contentType: false,
	// 	processData: false,
	// 	dataType:"json",
	// 	success:function(respuesta){
	// 		console.log("respuesta", respuesta)

	// 	}
	
	// })








$('.tablaProductos').DataTable( {
    "ajax": "ajax/datatable-productos.ajax.php",
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );
