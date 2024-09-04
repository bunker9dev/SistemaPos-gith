<?php

require_once "conexion.php";

class ModeloCaja
{

    /*=============================================
	MOSTRAR VENTAS
	=============================================*/

    public function ListCredit($FechIni, $FechFin)
    {
        $sql = "SELECT  tb1.idventas,tb2.nombre NomCli,tb2.apellido ApeCli,tb3.usuario Ven, tb1.valorVenta,tb1.ValorPendiente, tb1.cantidadDias, tb1.fechaVenta, DATE_ADD(tb1.fechaVenta, INTERVAL tb1.cantidadDias DAY) AS nuevaFecha ,Sc1.c
        FROM ventas tb1 
        INNER JOIN clientes tb2 on tb2.idCliente=tb1.idCliente
        INNER JOIN usuarios tb3 on tb3.id=tb1.idVendedor
        LEFT JOIN (
            SELECT idVenta, COUNT(idVentaDet) c FROM `ventasdetalle` GROUP BY IdVenta
        ) Sc1 on Sc1.idVenta=idVentas
        WHERE tb1.fechaVenta between '$FechIni' AND '$FechFin'
        AND metodoPago=2;
        ";
        $sql =  Conexion::conectar()->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function AbonoRem($idRem)
    {
        $sql = "SELECT * FROM ventas tb1 WHERE idVentas =$idRem ";
        $sql =  Conexion::conectar()->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
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
    public function AbonoHis($data)
    {
        try {
            $columnas = implode(", ", array_keys($data));
            $valores = array_values($data);
            $placeholders = implode(", ", array_fill(0, count($valores), "?"));
            $sql = "INSERT INTO ventasabonos ($columnas) VALUES ($placeholders)";
            $stmt =  Conexion::conectar()->prepare($sql);
            $stmt->execute($valores);
            $lastInsertId =  Conexion::conectar()->lastInsertId();

            return $lastInsertId;
        } catch (PDOException $e) {
            die("Error al insertar los datos: " . $e->getMessage());
            return false;
        }
    }
    public function udateCouta($idVent, $cant)
    {
        $sql2 = "UPDATE `ventas` SET ValorPendiente=$cant WHERE idVentas =$idVent";
        $sql2 =  Conexion::conectar()->prepare($sql2);
        $sql2->execute();
    }
    public function FacturaAbono($idAbo)
    {
        $sql = "SELECT tb2.idVentas, tb1.IdVentasAb,tb1.valorActual,tb1.ValorAbon,tb1.FechaAbon ,tb3.nombre,tb3.apellido,tb4.usuario,tb4.foto , tb2.valorVenta
        FROM ventasabonos tb1
        INNER JOIN ventas tb2 on tb2.idVentas=tb1.IdVenta
        INNER JOIN clientes tb3 on tb3.idCliente=tb2.idCliente
        INNER JOIN  usuarios tb4 on tb4.id=tb1.idEmpleado
        WHERE tb1.IdVentasAb=$idAbo";
        $sql = Conexion::conectar()->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
    public function lastId($idAbo)
    {
        $sql = "SELECT MAX(IdVentasAb) ult FROM ventasabonos WHERE IdVenta=$idAbo;";
        $sql = Conexion::conectar()->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
    public function HistoAbo($idAbo)
    {
        $sql = "SELECT tb1.IdVentasAb,tb1.valorActual,tb1.ValorAbon,(tb1.valorActual-tb1.ValorAbon) Pendiente,tb1.FechaAbon,tb2.usuario 
        FROM ventasabonos tb1
        INNER JOIN usuarios tb2 on tb2.id=tb1.idEmpleado
        where tb1.IdVenta=$idAbo;";
        $sql = Conexion::conectar()->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
}
