<?php

require_once "conexion.php";

class ModeloColores
{
	/*=============================================
	CREAR COLOR
	=============================================*/

	static public function mdlIngresarColor($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(color, usuario) VALUES (:color, :usuario)");

		$stmt->bindParam(":color", $datos["color"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt = null;

	}



	
	/*=====================================
	MOSTRAR COLORES
	======================================*/

	static public function mdlMostrarColores($tabla, $item, $valor){

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



	/*=============================================
	EDITAR COLOR
	=============================================*/

	static public function mdlEditarColor($tabla, $datos){

	

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET color = :color, usuario = :usuario WHERE idColor = :idColor");

		$stmt -> bindParam(":color", $datos["color"], PDO::PARAM_STR);
		$stmt -> bindParam(":idColor", $datos["idColor"], PDO::PARAM_INT);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

var_dump($stmt);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt = null;

	}


	
	/*=============================================
	BORRAR COLOR
	=============================================*/

	static public function mdlBorrarColor($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idColor = :idColor");

		$stmt -> bindParam(":idColor", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		

		$stmt = null;
	}



}