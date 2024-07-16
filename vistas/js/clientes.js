/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarCliente", function(){

// $(".btnEditarCliente").click(function() {

	var idCliente = $(this).attr("idCliente");

	var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

      url:"ajax/clientes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
        // console.log("respuesta",respuesta);

        $("#idCliente").val(respuesta["idCliente"]);
      	$("#editarNombreCliente").val(respuesta["nombre"]);
	      $("#editarApellidoCliente").val(respuesta["apellido"]);
	      $("#editarCiudadCliente").val(respuesta["ciudad"]);
	  }

  	})

})



/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function(){

	var idCliente = $(this).attr("idCliente");
  

	
      Swal.fire({
        title: "¿Está seguro de borrar el Cliente?",
        text: "¡Si no lo está puede cancelar la accíón!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, borrar Cliente!"
      })
      
    .then((result)=>{

        if(result.value){

          window.location = "index.php?ruta=clientes&idCliente="+idCliente;

        }

      })

})
