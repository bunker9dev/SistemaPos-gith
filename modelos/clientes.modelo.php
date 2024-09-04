<?php

require_once "conexion.php";

class ModeloClientes
{

	/*=============================================
	CREAR CLIENTE
	=============================================*/

	static public function mdlIngresarCliente($tabla, $datosClientes)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, ciudad, creado_por) VALUES (:nombre, :apellido, :ciudad, :creado_por)");


		$stmt->bindParam(":nombre", $datosClientes["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosClientes["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":ciudad", $datosClientes["ciudad"], PDO::PARAM_STR);
		$stmt->bindParam(":creado_por", $datosClientes["creado_por"], PDO::PARAM_STR);



		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt = null;
	}


	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function mdlMostrarClientes($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT tb1.idCliente,nombre,apellido,ciudad,fecha_registro, (CASE WHEN Sc1.c is null then 0 ELSE Sc1.c END ) total_compras, Sc1.Fech ultima_compra
			FROM clientes tb1 
			LEFT JOIN(
			SELECT tb3.idCliente, COUNT(tb2.idVentas) c,MAX(tb2.fechaVenta)Fech
			from ventas tb2 
			INNER JOIN clientes tb3 on tb3.idCliente =tb2.idCliente
			GROUP BY  tb3.idCliente
			) Sc1 on Sc1.idCliente=tb1.idCliente;");


			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT tb1.idCliente,nombre,apellido,ciudad,fecha_registro, (CASE WHEN Sc1.c is null then 0 ELSE Sc1.c END ) total_compras, Sc1.Fech ultima_compra
			FROM clientes tb1 
			LEFT JOIN(
			SELECT tb3.idCliente, COUNT(tb2.idVentas) c,MAX(tb2.fechaVenta)Fech
			from ventas tb2 
			INNER JOIN clientes tb3 on tb3.idCliente =tb2.idCliente
			GROUP BY  tb3.idCliente
			) Sc1 on Sc1.idCliente=tb1.idCliente;");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt = null;
	}


	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function mdlEditarCliente($tabla, $datosClientes)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre,  apellido = :apellido, ciudad = :ciudad, creado_por = :creado_por WHERE idCliente =:idCliente");

		$stmt->bindParam(":idCliente", $datosClientes["idCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosClientes["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosClientes["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":ciudad", $datosClientes["ciudad"], PDO::PARAM_STR);
		$stmt->bindParam(":creado_por", $datosClientes["creado_por"], PDO::PARAM_STR);

		var_dump($stmt);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt = null;
	}



	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function mdlEliminarCliente($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCliente = :idCliente");

		$stmt->bindParam(":idCliente", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}



		$stmt = null;
	}
}
