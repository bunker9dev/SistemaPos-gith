<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/modelos/caja.modelo.php';
$MODEL = new ModeloCaja;
$idAbo = $_GET['idAbo'];
$dtAbo = $MODEL->FacturaAbono($idAbo);
$newValor = $dtAbo['valorActual'] - $dtAbo['ValorAbon'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de caja <?= $dtAbo['IdVentasAb'] ?></title>
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
    <div class="content" id="content">
        <div
            style="  width: 750px; margin: 0 auto; display: grid; grid-template-columns: 200px 550px;  ">
            <div>
                <picture>
                    <?php if ($dtAbo['foto'] == '') { ?>
                        <img style="width: 150px; height: 100px;" src="../../vistas/img/plantilla/loginEverestColor.png"
                            alt=" loginEverest3" loading="lazy">
                    <?php  } else { ?>
                        <img style="width: 150px; height: 100px;" src="/<?= $dtAbo['foto'] ?>"
                            alt=" loginEverest3" loading="lazy">
                    <?php   } ?>
                </picture>

            </div>
            <!-- style="border: 1px solid black ;" -->

            <!-- Fila Nueva -->
            <div>
                <br>
                <div
                    style="font-size: 14px; width: 550px; margin: 0 auto; display: grid; grid-template-columns: auto 200px 100px;   ;">

                    <div></div>
                    <div style="font-size: 20px; text-align: right;">Recibo de Caja No: </div>
                    <div style="font-size: 20px; font-weight:bold;  text-align: center;"><?= $dtAbo['IdVentasAb'] ?></div>
                </div><!-- Termina Fila  -->

                <br>
                <!-- Fila Nueva -->
                <div
                    style="font-size: 14px; width: 550px; margin: 0 auto; display: grid; grid-template-columns: auto 200px 100px;   ;">

                    <div></div>
                    <div style="font-size: 14px; text-align: right;">Fecha: </div>
                    <div style="font-size: 14px; font-weight:bold;  text-align: center;"><?= $dtAbo['FechaAbon'] ?></div>
                </div><!-- Termina Fila  -->
            </div>
        </div> <!-- Termina Fila  -->

        <br>

        <!-- Fila Nueva -->
        <div
            style="font-size: 16px; width: 750px; margin: 0 auto; display: grid; grid-template-columns: 50px 350px   ;    ">
            <div>Cliente </div>
            <div style="text-align: center; font-weight: bold;   "><?= $dtAbo['nombre'] . ' ' . $dtAbo['apellido'] ?></div>
            <div></div>

        </div> <!-- Termina Fila  -->

        <br>

        <!-- Fila Nueva -->
        <div
            style="font-size: 16px; width: 750px; margin: 0 auto; display: grid; grid-template-columns: auto 300px auto ;    ">

            <div></div>
            <div style="text-align: center; font-weight: bold; ;  ">DETALLES</div>
            <div></div>


        </div> <!-- Termina Fila  -->

        <br>

        <!-- Fila Nueva -->
        <div
            style="font-size: 12px; width: 750px; margin: 0 auto; display: grid; grid-template-columns: auto 50px 100px  150px 150px 150px auto;  padding-block: 10px; text-align: center; font-weight: bold; border-block: 1px solid black;  ">
            <div ></div>
            <div>REMISION</div>
            <div>VALOR REMISION</div>
            <div>VALOR ACTUAL</div>
            <div>ABONO</div>
            <div>SALDO</div>
            <div ></div>

        </div><!-- Termina Fila  -->


        <div style="font-size: 12px; width: 750px; margin: 0 auto; border-block: 1px solid black;">
            <!-- Fila Nueva -->
            <div
                style="font-size: 12px; width: 750px; margin: 0 auto; display: grid; grid-template-columns: auto 50px 100px  150px 150px 150px auto;  padding-block: 7px; text-align: center;  ">
                <div></div>
                <div style="text-align: center;">#<?= $dtAbo['idVentas'] ?></div>
                <div><?= number_format($dtAbo['valorVenta'], 00) ?></div>
                <div><?= number_format($dtAbo['valorActual'], 00) ?></div>
                <div style="text-align: center;">$<?= number_format($dtAbo['ValorAbon'], 00) ?></div>
                <div style="text-align: center;">$<?= number_format($newValor, 00) ?></div>
                <div></div>
            </div><!-- Termina Fila  -->





        </div>

        <br>

        <!-- Fila Nueva -->

        <div
            style="font-size: 12px; width: 750px; margin: 0 auto; display: grid; grid-template-columns:  auto 100px 150px ;    ">

            <div></div>
            <div style="text-align: center; font-weight: bold; ">SubTotal</div>
            <div style="text-align: center; font-weight: bold; ">$<?= number_format($newValor, 00) ?></div>

        </div> <!-- Termina Fila  -->

        <br>
        <!-- Fila Nueva -->

        <div
            style="font-size: 12px; width: 750px; margin: 0 auto; display: grid; grid-template-columns: 100px 70px auto 100px 150px ;    ">
            <div>Elaborado por: </div>
            <div><?= $dtAbo['usuario'] ?></div>
            <div></div>
            <div style="text-align: center; font-weight: bold;  ">TOTAL</div>
            <div style="text-align: center; font-weight: bold;  border-block: 1px solid black; ">$<?= number_format($newValor, 00) ?></div>


        </div> <!-- Termina Fila  -->
    </div>
    <br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

    <script>
        window.onload = function() {
            const options = {
                margin: 0.1,
                filename: 'Recibo_Caja_#<?= $idAbo ?>.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2,
                    useCORS: true
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };

            const element = document.getElementById('content');
            element.style.width = '100%';
            element.style.height = 'auto';
            element.style.pageBreakInside = 'avoid';

            html2pdf().from(element).set(options).save();
        };
    </script>

</body>

</html>