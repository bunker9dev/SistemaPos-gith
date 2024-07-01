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
        preg_match('/^[a-zA-Z0-9.]+$/', $_POST["ingreUsuario"]) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingrePassword"])
      ) {


        $tabla = "usuarios";

        $item = "usuario";
        $valor = $_POST["ingreUsuario"];

        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

        // var_dump($respuesta["usuario"]);


        $auth = password_verify($_POST["ingrePassword"], $respuesta["password"]);
        var_dump($auth);

        if (is_array($respuesta) && $respuesta["usuario"] == $_POST["ingreUsuario"] && $auth) {


          $_SESSION["iniciarSesion"] = "ok";
          $_SESSION["id"] = $respuesta["id"];
          $_SESSION["nombre"] = $respuesta["nombre"];
          $_SESSION["apellido"] = $respuesta["apellido"];
          $_SESSION["usuario"] = $respuesta["usuario"];
          $_SESSION["foto"] = $respuesta["foto"];
          $_SESSION["perfil"] = $respuesta["perfil"];



          echo '<script>
                      window.location = "inicio";
                    </script>';
        } else {
          echo '<br><div class="alert-danger">Error al ingresar, vuelve a intentarlo...</div>';
        }
      }
    }
  }


  static public function ctrCrearUsuario()
  {

    if (isset($_POST["nuevoNombre"])) {

      if (
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellido"]) &&
        preg_match('/^[a-zA-Z0-9.]+$/', $_POST["nuevoUsuario"]) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])
      ) {

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

          $directorio = "vistas/img/usuarios/" . $_POST["nuevoUsuario"];

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

  static public function ctrMostrarUsuarios($item, $valor){

    $tabla = "usuarios";

    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

    return $respuesta;
  }



	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarUsuario(){

		if(isset($_POST["editarUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

					

					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/usuarios/".$_POST["editarUsuario"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "usuarios";

				if($_POST["editarPassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/ ', $_POST["editarPassword"])){

						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}else{

						echo'<script>

				         Swal.fire({
                    icon: "error",
                    title: "Ten en cuenta",
                    text: "¡La contraseña no puede ir vacío o llevar caracteres especiales!  AAAAAAAAA",
                    }).then(function(result){
										if (result.value) {

										window.location = "usuarios";

										}
									})

						  	</script>';

					}

				}else{

					$encriptar = $_POST["passwordActual"];

				}

				$datos = array("nombre" => $_POST["editarNombre"],
							   "usuario" => $_POST["editarUsuario"],
							   "password" => $encriptar,
							   "perfil" => $_POST["editarPerfil"],
							   "foto" => $ruta);

				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

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


			}else{

				echo'<script>

				 Swal.fire({
                icon: "error",
                title: "Ten en cuenta",
                text: "¡El nombre y apellido no puede ir vacío o llevar caracteres especiales 123456789012345!",
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
