<div class="table-responsive">
    <table class="table table-hover table-bordered tablas" id="Tb1">
        <thead>
            <tr>
                <th scope="col">Fecha Venta</th>
                <th scope="col">Remisión</th>
                <th scope="col">Nom Cliente</th>
                <th scope="col">Apell Cliente</th>
                <th scope="col">Vendedor</th>
                <th scope="col">Forma de pago</th>
                <th scope="col">Valor Total</th>
                <th scope="col">Valor Pend</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $dt) { ?>
                <tr>
                    <th scope="row"><?= $dt['fechaVenta'] ?></th>
                    <th scope="row"><?= $dt['idventas'] ?></th>
                    <td><?= $dt['NomCli'] ?></td>
                    <td><?= $dt['ApeCli'] ?></td>
                    <td><?= $dt['Ven'] ?></td>
                    <td><?= $dt['MetPago'] . '-' . $dt['cantidadDias'] . ' Dias' ?></td>
                    <td><?= number_format($dt['valorVenta'], 00) ?></td>
                    <td><?= number_format($dt['ValorPendiente'], 00) ?></td>
                    <td>
                        <div class="btn-group">
                            <a target="_blank" href="vistas/modulos/factura3.php?idRem=<?= $dt['idventas'] ?>" class="btn btn-info"> <i class="fa fa-print" aria-hidden="true"></i> </a>
                            <button class="btn btn-success" onclick="detailRem(<?= $dt['idventas'] ?>)"><i class="fa-solid fa-bars"></i> </button>
                        </div>
                    </td>
                </tr>
            <?php   } ?>
        </tbody>
    </table>
</div>