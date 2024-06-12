<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Crear categoria</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Crear categoria</li>
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
          Agregar categoria
      </div>

      <div class="card-body">
        <table id="" class="table table-hover table-bordered ">

          <thead>
            <tr>
              <th>#</th>
              <th>Categoria</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>Importado</td>
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
              <td>Nacional</td>
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
              <td>Naturales</td>
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
              <td>Sinteticos</td>
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
#    MODAL AGREGAR CATEGORIA   #
#                              #
################################-->


<!-- The Modal -->
<div class="modal" id="modalAgregarCategoria">
  <div class="modal-dialog">
    <div class="modal-content">

      <form role="form" method="post">

        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #3c8dbc; color: white;">
          <h4 class="modal-title">Agregar categoría</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <div class="card-body">

            <div class="form-group">
              <div class="input-group">
                <!-- <span class="input-group-addon"><i class="fa fa-user"></i></span> -->
                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar Categoría" required>
              </div>
            </div>

            <!-- ############# / entrada ########### -->

    



          </div>



        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar categoria</button>
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