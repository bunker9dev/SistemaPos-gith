<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Productos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Productos</li>
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
          Agregar producto
        </button>
      </div>

      <div class="card-body">
        <table class="table table-bordered table-hover dt-responsive tablaProductos" width="100%">

          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th style="width:100px">Código</th>
              <th style="width:200px">Tipo de Tela</th>
              <th>Color</th>
              <th style="width:50px text-align:center;">mtrs x rollo</th>
              <th style="width:50px text-align:center;">Cant</th>
              <th>Fecha Compra</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>


            <?php

              $item = null;
              $valor = null;

              $productos = ControladorProductos::ctrMostrarProductos($item, $valor);


              // var_dump($productos);

              foreach ($productos as $key => $value) {

                echo ' <tr>

                          <td>' . ($key + 1) . '</td>
                          <td>' .  $value["CodigoProducto"] . '</td>';

                          $item = "id";
                          $valor = $value["idTela"];
                          $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                          echo '<td class="text-uppercase">'.$categoria["categoria"].'</td>';

                          $item = "idColor";
                          $valor = $value["idColor"];
                          $categoria = ControladorColores::ctrMostrarColores($item, $valor);
                          echo '<td class="text-uppercase">'.$categoria["color"].'</td>

                          <td style="width:50px text-align:center;">' .  $value["metrosRollo"] . '</td>
                          <td style="width:50px text-align:center;">' .  $value["cantidadRollos"] . '</td>
                          <td style="text-align:center;">' .  $value["fechaCompra"] . '</td>
                          <td>

                          <div class="btn-group">
                              
                            <button class="btn btn-warning btnEditarCategoria" idCategoria="' . $value["idProducto"] . '" data-toggle="modal" data-target="#modalEditarCategoria">  <i class="fa fa-pencil-alt" aria-hidden="true"></i> </button>

                            <button class="btn btn-danger btnEliminarCategoria" idCategoria="' . $value["idProducto"] . '"><i class="fa fa-times"></i></button>

                          </div>  

                        </td>

                      </tr>';


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

<!-- ###########################
#
#    MODAL AGREGAR CLIENTE     #
#                              #
################################-->


<!-- The Modal -->
<div class="modal" id="modalAgregarCliente">
  <div class="modal-dialog">
    <div class="modal-content">

      <form role="form" method="post">

        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #3c8dbc; color: white;">
          <h4 class="modal-title">Agregar producto</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <div class="card-body">

            <div class="form-group">
              <div class="input-group">
                <!-- <span class="input-group-addon"><i class="fa fa-user"></i></span> -->
                <input type="text" class="form-control input-lg" name="nuevoOrigen" placeholder="Ingresar Origen" required>
              </div>
            </div>

            <!-- ############# / entrada ########### -->

            <div class="form-group">
              <div class="input-group">
                <!-- <span class="input-group-addon"><i class="fa fa-user"></i></span> -->
                <input type="text" class="form-control input-lg" name="nuevoTipoTela" placeholder="Ingresar Tipo Tela" required>
              </div>
            </div>

            <!-- ############# / entrada ########### -->

            <div class="form-group">
              <div class="input-group">
                <!-- <span class="input-group-addon"><i class="fa-map-marker"></i></span> -->
                <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar Descripcion" required>
              </div>
            </div>

            <!-- ############# / entrada ########### -->

          </div>



        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Producto</button>
        </div>

      </form>


    </div>
  </div>
</div>


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