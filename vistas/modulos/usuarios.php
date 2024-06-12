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

      <div class="card-header">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          Agregar usuario
        </button>
      </div>

      <div class="card-body">
        <table id="usuarios1" class="table table-hover table-bordered ">

          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>perfil</th>
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
          </tbody>

          <!-- ######## /tbody ######### -->
          <tbody>
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
          </tbody>

          <!-- ######## /tbody ######### -->
          <tbody>
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
          </tbody>

          <!-- ######## /tbody ######### -->
          <tbody>
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
          </tbody>

          <!-- ######## /tbody ######### -->
          <tbody>
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