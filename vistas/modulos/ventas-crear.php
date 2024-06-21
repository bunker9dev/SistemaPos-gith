<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Agregar Ventas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Agregar Ventas</li>
          </ol>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <!-- EL FORMULARIO -->

      <div class="col-lg-5 col-xs-12">

        <div class="card card-success">

          <div class="card-header with-border"></div>

          <form role="form" method="post">

            <div class="card-body">

              <div class="card">

                <!-- ENTRADA VEDEDOR   -->

                <div class="form-group">

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Vendedor" aria-label="Username" aria-describedby="basic-addon1" id="nuevoVendedor" name="nuevoVendedor" value="vendedor">
                  </div>

                </div>


                <!-- ENTRADA CLIENTE   -->

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-user"></i></label>
                  </div>
                  <select class="custom-select" id="inputGroupSelect01" name="seleccionarCliente">
                    <option selected>Cliente...</option>
                    <option value="1">uno</option>
                    <option value="2">dos</option>
                    <option value="3">Tres</option>
                  </select>


                  <span class="input-group-prepend"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button></span>

                </div>

              </div>

              <!-- TABLA DE PRODUCTOS -->



              <!-- DESCIPCION DEL PRODUCTO -->

              <div class="card" style="background-color: #5870DA;">

                <div class="form-group" style="padding: 10px;">

                  <div class="input-group  mb-3">

                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-user"></i></label>
                    </div>
                    <select class="custom-select" id="DescProducto" name="DescProduct">
                      <option selected>Producto...</option>
                      <option value="1">uno</option>
                      <option value="2">dos</option>
                      <option value="3">Tres</option>
                    </select>

                    <input type="text" class="form-control" placeholder="codigo" aria-label="codigo" aria-describedby="basic-addon1" id="nuevoCodigo" name="nuevoCodigo" value="Codigo">

                    <input type="text" class="form-control" placeholder="Id" aria-label="Id" aria-describedby="basic-addon1" id="nuevoId" name="nuevoId" value="Id">


                  </div>

                  <div class="input-group  mb-3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="Cantidad_Rollos">Rollos</span>
                      </div>
                      <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="metros_Rollos">Metros</span>
                      </div>
                      <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="Color_Rollos">Color</span>
                      </div>
                      <select class="custom-select" id="DescProducto" name="DescProduct">
                      <option selected>color...</option>
                      <option value="1">Rojo</option>
                      <option value="2">Azul</option>
                      <option value="3">Amarillo</option>
                    </select>
                    </div>




                  </div>

                </div>
              </div>
          </form>
        </div>

      </div>


      <!-- TABLA DE PRODUCTOS -->

      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
        <div class="card card-warning">
          <div class="card-header with-border"></div>

        </div>


      </div>
    </div>


  </section>
  <!-- /.content -->

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
            <h4 class="modal-title">agregar cliente</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">

            <div class="card-body">

              <div class="form-group">
                <div class="input-group">
                  <!-- <span class="input-group-addon"><i class="fa fa-user"></i></span> -->
                  <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
                </div>
              </div>

              <!-- ############# / entrada ########### -->

              <div class="form-group">
                <div class="input-group">
                  <!-- <span class="input-group-addon"><i class="fa fa-user"></i></span> -->
                  <input type="text" class="form-control input-lg" name="nuevoApellido" placeholder="Ingresar apellido" required>
                </div>
              </div>

              <!-- ############# / entrada ########### -->

              <div class="form-group">
                <div class="input-group">
                  <!-- <span class="input-group-addon"><i class="fa-map-marker"></i></span> -->
                  <input type="text" class="form-control input-lg" name="nuevaCiudad" placeholder="Ingresar ciudad" required>
                </div>
              </div>

              <!-- ############# / entrada ########### -->

            </div>



          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar cliente</button>
          </div>

        </form>


      </div>
    </div>
  </div>