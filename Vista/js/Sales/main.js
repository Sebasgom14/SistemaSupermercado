$(document).ready(function() {
    var ddtableProduct = $('#SalesTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
        },
        "theme": "bootstrap",
    });
    selectClient();
    listProducts();

    $('#clientSelect').change(function() {
        // Habilitar o deshabilitar el botón de agregar productos según si se ha seleccionado un cliente
        $('#addProduct').prop('disabled', !$(this).val());
    });

});

function selectClient(){
    $.ajax({
        url: './index.php?controlador=Costumers&accion=Todos',
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            // Limpia las opciones actuales del select
            $('#clientSelect').empty();

            // Agrega la opción por defecto
            $('#clientSelect').append('<option selected>Seleccione el cliente</option>');

            data.forEach(function(item) {
                $('#clientSelect').append('<option value="' + item.id + '">' + item.nombre + '</option>');
            });

            $('#clientSelectView').empty();

            // Agrega la opción por defecto
            $('#clientSelectView').append('<option selected>Seleccione el cliente</option>');

            data.forEach(function(item) {
                $('#clientSelectView').append('<option value="' + item.id + '">' + item.nombre + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
}



function listProducts() {
    $.ajax({
        url: './index.php?controlador=Inventory&accion=Todos',
        method: 'POST',
        dataType: 'json',
        success: function (data) {
            // Limpiar la tabla antes de agregar nuevas filas
            $('#tableproducts tbody').empty();

            // Obtener los IDs de los productos en la tabla productsSales
            var productsSalesIds = $('#productsSales tbody tr').map(function () {
                return $(this).data('id');
            }).get();

            // Filtrar productos que no estén en la tabla productsSales
            var filteredData = data.filter(function (product) {
                return !productsSalesIds.includes(product.id);
            });

            // Iterar sobre los datos filtrados y agregar filas a la tabla
            $.each(filteredData, function (index, product) {
                var newRow = '<tr data-id="' + product.id + '">' +
                    '<td>' + product.nombreProducto + '</td>' +
                    '<td>' + product.precio + '</td>' +
                    '<td><img src="' + product.imagen + '" alt="Imagen del producto" style="max-width: 100px;"></td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-success btn-sm" ' +
                    'onclick="agregarProducto(' + product.id + ',' + product.cantidadProduct + ',' +
                    product.descuento + ',' + product.cantidadMinima + ',' + product.cantidadMaxima + ',' + product.estadoPromocion + ')">' +
                    '<i class="fas fa-plus"></i> Agregar' +
                    '</button>' +
                    '</td>' +
                    '</tr>';

                $('#tableproducts tbody').append(newRow);
            });

            // Agregar evento de entrada al campo de búsqueda
            $('#serch').on('input', function () {
                var searchText = $(this).val().toLowerCase();

                // Filtrar filas de la tabla
                $('#tableproducts tbody tr').each(function () {
                    var rowData = $(this).text().toLowerCase();
                    $(this).toggle(rowData.indexOf(searchText) > -1);
                });
            });
        },
        error: function (xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
}



function agregarProducto(id, cantidadDisponible, descuento, cantidadMinima, cantidadMaxima,estadoPromocion) {
    // Verificar si el producto ya está en la tabla
    var existingRow = $('#productsSales tbody tr[data-id="' + id + '"]');

    if (existingRow.length > 0) {
        // El producto ya está en la tabla, aumentar la cantidad hasta el límite disponible
        var currentQuantity = parseInt(existingRow.find('.quantity-input').val());
        var newQuantity = currentQuantity + 1;

        if (newQuantity <= cantidadDisponible) {
            // Actualizar la cantidad si no excede el límite
            existingRow.find('.quantity-input').val(newQuantity);

            // Habilitar el botón y quitar la clase is-invalid
            $('#addSales').prop('disabled', false);
            $('#quantity-' + id).removeClass('is-invalid');
        } else {
            // Deshabilitar el botón y agregar la clase is-invalid
            $('#addSales').prop('disabled', true);
            $('#quantity-' + id).addClass('is-invalid');
        }



    } else {
        // Obtener los datos del producto seleccionado
        var productRow = $('#tableproducts tbody tr[data-id="' + id + '"]');
        var productName = productRow.find('td:first').text();
        var productPrice = parseFloat(productRow.find('td:eq(1)').text());
        var productImage = productRow.find('td:eq(2) img').attr('src');

        // Aplicar lógica de descuento y promoción
        var discountedPrice = productPrice;  // Precio por defecto

        if(estadoPromocion==1){
            if (descuento != 0.00) {
                discountedPrice = productPrice - (productPrice * (descuento/100));
            }
        }



        // Crear la nueva fila para la segunda tabla
        var newRow = '<tr data-id="' + id + '" data-descuento="' + descuento + '" data-cantidad-minima="' + cantidadMinima + '" data-cantidad-maxima="' + cantidadMaxima + '" data-cantidad-agregada="0">' +
            '<td><img src="' + productImage + '" alt="Imagen del producto" style="max-width: 50px;"></td>' +
            '<td class="product-name">' + productName + '</td>' +
            '<td>' +
            '<input type="number" class="form-control quantity-input is-invalid" id="quantity-' + id + '" value="1" max="' + cantidadDisponible + '">' +
            '</td>' +
            '<td class="price">' + discountedPrice + '</td>' +
            '<td class="subtotal">' + discountedPrice + '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-danger btn-sm" onclick="eliminarFila(this)">' +
            '<i class="fas fa-trash-alt"></i>' +
            '</button>' +
            '</td>' +
            '</tr>';

        // Agregar la nueva fila a la segunda tabla
        $('#productsSales tbody').append(newRow);

        // Agregar evento de cambio al input de cantidad
        $('#quantity-' + id).on('input', function () {
            var newQuantity = parseInt($(this).val());

            // Lógica para promoción 2x1
            var cantidadMinima = $(this).closest('tr').data('cantidad-minima');
            var cantidadMaxima = $(this).closest('tr').data('cantidad-maxima');
            var cantidadAgregada = $(this).closest('tr').data('cantidad-agregada');

            if (estadoPromocion == 1) {
                if (cantidadAgregada < cantidadMinima && (cantidadAgregada + newQuantity) >= cantidadMinima) {
                    var quantityForFree = Math.floor((cantidadAgregada + newQuantity) / (cantidadMinima + cantidadMaxima));
                    var totalPrice = (newQuantity - quantityForFree) * discountedPrice;

                    // Actualizar cantidad agregada
                    $(this).closest('tr').data('cantidad-agregada', cantidadAgregada + newQuantity);
                } else {
                    // Actualizar subtotal de manera normal
                    $(this).closest('tr').find('.subtotal').text(discountedPrice * newQuantity);
                }
            }



            if (newQuantity <= cantidadDisponible) {
                // Habilitar el botón y quitar la clase is-invalid
                $('#addSales').prop('disabled', false);
                $(this).removeClass('is-invalid');
            } else {
                // Deshabilitar el botón y agregar la clase is-invalid
                $('#addSales').prop('disabled', true);
                $(this).addClass('is-invalid');
            }
            calcularSubtotal(id);
            calcularTotales(); // Calcular totales después de cambiar la cantidad
        });

        // Habilitar el botón y quitar la clase is-invalid
        $('#addSales').prop('disabled', false);
        $('#quantity-' + id).removeClass('is-invalid');
    }

    calcularSubtotal(id);
    calcularTotales();
}






function eliminarFila(button) {
    // Obtener la fila padre del botón y eliminarla
    var row = $(button).closest('tr');
    row.remove();
    calcularTotales();
}

function calcularSubtotal(id) {
    var quantity = parseInt($('#quantity-' + id).val());
    var price = parseFloat($('#productsSales tbody tr[data-id="' + id + '"] .price').text());
    var subtotal = quantity * price;

    // Actualizar el subtotal en la fila correspondiente
    $('#productsSales tbody tr[data-id="' + id + '"] .subtotal').text(redondear(subtotal).toFixed(2));
}

function calcularTotales() {



    var subTotalVenta = 0;

    // Iterar sobre las filas de la tabla #productsSales
    $('#productsSales tbody tr').each(function () {
        var subtotal = parseFloat($(this).find('.subtotal').text());
        subTotalVenta += subtotal;
    });

    var ivaVenta = subTotalVenta * 0.13; // Suponiendo que el IVA es del 13%
    var totalVenta = subTotalVenta + ivaVenta;

    // Actualizar los valores en los campos de entrada correspondientes
    $('#subTotalsales').val(redondear(subTotalVenta).toFixed(2));
    $('#ivasales').val(redondear(ivaVenta).toFixed(2));
    $('#totalsales').val(redondear(totalVenta).toFixed(2));
}

// Función para redondear según las reglas de Costa Rica
function redondear(numero) {
    // Redondear al múltiplo de 5 más cercano
    return Math.round(numero / 5) * 5;
}


$("#addSales").click(function () {
    // Recopilar datos de los campos de entrada
    var subTotal = parseFloat($('#subTotalsales').val());
    var iva = parseFloat($('#ivasales').val());
    var total = parseFloat($('#totalsales').val());
    var cliente = $('#clientSelect').val();

    // Crear un array para almacenar los detalles de la venta
    var detallesVenta = [];

    // Iterar sobre las filas de la tabla #productsSales
    $('#productsSales tbody tr').each(function () {
        var idProducto = $(this).data('id');
        var cantidadVendida = parseInt($(this).find('.quantity-input').val());
        var precioUnitario = parseFloat($(this).find('.price').text());
        var subtotalDetalle = parseFloat($(this).find('.subtotal').text());
        var nombreProducto = $(this).find('.product-name').text(); // Obtener el texto del nombre del producto

        // Agregar detalle al array
        detallesVenta.push({
            idProducto: idProducto,
            cantidadVendida: cantidadVendida,
            precioUnitario: precioUnitario,
            subtotalDetalle: subtotalDetalle,
            nombreProducto: nombreProducto
        });
    });

    // Construir objeto con todos los datos
    var datosVenta = {
        cliente: cliente,
        subTotal: subTotal,
        iva: iva,
        total: total,
        detallesVenta: detallesVenta
    };

    $('#cargandoModal').modal('show');
    $.ajax({
        url: './index.php?controlador=Sales&accion=Insert',
        method: 'POST',
        dataType: 'json',
        data: datosVenta,
        success: function (data) {
            $('#cargandoModal').modal('hide');
            if (data == true) {
                Swal.fire({
                    icon: "success",
                    title: "¡Factura generada correctamente!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });

            } else {
                Swal.fire({
                    icon: "danger",
                    title: "¡Factura no generada correctamente!",
                    showConfirmButton: true,
                    timer: 3500
                });
            }
        },
        error: function (xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
});



$(".getBill").click(function (){

    let id = $(this).data('id');

    $.ajax({
        url: './index.php?controlador=Sales&accion=getInformation',
        method: 'POST',
        data: {
            idSales:id
        },
        dataType: 'json',
        success: function (data) {
            if (data.length > 0) {
                var sales = data[0];

                $('#clientSelectView').val(sales.ID_CUSTOMER);
                $('#subTotalsalesView').val(sales.SUBTOTAL);
                $('#ivasalesView').val(sales.IVA);
                $('#totalsalesView').val(sales.TOTALSALE);
                $('#dateView').text(sales.SALEDATE);

                // Llenar la tabla con los productos
                var productsTable = $('#productsSalesView tbody');
                productsTable.empty(); // Limpiar el contenido existente

                data.forEach(function (product) {
                    var row = $('<tr>');
                    row.append($('<td>', {
                        html: '<img src="' + product.ProductImagePath + '" alt="' + product.ProductName + '" style="max-width: 50px; max-height: 50px;">'
                    }));
                    row.append($('<td>', {
                        text: product.ProductName
                    }));
                    row.append($('<td>', {
                        text: product.QUANTITYSOLD
                    }));
                    row.append($('<td>', {
                        text: product.UNITPRICE
                    }));
                    row.append($('<td>', {
                        text: product.SUBTOTALPRODUCT
                    }));

                    productsTable.append(row);
                });
            } else {
                console.error('No se recibieron datos válidos del servidor.');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
            console.log(xhr.responseText);
            console.log(xhr.status);
            console.log(xhr.statusText);
        }
    });
});














