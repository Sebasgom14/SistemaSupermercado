$(document).ready(function() {
   var ddtableProduct = $('#productTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
        },
        "theme": "bootstrap",
    });
    selectSupplier();
    selectCategory();
});


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


function selectCategory(){
    $.ajax({
        url: './index.php?controlador=Category&accion=Todos',
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            // Limpia las opciones actuales del select
            $('#categorySelect').empty();

            // Agrega la opción por defecto
            $('#categorySelect').append('<option selected>Seleccione la seccion</option>');


            $('#categorySelectView').empty();

            // Agrega la opción por defecto
            $('#categorySelectView').append('<option selected>Seleccione la seccion</option>');
            // Itera sobre los datos y agrega las opciones al select
            data.forEach(function(item) {
                $('#categorySelect').append('<option value="' + item.id + '">' + item.nombre + '</option>');
            });

            data.forEach(function(item) {
                $('#categorySelectView').append('<option value="' + item.id + '">' + item.nombre + '</option>');
            });

        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
}


$("#imageProduct").change(function() {
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


$("#plusProduct").click(function (){
    let formData = new FormData();
    formData.append('nombreP', $("#nameProduct").val());
    formData.append('descriccionP', $("#descriptionProduct").val());
    formData.append('precioP', $("#priceProduct").val());
    formData.append('categoriaP', $("#categorySelect").val());
    formData.append('proveedorP', $("#proveedorSelect").val());
    formData.append('imageProduct', $('#imageProduct')[0].files[0])

    $.ajax({
        url: './index.php?controlador=Products&accion=Insert',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(data) {
            if(data==true){
                Swal.fire({
                    icon: "success",
                    title: "¡Registro exitoso del producto!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
                $('#newProduct').modal('hide');;
            }else{
                Swal.fire({
                    icon: "danger",
                    title: "¡Registro no exitoso del producto!",
                    showConfirmButton: true,
                    timer: 3500
                });
            }

        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
});

$(".edit").click(function (){
    let id = $(this).data('id');
    $.ajax({
        url: './index.php?controlador=Products&accion=getInformation',
        method: 'POST',
        dataType: 'json',
        data:
            {
                idProduct:id
            },
        success: function(data) {
            // Verifica si hay al menos un elemento en la respuesta
            if (data.length > 0) {
                var producto = data[0];

                $('#idProductView').val(producto.id);
                // Llena los campos del modal con los datos recibidos
                $('#nameProductView').val(producto.nombreProduct);
                $('#descriptionProductView').val(producto.description);
                $('#priceProductView').val(producto.precio);
                $('#categorySelectView').val(producto.idcategoria);
                $('#proveedorSelectView').val(producto.idproveedor);
            } else {
                console.error('No se recibieron datos válidos del servidor.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
});

$("#editeProductButton").click(function () {
    let id = $('#idProductView').val();
    let nombre = $('#nameProductView').val();
    let description = $('#descriptionProductView').val();
    let precio = $('#priceProductView').val();
    let category = $('#categorySelectView').val();
    let proveedor = $('#proveedorSelectView').val();

    var data = {
        id: id,
        nombre: nombre,
        description: description,
        precio: precio,
        category: category,
        proveedor: proveedor
    };

    $.ajax({
        url: './index.php?controlador=Products&accion=update',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if (data == true) {
                Swal.fire({
                    icon: "success",
                    title: "¡Actualización exitosa del producto!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
                $('#editProduct').modal('hide');
            } else {
                Swal.fire({
                    icon: "danger",
                    title: "¡Actualización no exitosa del producto!",
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

$(".delete").click(function (){
    let id = $(this).data('id');
    $('#idDelete').val(id);
});

$("#deleteP").click(function (){
    let id=  $('#idDelete').val();
    $.ajax({
        url: './index.php?controlador=Products&accion=delete',
        method: 'POST',
        data:{idProduct:id} ,
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
                $('#deleteProducts').modal('hide');
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




