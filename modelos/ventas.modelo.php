<?php

require_once "conexion.php";

class ModeloVentas
{

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function mdlMostrarVentas($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY fechaNovedad ASC");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fechaNovedad ASC");

			$stmt->execute();

			return $stmt->fetchAll();
		}


		$stmt = null;
	}
	public function SaveVenta($data)
	{
		try {
			$columnas = implode(", ", array_keys($data));
			$valores = array_values($data);
			$placeholders = implode(", ", array_fill(0, count($valores), "?"));
			$sql = "INSERT INTO ventas ($columnas) VALUES ($placeholders)";
			$stmt =  Conexion::conectar()->prepare($sql);
			if ($stmt->execute($valores)) {
				$lastInsertId = $this->Getlastid();
				return $lastInsertId['idVentas'];
			} else {
				print_r($stmt->errorInfo());  // Verifica si hay errores en la ejecución de la consulta
				return false;
			}
		} catch (PDOException $e) {
			die("Error al insertar los datos: " . $e->getMessage());
			return false;
		}
	}
	public function Getlastid()
	{
		$sql = "SELECT idVentas  FROM ventas  order by  idVentas desc";
		$sql =  Conexion::conectar()->prepare($sql);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_NAMED);
		return $row;
	}
	public function insertDetall($data)
	{
		try {
			$columnas = implode(", ", array_keys($data));
			$valores = array_values($data);
			$placeholders = implode(", ", array_fill(0, count($valores), "?"));
			$sql = "INSERT INTO ventasdetalle ($columnas) VALUES ($placeholders)";
			$stmt =  Conexion::conectar()->prepare($sql);
			$stmt->execute($valores);
			$lastInsertId =  Conexion::conectar()->lastInsertId();

			return $lastInsertId;
		} catch (PDOException $e) {
			die("Error al insertar los datos: " . $e->getMessage());
			return false;
		}
	}
	public function GetProdutos()
	{
		$sql = "SELECT tb1.idProducto,CodigoProducto ,tb2.categoria,tb3.color FROM productos tb1 INNER JOIN categoria tb2 on tb2.id=tb1.idTela INNER JOIN colores tb3 on tb3.idColor=tb1.idColor;";
		$sql =  Conexion::conectar()->prepare($sql);
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_NAMED);
		return $row;
	}
	public function ListVentas($FechIni, $FechFin)
	{
		$sql = "SELECT  tb1.idventas,tb2.nombre NomCli,tb2.apellido ApeCli,tb3.usuario Ven, tb1.valorVenta,tb1.ValorPendiente,(CASE WHEN tb1.metodoPago = 1 then 'Efectivo' ELSE 'Credito' END) MetPago , tb1.cantidadDias,tb1.fechaVenta
		from ventas tb1
		INNER JOIN clientes tb2 on tb2.idCliente=tb1.idCliente
		INNER JOIN usuarios tb3 on tb3.id=tb1.idVendedor
		WHERE tb1.fechaVenta between '$FechIni' AND '$FechFin';";
		$sql =  Conexion::conectar()->prepare($sql);
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_NAMED);
		return $row;
	}
	public function detailRem($idVen)
	{
		$sql = "SELECT tb1.idProducto,tb2.CodigoProducto,tb3.categoria,tb4.color,tb2.metrosRollo ,tb1.CantidadRollo,tb1.PrecioMetro ,((tb1.CantidadRollo* tb2.metrosRollo)*tb1.PrecioMetro)Total FROM ventasdetalle tb1
		INNER JOIN productos tb2 on tb2.idProducto=tb1.idProducto
		INNER JOIN categoria tb3 on tb3.id=tb2.idTela
		INNER JOIN colores tb4 on tb4.idColor=tb2.idColor
		where IdVenta=$idVen;";
		$sql =  Conexion::conectar()->prepare($sql);
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_NAMED);
		return $row;
	}
	public function updateStock($idPro, $cant)
	{
		$sql = "SELECT stock FROM `productos` WHERE idProducto=$idPro";
		$sql =  Conexion::conectar()->prepare($sql);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_NAMED);
		$stockAc = $row['stock'] - $cant;

		$sql2 = "UPDATE `productos` SET stock=$stockAc WHERE idProducto=$idPro";
		$sql2 =  Conexion::conectar()->prepare($sql2);
		$sql2->execute();
	}
	public function datosVen($idRem)
	{
		$sql = "SELECT tb1.idVentas,tb1.valorVenta,(CASE WHEN tb1.metodoPago = 1 then 'Efectivo' ELSE 'Credito' END) MetPago,tb1.cantidadDias,tb1.fechaVenta,tb2.nombre,tb2.apellido,tb3.usuario Ven ,tb4.usuario UsuEla
		FROM ventas tb1 
		INNER JOIN clientes tb2 on tb2.idCliente=tb1.idCliente
		INNER JOIN usuarios tb3 on tb3.id=tb1.idVendedor
		LEFT JOIN usuarios tb4 on tb4.id=tb1.userEla
		WHERE tb1.idVentas=$idRem";
		$sql =  Conexion::conectar()->prepare($sql);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_NAMED);
		return $row;
	}
	public function Detventa($idRem)
	{
		$sql = "SELECT tb3.categoria,tb4.color,SUM(tb1.CantidadRollo) CantidadRollo,
			SUM( (tb1.CantidadRollo*tb2.metrosRollo)) CantMetro, TRUNCATE(AVG(tb1.PrecioMetro), 0) PrecioMetro ,
			SUM(((tb1.CantidadRollo* tb2.metrosRollo)*tb1.PrecioMetro))Total 
			FROM ventasdetalle tb1
			INNER JOIN productos tb2 on tb2.idProducto=tb1.idProducto
			INNER JOIN categoria tb3 on tb3.id=tb2.idTela
			INNER JOIN colores tb4 on tb4.idColor=tb2.idColor
			where IdVenta=$idRem
			GROUP BY tb3.categoria,tb4.color;";
		$sql =  Conexion::conectar()->prepare($sql);
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_NAMED);
		return $row;
	}

	public function GetVendedor()
	{
		$sql = "SELECT id,usuario FROM `usuarios` where perfil='Administrador' ANd estado=1;";
		$sql =  Conexion::conectar()->prepare($sql);
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_NAMED);
		return $row;
	}
}
