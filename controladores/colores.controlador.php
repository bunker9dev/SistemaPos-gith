<?php

class ControladorColores
{


    /*=============================================
	CREAR COLOR DE TELAS
	=============================================*/
    static public function ctrCrearColor()
    {
        var_dump($_POST["nuevoColor"]);


        if (isset($_POST["nuevoColor"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoColor"])) {

                $tabla = "color";

                $datos = $_POST["nuevoColor"];

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
				}else {

                    echo '<script>

				 Swal.fire({
					icon: "error",
					title: "error",
					text: "¡verificar",
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



	/*=============================================
	MOSTAR COLOR DE TELAS
	=============================================*/
	static public function ctrMostrarColores($item, $valor)
	{

		$tabla = "color";

		$respuesta = ModeloColores::mdlMostrarColores($tabla, $item, $valor);

		return $respuesta;
	}




}



