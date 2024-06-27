<?php

require_once "conexion.php";

class ModeloUsuarios
{


	// MOSTRAR USUARIOS

	static public function mdlMostrarUsuarios($tabla, $item, $valor)
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetch();




		// if($stmt->execute()){
		// 	return "ok";}
		// else{
		// 	return $stmt->errorInfo(); // Con esto me muestra el error en especifico
		// }


		$stmt = null;
	}
	/*=====================================
	REGISTRO DE USUARIOS
	======================================*/


	static public function mdlIngresarUsuario($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, usuario, password, perfil) VALUES (:nombre, :apellido, :usuario, :password, :perfil)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		// $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt = null;


	}
}
