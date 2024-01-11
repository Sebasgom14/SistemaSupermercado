$(document).ready(function() {
    var dtableProduct = $('#employeeTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
        },
        "theme": "bootstrap",
    });
    selectPosition()
});

function selectPosition(){
    $.ajax({
        url: './index.php?controlador=EmployeePosition&accion=Todos',
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            // Limpia las opciones actuales del select
            $('#positionSelect').empty();

            // Agrega la opción por defecto
            $('#positionSelect').append('<option selected>Seleccione la posicion</option>');


            $('#positionSelectView').empty();

            // Agrega la opción por defecto
            $('#positionSelectView').append('<option selected>Seleccione la posicion</option>');

            // Itera sobre los datos y agrega las opciones al select
            data.forEach(function(item) {
                $('#positionSelect').append('<option value="' + item.id + '">' + item.nombre + '</option>');
            });

            data.forEach(function(item) {
                $('#positionSelectView').append('<option value="' + item.id + '">' + item.nombre + '</option>');
            });

        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
}

function generatePassword(length) {
    const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=";
    let password = "";
    for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * charset.length);
        password += charset.charAt(randomIndex);
    }
    return password;
}

// Manejador de eventos para el botón
$("#generatePassword").on("click", function() {
    const passwordLength = 8;
    const newPassword = generatePassword(passwordLength);
    $("#passEmployee").val(newPassword);
});

$("#GenerarEditPass").on("click", function() {
    const passwordLength = 8;
    const newPassword = generatePassword(passwordLength);
    $("#firstPass").val(newPassword);
    $("#CheckPassword").val(newPassword);
});

$("#addEmployee").click(function (){
    let firstName =  $("#nameEmployee").val();
    let lastName =  $("#ApellidoEmployee").val();
    let identification =  $("#IdentificationEmployee").val();
    let position =  $("#positionSelect").val();
    let salary =  $("#salaryEmployee").val();
    let hiringdate =  $("#dateEmployee").val();
    let pass =  $("#passEmployee").val();
    let email =  $("#emailEmployee").val();

    var data = {
        firstName: firstName,
        lastName: lastName,
        identification: identification,
        dateEmployee: hiringdate,
        passEmployee: pass,
        emailEmployee: email,
        salaryEmployee: salary,
        positionEmployee: position,
    };

    $.ajax({
        url: './index.php?controlador=Employees&accion=insert',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if(data==true){
                Swal.fire({
                    icon: "success",
                    title: "¡Registro exitoso del empleado!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
                $('#newCategoria').modal('hide');;
            }else{
                Swal.fire({
                    icon: "danger",
                    title: "¡Registro no exitoso del empleado!",
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
        url: './index.php?controlador=Employees&accion=getInformation',
        method: 'POST',
        data: {
            idEmployee:id
        },
        dataType: 'json',
        success: function (data) {
            if (data.length > 0) {
                var empleado = data[0];

                $("#idPass").val(empleado.id);
                $("#idEmployeeView").val(empleado.id);
                $("#nameEmployeeView").val(empleado.firstEmpleado);
                $("#ApellidoEmployeeView").val(empleado.lastEmpleado);
                $("#IdentificationEmployeeView").val(empleado.identification);
                $("#positionSelectView").val(empleado.position);
                $("#salaryEmployeeView").val(empleado.salary);
                $("#dateEmployeeView").val(empleado.hiringdate);
                $("#emailEmployeeView").val(empleado.email);

                
                if (empleado.estado==0) {
                    $("#butonActive").removeClass('d-none')
                }else{
                    $("#butonActive").addClass('d-none')
                }




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

$("#editEmployee").click(function (){
    let firstName =  $("#nameEmployeeView").val();
    let lastName =  $("#ApellidoEmployeeView").val();
    let identification =  $("#IdentificationEmployeeView").val();
    let position =  $("#positionSelectView").val();
    let salary =  $("#salaryEmployeeView").val();
    let hiringdate =  $("#dateEmployeeView").val();
    let id =  $("#idEmployeeView").val();
    let email =  $("#emailEmployeeView").val();

    var data = {
        firstName: firstName,
        lastName: lastName,
        identification: identification,
        dateEmployee: hiringdate,
        id: id,
        emailEmployee: email,
        salaryEmployee: salary,
        positionEmployee: position,
    };

    $.ajax({
        url: './index.php?controlador=Employees&accion=update',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if(data==true){
                Swal.fire({
                    icon: "success",
                    title: "¡Actualizacion exitoso del empleado!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
                $('#newCategoria').modal('hide');;
            }else{
                Swal.fire({
                    icon: "danger",
                    title: "¡Actualizacion no exitoso del empleado!",
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


$("#savePass").click(function (){

    let id =   $("#idPass").val();
    let pass =   $("#firstPass").val();
    let passCheck = $("#CheckPassword").val();

    var data = {
        pass: pass,
        id: id,
    };

    if(pass==passCheck)
    {
        $.ajax({
            url: './index.php?controlador=Employees&accion=changePass',
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function (data) {
                if(data==true){
                    Swal.fire({
                        icon: "success",
                        title: "¡Actualizacion exitoso de la contrasena empleado!",
                        showConfirmButton: true,
                        timer: 3500
                    }).then(() => {
                        location.reload();
                         $("#firstPass").val('');
                         $("#CheckPassword").val('');
                    });
                }else{
                    Swal.fire({
                        icon: "danger",
                        title: "¡Actualizacion no exitoso de la contrasena empleado!",
                        showConfirmButton: true,
                        timer: 2500
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
    }else{
        Swal.fire({
            icon: "danger",
            title: "¡Las contrasenas no coinciden porfavor de revisarlas!",
            showConfirmButton: true,
            timer: 3500
        });
    }
});


$(".delete").click(function (){
    let id = $(this).data('id');
    $("#idDeleteEmpleyeeView").val(id)
});






$("#desactivarEmpleado").click(function (){
    let id =  $("#idDeleteEmpleyeeView").val()

    $.ajax({
        url: './index.php?controlador=Employees&accion=delete',
        method: 'POST',
        data:{
            id:id,
            estade:0,
        } ,
        dataType: 'json',
        success: function (data) {
            if (data == true) {
                Swal.fire({
                    icon: "success",
                    title: "¡Eliminacion exitosa del empleado!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: "danger",
                    title: "¡Eliminacion no exitosa del empleado!",
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

$("#ActiveEmployee").click(function (){
    let id =   $("#idPass").val();

    $.ajax({
        url: './index.php?controlador=Employees&accion=delete',
        method: 'POST',
        data:{
            id:id,
            estade:1,
        } ,
        dataType: 'json',
        success: function (data) {
            if (data == true) {
                Swal.fire({
                    icon: "success",
                    title: "¡Activacion exitosa del empleado!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: "danger",
                    title: "¡Activacion no exitosa del empleado!",
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