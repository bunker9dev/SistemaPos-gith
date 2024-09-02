<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaPos-gith/modelos/ventas.modelo.php';
$MODEL = new ModeloVentas;
$idRem = $_GET['idRem'];
$dtVen = $MODEL->datosVen($idRem);
$VenDet = $MODEL->Detventa($idRem);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Remisión # <?= $idRem ?></title>
  <style>
    table,
    th,
    td {
      /* border: 1px solid black; */
      font-size: 12px;
    }
  </style>
</head>

<body>
  <div
    style="
        width: 750px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 200px 550px;
        border: 1px solid black;
      ">
    <div>
      <picture>
        <img
          style="width: 200px"
          src="/SistemaPos-gith/vistas/img/plantilla/loginMontana.jpg"
          alt=" loginEverest3"
          loading="lazy" />
      </picture>
    </div>

    <div>
      <br />
      <div
        style="
            font-size: 14px;
            width: 550px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 5px 60px 250px auto 150px;
          ">
        <div></div>
        <div>Cliente:</div>
        <div><?= $dtVen['nombre'] . ' ' . $dtVen['apellido'] ?></div>
        <div></div>
        <div style="text-align: center">Remisión</div>
      </div>

      <div
        style="
            font-size: 12px;
            width: 550px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: auto 150px;
          ">
        <div></div>
        <div style="text-align: center; font-size: 16px"><?= $dtVen['idVentas'] ?></div>
      </div>
      <br />

      <!-- Fila Nueva -->
      <div
        style="
            font-size: 14px;
            width: 550px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 5px 50px 150px;
          ">
        <div></div>

        <div>Fecha</div>
        <div style="text-align: center"> <?= (new DateTime($dtVen['fechaVenta']))->format('d-m-y') ?> </div>
      </div>
      <!-- Termina Fila  -->
    </div>
  </div>
  <!-- Termina Fila  -->

  <br />
  <!-- Fila Nueva -->
  <div
    style="
        font-size: 16px;
        width: 750px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: auto 300px auto;
      ">
    <div></div>
    <div style="text-align: center; font-weight: bold">DETALLES</div>
    <div></div>
  </div>
  <!-- Termina Fila  -->

  <br />

  <!-- Fila Nueva -->
  <div
    style="
        font-size: 12px;
        width: 750px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 50px 250px 100px 100px 100px 150px;
        padding-block: 5px;
        text-align: center;
        font-weight: bold;
        border-block: 1px solid black;
      ">
    <div>No</div>
    <div>TIPO TELA</div>
    <div>COLOR</div>
    <div>METROS</div>
    <div>V.UNIT</div>
    <div>V.TOTAL</div>
  </div>
  <!-- Termina Fila  -->

  <div
    style="
        font-size: 12px;
        width: 750px;
        margin: 0 auto;
        border-block: 1px solid black;
      ">
    <!-- Fila Nueva -->
    <?php $con = 1;
    $cantRollos = 0;
    foreach ($VenDet as $vd) {
      $cantRollos = $cantRollos + $vd['CantidadRollo'];
    ?>
      <div
        style="
          font-size: 12px;
          width: 750px;
          margin: 0 auto;
          display: grid;
          grid-template-columns: 50px 250px 100px 100px 100px 150px;
          padding-block: 5px;
        ">
        <div style="text-align: center"><?= $con ?></div>
        <div>
          <center>
            <?= $vd['categoria'] ?>
          </center>
        </div>
        <div>
          <center>
            <?= $vd['color'] ?>
          </center>
        </div>
        <div style="text-align: center"><?= number_format($vd['CantMetro'], 00) ?></div>
        <div style="text-align: center">$ <?= number_format($vd['PrecioMetro'], 00) ?></div>
        <div style="text-align: center">$<?= number_format($vd['Total'], 00) ?></div>
      </div>
    <?php $con++;
    } ?>
  </div>

  <br />

  <!-- Fila Nueva -->

  <div
    style="
        font-size: 12px;
        width: 750px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 100px 100px auto 100px 150px;
      ">
    <div>Total Rollos</div>
    <div><?= number_format($cantRollos, 00) ?></div>
    <div></div>
    <div style="text-align: center; font-weight: bold">SubTotal</div>
    <div style="text-align: center; font-weight: bold">$<?= number_format($dtVen['valorVenta'], 00) ?></div>
  </div>
  <!-- Termina Fila  -->

  <br />
  <!-- Fila Nueva -->

  <div
    style="
        font-size: 12px;
        width: 750px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 100px 70px 50px 50px auto 100px 150px;
      ">
    <div>Tipo de venta</div>
    <div><?= $dtVen['metodoPago'] ?></div>

    <div style="text-align: center; font-weight: bold">Días</div>
    <div style="text-align: center; font-weight: bold"><?= $dtVen['cantidadDias'] ?></div>
    <div></div>
    <div style="text-align: center; font-weight: bold">TOTAL</div>
    <div
      style="
          text-align: center;
          font-weight: bold;
          border-block: 1px solid black;
        ">
      $<?= number_format($dtVen['valorVenta'], 00) ?>
    </div>
  </div>
  <!-- Termina Fila  -->

  <br />
  <!-- Fila Nueva -->

  <div
    style="
        font-size: 12px;
        width: 750px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 100px 70px;
      ">
    <div>Vendedor:</div>
    <div><?= $dtVen['usuario'] ?></div>
  </div>
  <!-- Termina Fila  -->
  <!-- Fila Nueva -->

  <div
    style="
        font-size: 12px;
        width: 750px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 100px 70px;
      ">
    <div>Elaborado por:</div>
    <div>Admin</div>
  </div>
  <!-- Termina Fila  -->

  <br />

  <!-- Fila Nueva -->
  <div
    style="
        font-size: 12px;
        width: 750px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: auto 300px auto;
      ">
    <div></div>
    <div
      style="
          text-align: center;
          font-weight: bold;
          border-top: 2px solid black;
        ">
      RECIBE CONFORME
    </div>
    <div></div>
  </div>
  <!-- Termina Fila  -->
</body>

</html>