<?php

require_once "conexion.php";

class ModeloProductos
{

	/*=====================================
			 MOSTRAR PRODUCTOS
			 ======================================*/

	static public function mdlMostrarProductos($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt = null;
	}




	/*=====================================
			 INGRESAR PRODUCTOS
			 ======================================*/

	static public function mdlIngresarProducto($tabla, $datos)
	{


		var_dump($datos);



		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(CodigoProducto, idTela, idColor, metrosRollo, stock, usuario, fechaCompra ) VALUES (:CodigoProducto, :idTela, :idColor, :metrosRollo, :stock, :usuario, :fechaCompra )");

		var_dump($stmt);

		$stmt->bindParam(":CodigoProducto", $datos["CodigoProducto"], PDO::PARAM_INT);
		$stmt->bindParam(":idTela", $datos["idTela"], PDO::PARAM_INT);
		$stmt->bindParam(":idColor", $datos["idColor"], PDO::PARAM_INT);
		$stmt->bindParam(":metrosRollo", $datos["metrosRollo"], PDO::PARAM_INT);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaCompra", $datos["fechaCompra"], PDO::PARAM_STR_NATL);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt = null;
	}




	/*=====================================
			 EDITAR PRODUCTOS
			 ======================================*/

	static public function mdlEditarProducto($tabla, $datos)
	{
		// Create a SQL query with placeholders
		$sql = "UPDATE $tabla SET 
					  CodigoProducto = :CodigoProducto, 
					  idTela = :idTela, 
					  idColor = :idColor, 
					  metrosRollo = :metrosRollo, 
					  stock = :stock, 
					  usuario = :usuario, 
					  fechaCompra = :fechaCompra 
					  WHERE idProducto = :idProducto";


		$stmt = Conexion::conectar()->prepare($sql);

		$stmt->bindParam(":CodigoProducto", $datos["CodigoProducto"], PDO::PARAM_STR);
		$stmt->bindParam(":idTela", $datos["idTela"], PDO::PARAM_INT);
		$stmt->bindParam(":idColor", $datos["idColor"], PDO::PARAM_INT);
		$stmt->bindParam(":metrosRollo", $datos["metrosRollo"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaCompra", $datos["fechaCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":idProducto", $datos["idProducto"], PDO::PARAM_INT);


		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
	}



	/*=============================================
	BORRAR PRODUCTO
	=============================================*/

	static public function mdlBorrarProducto($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idProducto = :idProducto");

		$stmt->bindParam(":idProducto", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt = null;
	}
	public function GeneralStock()
	{
		$sql = "SELECT tb2.categoria Tela,tb3.color ,SUM(tb1.stock) stock ,SUM((tb1.metrosRollo * tb1.stock)) totalMts FROM productos tb1
		INNER JOIN categoria tb2 on tb2.id=tb1.idTela
		INNER JOIN colores tb3 on tb3.idColor=tb1.idColor
		group BY tb2.categoria ,tb3.color;";
		$sql =  Conexion::conectar()->prepare($sql);
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_NAMED);
		return $row;
	}
}
