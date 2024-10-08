<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos
{

    public $codigoTela;

    /*=============================================
    GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
    =============================================*/
    public function ajaxCrearCodigoProducto()
    {

        $item = "id";
        $valor = $this->codigoTela;

        $respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

        echo json_encode($respuesta);

    }




    /*=============================================
    EDITAR PRODUCTO
    =============================================*/

    public $idProducto;
    public $traerProductos;


    public function ajaxEditarProducto()
    {

        if ($this->traerProductos == "ok") {
            $item = null;
            $valor = null;

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);



            echo json_encode($respuesta);

        } else {
            $item = "idProducto";
            $valor = $this->idProducto;

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);
            

            echo json_encode($respuesta);

        }

    }

}






/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/

if (isset($_POST["codigoTela"])) {

    $codigoProducto = new AjaxProductos();
    $codigoProducto->codigoTela = $_POST["codigoTela"];
    $codigoProducto->ajaxCrearCodigoProducto();

}



/*=============================================
EDITAR PRODUCTO
=============================================*/

if (isset($_POST["idProducto"])) {

    $editarProducto = new AjaxProductos();
    $editarProducto->idProducto = $_POST["idProducto"];
    $editarProducto->ajaxEditarProducto();

}

/*=============================================
TRAER PRODUCTOS
=============================================*/

if (isset($_POST["traerProductos"])) {

    $traerProductos = new AjaxProductos();
    $traerProductos->traerProductos = $_POST["traerProductos"];
    $traerProductos->ajaxEditarProducto();

}

// /*=============================================
// NOMBRE PRODUCTO
// =============================================*/

// if (isset($_POST["traerProductos"])) {

//     $traerProductos = new AjaxProductos();
//     $traerProductos->traerProductos = $_POST["traerProductos"];
//     $traerProductos->ajaxEditarProducto();

// }