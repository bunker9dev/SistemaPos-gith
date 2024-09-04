async function ListCredit() {
  var FechIni = $("#FechIni").val();
  var FechFin = $("#FechFin").val();

  let formData = new FormData();
  formData.append("funcion", "ListCredit");
  formData.append("FechIni", FechIni);
  formData.append("FechFin", FechFin);

  try {
    let req2 = await fetch("controladores/caja.controlador.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.text();
    $("#ListCredit").html(res2);
    $("#Tb1").DataTable();
  } catch (error) {
    // alert(error.message);
    console.log(error.message);
    console.log(error);
  }
}

async function AbonoRem(idRem) {
  $("#AbonoRem").modal("show"); // Abre el modal antes de cargar los datos
  $("#indReam").html(idRem);
  $("#idRem").val(idRem);

  let formData = new FormData();
  formData.append("funcion", "AbonoRem");
  formData.append("idRem", idRem);
  try {
    let req2 = await fetch("controladores/caja.controlador.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.json();
    $("#val_Pend").val(formatNumber(res2.ValorPendiente));
  } catch (error) {
    // alert(error.message);
    console.log(error.message);
    console.log(error);
  }
}
async function AbonoPro() {
  var idRem = $("#idRem").val();
  var val_Pend = $("#val_Pend").val().replace(/[,\.]/g, "");
  var val_Abon = $("#val_Abon").val().replace(/[,\.]/g, "");
  var idEmpleado = $("#idEmpleado").val();

  let formData = new FormData();
  formData.append("funcion", "AbonoPro");
  formData.append("idRem", idRem);
  formData.append("val_Pend", val_Pend);
  formData.append("val_Abon", val_Abon);
  formData.append("idEmpleado", idEmpleado);

  try {
    let req2 = await fetch("controladores/caja.controlador.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.text();

    Swal.fire({
      icon: "success",
      title: "Abonado",
      text: "Abono agregado",
    });
    ListCredit();
    $("#AbonoRem").modal("hide"); // Abre el modal antes de cargar los datos
    window.open(
      "/vistas/modulos/facturaReciboCaja.php?idAbo=" + res2 + "",
      "_blank"
    );
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "No se aceptan valores menores a 0",
    });
    console.log(error.message);
    console.log(error);
  }
}
function CalculaVal() {
  var val_Pend = $("#val_Pend").val().replace(/[,\.]/g, "");
  var val_Abon = $("#val_Abon").val().replace(/[,\.]/g, "");

  var Calculo = parseFloat(val_Pend) - parseFloat(val_Abon);

  if (Calculo < 0) {
    alert("No se puede poner mas del valor pendiente");
    $("#val_Abon").val(0);
    return;
  }
  $("#val_Nue").val(formatNumber(Calculo));
}

async function HistoAbo(idVen) {
  $("#indReam").html(idVen);
  let formData = new FormData();
  formData.append("funcion", "HistoAbo");
  formData.append("idVen", idVen);

  try {
    let req2 = await fetch("controladores/caja.controlador.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.json();
    console.log(res2);

    // Limpiar la tabla antes de llenarla
    $("#HistoAbotb tbody").empty();

    // Iterar sobre los datos y agregar filas a la tabla
    res2.forEach((item) => {
      let row = `
      <tr>
        <td>${item.IdVentasAb}</td>
        <td>${item.FechaAbon}</td>
        <td>${formatNumber(item.valorActual)}</td>
        <td>${formatNumber(item.ValorAbon)}</td>
        <td>${formatNumber(item.Pendiente)}</td>
        <td>${item.usuario}</td>
        <td><a href="/vistas/modulos/facturaReciboCaja.php?idAbo=${
          item.IdVentasAb
        }" target="_blank" class="btn btn-primary btn-sm">Recibo</a></td>
      </tr>
    `;
      $("#HistoAbotb tbody").append(row);
    });

    // Inicializar DataTable
    $("#HistoAbotb").DataTable();
  } catch (error) {
    // alert(error.message);
    console.log(error.message);
    console.log(error);
  }
}
