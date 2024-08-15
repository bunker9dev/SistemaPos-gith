<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Usuarios</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Usuarios</li>
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
        <!-- <table  class="table table-bordered table-hover table-responsive" width="100%"> -->
        <table  class="table table-bordered table-hover table-responsive tablas" width="100%">

          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Último login</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>User</td>
              <td>Admin</td>
              <td>Admin</td>
              <td><img src="vistas/img/plantilla/icon-man1.svg" class="img-circle img-thumbnai" width="40px" alt="User Image"></td>
              <td>Administrador</td>
              <td><button class="btn btn-success btn-xs">Activo</button></td>
              <td>2024-05-30 09:05:23</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"> <i class="fa fa-pencil-alt" aria-hidden="true"></i> </button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i> </button>
                </div>
              </td>
            </tr>
          

          <!-- ######## /tbody ######### -->
        
            <tr>
              <td>2</td>
              <td>Antonio</td>
              <td>Arenas</td>
              <td>Antonio24</td>
              <td><img src="vistas/img/plantilla/icon-man2.svg" class="img-circle img-thumbnai" width="40px" alt="User Image"></td>
              <td>vendedor</td>
              <td><button class="btn btn-success btn-xs">Activo</button></td>
              <td>2024-05-30 08:26:58</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"> <i class="fa fa-pencil-alt" aria-hidden="true"></i> </button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i> </button>
                </div>
              </td>
            </tr>
          

          <!-- ######## /tbody ######### -->
        
            <tr>
              <td>3</td>
              <td>Luis</td>
              <td>Garces</td>
              <td>vendedor2</td>
              <td><img src="vistas/img/plantilla/icon-man3.svg" class="img-circle img-thumbnai" width="40px" alt="User Image"></td>
              <td>vendedor</td>
              <td><button class="btn btn-danger btn-xs">Inactivo</button></td>
              <td>2023-04-29 16:47:06</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"> <i class="fa fa-pencil-alt" aria-hidden="true"></i> </button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i> </button>
                </div>
              </td>
            </tr>
          

          <!-- ######## /tbody ######### -->
        
            <tr>
              <td>4</td>
              <td>Juan</td>
              <td>Perez</td>
              <td>Juan.p</td>
              <td><img src="vistas/img/plantilla/icon-man4.svg" class="img-circle img-thumbnai" width="40px" alt="User Image"></td>
              <td>bodeguero</td>
              <td><button class="btn btn-success btn-xs">Activo</button></td>
              <td>2024-05-30 08:39:42</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"> <i class="fa fa-pencil-alt" aria-hidden="true"></i> </button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i> </button>
                </div>
              </td>
            </tr>
          

          <!-- ######## /tbody ######### -->
        
            <tr>
              <td>5</td>
              <td>Claudia</td>
              <td>Ortiz</td>
              <td>Clau.o</td>
              <td><img src="vistas/img/plantilla/icon-woman1.svg" class="img-circle img-thumbnai" width="40px" alt="User Image"></td>
              <td>vendedor</td>
              <td><button class="btn btn-success btn-xs">Activo</button></td>
              <td>2024-05-30 08:10:12</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"> <i class="fa fa-pencil-alt" aria-hidden="true"></i> </button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i> </button>
                </div>
              </td>
            </tr>
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

<!-- ###########################
#                              #
#    MODAL AGREGAR CLIENTE     #
#                              #
################################-->


<!-- The Modal -->
<div class="modal fade" id="modalAgregarUsuario">
  <div class="modal-dialog">
    <div class="modal-content">


      <form role="form" method="post" enctype="multipart/form-darta" action="">
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
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>
            </div>

            <!-- Entrada apellidos -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control input-lg" name="nuevoApellido" placeholder="Ingresar Apellido" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>
            </div>


            <!-- Entrada Usuario -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Usuario" aria-label="keyname" aria-describedby="basic-addon1" required>
              </div>
            </div>


            <!-- Entrada Contraseña -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                </div>
                <input type="password" class="form-control input-lg" name="nuevaContraseña" placeholder="Ingresar Contraseña" aria-label="lockname" aria-describedby="basic-addon1" required>
              </div>
            </div>


            <!-- Entrada para seleccionar el perfil -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-users" aria-hidden="true"></i></span>
                </div>
                <select class="form-control input-lg" name="nuevoPerfil" id="">

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
              <input type="file" id="nuevaFoto" name="nuevaFoto">
              <p class="help-block">Peso máximo de la foto 200 MB</p>
              <img src="vistas/img/plantilla/1-icon-user-default.svg" alt="imagen perfil" class="img-thumbnail" width="100px">

            </div>
          </div>



        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Usuario</button>

        </div>
      </form>

    </div>
   




  </div>
</div>

</div>