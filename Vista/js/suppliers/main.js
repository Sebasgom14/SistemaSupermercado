$(document).ready(function() {
    var dtableProduct = $('#supplierTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
        },
        "theme": "bootstrap",
    });

});

$("#addProveedor").click(function (e) {
    e.preventDefault();  // Evitar el comportamiento predeterminado del formulario

    let formData = new FormData();
    formData.append('nameProveedor', $("#nameProveedor").val());
    formData.append('contactoProveedor', $("#contactProveedor").val());
    formData.append('phoneProveedor', $("#phoneProveedor").val());
    formData.append('emailProveedor', $("#emailProveedor").val());
    formData.append('imageProduct', $('#imageSupplier')[0].files[0]);

    $.ajax({
        url: './index.php?controlador=Supplier&accion=insert',
        method: 'POST',
        data: formData,
        dataType: 'json',
        contentType: false,  // Indicar que no se debe configurar el tipo de contenido
        processData: false,  // Indicar que no se deben procesar los datos
        success: function (data) {
            if (data == true) {
                Swal.fire({
                    icon: "success",
                    title: "¡Registro exitoso del proveedor!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
                $('#newProveedor').modal('hide');
            } else {
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
        url: './index.php?controlador=Supplier&accion=getInformation',
        method: 'POST',
        data: {
            idProveedor:id
        },
        dataType: 'json',
        success: function (data) {
            if (data.length > 0) {
                var proveedor = data[0];

                $('#idProveedorView').val(proveedor.id);
                $('#nameProveedorView').val(proveedor.nombreProveedor);
                $('#contactProveedorView').val(proveedor.contactProveedor);
                $('#phoneProveedorView').val(proveedor.phoneProveedor);
                $('#emailProveedorView').val(proveedor.emailProveedor);
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

$("#editProveedor").click(function (){

    let idProveedor = $("#idProveedorView").val(); // Corregir el ID del campo
    let nombreProveedor = $("#nameProveedorView").val();
    let contactProveedor = $("#contactProveedorView").val();
    let phoneProveedor = $("#phoneProveedorView").val();
    let correoProveedor = $("#emailProveedorView").val();

    var data = {
        idProveedor: idProveedor,
        nameProveedor: nombreProveedor,
        contactoProveedor: contactProveedor,
        emailProveedor: correoProveedor,
        phoneProveedor: phoneProveedor
    };


    $.ajax({
        url: './index.php?controlador=Supplier&accion=update',
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
    $("#idDeleteProveedor").val(id)
});


$("#desactivarProveedor").click(function (){
    let id =  $("#idDeleteProveedor").val()

    $.ajax({
        url: './index.php?controlador=Supplier&accion=delete',
        method: 'POST',
        data:{idProveedor:id} ,
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
                $('#deleteProveedor').modal('hide');
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

$("#imageSupplier").change(function() {

    readURL(this);
});

function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();
        $('#previewImage').removeClass('d-none');

        reader.onload = function(e) {
            $('#previewImage').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
