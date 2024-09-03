<!-- Content Wrapper. Contains page content -->
<?php

$control = new ControladorDash;
$cabe = $control->Cabeceras();


?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  .header {
    display: flex;
    justify-content: space-between;
  }

  /* Contenedor del canvas centrado */
  .chart-container {
    width: 600px;
    /* Ancho deseado */
    height: 300px;
    /* Altura deseada */
    position: relative;
    margin: 0 auto;
    /* Centrar horizontalmente */
    display: flex;
    justify-content: center;
    /* Centrar horizontalmente el contenido dentro del contenedor */
    align-items: center;
    /* Centrar verticalmente el contenido dentro del contenedor */
  }

  /* Asegurar que el canvas se ajuste al contenedor */
  canvas {
    display: block;
    width: 100%;
    height: 100%;
  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Inicio</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Inicio</li>
          </ol>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="row">
      <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $cabe['Ventas'] ?></h3>
            <p>Ventas</p>
          </div>
          <div class="icon">
            <i class="fas fa-shopping-bag"></i>
          </div>
          <a href="ventas" class="small-box-footer">Más Info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
          <div class="inner">
            <h3><?= $cabe['credit'] ?></h3>
            <p>Creditos</p>
          </div>
          <div class="icon">
            <i class="fas fa-chart-bar"></i>
          </div>
          <a href="caja" class="small-box-footer">Más Info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?= $cabe['Client'] ?></h3>
            <p>Clientes</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-plus"></i>
          </div>
          <a href="clientes" class="small-box-footer">Más Info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?= $cabe['Product'] ?></h3>
            <p>Productos</p>
          </div>
          <div class="icon">
            <i class="fas fa-chart-pie"></i>
          </div>
          <a href="productos" class="small-box-footer">Más Info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        <label for="">Fecha Inicial:</label>
        <input type="date" class="form-control" value="<?= date('Y-m-d', strtotime('-1 month')) ?>" id="FechIni">
      </div>
      <div class="col-3">
        <label for="">Fecha Fin:</label>
        <div class="input-group mb-3">
          <input type="date" class="form-control" value="<?= date('Y-m-d', strtotime('+1 day')) ?>" id="FechFin">
          <button class="btn btn-primary" onclick=" Graficas()"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
          <h5 class="card-header">
            <div class="header">
              <div class="">
                Ventas
              </div>
              <div class="">
                <button class="btn-success btn-sm" onclick="GenerarInforme(1)"> <i class="fa-solid fa-file-excel"></i> Informe</button>
              </div>
            </div>
          </h5>
          <div class="card-body">
            <div class="container">
              <div class="chart-container">
                <canvas id="myChart1"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
          <h5 class="card-header">
            <div class="header">
              <div class="">
                Productos
              </div>
              <div class="">
                <button class="btn-success btn-sm" onclick="GenerarInforme(2)"> <i class="fa-solid fa-file-excel"></i> Informe</button>
              </div>
            </div>
          </h5>
          <div class="card-body">
            <div class="container">
              <div class="chart-container">
                <canvas id="myChart2"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
          <h5 class="card-header">
            <div class="header">
              <div class="">
                Vendedor
              </div>
              <div class="">
                <button class="btn-success btn-sm" onclick="GenerarInforme(3)"> <i class="fa-solid fa-file-excel"></i> Informe</button>
              </div>
            </div>
          </h5>
          <div class="card-body">
            <div class="container">
              <div class="chart-container">
                <canvas id="myChart3"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
          <h5 class="card-header">
            <div class="header">
              <div class="">
                Clientes
              </div>
              <div class="">
                <button class="btn-success btn-sm" onclick="GenerarInforme(4)"> <i class="fa-solid fa-file-excel"></i> Informe</button>
              </div>
            </div>
          </h5>
          <div class="card-body">
            <div class="container">
              <div class="chart-container">
                <canvas id="myChart4"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


</div>


<script src="vistas/js/inicio.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Graficas();
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->