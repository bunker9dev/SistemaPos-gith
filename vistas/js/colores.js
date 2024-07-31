

/*=============================================
EDITAR COLOR
=============================================*/
$(".tablas").on("click", ".btnEditarColor", function(){


	var idColor = $(this).attr("idColor");

	var datos = new FormData();
	datos.append("idColor", idColor);

	$.ajax({
		url: "ajax/colores.ajax.php",
		method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success: function(respuesta){

			
    $("#editarColor").val(respuesta["color"]);
			$("#idColor").val(respuesta["idColor"]);
			//  $("#editarUsuario").val(respuesta["Usuario"]);
    }
	})
})



/*=============================================
ELIMINAR COLOR
=============================================*/
$(".tablas").on("click", ".btnEliminarColor", function(){



	var idColor = $(this).attr("idColor");

	Swal.fire({
        title: "¿Está seguro de borrar el color?",
        text: "¡Si no lo está puede cancelar la accíón!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar Color!"
      }).then((result)=>{

		if(result.value){
	
			window.location = "index.php?ruta=colores&idColor="+idColor;
			// window.location = "colores";
	
		}

	})

})