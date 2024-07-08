<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrar Productos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Administrar Productos</li>
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
          Agregar Producto
        </button>
      </div>

      <div class="card-body">

        <table class="table table-bordered table-hover dt-responsive tablas" width="100%">

          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Código</th>
              <th>Categoria</th>
              <th>Descripción</th>
              <th>Color</th>
              <th>metros</th>
              <th>Stock</th>
              <th>Fecha compra</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>22354548040</td>
              <td>Satin</td>
              <td>Satin rigido</td>
              <td>Palo de rosa</td>
              <td>51</td>
              <td>25</td>
              <td>2024-05-30 09:05:23</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"> <i class="fa fa-pencil-alt" aria-hidden="true"></i> </button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i> </button>
                </div>
              </td>
            </tr>


            <!-- ######## /tr ######### -->

            <tr>
              <td>1</td>
              <td>22354548041</td>
              <td>Satin</td>
              <td>Satin rigido</td>
              <td>Palo de rosa</td>
              <td>50</td>
              <td>12</td>
              <td>2024-05-30 09:05:23</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"> <i class="fa fa-pencil-alt" aria-hidden="true"></i> </button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i> </button>
                </div>
              </td>
            </tr>


            <!-- ######## /tr ######### -->

            <tr>
              <td>1</td>
              <td>22354548042</td>
              <td>Satin</td>
              <td>Satin rigido</td>
              <td>Palo de rosa</td>
              <td>50</td>
              <td>25</td>
              <td>2024-05-30 09:05:23</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"> <i class="fa fa-pencil-alt" aria-hidden="true"></i> </button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i> </button>
                </div>
              </td>
            </tr>


            <!-- ######## /tr ######### -->

            <tr>
              <td>1</td>
              <td>22354548043</td>
              <td>Satin</td>
              <td>Satin rigido</td>
              <td>Verde Menta</td>
              <td>50</td>
              <td>10</td>
              <td>2024-05-30 09:05:23</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"> <i class="fa fa-pencil-alt" aria-hidden="true"></i> </button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i> </button>
                </div>
              </td>
            </tr>


            <!-- ######## /tr ######### -->

            <tr>
              <td>1</td>
              <td>22354548044</td>
              <td>Satin</td>
              <td>Satin rigido</td>
              <td>Rojo</td>
              <td>52</td>
              <td>1</td>
              <td>2024-05-30 09:05:23</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"> <i class="fa fa-pencil-alt" aria-hidden="true"></i> </button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i> </button>
                </div>
              </td>
            </tr>


            <!-- ######## /tr ######### -->




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
#    MODAL AGREGAR PRODUCTO    #
#                              #
################################-->


<!-- The Modal -->
<div class="modal fade" id="modalAgregarProducto">
  <div class="modal-dialog">
    <div class="modal-content">


      <form role="form" method="post">
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #007bff; color:#ffffff">
          <h4 class="modal-title">Agregar Producto</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="card-body">

            <!-- Entrada para seleccionar el categoria -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"> <i class="fa fa-random" aria-hidden="true"></i></span>
                  <!-- <span class="input-group-text basic-addon1"><i class="fa fa-users" aria-hidden="true"></i></span> -->
                </div>
                <select class="form-control input-lg" name="nuevaCategoria" id="">

                  <option value="">Seleccionar categoria</option>

                  <option value="Satin">Satin</option>

                  <option value="Lino">Lino</option>

                  <option value="Dacron">Dacron</option>
                </select>
              </div>
            </div>



            <!-- Entrada para seleccionar descripcion-->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"><i class="fa fa-adjust" aria-hidden="true"></i></span>
                </div>
                <select class="form-control input-lg" name="nuevaDescripcion" id="">

                  <option value="">Seleccionar Descripción</option>

                  <option value="Blanco">Blanco</option>

                  <option value="Estampado">Estampado</option>

                  <option value="Estampado Infantil">Estampado Infantil</option>
                </select>
              </div>
            </div>


            <!-- Entrada para seleccionar Color-->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text basic-addon1"><i class="fas fa-palette"></i></span>
                </div>
                <select class="form-control input-lg" name="nuevaDescripcion" id="">

                  <option value="">Seleccionar Color</option>

                  <option value="Arena">Arena</option>

                  <option value="Azul_Celeste">Azul Celeste</option>

                  <option value="Azul_Oscuro">Azul Oscuro</option>
                </select>
              </div>
            </div>

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
          <button type="submit" class="btn btn-primary">Guardar productos</button>

        </div>
      </form>

    </div>





  </div>
</div>

</div>