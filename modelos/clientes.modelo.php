<?php

require_once "conexion.php";

class ModeloClientes{

	/*=============================================
	CREAR CLIENTE
	=============================================*/

	static public function mdlIngresarCliente($tabla, $datosClientes){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, ciudad, creado_por) VALUES (:nombre, :apellido, :ciudad, :creado_por)");


        $stmt->bindParam(":nombre", $datosClientes["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datosClientes["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":ciudad", $datosClientes["ciudad"], PDO::PARAM_STR);
        $stmt->bindParam(":creado_por", $datosClientes["creado_por"], PDO::PARAM_STR);

    

        if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt = null;

    }


	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function mdlMostrarClientes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt = null;

	}


	/*=============================================
	EDITAR CLIENTE
	=============================================*/	

	static public function mdlEditarCliente($tabla, $datosClientes){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre,  apellido = :apellido, ciudad = :ciudad, creado_por = :creado_por WHERE idCliente =:idCliente");

		$stmt->bindParam(":idCliente", $datosClientes["idCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datosClientes["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datosClientes["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":ciudad", $datosClientes["ciudad"], PDO::PARAM_STR);
        $stmt->bindParam(":creado_por", $datosClientes["creado_por"], PDO::PARAM_STR);

		var_dump($stmt);

        if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt = null;

    }


	
	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function mdlEliminarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCliente = :idCliente");

		$stmt -> bindParam(":idCliente", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		

		$stmt = null;

	}



}