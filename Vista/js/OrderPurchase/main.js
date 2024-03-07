$(document).ready(function () {
    selectEstade()
    selectSupplier()
    date()
    getData();



});


function getData() {
    // Llamada a la función selectEstade para cargar las opciones del select

    $('#listOrderPurchase').empty();
    $.ajax({
        url: './index.php?controlador=OrderP&accion=getInformation',
        method: 'POST',
        dataType: 'json',
        success: function (data) {
            var listOrderPurchase = $('#listOrderPurchase');

            data.forEach(function (order) {
                // Verificar si la imagen es null y usar la ruta predeterminada si es el caso
               // $('#viewEstadeSelect').val(order.ID_Estade);
                var imagePath = order.IMAGE_PATH ? order.IMAGE_PATH : './Vista/filesRepository/SupplierImages/DefaultSuplier.png';
                var cardHtml = '<div class="card mb-3">' +
                    '<div class="card-body">' +
                    '<div class="row ">' +
                    '<div class="col-md-2 text-center">' +
                    '<img src="' + imagePath + '" class="img-fluid rounded-start" alt="...">' +
                    '</div>' +
                    '<div class="col-md-10">' +
                    '<div class="row">' +
                    '<div class="col-6 mb-3">' +
                    '<p class="card-title small">Orden #' + order.ID_OrdersPurchase + '</p>' +
                    '<h6 class="card-title">Proveedor: ' + order.COMPANYNAME + '</h6>' +
                    '</div>' +
                    '<div class="col-6 mb-3">' +
                    '<h6 class="card-title text-end">' + order.OrderDate + '</h6>' +
                    '</div>' +
                    '<div class="col-12 mb-3">' +
                    '<select class="form-select" aria-label="Default select example" id="viewEstadeSelect" >' +
                    '<option value="1" ' + (order.ID_Estade == 1 ? 'selected' : '') +'>En proceso</option>' +
                    '<option value="2" ' + (order.ID_Estade == 2 ? 'selected' : '') +'>Aprobada</option>' +
                    '<option value="3" ' + (order.ID_Estade == 3 ? 'selected' : '') +'>Rechazada</option>' +
                    '<option value="4" ' + (order.ID_Estade == 4 ? 'selected' : '') +'>En Revision</option>' +
                    '<option value="5" ' + (order.ID_Estade == 5 ? 'selected' : '') +'>Completada</option>' +
                    '<option value="6" ' + (order.ID_Estade == 6 ? 'selected' : '') +'>Pendiente de Pago</option>' +
                    '<option value="7" ' + (order.ID_Estade == 7? 'selected' : '') +'>Entregada</option>' +
                    '<option value="8" ' + (order.ID_Estade == 8 ? 'selected' : '') +'>Cancelada</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-6">' +
                    '<div class="d-grid gap-2">' +
                    '<button type="button" class="btn btn-outline-success getOrden" data-id="' +order.ID_OrdersPurchase+'" data-bs-toggle="modal" data-bs-target="#viewOrderPurchase"><i class="fa-solid fa-eye"></i></button>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-6 ">' +
                    '<div class="d-grid gap-2">' +
                    '<button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#viewpdf" onclick="viewPDF(\'' + order.PDF_PATH + '\')"><i class="fa-solid fa-file-pdf"></i></button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

                // Agregar el HTML al contenedor
                listOrderPurchase.append(cardHtml);
            });
        },
        error: function (xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
}

function ValidateTable(){
    var tabla = $('#productSupplier');

// Verificar si la tabla tiene al menos una fila
    if (tabla.find('tbody tr').length > 0) {
        $('#createOrder').prop('disabled', false);
    } else {
        $('#createOrder').prop('disabled', true);
    }
}

function date() {
    var fechaActual = new Date();
    var fechaFormateada = fechaActual.toISOString().split('T')[0];
    $('#dateOrder').val(fechaFormateada);
    $('#filterDate').attr('max', fechaFormateada);
}


function selectEstade() {
    $.ajax({
        url: './index.php?controlador=Estade&accion=Todos',
        method: 'POST',
        dataType: 'json',
        success: function (data) {
            // Limpia las opciones actuales de ambos selects
            $('#estadeSelect, #viewEstadeSelect').empty();

            // Agrega la opción por defecto a ambos selects
            $('#estadeSelect, #viewEstadeSelect').append('<option selected>Seleccione la sección</option>');

            // Itera sobre los datos y agrega las opciones a ambos selects
            data.forEach(function (item) {
                $('#estadeSelect, #viewEstadeSelect').append('<option value="' + item.id + '">' + item.nombre + '</option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
}


function selectSupplier(){
    $.ajax({
        url: './index.php?controlador=Supplier&accion=Todos',
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            // Limpia las opciones actuales del select
            $('#proveedorSelect').empty();

            // Agrega la opción por defecto
            $('#proveedorSelect').append('<option selected>Seleccione la seccion</option>');


            $('#proveedorSelectView').empty();

            // Agrega la opción por defecto
            $('#proveedorSelectView').append('<option selected>Seleccione la seccion</option>');

            // Itera sobre los datos y agrega las opciones al select
            data.forEach(function(item) {
                $('#proveedorSelect').append('<option value="' + item.id + '">' + item.nombre + '</option>');
            });

            data.forEach(function(item) {
                $('#proveedorSelectView').append('<option value="' + item.id + '">' + item.nombre + '</option>');
            });

        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
}

$('#proveedorSelect').change(function () {
    // Obtener el valor seleccionado del proveedor
    var selectedProvider = $(this).val();

    // Verificar si se seleccionó un proveedor
    if (selectedProvider) {
        // Realizar la solicitud AJAX para obtener los datos relacionados con el proveedor
        $.ajax({
            url: './index.php?controlador=Inventory&accion=searchbyIdProveedor',
            method: 'POST',
            data: { idCategory: selectedProvider },
            dataType: 'json',
            success: function (productData) {
                // Llamar a una función para mostrar los datos en la tabla
                displayProductTable(productData);
            },
            error: function (xhr, status, error) {
                console.error('Error en la solicitud AJAX:', status, error);
            }
        });
    } else {
        // Si no se seleccionó un proveedor, mostrar un mensaje o limpiar la tabla
        displayNoDataMessage();
    }
});

function displayProductTable(productData) {
    var productTableBody = $('#productSupplier tbody');
    // Limpiar la tabla antes de agregar nuevos datos
    productTableBody.empty();

    if (productData.length > 0) {
        // Iterar sobre los datos y agregar filas a la tabla
        productData.forEach(function (product) {
            var row = `<tr data-id="${product.idProduct}">` +
                `<td><img src="${product.imagen}" alt="${product.nombreProducto}" style="width: 50px; height: 50px;"></td>` +
                `<td>${product.nombreProducto}</td>` +
                `<td><input type="number" class="form-control" value="1" ></td>` +
                `<td><button class="btn btn-danger" onclick="deleteProduct(this)">Eliminar</button></td>` +
                '</tr>';

            // Agregar la fila a la tabla
            productTableBody.append(row);
        });
        ValidateTable();
    } else {
        // Si no hay datos, mostrar un mensaje o limpiar la tabla
        displayNoDataMessage();
    }
}


function displayNoDataMessage() {
    var productTableBody = $('#productSupplier tbody');
    // Limpiar la tabla antes de agregar un mensaje
    productTableBody.empty();
    // Agregar un mensaje indicando que no hay datos
    productTableBody.html('<tr><td colspan="4">Sin datos disponibles</td></tr>');
}

function deleteProduct(button) {
    // Obtener la fila actual que contiene el botón presionado
    var row = $(button).closest('tr');

    // Eliminar la fila de la tabla
    row.remove();
    ValidateTable()
}

$("#createOrder").click(function () {
    // Recopilar datos de los campos de entrada
    var proveedor = $('#proveedorSelect').val();

    // Crear un array para almacenar los detalles de la orden de compra
    var detallesOrden = [];

    // Iterar sobre las filas de la tabla #productSupplier
    $('#productSupplier tbody tr').each(function () {
        var idProducto = $(this).data('id');
        var cantidad = parseInt($(this).find('input').val()); // Corregir el nombre de la variable
        var nombreProducto = $(this).find('td:eq(1)').text(); // Obtener el texto del nombre del producto

        // Agregar detalle al array
        detallesOrden.push({
            idProducto: idProducto,
            cantidad: cantidad, // Corregir el nombre de la variable
            nombreProducto: nombreProducto
        });
    });

    // Construir objeto con todos los datos
    var datosOrden = {
        proveedor: proveedor,
        detallesOrden: detallesOrden
    };

    $('#cargandoModal').modal('show');
    $.ajax({
        url: './index.php?controlador=OrderP&accion=Insert',
        method: 'POST',
        dataType: 'json',
        contentType: 'application/json', // Establecer el tipo de contenido como JSON
        data: JSON.stringify(datosOrden), // Convertir el objeto a JSON
        success: function (data) {
            $('#newOrderPurchase').modal('hide');
            $('#cargandoModal').modal('hide');
            if (data == true) {
                Swal.fire({
                    icon: "success",
                    title: "¡Orden generada correctamente!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    getData();
                });

            } else {
                Swal.fire({
                    icon: "danger",
                    title: "¡Orden no generada correctamente!",
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

function viewPDF(pdfPath) {
    var modalBody = $('#viewpdf .modal-body');

    // Limpiar el contenido anterior
    modalBody.empty();

    // Agregar un iframe para mostrar el PDF
    var iframe = '<iframe src="' + pdfPath + '" style="width: 100%; height: 500px;"></iframe>';
    modalBody.append(iframe);

    // Actualizar el enlace de descarga
    $('#downloadPDF').attr('href', pdfPath);
}

$('#filterDate').on('change', function () {
    // Obtiene el valor de la fecha seleccionada
    var fechaSeleccionada = $(this).val();


    $.ajax({
        url: './index.php?controlador=OrderP&accion=getInformationbydate',
        data:{date:fechaSeleccionada},
        method: 'POST',
        dataType: 'json',
        success: function (data) {
            var listOrderPurchase = $('#listOrderPurchase');

            if (data.length > 0) {
                $('#listOrderPurchase').empty();
                data.forEach(function (order) {
                    var imagePath = order.IMAGE_PATH ? order.IMAGE_PATH : './Vista/filesRepository/SupplierImages/DefaultSuplier.png';
                    var cardHtml = '<div class="card mb-3">' +
                        '<div class="card-body">' +
                        '<div class="row ">' +
                        '<div class="col-md-2 text-center">' +
                        '<img src="' + imagePath + '" class="img-fluid rounded-start" alt="...">' +
                        '</div>' +
                        '<div class="col-md-10">' +
                        '<div class="row">' +
                        '<div class="col-6 mb-3">' +
                        '<p class="card-title small">Orden #' + order.ID_OrdersPurchase + '</p>' +
                        '<h6 class="card-title">Proveedor: ' + order.COMPANYNAME + '</h6>' +
                        '</div>' +
                        '<div class="col-6 mb-3">' +
                        '<h6 class="card-title text-end">' + order.OrderDate + '</h6>' +
                        '</div>' +
                        '<div class="col-12 mb-3">' +
                        '<select class="form-select" aria-label="Default select example" id="viewEstadeSelect" >' +
                        '<option value="1" ' + (order.ID_Estade == 1 ? 'selected' : '') +'>En proceso</option>' +
                        '<option value="2" ' + (order.ID_Estade == 2 ? 'selected' : '') +'>Aprobada</option>' +
                        '<option value="3" ' + (order.ID_Estade == 3 ? 'selected' : '') +'>Rechazada</option>' +
                        '<option value="4" ' + (order.ID_Estade == 4 ? 'selected' : '') +'>En Revision</option>' +
                        '<option value="5" ' + (order.ID_Estade == 5 ? 'selected' : '') +'>Completada</option>' +
                        '<option value="6" ' + (order.ID_Estade == 6 ? 'selected' : '') +'>Pendiente de Pago</option>' +
                        '<option value="7" ' + (order.ID_Estade == 7? 'selected' : '') +'>Entregada</option>' +
                        '<option value="8" ' + (order.ID_Estade == 8 ? 'selected' : '') +'>Cancelada</option>' +
                        '</select>' +
                        '</div>' +
                        '<div class="col-6">' +
                        '<div class="d-grid gap-2">' +
                        '<button type="button" class="btn btn-outline-success getOrden" data-id="' +order.ID_OrdersPurchase+'" data-bs-toggle="modal" data-bs-target="#viewOrderPurchase"><i class="fa-solid fa-eye"></i></button>' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-6 ">' +
                        '<div class="d-grid gap-2">' +
                        '<button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#viewpdf" onclick="viewPDF(\'' + order.PDF_PATH + '\')"><i class="fa-solid fa-file-pdf"></i></button>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';

                    // Agregar el HTML al contenedor
                    listOrderPurchase.append(cardHtml);
                });
            }else{
                Swal.fire({
                    icon: 'info',
                    title: 'Sin datos encontrados',
                    showConfirmButton: false,
                    timer: 1500 // Duración de la alerta en milisegundos
                }).then(function () {
                    // Llama a la función getData después de mostrar la alerta
                    getData();
                });
            }



        },
        error: function (xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });



});

$('body').on('click', '.getOrden', function () {
    let orderId = $(this).data('id');
    $.ajax({
        url: './index.php?controlador=OrderP&accion=getallinformation',
        data: {
            orderId: orderId
        },
        method: 'post',
        dataType: 'json',
        success: function (data) {
            // Verificar si se recibieron datos
            if (data.length > 0) {
                var order = data[0]; // Supongo que solo hay un pedido en la respuesta

                // Llenar el select de proveedores
                $('#proveedorSelectView').empty();
                $('#proveedorSelectView').append('<option value="' + order.ID_Suppliers + '">' + order.SupplierCompanyName + '</option>');

                // Llenar la fecha de creación
                $('#dateOrderView').val(order.OrderDate);

                // Llenar la tabla de productos
                var productTable = $('#productSupplierView tbody');
                productTable.empty();

                var productHtml = '<tr>' +
                    '<td><img src="' + order.ProductImagePath + '"  class="img-fluid text-center"  style="max-width: 100px; max-height: 100px;"></td>' +
                    '<td class="text-center">' + order.ProductName + '</td>' +
                    '<td class="text-center">' + order.Amount + '</td>' +
                    '</tr>';

                productTable.append(productHtml);
            } else {
                // Si no hay datos, mostrar una alerta
                Swal.fire({
                    icon: "info",
                    title: "Sin datos encontrados",
                    showConfirmButton: true,
                    timer: 3500
                });
            }
        },
        error: function (xhr, status, error) {
            console.error('Error en la solicitud AJAX:', error);
        }
    });

});

