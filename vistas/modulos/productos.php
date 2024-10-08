<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaPos-gith/modelos/productos.modelo.php';
$MODEL = new ModeloProductos;
$list = $MODEL->GeneralStock();
?><div class="content-wrapper">

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
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          Agregar producto
        </button>
      </div>

      <div class="card-body">

        <div class="row">
          <div class="col-lg-8">
            <h3>Detallado Productos</h3>
            <table class="table table-bordered table-hover dt-responsive tablaProductos" width="100%">

              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th style="width:100px">Código</th>
                  <th style="width:200px">Tipo de Tela</th>
                  <th>Color</th>
                  <th style="width:50px ;text-align:center;">mtrs x rollo</th>
                  <th style="width:50px; text-align:center;">Stock</th>
                  <th>Fecha Compra</th>
                  <th>Acciones</th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="col-lg-4">
            <h3>Resumen Productos</h3>
            <table class="table table-bordered" id="informe">
              <thead>
                <tr>
                  <th scope="col">Tela</th>
                  <th scope="col">Color</th>
                  <th scope="col">Stock</th>
                  <th scope="col">Mts</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($list as $lt) { ?>
                  <tr>
                    <td><?= $lt['Tela'] ?></td>
                    <td><?= $lt['color'] ?></td>
                    <td><?= $lt['stock'] ?></td>
                    <td><?= $lt['totalMts'] ?></td>
                  </tr> <?php } ?>

              </tbody>
            </table>
          </div>
        </div>


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
#    MODAL AGREGAR PRODUCTO     #
#                              #
################################-->


<!-- The Modal -->
<div class="modal" id="modalAgregarProducto">
  <div class="modal-dialog">
    <div class="modal-content">

      <form role="form" method="post">

        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #007bff; color:#ffffff">
          <h4 class="modal-title">Agregar producto</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->

        <!-- ############# / entrada ########### -->

        <div class="modal-body">

          <div class="card-body">

            <!-- Entrada Fecha  -->
            <div class="form-group">
              <label for="fname">Fecha de compra:</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"> <i class="fas fa-calendar-alt"></i> </span>
                </div>
                <input type="date" class="form-control input-lg" name="nuevaFechaCompra" id="nuevaFechaCompra"
                  placeholder="Ingresar Fecha Compra" aria-label="fecha" aria-describedby="basic-addon1" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-text basic-addon1"> <i class="fas fa-layer-group"></i> </span>
                <select type="text" class="form-control input-lg" name="nuevoTipoTela" id="nuevoTipoTela"
                  placeholder="Ingresar tipo de tela" required>
                  <option value="">Selecionar tipo de tela</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {

                    echo '<option value="' . $value["id"] . '">' . $value["categoria"] . '</option>';
                  }

                  ?>

                </select>
              </div>
            </div>

            <!-- ############# / entrada color ########### -->

            <div class="form-group">

              <div class="input-group">
                <span class="input-group-text basic-addon1"> <i class="fas fa-palette"></i> </span>
                <select type="text" class="form-control input-lg" name="nuevoColorTela" id="nuevoColorTela"
                  placeholder="Ingresar Color Tela" required>
                  <option value="">Selecionar color de tela</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $colores = ControladorColores::ctrMostrarColores($item, $valor);

                  foreach ($colores as $key => $value) {

                    echo '<option value="' . $value["idColor"] . '">' . $value["color"] . '</option>';
                  }

                  ?>

                </select>

              </div>
            </div>

            <!-- ############# / entrada ########### -->

            <!-- Entrada Metros  -->

            <div>

              <div class="form-group row ">

                <!-- Entrada metros rollos -->
                <div class="col-6">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text basic-addon1"><i class="fas fa-ruler"></i></span>
                    </div>
                    <input type="number" class="form-control input-lg" name="nuevoMetros" id="nuevoMetros" min="0"
                      placeholder="Ingresar Metros" aria-label="metros" aria-describedby="basic-addon1" required>
                  </div>
                </div>

                <!-- Entrada cantidad rollos -->

                <div class="col-6">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text basic-addon1"><i class="fas fa-bullseye"></i></span>
                    </div>
                    <input type="number" class="form-control input-lg" name="nuevoRollos" id="nuevoRollos" min="0"
                      placeholder="stock" aria-label="rollos" aria-describedby="basic-addon1" required>
                  </div>
                </div>

              </div>

            </div>

            <!-- ############# / entrada ########### -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-text basic-addon1"> <i class="fab fa-slack"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevoCodigo" id="nuevoCodigo"
                  placeholder="Código" value="" readonly>

              </div>
            </div>

          </div>


        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Producto</button>

        </div>

      </form>

      <?php

      $crearProducto = new ControladorProductos();
      $crearProducto->ctrCrearProducto();

      ?>

    </div>
  </div>
</div>




<!-- ###########################
#
#    MODAL EDITAR PRODUCTO     #
#                              #
################################-->


<!-- The Modal -->
<div class="modal" id="modalEditarProducto">
  <div class="modal-dialog">
    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background-color: #007bff; color:#ffffff">
          <h4 class="modal-title">Editar producto</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          <div class="card-body">

            <!-- Entrada Fecha  -->
            <div class="form-group">
              <label for="fname">Fecha de compra:</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"> <i class="fas fa-calendar-alt"></i> </span>
                </div>
                <input type="date" class="form-control input-lg" name="editarFechaCompra" id="editarFechaCompra"
                  required>
                <input type="hidden" id="idProducto" name="idProducto">
                <input type="hidden" name="UpdateProducto">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-text basic-addon1"> <i class="fas fa-layer-group"></i> </span>
                <select type="text" class="form-control input-lg" name="editarTipoTela" id="editarTipoTela" required>
                  <option id="mostrarTipoTela" value=""></option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {

                    echo '<option value="' . $value["id"] . '">' . $value["categoria"] . '</option>';
                  }

                  ?>

                </select>
              </div>
            </div>


            <!-- ############# / entrada color ########### -->

            <div class="form-group">

              <div class="input-group">
                <span class="input-group-text basic-addon1"> <i class="fas fa-palette"></i> </span>
                <select type="text" class="form-control input-lg" name="editarColorTela" id="editarColorTela" required>
                  <option id="mostrarColorTela"></option>

                  <?php

                  $item = null;
                  $valor = null;

                  $colores = ControladorColores::ctrMostrarColores($item, $valor);

                  foreach ($colores as $key => $value) {

                    echo '<option value="' . $value["idColor"] . '">' . $value["color"] . '</option>';
                  }

                  ?>


                </select>

              </div>
            </div>

            <!-- ############# / entrada ########### -->

            <!-- Entrada Metros  -->

            <div>


              <div class="form-group row ">

                <!-- Entrada metros rollos -->
                <div class="col-6">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text basic-addon1"><i class="fas fa-ruler"></i></span>
                    </div>
                    <input type="number" class="form-control input-lg" name="editarMetros" id="editarMetros" min="0"
                      aria-label="metros" aria-describedby="basic-addon1" required>
                  </div>
                </div>

                <!-- Entrada cantidad rollos -->

                <div class="col-6">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text basic-addon1"><i class="fas fa-bullseye"></i></span>
                    </div>
                    <input type="number" class="form-control input-lg" name="editarRollos" id="editarRollos" min="0"
                      aria-label="rollos" aria-describedby="basic-addon1" required>
                  </div>
                </div>

              </div>

            </div>

            <!-- ############# / entrada ########### -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-text basic-addon1"> <i class="fab fa-slack"></i> </span>
                <input type="text" class="form-control input-lg" name="editarCodigo" id="editarCodigo" value=""
                  readonly>
              </div>
            </div>

          </div>
        </div>




        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        </div>

      </form>

      <?php

      $editarProducto = new ControladorProductos();
      $editarProducto->ctrEditarProducto();

      ?>


    </div>
  </div>
</div>


<?php

$borrarProducto = new ControladorProductos();
$borrarProducto->ctrBorrarProducto();

?>


<script>
  $("#informe").DataTable();
</script>


<!-- Page specific script  -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
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