<div class="table-responsive">
    <table class="table table-hover table-bordered tablas" id="Tb1">
        <thead>
            <tr>
                <th scope="col">Fecha Venta</th>
                <th scope="col">Fecha Max Pago</th>
                <th scope="col">Dias Faltantes</th>
                <th scope="col">Remisión</th>
                <th scope="col">Nom Cliente</th>
                <th scope="col">Apell Cliente</th>
                <th scope="col">Vendedor</th>
                <th scope="col">Plazo Pago</th>
                <th scope="col">Valor Total</th>
                <th scope="col">Valor Pend</th>
                <th scope="col"># Productos</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $dt) {
                $hoy = date('Y-m-d');
                $ind = '';
                $fechaHoy = strtotime($hoy);
                $fechaNueva = strtotime($dt['nuevaFecha']);


                $diasRestantes = ($fechaNueva - $fechaHoy) / (60 * 60 * 24);

                if ($diasRestantes <= 8) {
                    $ind = 'danger';
                }

            ?>
                <tr>
                    <th scope="row"><?= $dt['fechaVenta'] ?></th>
                    <th scope="row" class="table-<?= $ind ?>"><?= date('Y-m-d', strtotime($dt['nuevaFecha'])) ?></th>
                    <th scope="row" class="text-center"><?= number_format($diasRestantes, 0) ?></th>
                    <th scope="row">#<?= $dt['idventas'] ?></th>
                    <td><?= $dt['NomCli'] ?></td>
                    <td><?= $dt['ApeCli'] ?></td>
                    <td><?= $dt['Ven'] ?></td>
                    <td><?= $dt['cantidadDias'] ?></td>
                    <td><?= number_format($dt['valorVenta'], 00) ?></td>
                    <td><?= number_format($dt['ValorPendiente'], 00) ?></td>
                    <td><?= $dt['c'] ?></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-info" onclick="AbonoRem(<?= $dt['idventas'] ?>)"><i class="fa-solid fa-cash-register"></i></button>
                            <button class="btn btn-success" onclick="detailRem(<?= $dt['idventas'] ?>)"><i class="fa-solid fa-bars"></i> </button>
                        </div>
                    </td>
                </tr>
            <?php   } ?>
        </tbody>
    </table>
</div>