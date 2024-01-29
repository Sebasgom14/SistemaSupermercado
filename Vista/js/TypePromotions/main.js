$(document).ready(function() {
    var dtableProduct = $('#typeTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
        },
        "theme": "bootstrap",
    });

});

$("#addType").click(function (){
    let nombreTipo = $("#nameType").val();

    var data = {
        nameType: nombreTipo,
    };

    $.ajax({
        url: './index.php?controlador=TypePromotions&accion=insert',
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
        url: './index.php?controlador=TypePromotions&accion=getInformation',
        method: 'POST',
        data: {
            idTypeP:id
        },
        dataType: 'json',
        success: function (data) {
            if (data.length > 0) {
                var type = data[0];

                $('#idType').val(type.id);
                $('#nameTypeView').val(type.nombreTipo);
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

$("#updateType").click(function (){

    let idType = $("#idType").val(); // Corregir el ID del campo
    let nameType = $("#nameTypeView").val();

    var data = {
        idType: idType,
        nameType: nameType,
    };


    $.ajax({
        url: './index.php?controlador=TypePromotions&accion=update',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if(data==true){
                Swal.fire({
                    icon: "success",
                    title: "¡Actualizacion exitoso del tipo de promocion!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
                $('#newProveedor').modal('hide');;
            }else{
                Swal.fire({
                    icon: "danger",
                    title: "¡Actualizacion no exitoso del tipo de promocion!",
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
    $("#idDeleteTypeView").val(id)
});

$("#deleteType").click(function (){
    let id =  $("#idDeleteTypeView").val()

    $.ajax({
        url: './index.php?controlador=Category&accion=delete',
        method: 'POST',
        data:{idCategory:id} ,
        dataType: 'json',
        success: function (data) {
            if (data == true) {
                Swal.fire({
                    icon: "success",
                    title: "¡Eliminacion exitosa del tipo de promocion!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: "danger",
                    title: "¡Eliminacion no exitosa del tipo de promocion!",
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
