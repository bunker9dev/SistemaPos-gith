<?php

class ControladorColores
{

	/*=============================================
	CREAR COLOR DE TELAS
	=============================================*/

	static public function ctrCrearColor()
	{

        if (isset($_POST["nuevoColor"])) {

			if (preg_match('/^[#\.\-\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoColor"])) {

                $tabla = "colores";

				$datos = array(
					"color" => $_POST["nuevoColor"],
					"usuario" => $_SESSION["usuario"]
				);

                var_dump($datos);

				$respuesta = ModeloColores::mdlIngresarColor($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

                    Swal.fire({
                        icon: "successs",
                        title: "Agregado",
                        text: "¡El Color de tela ha sido agregado correctamente!",
                        }).then(function(result){
                                                if (result.value) {
        
                                                window.location = "colores";
        
                                                }
                                            })
 
                     </script>';
				}
			} else {

				echo '<script>

				 Swal.fire({
					icon: "error",
					title: "Ten en cuenta",
					text: "¡El Color de Tela no puede ir vacío o llevar caracteres especiales!",
					}).then(function(result){
							if (result.value) {

							window.location = "colores";

								}
										})

			  	</script>';
			}
		}
	}






}

