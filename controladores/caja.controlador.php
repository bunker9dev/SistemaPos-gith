<?php
date_default_timezone_set('America/Bogota');

require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaPos-gith/modelos/caja.modelo.php';

class ControladorCaja
{

    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new ModeloCaja();
    }

    /*=============================================
	MOSTRAR VENTAS
	=============================================*/

    public function ListCredit()
    {
        $datos = $this->MODEL->ListCredit($_POST['FechIni'], $_POST['FechFin']);
        if ($datos) {
            include($_SERVER['DOCUMENT_ROOT'] . '/SistemaPos-gith/vistas/layouts/tbCredit.php');
        } else {
            echo 'No hay datos';
        }
    }
    public function AbonoRem()
    {
        $datos = $this->MODEL->AbonoRem($_POST['idRem']);
        echo json_encode($datos);
    }
    public function AbonoPro()
    {
        $ar = array(
            "IdVenta" => $_POST['idRem'],
            "valorActual" => $_POST['val_Pend'],
            "ValorAbon" => $_POST['val_Abon'],
            "idEmpleado" => $_POST['idEmpleado'],
        );
        $AbonoHis = $this->MODEL->AbonoHis($ar);
        //proceso de actualizacion
        $newValor = $_POST['val_Pend'] - $_POST['val_Abon'];
        $update = $this->MODEL->udateCouta($_POST['idRem'], $newValor);
    }
}
$controller = new ControladorCaja();

if (isset($_POST['funcion'])) {
    call_user_func(array(new ControladorCaja, $_POST['funcion']));
}
