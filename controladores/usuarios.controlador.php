<?php

class ControladorUsuarios
{

    // INGRESO USUARIOS

    public function ctrIngresoUsuario()
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



                


                // if (is_array($respuesta)) {


                //     if ($respuesta["usuario"] == $_POST["ingreUsuario"] && $respuesta["password"] == $_POST["ingrePassword"]) {

                //         $_SESSION["iniciarSesion"] = "ok";

                //         echo '<script>
                //                 window.location = "inicio";
                //             </script>';

                //         echo '<br><div class="alert alert-success">credenciales validas</div>';

                //     } else {
                //         echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                //     }
                // } else {
                //     echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                // }
            }
        }
    }
}
