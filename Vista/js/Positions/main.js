$(document).ready(function() {
    var dtableProduct = $('#positionsTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
        },
        "theme": "bootstrap",
    });

});


$("#addPosition").click(function (){
    let nombrePosition = $("#namePosition").val();
    let descriptionPosition = $("#descriptionPosition").val();

    var data = {
        namePosition: nombrePosition,
        descriptionPosition: descriptionPosition,
    };

    $.ajax({
        url: './index.php?controlador=EmployeePosition&accion=insert',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if(data==true){
                Swal.fire({
                    icon: "success",
                    title: "¡Registro exitoso del proveedor!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
                $('#newCategoria').modal('hide');;
            }else{
                Swal.fire({
                    icon: "danger",
                    title: "¡Registro no exitoso del proveedor!",
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
        url: './index.php?controlador=EmployeePosition&accion=getInformation',
        method: 'POST',
        data: {
            idPosition:id
        },
        dataType: 'json',
        success: function (data) {
            if (data.length > 0) {
                var posicion = data[0];

                $('#idPositionView').val(posicion.id);
                $('#namePositionView').val(posicion.nombrePosition);
                $('#descriptionPositionView').val(posicion.descriptionPosition);
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


$("#editPosition").click(function (){

    let idPositon = $("#idPositionView").val(); // Corregir el ID del campo
    let namePostion = $("#namePositionView").val();
    let descriptionPosition = $("#descriptionPositionView").val();

    var data = {
        idPosition: idPositon,
        namePosition: namePostion,
        descriptionPosition: descriptionPosition,
    };


    $.ajax({
        url: './index.php?controlador=EmployeePosition&accion=update',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if(data==true){
                Swal.fire({
                    icon: "success",
                    title: "¡Actualizacion exitoso del proveedor!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
                $('#newProveedor').modal('hide');;
            }else{
                Swal.fire({
                    icon: "danger",
                    title: "¡Actualizacionv no exitoso del proveedor!",
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
    $("#idDeletePosition").val(id)
});


$("#deletePosition").click(function (){
    let id =  $("#idDeletePosition").val()

    $.ajax({
        url: './index.php?controlador=EmployeePosition&accion=delete',
        method: 'POST',
        data:{idPosition:id} ,
        dataType: 'json',
        success: function (data) {
            if (data == true) {
                Swal.fire({
                    icon: "success",
                    title: "¡Eliminacion exitosa del producto!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: "danger",
                    title: "¡Eliminacion no exitosa del producto!",
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