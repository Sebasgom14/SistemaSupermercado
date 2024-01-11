$(document).ready(function() {
    // Captura el evento de entrada en el input de búsqueda
    $('#searchsInventory').on('input', function() {
        var searchTerm = $(this).val().toLowerCase(); // Obtiene el valor del input en minúsculas

        // Oculta todas las tarjetas
        $('.card').hide();

        // Filtra y muestra solo las tarjetas que coinciden con la búsqueda
        $('.card').filter(function() {
            var cardText = $(this).text().toLowerCase();
            return cardText.indexOf(searchTerm) !== -1;
        }).show();

        // Centra la tarjeta filtrada
        $('.card:visible').css('margin', '0 auto');
    });
    loadCheckCategory()
    loadCheckProveedor()
});


function loadCheckCategory() {
    $.ajax({
        url: './index.php?controlador=Category&accion=Todos',
        method: 'POST',
        dataType: 'json',
        success: function (data) {
            // Obtén la referencia al contenedor donde agregarás los elementos
            var checkCategoryContainer = $('#checkCategory');

            // Limpia el contenido actual del contenedor
            checkCategoryContainer.empty();

            // Itera sobre los datos y agrega los elementos al contenedor
            data.forEach(function (item) {
                // Crea el elemento HTML
                var checkboxDiv = $('<div>').addClass('form-check mt-2 ms-2');
                var checkboxInput = $('<input>').addClass('form-check-input checkbox-filtro').attr('type', 'checkbox').val(item.id).attr('id', 'flexCheckDefault_' + item.id);
                var checkboxLabel = $('<label>').addClass('form-check-label').attr('for', 'flexCheckDefault_' + item.id).text(item.nombre);

                // Agrega el elemento al contenedor
                checkboxDiv.append(checkboxInput, checkboxLabel);
                checkCategoryContainer.append(checkboxDiv);
            });
        },
        error: function (xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
}

function loadCheckProveedor() {
    $.ajax({
        url: './index.php?controlador=Supplier&accion=Todos',
        method: 'POST',
        dataType: 'json',
        success: function (data) {
            // Obtén la referencia al contenedor donde agregarás los elementos
            var checkProveedorContainer = $('#checkProveedor');

            // Limpia el contenido actual del contenedor
            checkProveedorContainer.empty();

            // Itera sobre los datos y agrega los elementos al contenedor
            data.forEach(function (item) {
                // Crea el elemento HTML
                var checkboxDiv = $('<div>').addClass('form-check mt-2 ms-2');
                var checkboxInput = $('<input>').addClass('form-check-input checkbox-filtro-proveddor').attr('type', 'checkbox').val(item.id).attr('id', 'flexCheckDefault_' + item.id);
                var checkboxLabel = $('<label>').addClass('form-check-label').attr('for', 'flexCheckDefault_' + item.id).text(item.nombre);

                // Agrega el elemento al contenedor
                checkboxDiv.append(checkboxInput, checkboxLabel);
                checkProveedorContainer.append(checkboxDiv);
            });
        },
        error: function (xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
}




// Delega el evento change al contenedor #checkCategory
$('#checkCategory').on('change', '.checkbox-filtro', function () {
    // Obtiene el valor del atributo 'value' del checkbox
    var checkboxValue = $(this).val();

    $('#cargandoModal').modal('show');
    $.ajax({
        url: './index.php?controlador=Inventory&accion=searchbyId',
        method: 'POST',
        data: {idCategory: checkboxValue},
        dataType: 'json',
        success: function (inventoryData) {
            var inventoryListContainer = $('#inventoryList');
            $('#cargandoModal').modal('hide');
            // Limpia el contenido actual del contenedor
            inventoryListContainer.empty();

            // Verifica si hay productos
            if (inventoryData.length > 0) {
                // Itera sobre los datos y agrega los elementos al contenedor
                inventoryData.forEach(function (item) {
                    // Crea el elemento HTML
                    var cardDiv = $('<div>').addClass('col-4 mb-3');
                    var card = $('<div>').addClass('card');
                    var cardImg = $('<img>').attr('src', item.imagen).addClass('card-img-top img-fluid').attr('alt', item.nombreProducto);
                    var cardBody = $('<div>').addClass('card-body');
                    var cardTitle = $('<h5>').addClass('card-title').text(item.nombreProducto);
                    var cardQuantity = $('<p>').addClass('card-text').text('Cantidad: ' + item.cantidadProduct);
                    var cardCategory = $('<p>').addClass('card-text').text('Categoria: ' + item.categoria);
                    var cardProvider = $('<p>').addClass('card-text').text('Proveedor: ' + item.proveedor);
                    var cardPrice = $('<p>').addClass('card-text').text('Precio: ' + item.precio);

                    // Agrega los elementos al contenedor
                    cardBody.append(cardTitle, cardQuantity, cardCategory, cardProvider, cardPrice);
                    card.append(cardImg, cardBody);
                    cardDiv.append(card);
                    inventoryListContainer.append(cardDiv);
                });
            } else {
                // Agrega un mensaje indicando que no se encontraron productos
                inventoryListContainer.html('<p>Sin productos encontrados</p>');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
});


// Delega el evento change al contenedor #checkCategory
$('#checkProveedor').on('change', '.checkbox-filtro-proveddor', function () {
    // Obtiene el valor del atributo 'value' del checkbox
    var checkboxValue = $(this).val();

    $('#cargandoModal').modal('show');
    $.ajax({
        url: './index.php?controlador=Inventory&accion=searchbyIdProveedor',
        method: 'POST',
        data: {idCategory: checkboxValue},
        dataType: 'json',
        success: function (inventoryData) {
            var inventoryListContainer = $('#inventoryList');
            $('#cargandoModal').modal('hide');
            // Limpia el contenido actual del contenedor
            inventoryListContainer.empty();

            // Verifica si hay productos
            if (inventoryData.length > 0) {
                // Itera sobre los datos y agrega los elementos al contenedor
                inventoryData.forEach(function (item) {
                    // Crea el elemento HTML
                    var cardDiv = $('<div>').addClass('col-4 mb-3');
                    var card = $('<div>').addClass('card');
                    var cardImg = $('<img>').attr('src', item.imagen).addClass('card-img-top img-fluid').attr('alt', item.nombreProducto);
                    var cardBody = $('<div>').addClass('card-body');
                    var cardTitle = $('<h5>').addClass('card-title').text(item.nombreProducto);
                    var cardQuantity = $('<p>').addClass('card-text').text('Cantidad: ' + item.cantidadProduct);
                    var cardCategory = $('<p>').addClass('card-text').text('Categoria: ' + item.categoria);
                    var cardProvider = $('<p>').addClass('card-text').text('Proveedor: ' + item.proveedor);
                    var cardPrice = $('<p>').addClass('card-text').text('Precio: ' + item.precio);

                    // Agrega los elementos al contenedor
                    cardBody.append(cardTitle, cardQuantity, cardCategory, cardProvider, cardPrice);
                    card.append(cardImg, cardBody);
                    cardDiv.append(card);
                    inventoryListContainer.append(cardDiv);
                });
            } else {
                // Agrega un mensaje indicando que no se encontraron productos
                inventoryListContainer.html('<p>Sin productos encontrados</p>');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
});







