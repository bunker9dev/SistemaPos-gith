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
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])) {

          $tabla = "usuarios";

          $datos =  array("nombre" => $_POST["nuevoNombre"],
                          "apellido" => $_POST["nuevoApellido"],
                          "usuario" => $_POST["nuevoUsuario"],
                          "password" => $_POST["nuevoPassword"],
                          "perfil" => $_POST["nuevoPerfil"]);
          

          $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);





      }else {
        
        echo
        'alert("¡El usuario no puede ir vacío o llevar caracteres especiales!");';
       
      //   echo '<script>

      //   swal({

      //     type: "error",
      //     title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
      //     showConfirmButton: true,
      //     confirmButtonText: "Cerrar"

      //   }).then(function(result){

      //     if(result.value){
          
      //       window.location = "usuarios";

      //     }

      //   });
      

      // </script>';

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
// // }


    
        // } else {
        //   echo '<script>


    //       Swal.fire({
    //         title: "EL Usuario no puede ir vacío o llevar caracteres especiales",
    //         icon: "info",
    //         html: `
    //           "EL Usuario no puede ir vacío o llevar caracteres especiales"
    //         `,
    //         showCloseButton: true,
    //         showCancelButton: true,
    //         focusConfirm: false,
    //         confirmButtonText: `
    //           <i class="fa fa-thumbs-up"></i> Great!
    //         `,
    //         confirmButtonAriaLabel: "Thumbs up, great!",
    //         cancelButtonText: `
    //           <i class="fa fa-thumbs-down"></i>
    //         `,
    //         cancelButtonAriaLabel: "Thumbs down"

    //         }). then((resulta) =>{

    //             if(resultado.value) {

    //              window.location = "usuarios";

    //             }
    //           }
    //         });





    //        // Swal.fire({
    //       //   title: "EL Usuario no puede ir vacío o llevar caracteres especiales",
    //       //   icon: "info",
    //       //   html: `
    //       //     You can use <b>bold text</b>,
    //       //     <a href="#">links</a>,
    //       //     and other HTML tags
    //       //   `,
    //       //   showCloseButton: true,
    //       //   showCancelButton: true,
    //       //   focusConfirm: false,
    //       //   confirmButtonText: `
    //       //     <i class="fa fa-thumbs-up"></i> Great!
    //       //   `,
    //       //   confirmButtonAriaLabel: "Thumbs up, great!",
    //       //   cancelButtonText: `
    //       //     <i class="fa fa-thumbs-down"></i>
    //       //   `,
    //       //   cancelButtonAriaLabel: "Thumbs down"
    //       // });


    //       // Swal.fire({
    //       //   type: "error"
    //       //   title: "EL Usuario no puede ir vacío o llevar caracteres especiales"
    //       //   showConfirmButton: true,
    //       //   confirmButtonText: "Cerrar",
    //       //   closeOnConfirm: false

    //       // }). then((resulta) =>{

    //       //   if(resultado.value) {

    //       //   window.location = "usuarios";





            //       </script)';





