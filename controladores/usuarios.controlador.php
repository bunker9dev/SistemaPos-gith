<?php

class ControladorUsuarios
{

  // INGRESO USUARIOS

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

        var_dump($respuesta["usuario"]);


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


  /*=============================================
	REGISTRO DE USUARIO
	=============================================*/


  // static public function ctrCrearUsuario()
  // {
  //   if (isset($_POST["nuevoUsuario"])) {
  //     if (
  //       preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
  //       preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellido"]) &&
  //       preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
  //       preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])) {




  //     }else {
  //       echo '<script>
        
  //       </script)'
  //     }
  //   }
  // }
}
