<?php
date_default_timezone_set('America/Bogota');

require_once $_SERVER['DOCUMENT_ROOT'] . '/POS/modelos/dashboard.modelo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/POS/guia/sqltoexcel/index.php';

class ControladorDash
{

    public $MODEL;
    public $Xlsx;

    public function __construct()
    {
        $this->MODEL = new ModeloDash();
        $this->Xlsx = new Xlsx();
    }

    /*=============================================
	MOSTRAR VENTAS
	=============================================*/

    public function Cabeceras()
    {
        $Ventas = $this->MODEL->CountVentas();
        $credit = $this->MODEL->CountCreditos();
        $Client = $this->MODEL->CountClientes();
        $Product = $this->MODEL->CountProductos();
        $datos = array(
            "Ventas" => $Ventas['c'],
            "credit" => $credit['c'],
            "Client" => $Client['c'],
            "Product" => $Product['c'],
        );
        return  $datos;
    }
    public function GrafAnual()
    {
        $datos = $this->MODEL->GrafAnual($_POST['FechIni'], $_POST['FechFin']);
        if ($datos) {
            $res = array("cod" => 1, "datos" => $datos);
        } else {
            $res = array("cod" => 0, "datos" => "");
        }
        echo json_encode($res);
    }
    public function GrafProduct()
    {
        $datos = $this->MODEL->GrafProduct($_POST['FechIni'], $_POST['FechFin']);
        if ($datos) {
            $res = array("cod" => 1, "datos" => $datos);
        } else {
            $res = array("cod" => 0, "datos" => "");
        }
        echo json_encode($res);
    }
    public function GrafVendedor()
    {
        $datos = $this->MODEL->GrafVendedor($_POST['FechIni'], $_POST['FechFin']);
        if ($datos) {
            $res = array("cod" => 1, "datos" => $datos);
        } else {
            $res = array("cod" => 0, "datos" => "");
        }
        echo json_encode($res);
    }
    public function GrafClientes()
    {
        $datos = $this->MODEL->GrafClientes($_POST['FechIni'], $_POST['FechFin']);
        if ($datos) {
            $res = array("cod" => 1, "datos" => $datos);
        } else {
            $res = array("cod" => 0, "datos" => "");
        }
        echo json_encode($res);
    }
    public function GenerarInforme()
    {
        $FechIni = $_POST['FechIni'];
        $FechFin = $_POST['FechFin'];
        switch ($_POST['opt']) {
            case 1:
                $sql = "
                SELECT tb1.fechaVenta 'Fecha Venta', tb1.idventas '# Remision',tb2.nombre 'Nombre Cliente',tb2.apellido 'Apellido Cliente' , tb1.valorVenta 'Valor Venta' ,(CASE WHEN tb1.metodoPago = 1 then 'Efectivo' ELSE 'Credito' END) 'Meto de Pago'
                from ventas tb1
                INNER JOIN clientes tb2 on tb2.idCliente=tb1.idCliente
                INNER JOIN usuarios tb3 on tb3.id=tb1.idVendedor
                WHERE  YEAR(tb1.fechaVenta) = YEAR(CURDATE())
                ORDER BY tb1.fechaVenta ASC;";
                break;
            case 2:
                $sql = "
                SELECT   tb1.CodigoProducto , tb2.categoria 'Tela' ,tb3.color , tb1.metrosRollo 'Metros Por rollo',tb1.stock 
                from productos tb1
                INNER JOIN categoria tb2 on tb2.id=tb1.idTela
                INNER JOIN colores tb3 on tb3.idColor=tb1.idColor
                WHERE tb1.stock>0;";
                break;
            case 3:
                $sql = "
                SELECT tb2.usuario 'Vendedor ', tb1.fechaVenta 'Fecha Venta' , tb1.valorVenta  'Valor Venta' 
                FROM ventas tb1 
                INNER JOIN usuarios tb2 ON tb2.id=tb1.idVendedor
                Where tb1.fechaVenta between '$FechIni' AND '$FechFin' ";
                break;
            case 4:
                $sql = "
                SELECT tb2.fechaVenta 'Fecha Venta', tb3.nombre 'Nombre Cliente', tb3.apellido 'Apellido Compra', tb2.valorVenta  'Valor Venta'
                from ventas tb2 INNER JOIN clientes tb3 on tb3.idCliente =tb2.idCliente
                Where tb2.fechaVenta between '$FechIni' AND '$FechFin' ";
                break;
        }

        $EX = $this->Xlsx->CrearXlsx('sql', $sql);
        if ($EX === true) {
            echo json_encode(array("msg" => "ok"));
        } else {
            echo json_encode(array("msg" => "error"));
        }
    }
}
$controller = new ControladorDash();

if (isset($_POST['funcion'])) {
    call_user_func(array(new ControladorDash, $_POST['funcion']));
}
