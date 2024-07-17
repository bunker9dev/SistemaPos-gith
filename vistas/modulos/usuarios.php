<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrar Usuarios</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active"> Administrar Usuarios</li>
          </ol>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">

      <div class="card-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          Agregar usuario
        </button>
      </div>

      <div class="card-body">
        <table class="table table-bordered table-hover dt-responsive tablas" width="100%">

          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Nombre</th>
              <th>apellido</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Último login</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;


            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
            foreach ($usuarios as $key => $value) {

              echo ' <tr>
                      <td>' . ($key +1).' </td>
                      <td>' . $value["nombre"] . '</td>
                      <td>' . $value["apellido"] . '</td>
                      <td>' . $value["usuario"] . '</td>';

              if ($value["foto"] != "") {

                echo '<td><img src="' . $value["foto"] . '" class="img-circle img-thumbnai" width="40px" alt="User Image"></td>';
              } else {

                echo '.<td><img src="vistas/img/plantilla/icon-man1.svg" class="img-circle img-thumbnai" width="40px" alt="User Image"></td>';
              }


              echo '<td>' . $value["perfil"] . '</td>';

              if($value["estado"] != 0) {
                
                echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0" >Activo</button></td>';

              }else{

                echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1" >Desactivado</button></td>';

              }
                      echo '<td>' . $value["ultimo_login"] . '</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario" > <i class="fa fa-pencil-alt" aria-hidden="true"></i> </button>
                          <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i> </button>
                        </div>
                      </td>
                    </tr> ';
            }

            ?>

          </tbody>

          <!-- ######## /tbody ######### -->



        </table>



      </div>
      <!-- /.card-body -->

    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!--=====================================
MODAL AGREGAR USUARIO
======================================-->


<!-- The Modal -->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">


      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #007bff; color:#ffffff">
          <h4 class="modal-title">Agregar usuario</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="card-body">


            <!-- Entrada nombre  -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>
            </div>

            <!-- Entrada apellido -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control input-lg" name="nuevoApellido" placeholder="Ingresar Apellido" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>
            </div>


            <!-- Entrada Usuario -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Usuario" aria-label="keyname" aria-describedby="basic-addon1" id="nuevoUsuario" id="nuevoUsuario" required>
              </div>
            </div>


            <!-- Entrada Contraseña -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                </div>
                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Contraseña" aria-label="lockname" aria-describedby="basic-addon1" required>
              </div>
            </div>


            <!-- Entrada para seleccionar el perfil -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"><i class="fa fa-users" aria-hidden="true"></i></span>
                </div>
                <select class="form-control input-lg" name="nuevoPerfil">

                  <option value="">Seleccionar Perfil</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Bodeguero">Bodeguero</option>

                  <option value="Vendedor">Vendedor</option>
                </select>
              </div>
            </div>

            <!-- Subir foto -->
            <div class="form-group">
              <div class="panel">SUBIR FOTO</div>
              <input type="file" class="nuevaFoto" name="nuevaFoto">
              <p class="help-block">Peso máximo de la foto 2MB</p>
              <img src="vistas/img/plantilla/1-icon-user-default.svg" alt="imagen perfil" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Usuario</button>

        </div>

        <?php

        $crearUsuario = new ControladorUsuarios();
        $crearUsuario->ctrCrearUsuario();


        ?>


      </form>

    </div>
  </div>

</div>



<!--=====================================
MODAL EDITAR USUARIO
======================================-->


<!-- The Modal -->
<div id="modalEditarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">


      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #007bff; color:#ffffff">
          <h4 class="modal-title">Editar usuario</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="card-body">


            <!-- Entrada nombre  -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
              </div>
            </div>

            <!-- Entrada apellido -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control input-lg" id="editarApellido" name="editarApellido" value=""  required>
              </div>
            </div>


            <!-- Entrada Usuario -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value=""  readonly>
              </div>
            </div>


            <!-- Entrada Contraseña -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                </div>

                <input type="password" class="form-control input-lg" id="editarPassword" name="editarPassword" placeholder="Escriba la Nueva Contraseña" aria-label="lockname" aria-describedby="basic-addon1">

                <input type= "hidden" id="passwordActual" name="passwordActual">

              </div>
            </div>


            <!-- Entrada para seleccionar el perfil -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"><i class="fa fa-users" aria-hidden="true"></i></span>
                </div>
                <select class="form-control input-lg" name="editarPerfil">

                  <option value="" id="editarPerfil"></option>

                  <option value="Administrador">Administrador</option>

                  <option value="Bodeguero">Bodeguero</option>

                  <option value="Vendedor">Vendedor</option>
                </select>
              </div>
            </div>

            <!-- Subir foto -->
            <div class="form-group">
              <div class="panel">CAMBIAR FOTO</div>
              <input type="file" class="nuevaFoto" name="editarFoto">
              <p class="help-block">Peso máximo de la foto 2MB</p>
              <img src="vistas/img/plantilla/1-icon-user-default.svg" alt="imagen perfil" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">
            </div>

          </div>

        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Modificar Usuario</button>

        </div>

        <?php

        $editarUsuario = new ControladorUsuarios();
        $editarUsuario->ctrEditarUsuario();


        ?>


      </form>

    </div>

  </div>
</div>


<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 

