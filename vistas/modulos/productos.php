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
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
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
              <th style="width:50px text-align:center;">Stock</th>
              <th>Fecha Compra</th>
              <th>Acciones</th>
            </tr>
          </thead>

          

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
        <div class="modal-body">

          <div class="card-body">

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-text basic-addon1"> <i class="fas fa-layer-group"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevoTipoTela" placeholder="Ingresar tipo de tela" required>
              </div>
            </div>

            <!-- ############# / entrada ########### -->

            <div class="form-group">
              <div class="input-group">
              <span class="input-group-text basic-addon1"> <i class="fas fa-palette"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevoColorTela" placeholder="Ingresar Color Tela" required>
              </div>
            </div>

            <!-- ############# / entrada ########### -->

             <!-- Entrada Metros  -->
             <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"><i class="fas fa-ruler"></i></span>
                </div>
                <input type="number" class="form-control input-lg" name="nuevoMetros" min ="0" placeholder="Ingresar Metros" aria-label="metros" aria-describedby="basic-addon1" required>
              </div>
            </div>

            <!-- Entrada cantidad rollos -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"><i class="fas fa-bullseye"></i></span>
                </div>
                <input type="number" class="form-control input-lg" name="nuevoRollos" min ="0" placeholder="Ingresar Cantidad Rollos" aria-label="rollos" aria-describedby="basic-addon1" required>
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