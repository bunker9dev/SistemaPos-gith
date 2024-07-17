<?php



require_once "conexion.php";

class ModeloClientes {


    /*=============================================
	CREAR CLIENTE
	=============================================*/


    static public function mdlIngresarCliente($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, ciudad) VALUES  (:nombre, :apellido, :ciudad)");



        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
        

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";
        
        }

        $stmt = null;


    }

}