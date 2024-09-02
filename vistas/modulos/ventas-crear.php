<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Crear Ventas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Crear Ventas</li>
          </ol>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="row "> <!-- gx-5 -->

      <!-- =============================================
      EL FORMULARIO
      ============================================= -->
      <div class="col col-lg-6 col-sm-12">
        <div class="card card-success">
          <div class="card-header with-border"></div>
          <div class="card-body">
            <div class="formularioVenta">
              <div class="card">

                <div class="form-group row ">
                  <!--=====================================
                  ENTRADA VENDEDOR
                  ======================================-->

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"> Vendedor <span style="color: red;">*</span></span>
                    </div>
                    <select class="form-control" id="idVendedor" aria-label="Default select example">
                      <option selected>Pensando</option>
                    </select>

                  </div>
                </div>

                <input type="hidden" id="userEla" name="userEla" value="<?php echo $_SESSION["id"]; ?>">
                <!--=====================================
                ENTRADA CLIENTES
                ======================================-->
                <div class="form-group"> <!-- Entrada clientes -->

                  <label for="" class="form-label">Seleccionar cliente: <span style="color: red;">*</span></label> <br>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text"><i class="fa fa-user"></i></label>
                    </div>
                    <select class="form-control text-uppercase" id="idCliente" required>

                      <option value=""></option>

                      <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                      foreach ($categorias as $key => $value) {

                        echo '<option value="' . $value["idCliente"] . '">' . $value["nombre"] . " " . $value["apellido"] . '</option>';
                      }
                      ?>
                    </select>
                    <span class="input-group-prepend"><button type="button" class="btn btn-default btn-sm"
                        data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar
                        cliente</button>
                    </span>

                  </div>
                </div> <!--  termina Entrada clientes -->


                <!--=====================================
                ENTRADA PRODUCTOS TABLA 1
                ======================================-->

                <div class="form-group row nuevoProducto">
<<<<<<< HEAD
                  <!-- <div class="col    ">

                    <div class="card-body" style='padding:0px'>
                      <div class="card">

                        <table class="table table-bordered table-striped table-responsive tablaVentasConsol">

                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Tipo tela</th>
                              <th>Color</th>
                              <th>mtrs x rollo</th>
                              <th>Cant mts</th>
                              <th>Cant rollos</th>
                              <th>Valor mts</th>
                              <th>X</th>
                            </tr>
                          </thead>

                        </table>

                      </div>
                    </div>
                  </div> -->

=======
>>>>>>> DevDiego
                  <div class="container">
                    <div class="row justify-content-start">
                      <div class="col-4">
                        Descricpcion
                      </div>
                      <div class="col-2">
                        Rollos
                      </div>
                      <div class="col-2">
                        cant mts
                      </div>
                      <div class="col-2">
                        Valor mts
                      </div>
                      <div class="col-2">
                        Valor
                      </div>
                    </div>
                  </div>




                </div>
                <input type="hidden" id="listaProductos" name="listaProductos">

                <!-- =============================================
                BOTON AGREGAR PRODUCTOS 
                ============================================= -->

                <div class="Mobille d-grid gap-2 col-10 mx-auto d-lg-none d-xxl-none ">
                  <label for="exampleInputEmail1" class="form-label">Seleciona el producto:</label>
                  <div class="input-group mb-3">
                    <select class="form-control text-uppercase" id="productoSelect" aria-label="Small select example">
                      <option selected> </option>
                    </select>
                    <button class="btn btn-primary btn-sm" onclick="agregarProducto(0,0)">Guardar</button>
                  </div>
                </div>
                <hr>
                <!-- =============================================
                AGREGAR TOTAL VENTA
                ============================================= -->

                <div class="form-group row">

                  <div class="col-sm-6" style="padding: rigth 0px">

                    <div class="input-group-prepend">


                    </div>

                  </div>

                  <div class="col-sm-3">

                    <span class="align-middle pull-rigth">Total</span>

                  </div>

                  <div class="col-sm-3 align-self-end" style="padding: left 0px">

                    <div class="input-group-prepend">

                      <label class="input-group-text" for="inputGroupSelect01"> <i
                          class="fas fa-dollar-sign"></i></label>

                      <input type="tel" class="form-control" id="PrecioVenta"
                        placeholder="000000" readonly>

                    </div>
                  </div>
                </div>


                <!-- =============================================
                AGREGAR MEDIO DE PAGO
                ============================================= -->

                <!-- <br> -->

                <div class="form-group row">

                  <div class="col-sm-6" style="padding right:0px">
                    <label for="" class="form-label">Seleccione método de pago<span style="color: red;">*</span>:</label> <br>
                    <div class="input-group">
                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                        <option value=""></option>
                        <option value="1">Efectivo</option>
                        <option value="2">Crédito</option>
                      </select>

                    </div>

                  </div>

                  <div class="col-sm-6" style="padding left:0px">
                    <label for="" class="form-label">Seleccione Tiempo Credito:</label> <br>
                    <div class="input-group">
                      <select class="form-control" id="nuevoTiempoCredito" name="nuevoTiempoCredito" required>
                        <option value=""></option>
                        <option value="30">30 días</option>
                        <option value="60">60 días</option>
                        <option value="90">90 días</option>
                      </select>

                    </div>

                  </div>
                </div>

                <!-- =============================================
                AGREGAR BOTON GUARDAR
                ============================================= -->

                <hr>
                <center>
                  <button type="submit" class="btn btn-primary" onclick="SaveVenta()"><i class="fa-solid fa-floppy-disk"></i> Guardar venta</button>
                </center>
                <br>

              </div>
            </div>
          </div>


        </div>

      </div>

      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->
      <!-- <div class="col col-lg-6  d-none d-lg-block ">  // pendiente para camb iar el diseño en moviles -->

      <div class="col col-lg-6  d-none d-lg-block ">
        <div class="card card-warning">
          <div class="card-header with-border"></div>
          <div class="card-body">
            <div class="card">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-responsive tablaVentas">

                  <thead>

                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 120px">Código</th>
                      <th>Tipo tela</th>
                      <th>Color</th>
                      <th>mtrs x rollo</th>
                      <th>stock</th>
                      <th>Acciones</th>
                    </tr>

                  </thead>



                </table>
              </div>

            </div>
          </div>
        </div>

      </div>


    </div>

  </section>
</div>







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
                <input type="text" class="form-control input-lg" name="nuevoNombreCliente" placeholder="Ingresar nombre"
                  required>
              </div>
            </div>

            <!-- ############# / entrada ########### -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-text basic-addon1"> <i class="far fa-user"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevoApellidoCliente"
                  placeholder="Ingresar apellido" required>
              </div>
            </div>

            <!-- ############# / entrada ########### -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-text basic-addon1"> <i class="fas fa-city"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevaCiudadCliente" placeholder="Ingresar ciudad"
                  required>
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
      $crearcliente->ctrCrearCliente2();

      ?>


    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    GetVendedor();
  });
</script>