
  /*=============================================
    SUBIENDO FOTO DE USUARIO
	=============================================*/

    $(".nuevaFoto").change(function(){
        var imagen = this.files[0];
        console.log("imagen", imagen);

      /*=============================================
      VALIDAR QUE EL FORMATO DE IMAGEN SEA EN JGP O PNG
      =============================================*/

      if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

        $(".nuevaFoto").val("");

        // alert("¡La imagen debe estar en formato JPG o PNG!")

                Swal.fire({
                    icon: "error",
                    title: "Ten en cuenta",
                    text: "¡La imagen debe estar en formato JPG o PNG!",
                    confirmButtonText: "Cerrar"
                });

  	  }else if(imagen["size"] > 2000000){

  		  $(".nuevaFoto").val("");

        Swal.fire({
                    icon: "error",
                    title: "Ten en cuenta",
                    text: "¡La imagen no debe pesar màs de 2MB",
                    confirmButtonText: "Cerrar"
                });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})
    }
	
})


  /*=============================================
    EDITAR USUARIO
	=============================================*/

$(".btnEditarUsuario").click(function(){

  var idUsuario = $(this).attr("idUsuario");

  var datos = new FormData();
  datos.append("idUsuario", idUsuario)

  $.ajax({

    url:"ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){

        $("#editarNombre").val(respuesta["nombre"]);
        $("#editarApellido").val(respuesta["apellido"]);
        $("#editarUsuario").val(respuesta["usuario"]);
        $("#editarPerfil").html(respuesta["perfil"]);
        $("#editarPerfil").val(respuesta["perfil"]);
        $("#fotoActual").val(respuesta["foto"]);

        $("#passworActual").val(respuesta["password"]);

        if(respuesta["foto"] != ""){

          $(".previsualizar").attr("src", respuesta["foto"]);



        }



    }


    


  });

})
