<?php

require_once "conexion.php";

class ModeloProductos
{

	/*=====================================
	MOSTRAR PRODUCTOS
	======================================*/

	static public function mdlMostrarProductos($tabla, $item, $valor){

		if($item != null) {

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

	static public function mdlIngresarProducto($tabla, $datos){


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

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt = null;




	}
	
}