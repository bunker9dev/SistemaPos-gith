<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxProductos
{

    public $codigoTela;

    /*=============================================
    GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
    =============================================*/
    public function ajaxCrearCodigoProducto(){

        $item = "id";
        $valor = $this->codigoTela;
    
        $respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);
    
        echo json_encode($respuesta);
    
    }

}


/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/ 

if(isset($_POST["codigoTela"])){

    $codigoProducto = new AjaxProductos();
    $codigoProducto -> codigoTela = $_POST["codigoTela"];
    $codigoProducto -> ajaxCrearCodigoProducto();

}