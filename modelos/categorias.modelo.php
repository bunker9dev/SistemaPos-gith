<?php

require_once "conexion.php";

class ModeloCategorias
{
	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigoFabrica, categoria, usuario) VALUES (:codigoFabrica, :categoria, :usuario)");


		$stmt->bindParam(":codigoFabrica", $datos["codigoFabrica"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		if($stmt->execute()){

			
			return "ok";

		}else{

			return "error";
		
		}

		$stmt = null;

	}



	/*=====================================
	MOSTRAR CATEGORIAS
	======================================*/

	static public function mdlMostrarCategorias($tabla, $item, $valor){

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
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarCategoria($tabla, $datos){

	

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigoFabrica = :codigoFabrica, categoria = :categoria, usuario = :usuario WHERE id = :id");

		
		$stmt -> bindParam(":codigoFabrica", $datos["codigoFabrica" ], PDO::PARAM_STR);
		$stmt -> bindParam(":categoria", $datos["categoria" ], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt = null;

	}


	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function mdlBorrarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM categoria WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		

		$stmt = null;
	}



}