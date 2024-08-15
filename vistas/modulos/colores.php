<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agregar Colores</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Agregar colores</li>
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
                    Agregar Color
                </button>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-hover table-responsive tablas" width="100%">

                    <thead>
                        <tr>
                            <th style="width: 10px;">#</th>
                            <th>Código</th>
                            <th>Color</th>
                            <th>Creado por</th>
                            <th>fecha registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        $item = null;
                        $valor = null;

                        $colores = ControladorColores::ctrMostrarColores($item, $valor);

                        // var_dump($colores);
                        
                        foreach ($colores as $key => $value) {

                            echo ' <tr>

                                        <td>' . ($key + 1) . '</td>
                                        <td>' . $value["idColor"] . '</td>
                                        <td class="text-uppercase">' . $value["color"] . '</td>
                                        <td>' . $value["usuario"] . '</td>
                                        <td>' . $value["fechaRegistro"] . '</td>

                                        <td>

                                        <div class="btn-group">
                                            
                                            <button class="btn btn-warning btnEditarColor" idColor="' . $value["idColor"] . '" data-toggle="modal" data-target="#modalEditarColor">  <i class="fa fa-pencil-alt" aria-hidden="true"></i> </button>

                                            <button class="btn btn-danger btnEliminarColor" idColor="' . $value["idColor"] . '"><i class="fa fa-times"></i></button>

                                        </div>  

                                        </td>

                                    </tr>';
                        }

                        ?>

                        <!-- </tbody> -->

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
#    MODAL AGREGAR COLOR     #
#                              #
################################-->


<!-- The Modal -->
<div class="modal" id="modalAgregarColor" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form role="form" method="post">

                <!-- Modal Header -->
                <div class="modal-header" style="background-color: #007bff; color:#ffffff">
                    <h4 class="modal-title">Agregar Color</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="card-body">

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text basic-addon1"> <i class="fas fa-palette"></i> </span>
                                </div>
                                <input type="text" class="form-control input-lg" name="nuevoColor"
                                    placeholder="Ingresar color" aria-label="Color"
                                    aria-describedby="basic-addon1 required>" required>
                            </div>
                        </div>

                        <!-- ############# / entrada ########### -->

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Color</button>
                </div>

                <?php

                $crearColor = new ControladorColores();
                $crearColor->ctrCrearColor();

                ?>

            </form>

        </div>
    </div>
</div>



<!--=====================================
MODAL EDITAR COLOR
======================================-->

<div id="modalEditarColor" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background-color: #007bff; color:#ffffff">

                    <h4 class="modal-title">Editar Color</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->


                        <!-- Entrada Tipo de Tela -->
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text basic-addon1"> <i class="fas fa-palette"></i> </span>
                                </div>

                                <input type="text" class="form-control input-lg" name="editarColor" id="editarColor"
                                    required>
                                <input type="hidden" name="idColor" id="idColor" required>

                            </div>
                        </div>

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>

                </div>

                <?php

                $editarColor = new ControladorColores();
                $editarColor->ctrEditarColor();

                ?>

            </form>

        </div>

    </div>

</div>

<?php

$borrarColor = new ControladorColores();
$borrarColor->ctrBorrarColor();

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