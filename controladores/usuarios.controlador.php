<?php

class ControladorUsuarios
{

  /*=============================================
	INGRESO DE USUARIO
	=============================================*/

  static public function ctrIngresoUsuario()
  {

    if (isset($_POST["ingreUsuario"])) {

      if (
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingreUsuario"]) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingrePassword"])
      ) {
        $tabla = "usuarios";

        $item = "usuario";
        $valor = $_POST["ingreUsuario"];

        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

        // var_dump($respuesta["usuario"]);


        if (is_array($respuesta) && $respuesta["usuario"] == $_POST["ingreUsuario"] && $respuesta["password"] == $_POST["ingrePassword"]) {


          $_SESSION["iniciarSesion"] = "ok";

          echo '<script>
                      window.location = "inicio";
                    </script>';
        } else {
          echo '<br><div class="alert-danger">Error al ingresar, vuelve a intentarlo...</div>';
        }
      }
    }
  }


  static public function ctrCrearUsuario(){

    if (isset($_POST["nuevoNombre"])) {

      if (
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellido"]) &&
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.]+$/', $_POST["nuevoUsuario"]) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])) {

	      // /*=============================================
				// VALIDAR IMAGEN
				// =============================================*/

				// if(isset($_FILES["nuevaFoto"]["tmp_name"])){

				// 	list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

          



				// 	$nuevoAncho = 500;
				// 	$nuevoAlto = 500;

				// 	/*=============================================
				// 	CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				// 	=============================================*/

				// 	$directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];

        //   if (!is_dir($directorio)) {
        //     mkdir($directorio,0755);
        // }


				// // 	/*=============================================
				// // 	DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				// // 	=============================================*/

				// // 	if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

				// // 		/*=============================================
				// // 		GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				// // 		=============================================*/

				// // 		$aleatorio = mt_rand(100,999);

				// // 		$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

				// // 		$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

				// // 		$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				// // 		imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				// // 		imagejpeg($destino, $ruta);

				// // 	}

				// // 	if($_FILES["nuevaFoto"]["type"] == "image/png"){

				// // 		/*=============================================
				// // 		GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				// // 		=============================================*/

				// // 		$aleatorio = mt_rand(100,999);

				// // 		$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

				// // 		$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

				// // 		$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				// // 		imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				// // 		imagepng($destino, $ruta);
				// 	// }
				// }

          $tabla = "usuarios";

          $datos =  array("nombre" => $_POST["nuevoNombre"],
                          "apellido" => $_POST["nuevoApellido"],
                          "usuario" => $_POST["nuevoUsuario"],
                          "password" => $_POST["nuevoPassword"],
                          "perfil" => $_POST["nuevoPerfil"]);
          

          $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

          if($respuesta == "ok") {


                echo '<script>

                Swal.fire({
                icon: "successs",
                title: "Usuario guardado",
                text: "¡El usuario ha sido guradado correctamente!",
                });
              </script>';
          }

      }else {
        
        echo '<script>

                Swal.fire({
                icon: "error",
                title: "Ten en cuenta",
                text: "¡El nombre y apellido no puede ir vacío o llevar caracteres especiales!",
                });
              </script>';

      }
    }
  }


}


  /*=============================================
	REGISTRO DE USUARIO
	=============================================*/


  // 

  //   if (isset($_POST["nuevoNombre"])) {

      // if (
      //   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
      //   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellido"]) &&
      //   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
      //   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])
      // ) 
      // // {

      //   //               $tabla = "usuarios";

        //               $datos = array("nombre" => $_POST["nuevoNombre"],
        //                             "apellido" => $_POST["nuevoapellido"],
        //                             "usaurio" => $_POST["nuevoUsuario"],
        //                             "password" => $_POST["nuevoPassword"],
        //                             "perfil" => $_POST["nuevoPerfil"]);

        //               $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);


      // } else {



      //   echo '<script>
          
      //       Swal.fire({
          
      //         icon: "error",
          
      //         title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
          
      //         showConfirmButton: true,
          
      //         confirmButtonText: "Cerrar"
          
                    
          
      //       }).then(function(result){
          
                    
          
      //           if(result.value){
      //             window.location = "usuarios";
      //           }
              
      //         });
      
      //     </script>';
      // }
  //   }
  // }



  //   }






