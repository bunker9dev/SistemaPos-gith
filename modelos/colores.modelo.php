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



}