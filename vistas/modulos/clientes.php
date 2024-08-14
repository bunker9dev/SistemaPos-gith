<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Clientes</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Clientes</li>
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
          Agregar Cliente
        </button>
      </div>

      <div class="card-body">
        <!-- <table id="Clientess1" class="table table-bordered table-hover dt-responsive tablas "> -->
        <table  class="table table-bordered table-hover dt-responsive tablas" width="100%">

          <thead>
            <tr>
              <th style="width: 10px;">#</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Ciudad</th>
              <th>Compras</th>
              <th>Fecha última compra</th>
              <th>Fecha de registro</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>

            <?php

              $item = null;
              $valor = null;

              $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
              

              foreach ($clientes as $key => $value) {
                

                echo '<tr>

                        <td>'.($key+1).'</td>

                        <td>'.$value["nombre"].'</td>

                        <td>'.$value["apellido"].'</td>

                        <td>'.$value["ciudad"].'</td>

                        <td>'.$value["total_compras"].'</td>

                        <td>'.$value["ultima_compra"].'</td>

                        <td>'.$value["fecha_registro"].'</td>

                        <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["idCliente"].'" > <i class="fa fa-pencil-alt" aria-hidden="true"></i> </button>
                          <button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["idCliente"].'" ><i class="fa fa-times"></i> </button>
                        </div>
                      </td>


                      </tr>';
              
                }

            ?>

          </tbody>


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
MODAL AGREGAR CLIENTE
======================================-->


<!-- The Modal -->
<div class="modal" id="modalAgregarCliente">
  <div class="modal-dialog">
    <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #007bff; color:#ffffff">
          <h4 class="modal-title">Agregar Cliente</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <div class="card-body">

            <div class="form-group">
              <div class="input-group">
              <span class="input-group-text basic-addon1"> <i class="fas fa-user"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevoNombreCliente" placeholder="Ingresar nombre" required>
              </div>
            </div>

            <!-- ############# / entrada ########### -->

            <div class="form-group">
              <div class="input-group">
              <span class="input-group-text basic-addon1"> <i class="far fa-user"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevoApellidoCliente" placeholder="Ingresar apellido" required>
              </div>
            </div>

            <!-- ############# / entrada ########### -->

            <div class="form-group">
              <div class="input-group">
              <span class="input-group-text basic-addon1"> <i class="fas fa-city"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevaCiudadCliente" placeholder="Ingresar ciudad" required>
              </div>
            </div>

            <!-- ############# / entrada ########### -->

          </div>



        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cliente</button>
        </div>

      </form>

      <?php

      $crearcliente = new ControladorClientes();
      $crearcliente->ctrCrearCliente();

      ?>


    </div>
  </div>
</div>





<!--=====================================
MODAL EDITAR CLIENTE
======================================-->


<!-- The Modal -->
<div id="modalEditarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" >
        
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #007bff; color:#ffffff">
          <h4 class="modal-title">Editar Cliente</h4>
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
                <input type="text" class="form-control input-lg" id="editarNombreCliente" name="editarNombreCliente" value="" required>
                <input type="hidden" id="idCliente" name="idCliente">

              </div>
            </div>

            <!-- Entrada apellido -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"> <i class="far fa-user"></i> </span>
                </div>
                <input type="text" class="form-control input-lg" id="editarApellidoCliente" name="editarApellidoCliente" value=""  required>
              </div>
            </div>


            <!-- Entrada Ciudad -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"> <i class="fas fa-city"></i> </span>
                </div>
                <input type="text" class="form-control input-lg" id="editarCiudadCliente" name="editarCiudadCliente" value=""  required>
              </div>
            </div>


          </div>

        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Modificar Cliente</button>

        </div>

        <?php

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

        ?>


      </form>

    </div>

  </div>
</div>


<?php

        $eliminarCliente = new ControladorClientes();
        $eliminarCliente -> ctrEliminarCliente();

        ?>







<!-- Page specific script  -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>