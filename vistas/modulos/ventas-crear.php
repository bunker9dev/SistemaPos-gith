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
            <form role="form" method="post" class="formularioVenta">
              <div class="card">

                <div class="form-group row ">

                  <!--=====================================
                ENTRADAREMISION
                ======================================-->
                  <div class="col-6">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text basic-addon1"> Remisión </span>
                      </div>
                      <?php
                      $item = null;
                      $valor = null;

                      $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                      if (!$ventas) {

                        echo '<input type="text" class="form-control input-lg" name="nuevaVenta" id="nuevaVenta"
                        value="100001" readonly>';


                      } else {

                        foreach ($ventas as $key => $value) {



                        }

                        $codigo = $value["codigo"] + 1;



                        echo '<input type="text" class="form-control input-lg" name="nuevaVenta" id="nuevaVenta"
                        value="' . $codigo . '" readonly>';


                      }

                      ?>

                    </div>
                  </div>

                  <!--=====================================
                  ENTRADA VENDEDOR
                  ======================================-->
                  <div class="col-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"> Vendedor</span>
                      </div>
                      <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="<?php echo $_SESSION["usuario"]; ?>" readonly>
                        <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">
                    </div>
                  </div>
                </div>


                <!--=====================================
                ENTRADA CLIENTES
                ======================================-->
                <div class="form-group"> <!-- Entrada clientes -->

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="seleccionarCliente"><i class="fa fa-user"></i></label>
                    </div>
                    <select class="form-control text-uppercase" id="seleccionarCliente" name="seleccionarCliente" required>

                    <option value="">Seleccionar cliente</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                      foreach ($categorias as $key => $value) {

                        echo '<option value="'.$value["id"].'">'.$value["nombre"]." ".$value["apellido"].'</option>';

                      }

                    ?>

                    </select>



<!--                     
                      <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-user"></i></label>
                    </div>

                    <select class="custom-select" id="inputGroupSelect01" name="seleccionarCliente">
                      <option selected>Cliente...</option>
                      <option value="1">uno</option>
                      <option value="2">dos</option>
                      <option value="3">Tres</option>
                    </select> -->

                    <span class="input-group-prepend"><button type="button" class="btn btn-default btn-sm"
                        data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar
                        cliente</button>
                    </span>

                  </div>
                </div> <!--  termina Entrada clientes -->


                <!--=====================================
                ENTRADA PRODUCTOS
                ======================================-->
                
                <div class="form-group row nuevoProducto">

                  
                </div>
                <input type="hidden" id="listaProductos" name="listaProductos">

                <!-- =============================================
                BOTON AGREGAR PRODUCTOS 
                ============================================= -->

                <button class="d-grid gap-2 col-4 mx-auto d-lg-none d-xxl-none btn btn-info" type="button">Agregar
                  Producto</button>
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

                      <input type="number" min="1" class="form-control" id="nevoTotalProductos"
                        name="nevoTotalProductos" placeholder="000000" readonly>

                    </div>
                  </div>
                </div>


                <!-- =============================================
                AGREGAR MEDIO DE PAGO
                ============================================= -->

                <!-- <br> -->

                <div class="form-group row">

                  <div class="col-sm-6" style="padding right:0px">

                    <div class="input-group">

                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                        <option value="">Seleccione método de pago</option>
                        <option value="Contado">Efectivo</option>
                        <option value="Credito">Crédito</option>
                      </select>

                    </div>

                  </div>

                  <div class="col-sm-6" style="padding left:0px">

                    <div class="input-group">

                      <select class="form-control" id="nuevoTiempoCredito" name="nuevoTiempoCredito" required>
                        <option value="">Seleccione Tiempo Credito</option>
                        <option value="treinta">30 días</option>
                        <option value="sesenta">60 días</option>
                        <option value="noventa">90 días</option>
                      </select>

                    </div>

                  </div>
                </div>

                <!-- =============================================
                AGREGAR BOTON GUARDAR
                ============================================= -->

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <button type="submit" class="btn btn-primary">Guardar venta</button>
                </div>
                <br>

              </div>

            </form>


          </div>


        </div>

      </div>

      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->
      <div class="col col-lg-6  d-none d-lg-block ">
        <div class="card card-warning">
          <div class="card-header with-border"></div>
          <div class="card-body">
            <div class="card">
              <table class="table table-bordered table-striped dt-responsive tablaVentas">

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

