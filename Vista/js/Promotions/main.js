$(document).ready(function() {
    var dtableProduct = $('#PromotionsTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
        },
        "theme": "bootstrap",
    });
    selectType()
    selectProduct()
    selectPromotions()
});

function showContent(contentId) {
    // Oculta todos los contenidos
    document.getElementById('newPromotion').style.display = 'none';
    document.getElementById('addPromotionsProduct').style.display = 'none';

    // Muestra el contenido específico según la opción seleccionada
    document.getElementById(contentId).style.display = 'block';
}
$('#newPromotionsItem').on('click', function() {
    $(this).addClass('active');
    $("#addPromotionsProductItem").removeClass('active');
});

$('#addPromotionsProductItem').on('click', function() {
    $(this).addClass('active');
    $("#newPromotionsItem").removeClass('active');
});

flatpickr("#starDate", {
    dateFormat: "Y-m-d",
    minDate: "today",  // No permitir fechas anteriores a hoy
});

flatpickr("#endDate", {
    dateFormat: "Y-m-d",
    minDate: "today",  // No permitir fechas anteriores a hoy
    defaultDate: "tomorrow"
});


flatpickr("#starDateView", {
    dateFormat: "Y-m-d",
    minDate: "today",  // No permitir fechas anteriores a hoy
});

flatpickr("#endDateView", {
    dateFormat: "Y-m-d",
    minDate: "today",  // No permitir fechas anteriores a hoy
    defaultDate: "tomorrow"
});



function selectProduct(){
    $.ajax({
        url: './index.php?controlador=Products&accion=Todos',
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            // Limpia las opciones actuales del select
            $('#ProductSelect').empty();

            // Agrega la opción por defecto
            $('#ProductSelect').append('<option selected>Seleccione la seccion</option>');

            // Itera sobre los datos y agrega las opciones al select
            data.forEach(function(item) {
                $('#ProductSelect').append('<option value="' + item.id + '">' + item.nombre + '</option>');
            });


        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
}

function selectPromotions(){
    $.ajax({
        url: './index.php?controlador=Promotions&accion=Todos',
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            // Limpia las opciones actuales del select
            $('#PromotionSelect').empty();

            // Agrega la opción por defecto
            $('#PromotionSelect').append('<option selected>Seleccione la seccion</option>');

            // Itera sobre los datos y agrega las opciones al select
            data.forEach(function(item) {
                $('#PromotionSelect').append('<option value="' + item.id + '">' + item.nombre + '</option>');
            });


        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
}



function selectType(){
    $.ajax({
        url: './index.php?controlador=TypePromotions&accion=Todos',
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            // Limpia las opciones actuales del select
            $('#typeSelect').empty();

            // Agrega la opción por defecto
            $('#typeSelect').append('<option selected>Seleccione el tipo de promocion</option>');


            $('#typeSelectView').empty();

            // Agrega la opción por defecto
            $('#typeSelectView').append('<option selected>Seleccione el tipo de promocion</option>');

            // Itera sobre los datos y agrega las opciones al select
            data.forEach(function(item) {
                $('#typeSelect').append('<option value="' + item.id + '">' + item.nombre + '</option>');
            });

            data.forEach(function(item) {
                $('#typeSelectView').append('<option value="' + item.id + '">' + item.nombre + '</option>');
            });

        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
}

$("#addPromotions").click(function (){
    let namePromotions = $("#namePromotions").val();
    let typePromotions = $("#typeSelect").val();
    let discount = $("#discount").val();
    let minimo = $("#minimumQuantity").val();
    let max = $("#max").val();
    let starDate = $("#starDate").val();
    let endDate = $("#endDate").val();


    var data = {
        namePromotions: namePromotions,
        TypePromotions: typePromotions,
        Discount: discount,
        minimum: minimo,
        starDate: starDate,
        endDate: endDate,
        max:max
    };

    $.ajax({
        url: './index.php?controlador=Promotions&accion=insert',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if(data==true){
                Swal.fire({
                    icon: "success",
                    title: "¡Registro exitoso del nuevo tipo de promocion!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
            }else{
                Swal.fire({
                    icon: "danger",
                    title: "¡Registro no exitoso del nuevo tipo de promocion!",
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

$(".edit").click(function (){
    let id = $(this).data('id');
    $.ajax({
        url: './index.php?controlador=Promotions&accion=getInformation',
        method: 'POST',
        dataType: 'json',
        data:
            {
                idPromotions:id
            },
        success: function(data) {
            // Verifica si hay al menos un elemento en la respuesta
            if (data.length > 0) {
                var promocion = data[0];

                $('#idPromotionsView').val(promocion.id);
                // Llena los campos del modal con los datos recibidos
                $('#namePromotionsView').val(promocion.nombrePromotions);
                $('#discountView').val(promocion.discount);
                $('#typeSelectView').val(promocion.typePromotions);
                $('#minimumQuantityView').val(promocion.minimumQuantity);
                $('#maxView').val(promocion.maxQuantity);
                $('#starDateView').val(promocion.starDate);
                $('#endDateView').val(promocion.endDate);
            } else {
                console.error('No se recibieron datos válidos del servidor.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
});

$("#UpdatePromotions").click(function (){
    let id =  $("#idPromotionsView").val();
    let namePromotions = $("#namePromotionsView").val();
    let typePromotions = $("#typeSelectView").val();
    let discount = $("#discountView").val();
    let minimo = $("#minimumQuantityView").val();
    let max = $("#maxView").val();
    let starDate = $("#starDateView").val();
    let endDate = $("#endDateView").val();


    var data = {
        idPromotions: id,
        namePromotions: namePromotions,
        TypePromotions: typePromotions,
        Discount: discount,
        minimum: minimo,
        starDate: starDate,
        endDate: endDate,
        max: max,
    };

    $.ajax({
        url: './index.php?controlador=Promotions&accion=update',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if(data==true){
                Swal.fire({
                    icon: "success",
                    title: "¡Actualizacion exitoso de la promocion!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
            }else{
                Swal.fire({
                    icon: "danger",
                    title: "¡Actualizacion no exitoso de la promocion!",
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

$(".delete").click(function (){
    let id = $(this).data('id');
    $('#idDeleteView').val(id);
});

$("#deletePromotionsButton").click(function (){
    let id=  $('#idDeleteView').val();
    $.ajax({
        url: './index.php?controlador=Promotions&accion=delete',
        method: 'POST',
        data:{idPromotions:id} ,
        dataType: 'json',
        success: function (data) {
            if (data == true) {
                Swal.fire({
                    icon: "success",
                    title: "¡Eliminacion exitosa de la promocion!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
                $('#deleteProducts').modal('hide');
            } else {
                Swal.fire({
                    icon: "danger",
                    title: "¡Eliminacion no exitosa de la promocion!",
                    showConfirmButton: true,
                    timer: 3500
                });
            }
        },
        error: function (xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
            // Añade estas líneas para ver el contenido de la respuesta
            console.log(xhr.responseText);
            console.log(xhr.status);
            console.log(xhr.statusText);
        }
    });
});


$("#addProductoPromotions").click(function (){
    let idProduct = $("#ProductSelect").val();
    let idPromotions = $("#PromotionSelect").val();


    var data = {
        ProductId: idProduct,
        PromotionId: idPromotions,
    };

    $.ajax({
        url: './index.php?controlador=Promotions&accion=InsertPromotionProduct',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if(data==true){
                Swal.fire({
                    icon: "success",
                    title: "¡Registro exitoso!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
            }else{
                Swal.fire({
                    icon: "danger",
                    title: "¡Registro no exitoso!",
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