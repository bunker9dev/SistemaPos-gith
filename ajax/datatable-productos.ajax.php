<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/colores.controlador.php";
require_once "../modelos/colores.modelo.php";

class TablaProductos{

    /*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

    public function mostrarTablaProductos(){

        $item = null;
    	$valor = null;

  		$productos = ControladorProductos::ctrMostrarProductos($item, $valor);	

        // var_dump($productos);

        // return;

        $datosJson = '{
            "data": [';
  
            for($i = 0; $i < count($productos); $i++){

           
        	/*=============================================
 	 		TRAEMOS LA CATEGORÍA (tipo de tela)
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $productos[$i]["idTela"];

		  	$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

            /*=============================================
 	 		TRAEMOS LOS COLORES
  			=============================================*/ 

		  	$item = "idColor";
		  	$valor = $productos[$i]["idColor"];

		  	$colores = ControladorColores::ctrMostrarColores($item, $valor);

            /*=============================================
            TRAEMOS LAS ACCIONES
            =============================================*/ 

            $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["idProducto"]."' data-toggle='modal' data-target='#modalEditarProducto'> <i class='fa fa-pencil-alt' aria-hidden='true'></i> </button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["idProducto"]."' ><i class='fa fa-times'></i></button></div>"; 
            

       
  
                $datosJson .='[
                    "'.($i+1).'",
                    "'.$productos[$i]["CodigoProducto"].'",
                    "'.$categorias["categoria"].'",
                    "'.$colores["color"].'",
                    "'.$productos[$i]["metrosRollo"].'",
                    "'.$productos[$i]["cantidadRollos"].'",
                    "'.$productos[$i]["fechaCompra"].'",
                    "'.$botones.'"
                  ],';
  
            }
  
            $datosJson = substr($datosJson, 0, -1);
  
           $datosJson .=   '] 
  
           }';
          
          echo $datosJson;

    }
}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();

