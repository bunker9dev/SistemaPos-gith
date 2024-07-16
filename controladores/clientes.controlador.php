<?php

class ControladorClientes{


    /*--=====================================
    CREAR CLIENTES
    ====================================== */


    static public function ctrCrearCliente(){
        if(isset($_POST["nuevoNombreCliente"])){


            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreCliente"]) &&
               preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellidoCliente"]) &&
               preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCiudadCliente"]) ){

                $tabla = "clientes";

                $datosClientes = array("nombre"=>$_POST["nuevoNombreCliente"],
					           "apellido"=>$_POST["nuevoApellidoCliente"],
					           "ciudad"=>$_POST["nuevaCiudadCliente"],
                               "creado_por"=>$_SESSION["usuario"]
                            );

                
                $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datosClientes);

                if ($respuesta == "ok") {


                    echo '<script>
          
                          Swal.fire({
                          icon: "successs",
                          title: "Cliente guardado",
                          text: "¡El Cliente ha sido guardado correctamente!",
                          }).then(function(result){
                                                  if (result.value) {
          
                                                  window.location = "clientes";
          
                                                  }
                                              })
                        </script>';
                  }


               }else{

                    echo '<script>
            
                            Swal.fire({
                            icon: "error",
                            title: "Ten en cuenta",
                            text: "¡Los datos no puede ir vacíos o llevar caracteres especiales!",
                            }).then(function(result){
                                     if (result.value) {
            
                                         window.location = "clientes";
            
                                    }
                                })
                          </script>';
            }


    
        }




    }


    /*--=====================================
    MOSTRAR CLIENTES
    ====================================== */
    
    static public function ctrMostrarClientes($item, $valor){

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

		return $respuesta;

	}


    
	/*=============================================
	EDITAR CLIENTE
	=============================================*/

    static public function ctrEditarCliente(){
        if(isset($_POST["editarNombreCliente"])){


            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreCliente"]) &&
               preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarApellidoCliente"]) &&
               preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCiudadCliente"]) ){

                $tabla = "clientes";

                $datosClientes = array("idCliente"=>$_POST["idCliente"],
                                        "nombre"=>$_POST["editarNombreCliente"],
					                    "apellido"=>$_POST["editarApellidoCliente"],
					                    "ciudad"=>$_POST["editarCiudadCliente"],
                                        "creado_por"=>$_SESSION["usuario"]
                                    );

                $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datosClientes);

                if ($respuesta == "ok") {


                    echo '<script>
          
                          Swal.fire({
                          icon: "successs",
                          title: "Cliente Actualizado",
                          text: "¡El Cliente ha sido Actualizado correctamente!",
                          }).then(function(result){
                                                  if (result.value) {
          
                                                  window.location = "clientes";
          
                                                  }
                                              })
                        </script>';
                  }


               }else{

                    echo '<script>
            
                            Swal.fire({
                            icon: "error",
                            title: "Ten en cuenta",
                            text: "¡Los datos no puede ir vacíos o llevar caracteres especiales!",
                            }).then(function(result){
                                     if (result.value) {
            
                                         window.location = "clientes";
            
                                    }
                                })
                          </script>';
            }


    
        }




    }


    

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="clientes";
			$datos = $_GET["idCliente"];

			$respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({
          title: "Cliente Borrado!",
          text: "El Cliente ha sido borrado correctamente.",
          icon: "success"
          }).then(function(result){
										if (result.value) {

										window.location = "clientes";

										}
									})

				</script>';

			}		

		}

	}
}



	





