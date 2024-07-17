<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Crear Color de Tela</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Crear Color de Tela</li>
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarColor">
          Agregar Color de Tela
      </div>

      <div class="card-body">
        <table class="table table-bordered table-hover dt-responsive tablas" width="100%">

          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Código</th>
              <th>Color de Tela</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>

          <?php
            $item = null;
            $valor = null;

            $colores = ControladorColores::ctrMostrarColores($item, $valor);

            var_dump($colores);

          ?>
          
          <tr>
              <td>1</td>
              <td>101</td>
              <td>ROJO</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"> <i class="fa fa-pencil-alt" aria-hidden="true"></i> </button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i> </button>
                </div>
              </td>
            </tr>

            <td>1</td>
              <td>102</td>
              <td>AZUL</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"> <i class="fa fa-pencil-alt" aria-hidden="true"></i> </button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i> </button>
                </div>
              </td>
            </tr>

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



<!-- ###########################
#                              #
#    MODAL AGREGAR CATEGORIA   #
#                              #
################################-->

<!-- The Modal -->
<div id="modalAgregarColor" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">


      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #007bff; color:#ffffff">
          <h4 class="modal-title">Agregar Color de Tela</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="card-body">


            <!-- Entrada Tipo de Tela -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"> <i class="fas fa-layer-group"></i> </span>
                </div>

                <input type="text" class="form-control input-lg" name="nuevoColor" placeholder="Ingresar Color de Tela" aria-label="color" aria-describedby="basic-addon1" required>

              </div>
            </div>


            <!-- ############# / entrada ########### -->

          </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Color de Tela</button>

       

          
        </div>

        <?php
        
        // $crearColor = new ControladorColores();
        // $crearColor->ctrCrearColor();

        ?>

      </form>


    </div>
  </div>
</div>



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