$(document).ready(function() {
    var dtableProduct = $('#costumerTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
        },
        "theme": "bootstrap",
    });

});


$('#identification').on('keypress', function(e) {

    let cedula =   $('#identification').val();

    if (e.which === 13) {
        $('#load').removeClass('d-none');
        $.ajax({
            url: 'https://apis.gometa.org/cedulas/' + cedula,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#load').addClass('d-none');
                if (data.results && data.results.length > 0) {
                    var persona = data.results[0];

                    // Accede a las propiedades dentro de persona
                    $('#nombre').val(persona.firstname);
                    $('#apellidos').val(persona.lastname);
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
    }
});

$('#identificationView').on('keypress', function(e) {

    let cedula =   $('#identificationView').val();

    if (e.which === 13) {
        $('#loadEdit').removeClass('d-none');
        $.ajax({
            url: 'https://apis.gometa.org/cedulas/' + cedula,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#loadEdit').addClass('d-none');
                if (data.results && data.results.length > 0) {
                    var persona = data.results[0];

                    $('#nombreView').val(persona.firstname);
                    $('#apellidosView').val(persona.lastname);
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
    }
});


$("#addCliente").click(function (){
    let identification =  $("#identification").val();
    let name =  $("#nombre").val();
    let apellidos =  $("#apellidos").val();
    let phone =  $("#phoneNumber").val();
    let address =  $("#address").val();
    let correo =  $("#email").val();


    var data = {
        identification: identification,
        firstName: name,
        lastName: apellidos,
        address: address,
        phone: phone,
        email: correo,
    };

    $.ajax({
        url: './index.php?controlador=Costumers&accion=insert',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if(data==true){
                Swal.fire({
                    icon: "success",
                    title: "¡Registro exitoso del cliente!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
            }else{
                Swal.fire({
                    icon: "danger",
                    title: "¡Registro no exitoso del cliente!",
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
        url: './index.php?controlador=Costumers&accion=getInformation',
        method: 'POST',
        data: {
            idEmpleado:id
        },
        dataType: 'json',
        success: function (data) {
            if (data.length > 0) {
                var cliente = data[0];

                $("#idClienteView").val(cliente.id);
                $("#identificationView").val(cliente.identification);
                $("#nombreView").val(cliente.firstEmpleado);
                $("#apellidosView").val(cliente.lastEmpleado);
                $("#phoneNumberView").val(cliente.phone);
                $("#emailView").val(cliente.email);
                $("#addressView").val(cliente.address);
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

$("#editarCliente").click(function (){
    let id  =  $("#idClienteView").val();
    let identification =  $("#identificationView").val();
    let name =  $("#nombreView").val();
    let apellidos =  $("#apellidosView").val();
    let phone =  $("#phoneNumberView").val();
    let address =  $("#addressView").val();
    let correo =  $("#emailView").val();


    var data = {
        id:id,
        identification: identification,
        firstName: name,
        lastName: apellidos,
        address: address,
        phone: phone,
        email: correo,
    };

    $.ajax({
        url: './index.php?controlador=Costumers&accion=update',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if(data==true){
                Swal.fire({
                    icon: "success",
                    title: "¡Actualizacion exitoso del cliente!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
                $('#newCategoria').modal('hide');;
            }else{
                Swal.fire({
                    icon: "danger",
                    title: "¡Actualizacion no exitoso del cliente!",
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
    $("#idDeleteClienteView").val(id)
});






$("#desactivarCliente").click(function (){
    let id =  $("#idDeleteClienteView").val()

    $.ajax({
        url: './index.php?controlador=Costumers&accion=delete',
        method: 'POST',
        data:{
            id:id,
        } ,
        dataType: 'json',
        success: function (data) {
            if (data == true) {
                Swal.fire({
                    icon: "success",
                    title: "¡Eliminacion exitosa del cliente!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: "danger",
                    title: "¡Eliminacion no exitosa del cliente!",
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



