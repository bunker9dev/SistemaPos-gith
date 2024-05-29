<?php

// session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

  <title>Sistema de Inventario A2</title>
  <link rel="icon" href="vistas/img/plantilla/1-icon-inventario-sia2.svg">


  <!-- ============================================
PLUGLIN CSS
==============================================-->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">
</head>



<!-- ============================================
PLUGLIN JAVASCRIPT
==============================================-->

<!-- jQuery -->
<script src="vistas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<body class="hold-transition sidebar-mini">

  <!-- <body class="hold-transition skin-blue sidebar-collapse  sidebar-mini"> -->
  <!-- <body class="hold-transition skin-blue sidebar-collapse sidebar-mini wrapper"> -->
  <!-- login-page -->

  <div class="wrapper">



    <?php

    // if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {


    //   echo '<div class="wrapper">';


    //   // CABEZOTE
    include "modulos/cabezote.php";

    //   // MENU
    include "modulos/menu.php";


    //   // CONTENIDO
    // include "modulos/ventas-reportes.php";



    // CONTENIDO
    if (isset($_GET["ruta"])) {
      if (
        $_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "dashboard-v1" ||
        $_GET["ruta"] == "dashboard-v2" ||
        $_GET["ruta"] == "usuarios" ||
        $_GET["ruta"] == "clientes" ||
        $_GET["ruta"] == "productos" ||
        $_GET["ruta"] == "inventarios" ||
        $_GET["ruta"] == "ventas-administrar" ||
        $_GET["ruta"] == "ventas-crear" ||
        $_GET["ruta"] == "ventas-reportes" ||
        $_GET["ruta"] == "caja" ||
        $_GET["ruta"] == "salir"
      ) {

        include "modulos/" . $_GET["ruta"] . ".php";

            } else {

              include "modulos/404.php";
            }

          } else {

            include "modulos/inicio.php";
      }
    

    // FOOTER
    include "modulos/footer.php";



    // } else {

    //   include "modulos/login.php";
    // }


    ?>




  </div>




  <!-- <script src="vistas/dist/js/demo.js"></script> -->

  <script src="vistas/js/plantilla.js"></script>


</body>

</html>