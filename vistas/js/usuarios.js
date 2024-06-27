
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

