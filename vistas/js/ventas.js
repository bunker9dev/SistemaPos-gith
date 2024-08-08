/*=============================================
CARGAR LA TABLA DINÁMICA DE VENTAS
=============================================*/

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


$(".tablaVentas tbody").on("click", "button.agregarProducto", function(){

	var idProducto = $(this).attr("idProducto");
    console.log("idProducto", idProducto)

    console.log("nombretela23", NombreTela)



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

                
                var stock =  respuesta["stock"];
                var tela = respuesta["idTela"];
                var color = respuesta["idColor"];
                metros= respuesta["metrosRollo"];
                
                
                
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

                            // console.log("respuestaCategoria", respuesta) }
                
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
                            // console.log("NombreColor", NombreColor) 



                        }

                        
                    })

                    console.log("NombreTela", NombreTela) 
                    
                    console.log("NombreColor", NombreColor) 
                    console.log("metros", metros) 
            

            
            
            
            
       

        




          	// /*=============================================
          	// EVITAR AGREGAR PRODUTO CUANDO EL STOCK ESTÁ EN CERO
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
                
                
                // swal({
                //     title: "No hay stock disponible",
                //     type: "error",
                //     confirmButtonText: "¡Cerrar!"
                //     });

                //     $("button[idProducto='"+idProducto+"']").addClass("btn-primary agregarProducto");

                // return;



          	$(".nuevoProducto").append(

               
                '<div class="row" style="padding:5px 10px">'+

                    '<div class="col-sm-6" style="padding: rigth 0px">'+

                        '<div class="input-group-prepend">'+

                            '<span class="input-group-prepend"><button type="button" class="btn btn-danger btn-sm quitarProducto" idProducto="'+idProducto+'"><i class="fa fa-times"></i> </button></span>'+



                            '<input type="text" class="form-contro nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'+ metros + color + tela  +'" required>'+

                        '</div>'+

                    '</div>'+

                    '<div class="col-sm-1">'+

                        '<input type="number" class="form-control" id="NuevaCantidadProducto" name="NuevaCantidadProducto" min="1" placeholder="0" required>'+

                    '</div>'+

                    '<div class="col-sm-2 align-self-end">'+

                        '<div class="input-group-prepend">'+


                            '<label class="input-group-text" for="inputGroupSelect01"> <i class="fas fa-dollar-sign"></i></label>'+

                            '<input type="number" min="1" class="form-control" id="nevoPrecioProducto" name="nuevoPrecioProducto" placeholder="000000" required>'+

                        '</div>'+
                    '</div>'+

                    '<div class="col-sm-3 align-self-end" style="padding: left 0px">'+

                            '<div class="input-group-prepend">'+


                        '<label class="input-group-text" for="inputGroupSelect01"> <i class="fas fa-dollar-sign"></i></label>'+

                        '<input type="number" min="1" class="form-control" id="nevoPrecioTotal" name="nuevoPrecioTotal" placeholder="000000" readonly>'+

                    '</div>'+
                '</div>'+
                '</div>') 

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

	if($(".nuevoProducto").children().length == 0){

		$("#nuevoImpuestoVenta").val(0);
		$("#nuevoTotalVenta").val(0);
		$("#totalVenta").val(0);
		$("#nuevoTotalVenta").attr("total",0);

	}else{

		// SUMAR TOTAL DE PRECIOS

    	sumarTotalPrecios()

    	// AGREGAR IMPUESTO
	        
        agregarImpuesto()

        // AGRUPAR PRODUCTOS EN FORMATO JSON

        listarProductos()

	}




});

