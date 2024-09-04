function Graficas() {
  var FechIni = $("#FechIni").val();
  var FechFin = $("#FechFin").val();

  GrafAnual(FechIni, FechFin);
  GrafProduct(FechIni, FechFin);
  GrafVendedor(FechIni, FechFin);
  GrafClientes(FechIni, FechFin);
}

async function GrafAnual(FechIni, FechFin) {
  let formData = new FormData();
  formData.append("funcion", "GrafAnual");
  formData.append("FechIni", FechIni);
  formData.append("FechFin", FechFin);

  try {
    let req2 = await fetch("controladores/dashboard.controlador.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.json();

    const ctx = document.getElementById("myChart1");

    // Verificar si ya existe un gráfico y destruirlo si es necesario
    if (window.myChart2 instanceof Chart) {
      window.myChart2.destroy();
    }

    if (res2.cod === 0) {
      // Si no hay datos, mostrar mensaje
      const message = document.createElement("p");
      message.textContent = "No hay datos por mostrar.";
      document.getElementById("myChartContainer").appendChild(message);
    } else {
      // Extraer las etiquetas y los valores de los datos
      const labels = res2.datos.map((item) => item.Mes);
      const data = res2.datos.map((item) => parseFloat(item.va));

      // Crear el gráfico
      window.myChart2 = new Chart(ctx, {
        type: "line",
        data: {
          labels: labels,
          datasets: [
            {
              label: "Ventas Mensuales",
              data: data,
              borderWidth: 1,
              borderColor: "rgba(75, 192, 192, 1)",
              fill: false,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false, // Permite que el gráfico ocupe todo el espacio disponible
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });
    }
  } catch (error) {
    // alert(error.message);
    console.log(error.message);
    console.log(error);
  }
}
async function GrafProduct(FechIni, FechFin) {
  let formData = new FormData();
  formData.append("funcion", "GrafProduct");
  formData.append("FechIni", FechIni);
  formData.append("FechFin", FechFin);

  try {
    let req2 = await fetch("controladores/dashboard.controlador.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.json();

    const ctx2 = document.getElementById("myChart2");

    // Verificar si ya existe un gráfico y destruirlo si es necesario
    if (window.myChart3 instanceof Chart) {
      window.myChart3.destroy();
    }

    if (res2.cod === 0) {
      // Si no hay datos, mostrar mensaje
      const message = document.createElement("p");
      message.textContent = "No hay datos por mostrar.";
      document.getElementById("myChartContainer2").appendChild(message);
    } else {
      // Extraer las etiquetas y los valores de los datos
      const labels = res2.datos.map(
        (item) => `${item.categoria}-${item.color}`
      );

      const data = res2.datos.map((item) => parseInt(item.CantRo, 10));
      const backgroundColors = res2.datos.map(() => getRandomColor());

      // Crear el gráfico
      window.myChart3 = new Chart(ctx2, {
        type: "pie",
        data: {
          labels: labels,
          datasets: [
            {
              data: data,
              backgroundColor: backgroundColors,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false, // Permite que el gráfico ocupe todo el espacio disponible
        },
      });
    }
  } catch (error) {
    // alert(error.message);
    console.log(error.message);
    console.log(error);
  }
}
// Función para generar colores aleatorios en formato hexadecimal
function getRandomColor() {
  const letters = "0123456789ABCDEF";
  let color = "#";
  for (let i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}
async function GrafVendedor(FechIni, FechFin) {
  let formData = new FormData();
  formData.append("funcion", "GrafVendedor");
  formData.append("FechIni", FechIni);
  formData.append("FechFin", FechFin);

  try {
    let req2 = await fetch("controladores/dashboard.controlador.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.json();
    const ctx3 = document.getElementById("myChart3");

    // Verificar si ya existe un gráfico y destruirlo si es necesario
    if (window.myChart4 instanceof Chart) {
      window.myChart4.destroy();
    }

    if (res2.cod === 0) {
      // Si no hay datos, mostrar mensaje
      const message = document.createElement("p");
      message.textContent = "No hay datos por mostrar.";
      document.getElementById("myChartContainer3").appendChild(message);
    } else {
      // Extraer las etiquetas (usuarios) y los valores
      const labels = res2.datos.map((item) => item.usuario);
      const data = res2.datos.map((item) => parseFloat(item.valor));

      // Crear el gráfico
      window.myChart4 = new Chart(ctx3, {
        type: "bar",
        data: {
          labels: labels,
          datasets: [
            {
              label: "Valor por Vendedor",
              data: data,
              backgroundColor: "rgba(54, 162, 235, 0.5)",
              borderColor: "rgba(54, 162, 235, 1)",
              borderWidth: 1,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false, // Permite que el gráfico ocupe todo el espacio disponible

          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });
    }
  } catch (error) {
    // alert(error.message);
    console.log(error.message);
    console.log(error);
  }
}
async function GrafClientes(FechIni, FechFin) {
  let formData = new FormData();
  formData.append("funcion", "GrafClientes");
  formData.append("FechIni", FechIni);
  formData.append("FechFin", FechFin);

  try {
    let req2 = await fetch("controladores/dashboard.controlador.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.json();

    console.log("Cliente : " + res2);

    const ctx3 = document.getElementById("myChart4");

    // Verificar si ya existe un gráfico y destruirlo si es necesario
    if (window.myChart5 instanceof Chart) {
      window.myChart5.destroy();
    }

    if (res2.cod === 0) {
      // Si no hay datos, mostrar mensaje
      const message = document.createElement("p");
      message.textContent = "No hay datos por mostrar.";
      document.getElementById("myChartContainer4").appendChild(message);
    } else {
      // Extraer las etiquetas (nombres y apellidos) y los valores de venta
      const labels = res2.datos.map(
        (item) => `${item.nombre} ${item.apellido}`
      );
      const data = res2.datos.map((item) => parseFloat(item.valorVenta));

      // Crear el gráfico
      window.myChart5 = new Chart(ctx3, {
        type: "bar",
        data: {
          labels: labels,
          datasets: [
            {
              label: "Valor por Cliente",
              data: data,
              backgroundColor: "rgba(75, 192, 192, 0.5)",
              borderColor: "rgba(75, 192, 192, 1)",
              borderWidth: 1,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false, // Permite que el gráfico ocupe todo el espacio disponible

          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });
    }
  } catch (error) {
    // alert(error.message);
    console.log(error.message);
    console.log(error);
  }
}
async function GenerarInforme(opt) {
  var FechIni = $("#FechIni").val();
  var FechFin = $("#FechFin").val();

  let formData = new FormData();
  formData.append("funcion", "GenerarInforme");
  formData.append("FechIni", FechIni);
  formData.append("FechFin", FechFin);
  formData.append("opt", opt);

  try {
    let req2 = await fetch("controladores/dashboard.controlador.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.text();
    if (req2.ok) {
      window.location.href = "controladores/informe.xlsx";
    }
  } catch (error) {
    // alert(error.message);
    console.log(error.message);
    console.log(error);
  }
}
