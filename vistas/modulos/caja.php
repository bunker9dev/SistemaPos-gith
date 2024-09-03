<!-- Content Wrapper. Contains page content -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gestiona Tus Creditos.</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Caja</li>
          </ol>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">

      <div class="card-body">
        <div class="row">
          <div class="col-3 ">
            <label for="">Fecha Inicial:</label>
            <input type="date" class="form-control" value="<?= date('Y-m-d', strtotime('-1 month')) ?>" id="FechIni">
          </div>
          <div class="col-3">
            <label for="">Fecha Fin:</label>
            <div class="input-group mb-3">
              <input type="date" class="form-control" value="<?= date('Y-m-d', strtotime('+1 day')) ?>" id="FechFin">
              <button class="btn btn-primary" onclick="ListCredit()"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
          </div>
        </div>
        <hr>
        <br>

        <div class="ListCredit" id="ListCredit"></div>
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- Modal detalle Factura-->
    <div class="modal fade" id="DetailRem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Detalle Remisión # <span id="indReam"></span></h1>
          </div>
          <div class="modal-body">
            <table class="table" id="tbdetail">
              <thead>
                <tr>
                  <th scope="col">cod</th>
                  <th scope="col">Producto</th>
                  <th scope="col"># Rollos</th>
                  <th scope="col">Precio Mt</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="Closemd()">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Abono Remision-->
    <div class="modal fade" id="AbonoRem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Detalle Remisión # <span id="indReam"></span></h1>
          </div>
          <div class="modal-body">
            <div class="container">
              <input type="hidden" id="idRem">
              <input type="hidden" id="idEmpleado" value="<?= $_SESSION['id'] ?>">
              <div class="row">
                <div class="col-lg-4">
                  <label for="">Valor Pendiente: </label><br>
                  <input type="tel" class="form-control form-control-sm" id="val_Pend" readonly>
                </div>
                <div class="col-lg-4">
                  <label for="">Valor A Abonar:</label><br>
                  <input type="tel" class="form-control form-control-sm" id="val_Abon" oninput="formatoConComas(this)" onchange="CalculaVal()">
                </div>
                <div class="col-lg-4">
                  <label for="">Valor Restante :</label><br>
                  <input type="tel" class="form-control form-control-sm" id="val_Nue" readonly>
                </div>
              </div>
            </div>
            <br>
            <center>
              <button class="btn btn-primary btn-sm" onclick="AbonoPro()"><i class="fa-solid fa-cash-register"></i> Abonar</button>
            </center>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<script src="vistas/js/caja.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    ListCredit();
  });

  function Closemd() {
    $('#AbonoRem').modal('hide');
  }
</script>