<?php

class ControladorClientes{
  
    

	/*=============================================
	CREAR CLIENTES
	=============================================*/

    static public function ctrCrearCliente(){


        if (isset($_POST["nuevoNombreCliente"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreCliente"]) && 
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellidoCliente"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCiudadCliente"]) ){

                    $tabla = "cliente";

                    $datos = array("nombre"=>$_POST["nuevoNombreCliente"],
                                   "apellido"=>$_POST["nuevoApellidoCliente"],
                                   "ciudad"=>$_POST["nuevaCiudadCliente"]);


                    $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

                    if ($respuesta == "ok") {

                        echo '<script>
    
                        Swal.fire({
                            icon: "successs",
                            title: "Agregado",
                            text: "¡El Cliente ha sido agregado correctamente!",
                            }).then(function(result){
                                                    if (result.value) {
            
                                                    window.location = "clientes";
            
                                                    }
                                                })
     
                         </script>';
                    }





            }else{

                echo '<script>

				 Swal.fire({
					icon: "error",
					title: "Ten en cuenta",
					text: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
					}).then(function(result){
							if (result.value) {

							window.location = "clientes";

								}
										})

			  	</script>';

            }
        }


    }

}



