$(document).ready(function() {
    getData();
    validation();
});

function getData(){
    $.ajax({
        url: './index.php?controlador=Employees&accion=getDataProfile',
        method: 'POST',
        dataType: 'json',
        success: function (data) {
            if (data.length > 0) {
                var empleado = data[0];

                $("#idprofile").val(empleado.id);
                $("#nameprofile").val(empleado.firstEmpleado);
                $("#apellidosprofile").val(empleado.lastEmpleado);
                $("#cedulaprofile").val(empleado.identification);
                $("#positionprofile").val(empleado.positionName);
                $("#dateprofile").val(empleado.hiringdate);
                $("#emailprofile").val(empleado.email);
                $("#salaryprofile").val(empleado.salary);
                $("#idposition").val(empleado.position);
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

function quitarDisabled() {
    $('input[disabled]').not('#dateprofile, #positionprofile, #confirmedPass, #NewPass').removeAttr('disabled');
    $("#updateProfile").removeClass('d-none')
    $("#updateData").addClass('d-none')

}

// Asigna la función al evento clic del botón
$('#updateData').on('click', quitarDisabled);

function validation(){
    $('#cedulaprofile').on('input', function () {
        // Verificar si la longitud del valor es mayor de 9
        if ($(this).val().length > 9) {
            // Si es mayor de 9, truncar el valor a 9 caracteres
            $(this).val($(this).val().slice(0, 9));
        }
    });
}


$("#updateProfile").click(function () {
    let id = $("#idprofile").val();
    let name = $("#nameprofile").val();
    let apellidos = $("#apellidosprofile").val();
    let cedula = $("#cedulaprofile").val();
    let mail = $("#emailprofile").val();
    let salary =  $("#salaryprofile").val();
    let date =  $("#dateprofile").val();
    let position =  $("#idposition").val();

    var data = {
        firstName: name,
        lastName: apellidos,
        identification: cedula,
        id: id,
        emailEmployee: mail,
        salaryEmployee: salary,
        positionEmployee: position,
        dateEmployee: date,
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
                    title: "¡Actualizacion exitoso de los datos!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {
                    location.reload();
                });
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

$('#OldPass').on('keydown', function (event) {
    // Verificar si la tecla presionada es "Enter" (código 13)
    if (event.keyCode === 13) {
        // Verificar si el campo de contraseña no está vacío
        var oldPassword = $(this).val().trim();
        if (oldPassword !== '') {
            validePass(oldPassword)
        } else {
            // Mostrar una sweet alert indicando que no hay datos
            Swal.fire({
                icon: 'error',
                title: 'Campo vacío',
                text: 'Por favor, ingrese la contraseña.',
            });
        }
    }
});


function validePass(pass){
    $.ajax({
        url: './index.php?controlador=Employees&accion=validatePass',
        method: 'POST',
        dataType: 'json',
        data:{oldPass:pass},
        success: function (data) {
            if (data===true){
                Swal.fire({
                    icon: 'success',
                    title: 'Información',
                    text: '¡Contraseña válida!',
                    showConfirmButton: false,
                    timer: 1000
                });

                // Supongamos que tus dos input tienen los IDs "input1" e "input2"
                $('#NewPass, #confirmedPass,#RandomPass').removeAttr('disabled');
                $('#OldPass').prop('disabled', true);

            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Información',
                    text: '¡Contraseña no válida!',
                    showConfirmButton: false,
                    timer: 1000
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
$("#RandomPass").on("click", function() {
    const passwordLength = 8;
    const newPassword = generatePassword(passwordLength);
    $("#NewPass").val(newPassword);
    $("#confirmedPass").val(newPassword);
});

$("#updatePass").on("click", function() {
   let pass= $("#NewPass").val();
   let confirmedPass = $("#confirmedPass").val();
   let id = $("#idPassUser").val();

   if(pass==confirmedPass){
       $("#confirmedPass ").removeClass('is-invalid')
       $("#NewPass").removeClass('is-invalid')
       $("#validationPass").addClass('d-none')


       var data = {
           pass: pass,
           id: id,
       };



       $.ajax({
           url: './index.php?controlador=Employees&accion=changePass',
           method: 'POST',
           data: data,
           dataType: 'json',
           success: function (data) {
               if(data==true){
                   Swal.fire({
                       icon: "success",
                       title: "¡Actualizacion exitoso de la contrasena!",
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
                       title: "¡Actualizacion no exitoso de la contrasena!",
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
       $("#confirmedPass ").addClass('is-invalid')
       $("#NewPass ").addClass('is-invalid')
       $("#validationPass").removeClass('d-none')
   }


});

