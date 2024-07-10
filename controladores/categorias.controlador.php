<?php

class ControladorCategorias{

	/*=============================================
	CREAR TIPO DE TELAS
	=============================================*/

	static public function ctrCrearCategoria(){

		if(isset($_POST["nuevaCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){

				$tabla = "categoria";

				$datos = array(
					"categoria" => $_POST["nuevaCategoria"],
					"usuario" => $_SESSION["usuario"]
				);
				

				$respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);

				if($respuesta == "ok"){

                    echo '<script>

                    Swal.fire({
                        icon: "successs",
                        title: "Agregado",
                        text: "¡El Tipo de tela ha sido agregado correctamente!",
                        }).then(function(result){
                                                if (result.value) {
        
                                                window.location = "categoria";
        
                                                }
                                            })
 
                     </script>';

				}


			}else{

				echo '<script>

				 Swal.fire({
					icon: "error",
					title: "Ten en cuenta",
					text: "¡El Tipo de Tela no puede ir vacío o llevar caracteres especiales!",
					}).then(function(result){
							if (result.value) {

							window.location = "categoria";

								}
										})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTAR TIPO DE TELAS
	=============================================*/
	static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categoria";

		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;
	
	}

}