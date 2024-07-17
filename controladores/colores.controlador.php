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


	/*=============================================
	MOSTAR COLOR DE TELAS
	=============================================*/
	static public function ctrMostrarColores($item, $valor)
	{

		$tabla = "colores";

		$respuesta = ModeloColores::mdlMostrarColores($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	EDITAR COLOR
	=============================================*/

	static public function ctrEditarColor(){

		if(isset($_POST["editarColor"])){

			if(preg_match('/^[#\.\-\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarColor"])){

				$tabla = "colores";

				$datos = array(
					"color" => $_POST["editarColor"],
					"usuario" => $_SESSION["usuario"],
					"idColor" => $_POST["idColor"],
				);

				var_dump($datos);

				$respuesta = ModeloColores::mdlEditarColor($tabla, $datos);
				
				
				if($respuesta == "ok"){

					echo'<script>


				   Swal.fire({
						icon: "successs",
						title: "Color Modificado",
						text: "¡El tipo de Tela ha sido Modificado correctamente!",
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
						text: "¡El Color no puede ir vacío o llevar caracteres especiales,!",
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

