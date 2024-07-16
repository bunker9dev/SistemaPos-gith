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


}