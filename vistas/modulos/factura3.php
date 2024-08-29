<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaPos-gith/modelos/ventas.modelo.php';
$MODEL = new ModeloVentas;
$idRem = $_GET['idRem'];
$dtVen = $MODEL->datosVen($idRem);
print_r($dtVen);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>factura 3</title>
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
          src="../../vistas/img/plantilla/loginEverest3.png"
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
    <div
      style="
          font-size: 12px;
          width: 750px;
          margin: 0 auto;
          display: grid;
          grid-template-columns: 50px 250px 100px 100px 100px 150px;
          padding-block: 5px;
        ">
      <div style="text-align: center">1</div>
      <div>ANTIFLUIDO F.E.</div>
      <div>AZUL CELESTE</div>
      <div style="text-align: center">300</div>
      <div style="text-align: center">$2.500</div>
      <div style="text-align: center">$750.000</div>
    </div>
    <!-- Termina Fila  -->

    <!-- Fila Nueva -->
    <div
      style="
          font-size: 12px;
          width: 750px;
          margin: 0 auto;
          display: grid;
          grid-template-columns: 50px 250px 100px 100px 100px 150px;
          padding-block: 5px;
        ">
      <div style="text-align: center">2</div>
      <div>BENGALINA PANTALONERA</div>
      <div>TORNASOL</div>
      <div style="text-align: center">100</div>
      <div style="text-align: center">$9.000</div>
      <div style="text-align: center">$900.00</div>
    </div>
    <!-- Termina Fila  -->

    <!-- Fila Nueva -->
    <div
      style="
          font-size: 12px;
          width: 750px;
          margin: 0 auto;
          display: grid;
          grid-template-columns: 50px 250px 100px 100px 100px 150px;
          padding-block: 5px;
        ">
      <div style="text-align: center">3</div>
      <div>CHALIS LICRADO ESTAMPADO</div>
      <div>PLATEADO</div>
      <div style="text-align: center">352</div>
      <div style="text-align: center">$12.000</div>
      <div style="text-align: center">$4.224.000</div>
    </div>
    <!-- Termina Fila  -->

    <!-- Fila Nueva -->

    <div
      style="
          font-size: 12px;
          width: 750px;
          margin: 0 auto;
          display: grid;
          grid-template-columns: 50px 250px 100px 100px 100px 150px;
          padding-block: 5px;
        ">
      <div style="text-align: center">4</div>
      <div>CHANTILLY CON LENTEJUELAS</div>
      <div># 1 TRADICIONAL</div>
      <div style="text-align: center">50</div>
      <div style="text-align: center">$8.500</div>
      <div style="text-align: center">$425.000</div>
    </div>
    <!-- Termina Fila  -->
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
    <div>16</div>
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