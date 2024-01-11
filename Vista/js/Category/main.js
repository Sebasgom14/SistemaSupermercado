$(document).ready(function() {
    var dtableProduct = $('#categoryTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
        },
        "theme": "bootstrap",
    });

});


$("#addCategory").click(function (){
    let nombreCategory = $("#nameCategoria").val();

    var data = {
        nameCategory: nombreCategory,
    };

    $.ajax({
        url: './index.php?controlador=Category&accion=insert',
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
        url: './index.php?controlador=Category&accion=getInformation',
        method: 'POST',
        data: {
            idCategory:id
        },
        dataType: 'json',
        success: function (data) {
            if (data.length > 0) {
                var categoria = data[0];

                $('#idCategoryView').val(categoria.id);
                $('#nameCategoriaView').val(categoria.nombreCategoria);
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


$("#editCategory").click(function (){

    let idCatgeory = $("#idCategoryView").val(); // Corregir el ID del campo
    let nameCategory = $("#nameCategoriaView").val();

    var data = {
        idCategory: idCatgeory,
        nameCategory: nameCategory,
    };


    $.ajax({
        url: './index.php?controlador=Category&accion=update',
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
    $("#idDeleteCategoryView").val(id)
});


$("#desactivarCategoria").click(function (){
    let id =  $("#idDeleteCategoryView").val()

    $.ajax({
        url: './index.php?controlador=Category&accion=delete',
        method: 'POST',
        data:{idCategory:id} ,
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