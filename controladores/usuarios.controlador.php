<?php

class ControladorUsuarios{

  /*=============================================
	INGRESO DE USUARIO
	=============================================*/

  static public function ctrIngresoUsuario(){

    if (isset($_POST["ingreUsuario"])) {

      if (
        preg_match('/^[a-zA-Z0-9.]+$/', $_POST["ingreUsuario"]) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingrePassword"])
      ) {


        $tabla = "usuarios";

        $item = "usuario";
        $valor = $_POST["ingreUsuario"];

        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

        // var_dump($respuesta["usuario"]);


        $auth = password_verify($_POST["ingrePassword"], $respuesta["password"]);


        if (is_array($respuesta) && $respuesta["usuario"] == $_POST["ingreUsuario"] && $auth) {
          if ($respuesta["estado"] == 1) {

            $_SESSION["iniciarSesion"] = "ok";
            $_SESSION["id"] = $respuesta["id"];
            $_SESSION["nombre"] = $respuesta["nombre"];
            $_SESSION["apellido"] = $respuesta["apellido"];
            $_SESSION["usuario"] = $respuesta["usuario"];
            $_SESSION["foto"] = $respuesta["foto"];
            $_SESSION["perfil"] = $respuesta["perfil"];

           /*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/Bogota');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$item1 = "ultimo_login";
						$valor1 = $fechaActual;

						$item2 = "id";
						$valor2 = $respuesta["id"];

						$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

						if($ultimoLogin == "ok"){

							echo '<script>

								window.location = "inicio";

							</script>';

						}
            
          } else {

            echo '<br><div class="alert-danger">EL  Usuario aùn no ha sido activado</div>';
          }

        } else {

          echo '<br><div class="alert-danger">Error al ingresar, vuelve a intentarlo...</div>';

        }
      }
    }
  }


  /*=============================================
	CREAR DE USUARIO
	=============================================*/

  static public function ctrCrearUsuario()
  {

    if (isset($_POST["nuevoNombre"])) {

      if (
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellido"]) &&
        preg_match('/^[a-zA-Z0-9.]+$/', $_POST["nuevoUsuario"]) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

        /*=============================================
				VALIDAR IMAGEN
				=============================================*/

        $ruta = "";

        if (isset($_FILES["nuevaFoto"]["tmp_name"])) {

          list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

          $nuevoAncho = 500;
          $nuevoAlto = 500;

          /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

          $directorio = "vistas/img/usuarios/". $_POST["nuevoUsuario"];

          if (!is_dir($directorio)) {
            mkdir($directorio, 0755);
          }


          /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

          if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

            /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

            $aleatorio = mt_rand(100, 999);

            $ruta = "vistas/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".jpg";

            $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagejpeg($destino, $ruta);
          }

          if ($_FILES["nuevaFoto"]["type"] == "image/png") {

            /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

            $aleatorio = mt_rand(100, 999);

            $ruta = "vistas/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".png";

            $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagepng($destino, $ruta);
          }
        }

        $tabla = "usuarios";

        $pass = password_hash($_POST["nuevoPassword"], PASSWORD_BCRYPT);

        $datos =  array(
          "nombre" => $_POST["nuevoNombre"],
          "apellido" => $_POST["nuevoApellido"],
          "usuario" => $_POST["nuevoUsuario"],
          "password" => $pass,
          "perfil" => $_POST["nuevoPerfil"],
          "foto" => $ruta
        );

        // var_dump($datos);

        $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

        if ($respuesta == "ok") {


          echo '<script>

                Swal.fire({
                icon: "successs",
                title: "Usuario guardado",
                text: "¡El usuario ha sido guardado correctamente!",
                }).then(function(result){
										if (result.value) {

										window.location = "usuarios";

										}
									})
              </script>';
        }
      } else {

        echo '<script>

                Swal.fire({
                icon: "error",
                title: "Ten en cuenta",
                text: "¡El nombre y apellido no puede ir vacío o llevar caracteres especiales!",
                }).then(function(result){
										if (result.value) {

										window.location = "usuarios";

										}
									})
              </script>';
      }
    }
  }


  /*=============================================
  MOSTRAR USUARIO
  =============================================*/

  static public function ctrMostrarUsuarios($item, $valor)
  {

    $tabla = "usuarios";

    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

    return $respuesta;
  }



  /*=============================================
	EDITAR USUARIO
	=============================================*/

  static public function ctrEditarUsuario()
  {

    if (isset($_POST["editarUsuario"])) {

      if (
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["editarNombre"]) &&
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["editarApellido"])
      ) {



        /*=============================================
				VALIDAR IMAGEN
				=============================================*/

        $ruta = $_POST["fotoActual"];

        if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {



          list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

          $nuevoAncho = 500;
          $nuevoAlto = 500;

          /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

          $directorio = "vistas/img/usuarios/" . $_POST["editarUsuario"];

          /*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

          if (!empty($_POST["fotoActual"])) {

            unlink($_POST["fotoActual"]);
          } else {

            mkdir($directorio, 0755);
          }

          /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

          if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

            /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

            $aleatorio = mt_rand(100, 999);

            $ruta = "vistas/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".jpg";

            $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagejpeg($destino, $ruta);
          }

          if ($_FILES["editarFoto"]["type"] == "image/png") {

            /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

            $aleatorio = mt_rand(100, 999);

            $ruta = "vistas/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".png";

            $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagepng($destino, $ruta);
          }
        }

        $tabla = "usuarios";

        if ($_POST["editarPassword"] != "") {

          if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {

            $pass = password_hash($_POST["editarPassword"], PASSWORD_BCRYPT);
          } else {

            echo '<script>

				         Swal.fire({
                    icon: "error",
                    title: "Ten en cuenta",
                    text: "¡La contraseña no puede ir vacío o llevar caracteres especiales!",
                    }).then(function(result){
										if (result.value) {

										window.location = "usuarios";

										}
									})

						  	</script>';
          }
        } else {

          $pass = $_POST["passwordActual"];
        }

        $datos = array(
          "nombre" => $_POST["editarNombre"],
          "apellido" => $_POST["editarApellido"],
          "usuario" => $_POST["editarUsuario"],
          "password" => $pass,
          "perfil" => $_POST["editarPerfil"],
          "foto" => $ruta
        );



        $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

        if ($respuesta == "ok") {

          echo '<script>

				   Swal.fire({
                icon: "successs",
                title: "Usuario Modificado",
                text: "¡El usuario ha sido Modificado correctamente!",
                }).then(function(result){
										if (result.value) {

										window.location = "usuarios";

										}
									})

					</script>';
        }
      } else {



        echo '<script>

				 Swal.fire({
                icon: "error",
                title: "Ten en cuenta",
                text: "¡El nombre y apellido no puede ir vacío o llevar caracteres especiales bbbbbb!",
                }).then(function(result){
										if (result.value) {

										window.location = "usuarios";

										}
									})

			  	</script>';
      }
    }
  }


	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarUsuario(){

		if(isset($_GET["idUsuario"])){

			$tabla ="usuarios";
			$datos = $_GET["idUsuario"];

			if($_GET["fotoUsuario"] != ""){

				unlink($_GET["fotoUsuario"]);
				rmdir('vistas/img/usuarios/'.$_GET["usuario"]);

			}

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({
          title: "Usuario Borrado!",
          text: "El Usuario ha sido borrado correctamente.",
          icon: "success"
          }).then(function(result){
										if (result.value) {

										window.location = "usuarios";

										}
									})

				</script>';

			}		

		}

	}
}



	

