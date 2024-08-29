<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/colores.controlador.php";
require_once "../modelos/colores.modelo.php";

class TablaProductosVentas
{

    /*=============================================
    MOSTRAR LA TABLA DE PRODUCTOS
    =============================================*/

    public function mostrarTablaProductosVentas()
    {


        $item = null;
        $valor = null;

        $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

        // var_dump($productos);

        // return;

        $datosJson = '{
            "data": [';

        for ($i = 0; $i < count($productos); $i++) {


            /*=============================================
            TRAEMOS LA CATEGORÍA (tipo de tela)
            =============================================*/

            $item = "id";
            $valor = $productos[$i]["idTela"];

            $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);


            $item = "id";
            $valor = $productos[$i]["idTela"];
            $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

            $categoria2 = "<td class='text-uppercase'>" . $categoria["categoria"] . "</td>";



            /*=============================================
            TRAEMOS LOS COLORES
            =============================================*/

            $item = "idColor";
            $valor = $productos[$i]["idColor"];

            $colores = ControladorColores::ctrMostrarColores($item, $valor);



            /*=============================================
            STOCK
            =============================================*/

            if ($productos[$i]["stock"] == 0) {

                $stock = "<button class='btn btn-danger'>" . $productos[$i]["stock"] . "</button>";
            } else if ($productos[$i]["stock"] >= 1 && $productos[$i]["stock"] <= 10) {

                $stock = "<button class='btn btn-warning'>" . $productos[$i]["stock"] . "</button>";
            } else {

                $stock = "<button class='btn btn-success'>" . $productos[$i]["stock"] . "</button>";
            }




            /*=============================================
            TRAEMOS LAS ACCIONES
            =============================================*/

            $botones =  "<div class='btn-group'><button class='btn btn-primary agregarProducto recuperarBoton' idProducto='" . $productos[$i]["idProducto"] . "' onclick='agregarProducto(this,0)'>Agregar</button></div>";


            /*
        
             $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='" . $productos[$i]["idProducto"] . "' data-toggle='modal' data-target='#modalEditarProducto'> <i class='fa fa-pencil-alt' aria-hidden='true'></i> </button><button class='btn btn-danger btnEliminarProducto' idProducto='" . $productos[$i]["idProducto"] . "'codigo='" . $productos[$i]["CodigoProducto"] . "' ><i class='fa fa-times'></i></button></div>";

             */

            // $datosJson .= '[
            //                     "' . ($i + 1) . '",

            //                     "' . $categoria2 . '",
            //                     "' . $colores["color"] . '",
            //                     "' . $productos[$i]["metrosRollo"] . '",

            //                     ],';

            $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $productos[$i]["CodigoProducto"] . '",
                    "' . $categoria2 . '",
                    "' . $colores["color"] . '",
                    "' . $productos[$i]["metrosRollo"] . '",
                    "' . $stock . '",
                    "' . $botones . '"
                    ],';
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= '] 

            }';

        echo $datosJson;
    }
}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/
$activarProductosVentas = new TablaProductosVentas();
$activarProductosVentas->mostrarTablaProductosVentas();
