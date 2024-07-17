<?php

require_once "../controladores/colores.controlador.php";
require_once "../modelos/colores.modelo.php";

class AjaxColores{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idColor;

	public function ajaxEditarColor(){

		$item = "idColor";
		$valor = $this->idColor;

		$respuesta = ControladorColores::ctrMostrarColores($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idColor"])){

	$color = new AjaxColores();
	$color -> idColor = $_POST["idColor"];
	$color -> ajaxEditarColor();
}
