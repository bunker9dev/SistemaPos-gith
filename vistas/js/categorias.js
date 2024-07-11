// /*=============================================
// REVISAR SI EL TIPO DE TELA YA ESTÁ REGISTRADO
// =============================================*/

// $("#nuevaCategoria").change(function(){

// 	$(".alert").remove();

// 	var categoria= $(this).val();

// 	var datos = new FormData();
// 	datos.append("validarCategoria", categoria);

// 	 $.ajax({
// 	    url:"ajax/categoria.ajax.php",
// 	    method:"POST",
// 	    data: datos,
// 	    cache: false,
// 	    contentType: false,
// 	    processData: false,
// 	    dataType: "json",
// 	    success:function(respuesta){
	    	
// 	    	if(respuesta){

// 	    		$("#nuevaCategoria").parent().after('<div class="alert alert-warning">Este Tipo de Tela ya existe en la base de datos</div>');

// 	    		$("#nuevaCategoria").val("");

// 	    	}

// 	    }

// 	})
// })


/*=============================================
EDITAR CATEGORIA
=============================================*/

$(".btnEditarCategoria").click(function(){

	var idCategoria = $(this).attr("idCategoria");

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);

	$.ajax({
		url: "ajax/categorias.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

			
     		$("#editarCategoria").val(respuesta["categoria"]);
			$("#idCategoria").val(respuesta["id"]);
			//  $("#editarUsuario").val(respuesta["Usuario"]);
     	}
	})
})



/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarCategoria", function(){
// $(".btnEliminarCategoria").click(function(){


	var idCategoria = $(this).attr("idCategoria");

	Swal.fire({
        title: "¿Está seguro de borrar el tipo de Tela?",
        text: "¡Si no lo está puede cancelar la accíón!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, borrar Tela!"
      }).then((result)=>{

		if(result.value){
	
			window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;
	
		}

	})

})