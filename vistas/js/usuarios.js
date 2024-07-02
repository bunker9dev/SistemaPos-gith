
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

        $("#passwordActual").val(respuesta["password"]);

        if(respuesta["foto"] != ""){

          $(".previsualizar").attr("src", respuesta["foto"]);

        }

    }
    
    

  });

})



  /*=============================================
    ACTIVAR USUARIO
	=============================================*/

  $(document).on("click", ".btnActivar", function(){

    var idUsuario = $(this).attr("idUsuario");
    var estadoUsuario = $(this).attr("estadoUsuario");
  
    var datos = new FormData();
     datos.append("activarId", idUsuario);
      datos.append("activarUsuario", estadoUsuario);
  
      $.ajax({
  
      url:"ajax/usuarios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){
  
          if(window.matchMedia("(max-width:767px)").matches){
      
             swal({
              title: "El usuario ha sido actualizado",
              type: "success",
              confirmButtonText: "¡Cerrar!"
            }).then(function(result) {
              
                if (result.value) {
  
                window.location = "usuarios";
  
              }
  
            });
  
  
      }
        }
  
      })
  
      if(estadoUsuario == 0){
  
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario',1);
  
      }else{
  
        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoUsuario',0);
  
      }
  
  })
  

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoUsuario").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	 $.ajax({
	    url:"ajax/usuarios.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

	    		$("#nuevoUsuario").val("");

	    	}

	    }

	})
})
