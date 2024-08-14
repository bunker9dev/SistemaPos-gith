// /*=============================================
// CARGAR LA TABLA DINÁMICA DE VENTAS
// =============================================*/

// $.ajax({

// 	url: "ajax/datatable-ventas.ajax.php",
// 	success:function(respuesta){
		
// 		// console.log("respuesta", respuesta);

// 	}

// })


$('.tablaVentas').DataTable( {
    "ajax": "ajax/datatable-ventas.ajax.php",
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



/*=============================================
AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA
=============================================*/

var NombreTela;
var NombreColor;
var metros;
var stock;
var idTela;

$(".tablaVentas tbody").on("click", "button.agregarProducto", function(){

	var idProducto = $(this).attr("idProducto");
    //console.log("idProductoOk", idProducto) // ok

    // console.log("nombretela23", NombreTela)



	$(this).removeClass("btn-primary agregarProducto");

	$(this).addClass("btn-default");

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

                console.log("respuesta", respuesta) 

                
                stock =  respuesta["stock"];
                metros= respuesta["metrosRollo"];
                idTela = respuesta["idTela"]
                
                
                
                var datosTela = new FormData();
                datosTela.append("idCategoria", respuesta["idTela"]);

                    $.ajax({

                        url:"ajax/categorias.ajax.php",
                        method: "POST",
                        data: datosTela,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType:"json",
                        success:function(respuesta){

                            //console.log("respuestaCategoria", respuesta) 
                
                            NombreTela = (respuesta["categoria"]); 
                            console.log("NombreTela1", NombreTela) 

                            $("#mostrarTipoTela").val(respuesta["id"]);
                            $("#mostrarTipoTela").html(respuesta["categoria"]);


                        }
				
				    })



                var datosColor = new FormData();
                datosColor.append("idColor", respuesta["idColor"]);

                    $.ajax({

                        url:"ajax/colores.ajax.php",
                        method: "POST",
                        data: datosColor,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType:"json",
                        success:function(respuesta){

                            // console.log("respuestaColor", respuesta) 
                            
                            NombreColor = respuesta["color"]; 
                            //console.log("NombreColor", NombreColor) 



                        }

                        
                    })

                    // console.log("NombreTela", NombreTela) 
                    
                    // console.log("NombreColor", NombreColor) 
                    // console.log("metros", metros) 
            

            
            
            
            
       

        




          	// /*=============================================
          	// EVITAR AGREGAR PRODUCTO CUANDO EL STOCK ESTÁ EN CERO
          	// =============================================*/

            if(stock == 0){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "No hay stock disponible",
                
                });

                $("button[idProducto='"+idProducto+"']").addClass("btn-primary agregarProducto");

                return;
            }
                
                
        
            var nombreVenta =  NombreTela + " " + NombreColor + " " + metros  + "mts "  ;

        $(".nuevoProducto").append(

            
                '<div class="row" style="padding:5px 10px">'+

                    '<div class="col-sm-5" style="padding: rigth 0px">'+

                        '<div class="input-group-prepend">'+

                            '<span class="input-group-prepend"><button type="button" class="btn btn-danger btn-sm quitarProducto" idProducto="'+idProducto+'"><i class="fa fa-times"></i> </button></span>'+

                            '<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'+ nombreVenta + '" readonly>'+

                        '</div>'+

                    '</div>'+

                    '<div class="col-sm-1">'+

                        '<input type="number" class="form-control " id="NuevaCantidadProducto" name="NuevaCantidadProducto" min="1" value = "2" stock ="'+ stock + '" required>'+

                    '</div>'+

                    '<div class="col-sm-2">'+

                        '<input type="number" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="NuevaCantidadMetros"  value ="' + (metros*2) + '" readonly>'+

                    '</div>'+

                    '<div class="col-sm-2 align-self-end">'+

                        '<div class="input-group-prepend">'+


                            // '<label class="input-group-text" for="inputGroupSelect01"> <i class="fas fa-dollar-sign"></i></label>'+

                            '<input type="number" min="1" class="form-control" id="nevoPrecioProducto" name="nuevoPrecioProducto" value="" required>'+

                        '</div>'+
                    '</div>'+

                    '<div class="col-sm-2 align-self-end" style="padding: left 0px">'+

                            '<div class="input-group-prepend">'+


                        // '<label class="input-group-text" for="inputGroupSelect01"> <i class="fas fa-dollar-sign"></i></label>'+

                        '<input type="number" min="1" class="form-control" id="nevoPrecioTotal" name="nuevoPrecioTotal" placeholder="000000" readonly>'+

                    '</div>'+
                '</div>'+
            '</div>');

	//         // SUMAR TOTAL DE PRECIOS

	//         sumarTotalPrecios()

	//         // AGREGAR IMPUESTO

	//         agregarImpuesto()

	//         // AGRUPAR PRODUCTOS EN FORMATO JSON

	//         listarProductos()

	//         // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

	//         $(".nuevoPrecioProducto").number(true, 2);

      	

            }
        })
				
    })


/*=============================================
CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA
=============================================*/

$(".tablaVentas").on("draw.dt", function(){

	if(localStorage.getItem("quitarProducto") != null){

		var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

		for(var i = 0; i < listaIdProductos.length; i++){

			$("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").removeClass('btn-default');
			$("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").addClass('btn-primary agregarProducto');

		}


	}


})


/*=============================================
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
=============================================*/

var idQuitarProducto = [];

localStorage.removeItem("quitarProducto");

$(".formularioVenta").on("click", "button.quitarProducto", function(){

	$(this).parent().parent().parent().parent().remove();

	var idProducto = $(this).attr("idProducto");

	/*=============================================
	ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
	=============================================*/

	if(localStorage.getItem("quitarProducto") == null){

		idQuitarProducto = [];
	
	}else{

		idQuitarProducto.concat(localStorage.getItem("quitarProducto"))

	}

	idQuitarProducto.push({"idProducto":idProducto});

	localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

	$("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-default');

	$("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');

	// if($(".nuevoProducto").children().length == 0){

	// 	$("#nuevoImpuestoVenta").val(0);
	// 	$("#nuevoTotalVenta").val(0);
	// 	$("#totalVenta").val(0);
	// 	$("#nuevoTotalVenta").attr("total",0);

	// }else{

	// 	// SUMAR TOTAL DE PRECIOS

    // 	sumarTotalPrecios()

    // 	// AGREGAR IMPUESTO
	        
    //     agregarImpuesto()

    //     // AGRUPAR PRODUCTOS EN FORMATO JSON

    //     listarProductos()

	// }

});




/*=============================================
AGREGANDO PRODUCTOS DESDE EL BOTÓN PARA DISPOSITIVOS
=============================================*/

// var numProducto = 0;
// $(".formularioCrearVentas").on("click", "btnAgregarProducto", function(){

$(".btnAgregarProducto").click(function(){

	// numProducto ++;

	var datos = new FormData();
	datos.append("traerProductos", "ok");

	$.ajax({

        url:"ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){

            console.log("respuesta",respuesta)

// #################################
// #################################
// #######    Prueba    ############

    var idCategoria = respuesta[2];
    // var idCategoria = $(this).attr("idTela");
    // var idCategoria = respuesta["idTela"];
    console.log("idCategorianuere", idCategoria)

    var datos = new FormData();
	datos.append("idCategoria23", idCategoria);

    $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){
            console.log("respuesta", respuesta)

        }
        
        }) 



// #######   fin  Prueba    ########
// #################################
// #################################


	$(".nuevoProducto").append(


                '<div class="row" style="padding:5px 10px">'+

                    '<div class="col-sm-5" style="padding: rigth 0px">'+

                        '<div class="input-group-prepend">'+

                            '<span class="input-group-prepend"><button type="button" class="btn btn-danger btn-sm quitarProducto" idProducto><i class="fa fa-times"></i> </button></span>'+



                            '<select class="form-control nuevaDescripcionProducto" idProducto name="nuevaDescripcionProducto"  required>'+

                            '<option>Seleccione el producto</option>'+

	                        '</select>'+ 

                        '</div>'+

                    '</div>'+

                    '<div class="col-sm-1">'+

                        '<input type="number" class="form-control" id="NuevaCantidadProducto" name="NuevaCantidadProducto" min="1" value = "1" stock required>'+

                    '</div>'+

                    '<div class="col-sm-2">'+

                        '<input type="number" class="form-control" id="NuevaCantidadMetros" name="NuevaCantidadMetros" min="1" value = "1" stock readonly>'+

                    '</div>'+

                    '<div class="col-sm-2 align-self-end">'+

                        '<div class="input-group-prepend">'+


                            // '<label class="input-group-text" for="inputGroupSelect01"> <i class="fas fa-dollar-sign"></i></label>'+

                            '<input type="number" min="1" class="form-control" id="nevoPrecioProducto" name="nuevoPrecioProducto" value="" required>'+

                        '</div>'+
                    '</div>'+

                    '<div class="col-sm-2 align-self-end" style="padding: left 0px">'+

                            '<div class="input-group-prepend">'+


                        // '<label class="input-group-text" for="inputGroupSelect01"> <i class="fas fa-dollar-sign"></i></label>'+

                        '<input type="number" min="1" class="form-control" id="nevoPrecioTotal" name="nuevoPrecioTotal" placeholder="000000" readonly>'+

                    '</div>'+
                '</div>'+
            '</div>');

             // AGREGAR LOS PRODUCTOS AL SELECT 

	        respuesta.forEach(funcionForEach);

	        function funcionForEach(item, index){

                if(item.stock != 0){

                    $(".nuevaDescripcionProducto").append(
                        '<option idProducto="'+item.idProducto+'" value="'+item.idTela+'">'+item.idTela+'</option>'
                    )
                    $(".NuevaCantidadProducto").append(
                        '<option idProducto="'+item.idProducto+'" value="'+item.metrosRollo+'">'+item.metrosRollo+'</option>'
                    )
                }

            }
        }

    })     

})     

/*=============================================
SELECCIONAR PRODUCTO
=============================================*/
$(".formularioVenta").on("change", "select.nuevaDescripcionProducto", function(){

    var idProducto = $(this).attr("idProducto");

    // var idCategoria = $(this).attr("idTela");
    console.log("idProducto1234", idProducto)

    var datos = new FormData();
	datos.append("idProdcuto", idProducto);

    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){
            console.log("respuesta", respuesta)

         }
        
        }) 

} )  
            
                
                
                // if(item.stock != 0){

                //     $("#producto"+numProducto).append(

                //             '<option idProducto="'+item.id+'" value="'+item.descripcion+'">'+item.descripcion+'</option>'
                //     )

                // }




	//         // SUMAR TOTAL DE PRECIOS

	//         sumarTotalPrecios()

	//         // AGREGAR IMPUESTO

	//         agregarImpuesto()

	//         // AGRUPAR PRODUCTOS EN FORMATO JSON

	//         listarProductos()

	//         // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

	//         $(".nuevoPrecioProducto").number(true, 2);


