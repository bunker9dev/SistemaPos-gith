<div class="wrapper login-page">
    <div id="back">


    </div>

    <div class="login-box">

        <!-- /.login-logo -->
        <div class="card card-outline card-primary">

            <div class="card-header text-center">

                <!-- <a href="../../index2.html" class="h1"><b>SIA</b>2</a> -->
                <img src="vistas/img/plantilla/1-logo-letras-negro1.svg" alt="logo letras" class="img-fluid" styles="padding:30px 100px 0px 100px>">

            </div>

            <div class="card-body">
                <p class="login-box-msg">Ingresa al sistema</p>

                <form method="post" autocomplete="off">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" autocomplete="off" placeholder="Usuario" name="ingreUsuario" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" autocomplete="off" placeholder="Contraseña" name="ingrePassword" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>

                    </div>
                    <?php
                    $login = new ControladorUsuarios();
                    $login->ctrIngresoUsuario();
                    ?>


                </form>


            </div>


        </div>

    </div>
</div>