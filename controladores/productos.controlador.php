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
				"idProducto" => $_POST["idProducto"],
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
	}


	/*=============================================
		  EDITAR PRODUCTOS
		  =============================================*/
	static public function ctrEditarProducto()
	{
		if (isset($_POST["UpdateProducto"])) {

			$tabla = "productos";
			$datos = array(
				"idProducto" => $_POST["idProducto"],
				"CodigoProducto" => $_POST["editarCodigo"],
				"idTela" => $_POST["editarTipoTela"],
				"idColor" => $_POST["editarColorTela"],
				"metrosRollo" => $_POST["editarMetros"],
				"stock" => $_POST["editarRollos"],
				"usuario" => $_SESSION["usuario"],
				"fechaCompra" => $_POST["editarFechaCompra"]

			);

			var_dump($datos);

			$respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

				Swal.fire({
					icon: "successs",
					title: "Modificado",
					text: "¡El Producto ha sido Modificado correctamente!",
					}).then(function(result){
							if (result.value) {
	
								window.location = "productos";
	
								}
					})

				</script>';
			}
		}
	}





	/*=============================================
		  BOORAR PRODUCTOS
		  =============================================*/
	static public function ctrBorrarProducto()
	{

		if (isset($_GET["idproducto"])) {

			$tabla = "productos";
			$datos = $_GET["idproducto"];

			$respuesta = ModeloProductos::mdlBorrarProducto($tabla, $datos);


			if ($respuesta == "ok") {

				echo '<script>

					Swal.fire({
						title: "Producto Borrado!",
						text: "El Producto ha sido borrado correctamente.",
						icon: "success"
						}).then(function(result){
							if (result.value) {

								window.location = "productos";
							}
						})

					</script>';
			}
		}
	}
}
