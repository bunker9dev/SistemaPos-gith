<?php

require_once "conexion.php";

class ModeloDash
{

    /*=============================================
	MOSTRAR VENTAS
	=============================================*/

    public function GrafAnual()
    {
        $sql = "SELECT Meses.Mes, COALESCE(SUM(v.valorVenta), 0) AS va FROM (SELECT 1 AS MesNum, 'Enero' AS Mes UNION ALL SELECT 2 AS MesNum, 'Febrero' AS Mes UNION ALL SELECT 3 AS MesNum, 'Marzo' AS Mes UNION ALL SELECT 4 AS MesNum, 'Abril' AS Mes UNION ALL SELECT 5 AS MesNum, 'Mayo' AS Mes UNION ALL SELECT 6 AS MesNum, 'Junio' AS Mes UNION ALL SELECT 7 AS MesNum, 'Julio' AS Mes UNION ALL SELECT 8 AS MesNum, 'Agosto' AS Mes UNION ALL SELECT 9 AS MesNum, 'Septiembre' AS Mes UNION ALL SELECT 10 AS MesNum, 'Octubre' AS Mes UNION ALL SELECT 11 AS MesNum, 'Noviembre' AS Mes UNION ALL SELECT 12 AS MesNum, 'Diciembre' AS Mes ) AS Meses LEFT JOIN ventas v ON Meses.MesNum = MONTH(v.fechaVenta) AND YEAR(v.fechaVenta) = YEAR(CURDATE()) GROUP BY Meses.Mes, Meses.MesNum ORDER BY Meses.MesNum;";
        $sql =  Conexion::conectar()->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function GrafProduct($FechIni, $FechFin)
    {
        $sql = "SELECT tb3.categoria , tb4.color , SUM(tb1.CantidadRollo) CantRo 
        FROM ventasdetalle tb1 
        INNER JOIN productos tb2 on tb2.idProducto=tb1.idProducto 
        INNER JOIN categoria tb3 on tb3.id=tb2.idTela 
        INNER JOIN colores tb4 on tb4.idColor=tb2.idColor 
        INNER JOIn ventas tb5 on tb5.idVentas=tb1.IdVenta 
        Where tb5.fechaVenta between '$FechIni' AND '$FechFin' GROUP BY tb3.categoria , tb4.color 
        ORDER BY CantRo DESC;        ";
        $sql =  Conexion::conectar()->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function GrafVendedor($FechIni, $FechFin)
    {
        $sql = "SELECT tb2.usuario, SUM(tb1.valorVenta ) valor 
        FROM ventas tb1 
        INNER JOIN usuarios tb2 ON tb2.id=tb1.idVendedor 
        Where tb1.fechaVenta between '$FechIni' AND '$FechFin' GROUP BY tb2.usuario 
        ORDER BY valor DESC; ";
        $sql =  Conexion::conectar()->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function GrafClientes($FechIni, $FechFin)
    {
        $sql = "SELECT tb3.nombre, tb3.apellido, tb2.valorVenta 
        from ventas tb2 INNER JOIN clientes tb3 on tb3.idCliente =tb2.idCliente
        Where tb2.fechaVenta between '$FechIni' AND '$FechFin'
        GROUP BY tb3.nombre, tb3.apellido ORDER BY valorVenta DESC; ";
        $sql =  Conexion::conectar()->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function CountVentas()
    {
        $sql = "SELECT COUNT(idVentas) c FROM `ventas`;";
        $sql =  Conexion::conectar()->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
    public function CountCreditos()
    {
        $sql = "SELECT COUNT(idVentas) c FROM `ventas` WHERE metodoPago=2 AND valorVenta>0;";
        $sql =  Conexion::conectar()->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
    public function CountClientes()
    {
        $sql = "SELECT count(idCliente)c FROM `clientes`;";
        $sql =  Conexion::conectar()->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
    public function CountProductos()
    {
        $sql = "SELECT COUNT(idProducto)c FROM `productos` WHERE stock !=0;";
        $sql =  Conexion::conectar()->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
}
