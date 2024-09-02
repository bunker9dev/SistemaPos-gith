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

    alert("Proceso exitoso");
    ListCredit();
    $("#AbonoRem").modal("hide"); // Abre el modal antes de cargar los datos
  } catch (error) {
    // alert(error.message);
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
