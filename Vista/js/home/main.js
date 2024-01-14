$(document).ready(function() {
    getCostumers();
    getSales();
    getProfits();
});

function getCostumers(){
    $.ajax({
        url: './index.php?controlador=Costumers&accion=getCountCostumers',
        method: 'POST',
        dataType: 'json',
        success: function(data) {

            var totalClientes = $("#totalCostumers");

            data.forEach(function(item) {
                totalClientes.text(item.Clientes)
            });
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
}

function getSales(){
    $.ajax({
        url: './index.php?controlador=Sales&accion=getCountSales',
        method: 'POST',
        dataType: 'json',
        success: function(data) {

            var ventasRealizadas = $("#totalSales");

            data.forEach(function(item) {
                ventasRealizadas.text(item.VentasRealizadas)
            });
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
}

function getProfits(){
    $.ajax({
        url: './index.php?controlador=Sales&accion=getTotalSales',
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            var totalVentas = $("#Profits");

            // Itera sobre los datos y agrega las opciones al select
            data.forEach(function(item) {
                totalVentas.text(item.TotalVentas)
            });


        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
}