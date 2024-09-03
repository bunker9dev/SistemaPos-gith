<?php

class ControladorCategorias
{

	/*=============================================
	CREAR TIPO DE TELAS
	=============================================*/

	static public function ctrCrearCategoria()
	{

		if (isset($_POST["nuevaCategoria"])) {

			if (preg_match('/^[#\.\-\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCodigoFabrica"]) ||
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])	
				) {


				$tabla = "categoria";

				$datos = array(

					"codigoFabrica" => $_POST["nuevoCodigoFabrica"],
					"categoria" => $_POST["nuevaCategoria"],
					"usuario" => $_SESSION["usuario"]
				);
				
				var_dump($datos);

				
				
				$respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);

				

				if ($respuesta == "ok") {

					echo '<script>

                    Swal.fire({
                        icon: "success",
                        title: "Agregado",
                        text: "¡El Tipo de tela ha sido agregado correctamente!",
                        }).then(function(result){
                                                if (result.value) {
        
                                                window.location = "categorias";
        
                                                }
                                            })

                    </script>';
				}
			} else {

				echo '<script>

				Swal.fire({
					icon: "error",
					title: "Ten en cuenta",
					text: "¡El Tipo de Tela no puede ir vacío o llevar caracteres especiales!",
					}).then(function(result){
							if (result.value) {

							window.location = "categorias";

								}
										})

			</script>';
			}
		}
	}

	/*=============================================
	MOSTAR TIPO DE TELAS
	=============================================*/
	static public function ctrMostrarCategorias($item, $valor)
	{

		$tabla = "categoria";

		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarCategoria(){

		if(isset($_POST["editarCategoria"])){

			//if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"])){
			
			if (preg_match('/^[#\.\-\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCodigoFabrica"]) ||
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"])	
				) {
				$tabla = "categoria";

				$datos = array(

					"codigoFabrica" => $_POST["editarCodigoFabrica"],
					"categoria" => $_POST["editarCategoria"],
					"usuario" => $_SESSION["usuario"],
					"id" => $_POST["idCategoria"],
				);

				// var_dump($datos);

				$respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);
				
				
				if($respuesta == "ok"){

					echo'<script>


				Swal.fire({
						icon: "success",
						title: "Usuario Modificado",
						text: "¡El tipo de Tela ha sido Modificado correctamente!",
						}).then(function(result){
								if (result.value) {

									window.location = "categorias";

									}
								})

					</script>';
				}
			} else {

				echo '<script>

					Swal.fire({
						icon: "error",
						title: "Ten en cuenta",
						text: "¡El nombre y apellido no puede ir vacío o llevar caracteres especiales bbbbbb!",
						}).then(function(result){
							if (result.value) {

								window.location = "categorias";

								}
							})

				</script>';
			}
		}
	}


	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarCategoria(){

		if(isset($_GET["idCategoria"])){

			$tabla ="Categoria";
			$datos = $_GET["idCategoria"];

			$respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					Swal.fire({
						title: "Usuario Borrado!",
						text: "El Tipo de tela ha sido borrado correctamente.",
						icon: "success"
						}).then(function(result){
							if (result.value) {

								window.location = "categorias";
							}
						})

					</script>';
			}
		}
		
	}

}
