let contador = 0;

$(".tablaVentas").DataTable({
  ajax: "ajax/datatable-ventas.ajax.php",
  deferRender: true,
  retrieve: true,
  processing: true,
  language: {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sSearch: "Buscar:",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Último",
      sNext: "Siguiente",
      sPrevious: "Anterior",
    },
    oAria: {
      sSortAscending: ": Activar para ordenar la columna de manera ascendente",
      sSortDescending:
        ": Activar para ordenar la columna de manera descendente",
    },
  },
});

/*=============================================
AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA
=============================================*/

var NombreTela = "";
var NombreColor = "";
var metros;
var stock;
var idTela;

// $(".tablaVentas tbody").on("click", "button.agregarProducto", function ()

async function agregarProducto(btn, idpro) {
  if (btn != 0) {
    var idProducto = $(btn).attr("idProducto");
    $(btn).removeClass("btn-primary agregarProducto");

    $(btn).addClass("btn-default");
  } else {
    var idProducto = $("#productoSelect").val();
  }

  var datos = new FormData();
  datos.append("idProducto", idProducto);

  $.ajax({
    url: "ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      stock = respuesta["stock"];
      metros = respuesta["metrosRollo"];
      idTela = respuesta["idTela"];

      var datosTela = new FormData();
      datosTela.append("idCategoria", respuesta["idTela"]);

      $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datosTela,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          NombreTela = respuesta["categoria"];

          $("#mostrarTipoTela").val(respuesta["id"]);
          $("#mostrarTipoTela").html(respuesta["categoria"]);
        },
      });

      var datosColor = new FormData();
      datosColor.append("idColor", respuesta["idColor"]);

      $.ajax({
        url: "ajax/colores.ajax.php",
        method: "POST",
        data: datosColor,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          NombreColor = respuesta["color"];
        },
      });

      if (stock == 0) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "No hay stock disponible",
        });

        $("button[idProducto='" + idProducto + "']").addClass(
          "btn-primary agregarProducto"
        );

        return;
      }
      setTimeout(function () {
        contador = contador + 1;
        var nombreVenta =
          NombreTela + " " + NombreColor + " " + metros + "mts ";

        let htmlContent = `
        <div class="row" style="padding:5px 10px">
          <input type="hidden" class="form-control" id="idProducto-${contador}" value="${idProducto}" readonly>
          <div class="col-sm-4" style="padding-right: 0px">
            <div class="input-group-prepend">
              <span class="input-group-prepend">
                <button type="button" class="btn btn-danger btn-sm quitarProducto" idProducto="${idProducto}">
                  <i class="fa fa-times"></i>
                </button>
              </span>
              <input type="text" class="form-control nuevaDescripcionProducto" idProducto="${idProducto}" name="agregarProducto" value="${nombreVenta}" readonly>
            </div>
          </div>
          <div class="col-sm-2">
            <input type="number" class="form-control" id="CantidadRollos-${contador}"  onchange="sumInd(${contador},${stock},${metros})" value="1" required>
          </div>
          <div class="col-sm-2">
            <input type="number" class="form-control " id="CantidadMetros-${contador}" value="${metros}" readonly>
          </div>
          <div class="col-sm-2 align-self-end">
            <div class="input-group-prepend">
              <input type="tel"  class="form-control" id="PrecioMetro-${contador}" oninput="formatoConComas(this)" onchange="sumValor(${contador})" value="0" required>
            </div>
          </div>
          <div class="col-sm-2 align-self-end" style="padding-left: 0px">
            <div class="input-group-prepend">
              <input type="tel" class="form-control" id="PrecioTotal-${contador}"  value="0" readonly>
            </div>
          </div>
        </div>
      `;

        $(".nuevoProducto").append(htmlContent);
      }, 500);
    },
  });
}

function sumInd(con, stock, metros) {
  var CantidadRollos = $("#CantidadRollos-" + con).val();
  var CantidadMetros = $("#CantidadMetros-" + con).val();

  if (CantidadRollos > stock) {
    // alert("Valor super el stock disponible");

    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Supera el stock disponible",
    });
    $("#CantidadRollos-" + con).val(1);
    ("#CantidadMetros-" + con).val(metros);
    return;
  }
  if (CantidadRollos < 0) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "No se aceptan valores menores a 0",
    });

    // alert("No se aceptan valores menores a 0");

    $("#CantidadRollos-" + con).val(1);
    ("#CantidadMetros-" + con).val(metros);
    return;
  }
  let Suma = parseFloat(metros) * parseFloat(CantidadRollos);

  $("#CantidadMetros-" + con).val(Suma);
  sumValor(con);
}

function formatoConComas(input) {
  let valor = input.value.replace(/[^\d]/g, ""); // Eliminamos todos los caracteres no numéricos

  // Si hay un cero al principio, pero el número es mayor a cero, eliminamos el cero
  if (valor.length > 1 && valor[0] === "0") {
    valor = valor.slice(1);
  }

  // Insertamos comas cada tres dígitos desde el final de la cadena
  let valorFormateado = "";
  let startIndex = valor.length % 3 || 3;
  valorFormateado = valor.slice(0, startIndex);
  while (startIndex < valor.length) {
    valorFormateado += "," + valor.slice(startIndex, startIndex + 3);
    startIndex += 3;
  }
  input.value = valorFormateado;
}

function sumValor(con) {
  var CantidadMetros = $("#CantidadMetros-" + con).val();
  var ValorMetro = $("#PrecioMetro-" + con).val();

  // Eliminar comas o puntos del valor antes de convertir a número
  ValorMetro = ValorMetro.replace(/[,\.]/g, "");

  // Convertir los valores a números y realizar la multiplicación
  let Suma = parseFloat(ValorMetro) * parseFloat(CantidadMetros);

  let SumaFormateada = Suma.toLocaleString("en");

  // Asignar el valor formateado al campo de PrecioTotal
  $("#PrecioTotal-" + con).val(SumaFormateada);
  totalVenta();
}

function totalVenta() {
  valor = 0;
  contador;
  for (let index = 1; index <= contador; index++) {
    var campo = $("#PrecioTotal-" + index).val();
    if (!campo) {
      continue;
    }
    campo = campo.replace(/[,\.]/g, "");
    valor = parseFloat(valor) + parseFloat(campo);
  }

  let valorFor = valor.toLocaleString("en");

  // Asignar el valor formateado al campo de PrecioTotal
  $("#PrecioVenta").val(valorFor);
}
function campoTiempo() {
  console.log("Entra");
  var valor = $("#nuevoMetodoPago").val();

  if (valor === "2") {
    $("#CampoTiempo").show();
  } else {
    $("#CampoTiempo").hide();
  }
}

async function SaveVenta() {
  var idVendedor = $("#idVendedor").val();
  var userEla = $("#userEla").val();

  console.log(idVendedor);
  var idCliente = $("#idCliente").val();
  var nuevoTiempoCredito = $("#nuevoTiempoCredito").val();
  var nuevoMetodoPago = $("#nuevoMetodoPago").val();

  var PrecioVenta = $("#PrecioVenta").val().replace(/[,\.]/g, "");

  if (
    nuevoMetodoPago === "" ||
    idCliente === "" ||
    idVendedor === "" ||
    idVendedor === "Seleccione vendedor"
  ) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Los espacios marcados con * son obligatorios ",
    });

    // alert("los espacios con * son obligatorios");
    return;
  }
  var productos = [];

  contador;

  for (let i = 1; i <= contador; i++) {
    var idProducto = $("#idProducto-" + i).val();
    // Si no se encuentra alguno de los elementos, continuar con la siguiente iteración
    if (!idProducto) {
      continue;
    }
    var CantidadRollos = $("#CantidadRollos-" + i).val();
    var CantidadMetros = $("#PrecioMetro-" + i).val();
    var PrecioMetro = $("#PrecioMetro-" + i)
      .val()
      .replace(/[,\.]/g, "");
    var PrecioTotal = $("#PrecioTotal-" + i)
      .val()
      .replace(/[,\.]/g, "");

    var producto = {
      idProducto: idProducto,
      CantidadRollos: CantidadRollos,
      ValorMetro: PrecioMetro,
      PrecioTotal: PrecioTotal,
    };
    productos.push(producto);
  }
  var productosJSON = JSON.stringify(productos);

  let formData = new FormData();
  formData.append("funcion", "SaveVenta");
  formData.append("idVendedor", idVendedor);
  formData.append("idCliente", idCliente);
  formData.append("nuevoTiempoCredito", nuevoTiempoCredito);
  formData.append("nuevoMetodoPago", nuevoMetodoPago);
  formData.append("productos", productosJSON);
  formData.append("PrecioVenta", PrecioVenta);
  formData.append("userEla", userEla);

  try {
    let req2 = await fetch("controladores/ventas.controlador.php", {
      method: "POST",
      body: formData,
    });

    let res2 = await req2.text();
    Swal.fire({
      icon: "success",
      text: "Venta registrada",
    });
    setTimeout(function () {
      location.reload();
    }, 2000);
    console.log(res2);
  } catch (error) {
    alert(error.message);
    console.log(error.message);
    console.log(error);
  }
}

/*=============================================
CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA
=============================================*/

$(".tablaVentas").on("draw.dt", function () {
  if (localStorage.getItem("quitarProducto") != null) {
    var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

    for (var i = 0; i < listaIdProductos.length; i++) {
      $(
        "button.recuperarBoton[idProducto='" +
          listaIdProductos[i]["idProducto"] +
          "']"
      ).removeClass("btn-default");
      $(
        "button.recuperarBoton[idProducto='" +
          listaIdProductos[i]["idProducto"] +
          "']"
      ).addClass("btn-primary agregarProducto");
    }
  }
});

/*=============================================
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
=============================================*/

var idQuitarProducto = [];

localStorage.removeItem("quitarProducto");

$(".formularioVenta").on("click", "button.quitarProducto", function () {
  $(this).parent().parent().parent().parent().remove();

  var idProducto = $(this).attr("idProducto");

  /*=============================================
	ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
	=============================================*/

  if (localStorage.getItem("quitarProducto") == null) {
    idQuitarProducto = [];
  } else {
    idQuitarProducto.concat(localStorage.getItem("quitarProducto"));
  }

  idQuitarProducto.push({ idProducto: idProducto });

  localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

  $("button.recuperarBoton[idProducto='" + idProducto + "']").removeClass(
    "btn-default"
  );

  $("button.recuperarBoton[idProducto='" + idProducto + "']").addClass(
    "btn-primary agregarProducto"
  );

  totalVenta();
});
GetProdutos();
async function GetProdutos() {
  let formData = new FormData();
  formData.append("funcion", "GetProdutos");

  try {
    let req2 = await fetch("controladores/ventas.controlador.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.json();
    let selectElement = document.getElementById("productoSelect");

    res2.forEach(function (item) {
      let option = document.createElement("option");
      option.value = item.idProducto;
      option.textContent =
        item.CodigoProducto + "/" + item.categoria + "- " + item.color;
      selectElement.appendChild(option); // Añadir la opción al select
    });
  } catch (error) {
    // alert(error.message);
    console.log(error.message);
    console.log(error);
  }
}
async function GetVendedor() {
  let formData = new FormData();
  formData.append("funcion", "GetVendedor");

  try {
    let req2 = await fetch("controladores/ventas.controlador.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.json();
    let selectElement = document.getElementById("idVendedor");

    res2.forEach(function (item) {
      let option = document.createElement("option");
      option.value = item.id;
      option.textContent = item.usuario;
      selectElement.appendChild(option); // Añadir la opción al select
    });
  } catch (error) {
    // alert(error.message);
    console.log(error.message);
    console.log(error);
  }
}

async function ListVentas() {
  var FechIni = $("#FechIni").val();
  var FechFin = $("#FechFin").val();

  let formData = new FormData();
  formData.append("funcion", "ListVentas");
  formData.append("FechIni", FechIni);
  formData.append("FechFin", FechFin);

  try {
    let req2 = await fetch("controladores/ventas.controlador.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.text();
    $("#ListVentas").html(res2);
    $("#Tb1").DataTable();
  } catch (error) {
    // alert(error.message);
    console.log(error.message);
    console.log(error);
  }
}
async function detailRem(idVen) {
  $("#DetailRem").modal("show"); // Abre el modal antes de cargar los datos
  $("#indReam").html(idVen);
  let formData = new FormData();
  formData.append("funcion", "detailRem");
  formData.append("idVen", idVen);

  try {
    let req2 = await fetch("controladores/ventas.controlador.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.json();
    console.log(res2);
    // Limpiar la tabla antes de llenarla
    $("#tbdetail tbody").empty();

    // Iterar sobre los datos y agregar filas a la tabla
    res2.forEach((item) => {
      let row = `
      <tr>
        <td>${item.CodigoProducto}</td>
        <td>${
          item.categoria + "-" + item.color + "-" + item.metrosRollo + " mtrs"
        }</td>
        <td>${formatNumber(item.CantidadRollo)}</td>
        <td>${formatNumber(item.PrecioMetro)}</td>
        <td>${formatNumber(item.Total)}</td>
      </tr>
    `;
      $("#tbdetail tbody").append(row);
    });

    // Inicializar DataTable
    $("#tbdetail").DataTable();
  } catch (error) {
    // alert(error.message);
    console.log(error.message);
    console.log(error);
  }
}
function formatNumber(number) {
  return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
