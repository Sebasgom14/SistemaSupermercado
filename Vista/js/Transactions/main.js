$(document).ready(function() {
    var dtableProduct = $('#transactionsTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
        },
        "theme": "bootstrap",
    });
    selectProduct()
    selectTransaction()
});

function selectProduct(){
    $.ajax({
        url: './index.php?controlador=Products&accion=Todos',
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            // Limpia las opciones actuales del select
            $('#productSelect').empty();

            // Agrega la opción por defecto
            $('#productSelect').append('<option selected>Seleccione la seccion</option>');

            // Itera sobre los datos y agrega las opciones al select
            data.forEach(function(item) {
                $('#productSelect').append('<option value="' + item.id + '">' + item.nombre + '</option>');
            });


        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
}

function selectTransaction(){
    $.ajax({
        url: './index.php?controlador=TransactionType&accion=Todos',
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            // Limpia las opciones actuales del select
            $('#typeTransactionSelect').empty();

            // Agrega la opción por defecto
            $('#typeTransactionSelect').append('<option selected>Seleccione la seccion</option>');

            // Itera sobre los datos y agrega las opciones al select
            data.forEach(function(item) {
                $('#typeTransactionSelect').append('<option value="' + item.id + '">' + item.nombre + '</option>');
            });


        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
}

$("#addTransaction").click(function (){
    let  quantity= $("#quantity").val();
    let type = $("#typeTransactionSelect").val();
    let product = $("#productSelect").val();

    var data = {
        product: product,
        transaction: type,
        quantity: quantity,
    };

    $.ajax({
        url: './index.php?controlador=InventoryTransactions&accion=insert',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if(data==true){
                Swal.fire({
                    icon: "success",
                    title: "¡Registro exitoso del movimiento!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });

            }else{
                Swal.fire({
                    icon: "danger",
                    title: "¡Registro no exitoso del movimiento!",
                    showConfirmButton: true,
                    timer: 3500
                });
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