<?php

class ControladorProductos
{

	/*=============================================
		  MOSTRAR PRODUCTOS
		  =============================================*/

	static public function ctrMostrarProductos($item, $valor)
	{

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

		return $respuesta;

	}



	/*=============================================
	CREAR PRODUCTOS
	=============================================*/
	static public function ctrCrearProducto()
	{
		if (isset($_POST["nuevoTipoTela"])) {


var_dump($_POST["nuevoTipoTela"]);
			

			$tabla = "productos";
			$datos = array(
				"fechaCompra" => $_POST["nuevaFechaCompra"],
				"CodigoProducto" => $_POST["nuevoCodigo"],
				"idTela" => $_POST["nuevoTipoTela"],
				"idColor" => $_POST["nuevoColorTela"],
				"metrosRollo" => $_POST["nuevoMetros"],
				"stock" => $_POST["nuevoRollos"],
				"usuario" => $_SESSION["usuario"],
				
			);
			
			
			
		


			$respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

				Swal.fire({
					icon: "successs",
					title: "Agregado",
					text: "¡El Producto ha sido agregado correctamente!",
					}).then(function(result){
							if (result.value) {
	
								window.location = "productos";
	
								}
					})

				</script>';
			}


		} 
		// else {

		// 	echo '<script>

		// 				Swal.fire({
		// 					icon: "error",
		// 					title: "Ten en cuenta",
		// 					text: "¡El Producto no puede ir vacío o llevar caracteres especiales!",
		// 					}).then(function(result){
		// 							if (result.value) {

		// 					window.location = "productos";

		// 						}
		// 								})

		// 			</script>';

		// }

	}





}
