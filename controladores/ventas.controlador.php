<?php
date_default_timezone_set('America/Bogota');

require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaPos-gith/modelos/ventas.modelo.php';

class ControladorVentas
{

	public $MODEL;

	public function __construct()
	{
		$this->MODEL = new ModeloVentas();
	}

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	public function ctrMostrarVentas($item, $valor)
	{

		$tabla = "ventas";

		$respuesta = $this->MODEL->mdlMostrarVentas($tabla, $item, $valor);

		return $respuesta;
	}
	public function SaveVenta()
	{
		print_r($_POST);
		$fechaHoy = date('y-m-d H:i');
		if ($_POST['nuevoMetodoPago'] == 1) {
			$pendiente = 0;
		} else {
			$pendiente = $_POST['PrecioVenta'];
		}
		$ventaPrin = array(
			"idCliente" => $_POST['idCliente'],
			"idVendedor" => $_POST['idVendedor'],
			"productos" => $_POST['productos'],
			"valorVenta" => $_POST['PrecioVenta'],
			"ValorPendiente" => $pendiente,
			"metodoPago" => $_POST['nuevoMetodoPago'],
			"cantidadDias" => $_POST['nuevoTiempoCredito'],
			"userEla" => $_POST['userEla'],
			"fechaVenta" => $fechaHoy,
		);
		$insert = $this->MODEL->SaveVenta($ventaPrin);
		$arDet = json_decode($_POST['productos'], true);
		foreach ($arDet as $ar) {
			$ventaDett = array(
				"IdVenta" => $insert,
				"idProducto" => $ar['idProducto'],
				"CantidadRollo" => $ar['CantidadRollos'],
				"PrecioMetro" => $ar['ValorMetro'],
			);
			$updateStock = $this->MODEL->updateStock($ar['idProducto'], $ar['CantidadRollos']);

			$insertDetall = $this->MODEL->insertDetall($ventaDett);
		}
	}
	public function GetProdutos()
	{
		$datos = $this->MODEL->GetProdutos();
		echo json_encode($datos);
	}
	public function ListVentas()
	{
		$datos = $this->MODEL->ListVentas($_POST['FechIni'], $_POST['FechFin']);
		if ($datos) {
			include($_SERVER['DOCUMENT_ROOT'] . '/SistemaPos-gith/vistas/layouts/tbVentas.php');
		} else {
			echo 'No hay datos';
		}
	}
	public function detailRem()
	{
		$idVen = $_POST['idVen'];
		$datos = $this->MODEL->detailRem($idVen);
		echo json_encode($datos);
	}
	public function GetVendedor()
	{
		$datos = $this->MODEL->GetVendedor();
		echo json_encode($datos);
	}
}
$controller = new ControladorVentas();

if (isset($_POST['funcion'])) {
	call_user_func(array(new ControladorVentas, $_POST['funcion']));
}
