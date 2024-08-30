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
var nuevoCodigo;
var codigoDate;
var codigoFecha = "000000";
var codigoTela = "000";
var codigoColor = "000";
var codigoMetros = "00";


$("#nuevaFechaCompra").change(function(){
	
	codigoDate = $(this).val();
	codigoFecha = codigoDate
	codigoFecha = codigoFecha.replace('-', '');
	codigoFecha = codigoFecha.replace('-', '');
	codigoFecha = codigoFecha.replace('20', '');

	var nuevoCodigo = codigoFecha + codigoTela + codigoColor + codigoMetros   ;
	
	$("#nuevoCodigo").val(nuevoCodigo);
	console.log("codigoDate", codigoDate);
	console.log("codigoFecha", codigoFecha);
	
})

$("#nuevoTipoTela").change(function(){

	
	codigoTela = $(this).val();


	var nuevoCodigo = codigoFecha + codigoTela + codigoColor + codigoMetros   ;
	
	$("#nuevoCodigo").val(nuevoCodigo);

	console.log("codigoTela", codigoTela);
	
})


$("#nuevoColorTela").change(function(){
	
	codigoColor = $(this).val();

	var nuevoCodigo = codigoFecha + codigoTela + codigoColor + codigoMetros   ;
	
	$("#nuevoCodigo").val(nuevoCodigo);

	console.log("codigoColor", codigoColor);
	
})


$("#nuevoMetros").change(function(){
	
	codigoMetros = $(this).val();

	var nuevoCodigo = codigoFecha + codigoTela + codigoColor + codigoMetros   ;
	
	$("#nuevoCodigo").val(nuevoCodigo);

	
})

$("#nuevoRollos").change(function(){
	
	codigoStock = $(this).val();
	console.log("codigoStock", codigoStock);
	
})



/*=============================================
EDITAR PRODUCTOS
=============================================*/

var idProducto;
var editarNuevoCodigo;
var editarCodigoTela;
var editarCodigoColor;
var editarCodigoMetros;
var codigoStock;
var editarCodigoFecha;


$(".tablaProductos").on("click", "button.btnEditarProducto", function(){

	idProducto = $(this).attr("idProducto");
	// console.log("idProducto", idProducto );

	var datos = new FormData();
    datos.append("idProducto", idProducto);

    $.ajax({

    url:"ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
		success:function(respuesta){

			// console.log("respuesta Paso1", respuesta );

			$("#editarFechaCompra").val(respuesta["fechaCompra"]);
			$("#editarMetros").val(respuesta["metrosRollo"]);
			$("#editarRollos").val(respuesta["stock"]);
			$("#editarCodigo").val(respuesta["CodigoProducto"]);
			$("#idProducto").val(respuesta["idProducto"]);


			editarCodigoDate = (respuesta["fechaCompra"]);
			editarCodigoFecha = editarCodigoDate.replace('-', '');
			editarCodigoFecha = editarCodigoFecha.replace('-', '');
			editarCodigoFecha = editarCodigoFecha.replace('20', '');


			editarCodigoMetros =(respuesta["metrosRollo"]);
			editarCodigoStock =(respuesta["stock"]);
			editarNuevoCodigo = (respuesta["CodigoProducto"]);
			editarCodigoTela = (respuesta["idTela"]);
			editarCodigoColor = (respuesta["idColor"]);
		
						var datosCategoria = new FormData();
						datosCategoria.append("idCategoria",respuesta["idTela"]);

							$.ajax({

								url:"ajax/categorias.ajax.php",
								method: "POST",
								data: datosCategoria,
								cache: false,
								contentType: false,
								processData: false,
								dataType:"json",
								success:function(respuesta){

									
								// console.log("respuesta2", respuesta );
							
									$("#mostrarTipoTela").val(respuesta["id"]);
									$("#mostrarTipoTela").html(respuesta["categoria"]);

									editarCodigoTela = (respuesta["id"]);
									// console.log("editarCodigoTela34", editarCodigoTela);

									
								}
							
							})

						
						var datosColor = new FormData();
						datosColor.append("idColor",respuesta["idColor"]);

						$.ajax({

							url:"ajax/colores.ajax.php",
							method: "POST",
							data: datosColor,
							cache: false,
							contentType: false,
							processData: false,
							dataType:"json",
							success:function(respuesta){

								$("#mostrarColorTela").val(respuesta["idColor"]);
								$("#mostrarColorTela").html(respuesta["color"]);

								editarCodigoColor= (respuesta["idColor"]);
									// console.log("editarCodigoColor", editarCodigoColor);

							}
						
						})

		}

		
	})

	
	

})
	


/*=============================================
ASIGNAR NUEVO CODIGO 
=============================================*/



$("#editarFechaCompra").change(function(){


	editarCodigoDate = $(this).val();
	editarCodigoFecha = editarCodigoDate
	editarCodigoFecha = editarCodigoFecha.replace('-', '');
	editarCodigoFecha = editarCodigoFecha.replace('-', '');
	editarCodigoFecha = editarCodigoFecha.replace('20', '');

	var editarNuevoCodigo = editarCodigoFecha + editarCodigoTela + editarCodigoColor  + editarCodigoMetros ;
	
	$("#editarCodigo").val(editarNuevoCodigo);
	
	console.log  ("    ");
	console.log("idProducto / idProductoPaso2Fecha", idProducto);
	console.log("CodigoProducto / editarNuevoCodigoPaso2Fecha", editarNuevoCodigo);
	console.log("idTela / editarCodigoTelaPaso2Fecha", editarCodigoTela);
	console.log("idColor / editarCodigoColorPaso2Fecha", editarCodigoColor);
	console.log("metrosRoll / codigoMetroPaso2Fecha", editarCodigoMetros);
	console.log("stock / codigoStockPaso2Fecha", editarCodigoStock);
	console.log("fechaCompra / editarCodigoFechaPaso2Fecha", editarCodigoDate);

	
	
})


$("#editarTipoTela").change(function(){

	editarCodigoTela = $(this).val();

	var editarNuevoCodigo = editarCodigoFecha + editarCodigoTela + editarCodigoColor  + editarCodigoMetros ;
	
	$("#editarCodigo").val(editarNuevoCodigo);

			console.log  ("    ");
			console.log("idProducto / idProductoPaso3TipoTela", idProducto);
			console.log("CodigoProducto / editarNuevoCodigoPaso3TipoTela", editarNuevoCodigo);
			console.log("idTela / editarCodigoTelaPaso3TipoTela", editarCodigoTela);
			console.log("idColor / editarCodigoColorPaso3TipoTela", editarCodigoColor);
			console.log("metrosRoll / codigoMetroPaso3TipoTela", editarCodigoMetros);
			console.log("stock / codigoStockPaso3TipoTela", editarCodigoStock);
			console.log("fechaCompra / editarCodigoFechaPaso3TipoTela", editarCodigoDate);

})


$("#editarColorTela").change(function(){
	
	editarCodigoColor = $(this).val();

	var editarNuevoCodigo = editarCodigoFecha + editarCodigoTela + editarCodigoColor  + editarCodigoMetros ;
	
	$("#editarCodigo").val(editarNuevoCodigo);

	// console.log("editarCodigoColor", editarCodigoColor);
	
})


$("#editarMetros").change(function(){
	
	editarCodigoMetros = $(this).val();

	var editarNuevoCodigo = editarCodigoFecha + editarCodigoTela + editarCodigoColor  + editarCodigoMetros ;
	
	$("#editarCodigo").val(editarNuevoCodigo);

	// console.log("codigoMetros", editarCodigoMetros);
	// console.log("editarNuevoCodigo", editarNuevoCodigo);
	
})

$("#editarRollos").change(function(){
	
	editarCodigoStock = $(this).val();

	console.log  ("    ");
			console.log("idProducto / idProductoPaso6Stock", idProducto);
			console.log("CodigoProducto / editarNuevoCodigoPaso6Stock", editarNuevoCodigo);
			console.log("idTela / editarCodigoTelaPaso6Stock", editarCodigoTela);
			console.log("idColor / editarCodigoColorPaso6Stock", editarCodigoColor);
			console.log("metrosRoll / codigoMetroPaso6Stock", editarCodigoMetros);
			console.log("stock / codigoStockPaso6Stock", editarCodigoStock);
			console.log("fechaCompra / editarCodigoFechaPaso6Stock", editarCodigoDate);
	
})


// console.log("idProducto / idProductoF INICIAL", idProducto);
// console.log("CodigoProducto / editarNuevoCodigo INICIAL", editarNuevoCodigo);
// console.log("idTela / editarCodigoTela", editarCodigoTela);
// console.log("idColor / editarCodigoColor", editarCodigoColor);
// console.log("metrosRoll / codigoMetros", editarCodigoMetros);
// console.log("stock / codigoStock", codigoStock);
// console.log("fechaCompra / editarCodigoFechaok", editarCodigoFecha);






/*=============================================
ELIMINAR PRODUCTOS
=============================================*/



$(".tablaProductos").on("click", "button.btnEliminarProducto", function(){
// $(document).on("click", ".btnEliminarProducto", function(){



	var idProducto = $(this).attr("idProducto");
	console.log("idProducto", idProducto);

	Swal.fire({
        title: "¿Está seguro de borrar el producto?",
        text: "¡Si no lo está puede cancelar la accíón!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
		cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar Producto!"
    }).then((result)=>{

		if(result.value){
	
			window.location = "index.php?ruta=productos&idproducto="+idProducto;
			
	
		}

	})

})




















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
