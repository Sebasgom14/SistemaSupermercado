// Crear el contexto del gráfico
var ctx = document.getElementById("myAreaChart").getContext("2d");

// Ajustar el tamaño del gráfico (opcional)
var chartWidth = 800;  // Establece el ancho deseado
var chartHeight = 400; // Establece la altura deseada
ctx.canvas.width = chartWidth;
ctx.canvas.height = chartHeight;

// Inicializar el gráfico sin datos
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [],
    datasets: [{
      label: "Sessions",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 384510,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

$.ajax({
  url: './index.php?controlador=Sales&accion=getDataForGrafics',
  method: 'POST',
  dataType: 'json',
  success: function (data) {
    // Manipular los datos recibidos aquí
    var labels = data.map(entry => entry.FechaVentas);
    var totalSaleData = data.map(entry => entry.TotalVentas);

    // Actualizar el gráfico con los nuevos datos
    myLineChart.data.labels = labels;
    myLineChart.data.datasets[0].data = totalSaleData;

    // Adaptar automáticamente las escalas según los nuevos datos
    myLineChart.options.scales.xAxes[0].ticks.maxTicksLimit = Math.min(7, labels.length);
    myLineChart.options.scales.yAxes[0].ticks.max = Math.max(...totalSaleData);
    myLineChart.options.scales.yAxes[0].ticks.maxTicksLimit = 5;

    // Volver a renderizar el gráfico
    myLineChart.update();
  },
  error: function (xhr, status, error) {
    console.error('Error en la solicitud AJAX:', status, error);
  }
});


$.ajax({
  url: './index.php?controlador=Sales&accion=getSalesByDay',
  method: 'POST',
  dataType: 'json',
  success: function (data) {
    // Manipular los datos recibidos aquí

    var labels = data.map(entry => entry.FechaVentas);
    var totalSalesData = data.map(entry => entry.TotalVentasPorDia);

    // Crear el contexto del gráfico de barras
    var ctxBar = document.getElementById("myBarChart").getContext("2d");

    // Establecer el ancho y la altura del gráfico
    var chartWidth = 800;  // Establece el ancho deseado
    var chartHeight = 400; // Establece la altura deseada
    ctxBar.canvas.width = chartWidth;
    ctxBar.canvas.height = chartHeight;

    // Inicializar el gráfico de barras
    var myBarChart = new Chart(ctxBar, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Total de Ventas por Día',
          backgroundColor: 'rgba(2,117,216,1)',
          borderColor: 'rgba(2,117,216,1)',
          data: totalSalesData,
        }],
      },
      options: {
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false
            },
          }],
          yAxes: [{
            ticks: {
              min: 0,
              max: Math.max(...totalSalesData), // Ajusta el máximo para evitar superposiciones
            },
            gridLines: {
              color: 'rgba(0, 0, 0, .125)',
            },
          }],
        },
        legend: {
          display: false,
        },
      },
    });
  },
  error: function (xhr, status, error) {
    console.error('Error en la solicitud AJAX:', status, error);
  }
});

