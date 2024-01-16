
$("#SubmitUpdatePassword").click(function () {
    let pass= $("#NewPass").val();
    let confirmedPass = $("#confirmedPass").val();
    let id =  $("#UserIdPass").val();

    if(pass==confirmedPass){
        $("#confirmedPass ").removeClass('is-invalid')
        $("#NewPass").removeClass('is-invalid')
        $("#validationPass").addClass('d-none')


        var data = {
            pass: pass,
            id: id,
        };



        $.ajax({
            url: './index.php?controlador=Index&accion=changePass',
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
                        window.location.href = './index.php?controlador=Index&accion=Index';
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
})


$("#SubmitCode").click(function () {
    let codigo = $("#codigoSecurity").val();
    let id =  $("#UserIdPass").val();

    var data = {
        codigo: codigo,
        id:id,
    };

    $.ajax({
        url: './index.php?controlador=Index&accion=VeriPass',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if(data==true){
                $("#form1").addClass("d-none");
                $("#form2").removeClass("d-none");
            }else{
                Swal.fire({
                    icon: "danger",
                    title: "¡Error porfavor revisar si el codigo no ha vencido o si esta bien escrito !",
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


$("#SubmitPassword").click(function () {
    let cedulaRestore = $("#cedulaRestore").val();

    var data = {
        cedulaRestore: cedulaRestore,
    };

    $.ajax({
        url: './index.php?controlador=Index&accion=Password',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if(data==true){
                Swal.fire({
                    icon: "success",
                    title: "¡Se le ha enviado un codigo de seguridad!",
                    showConfirmButton: true,
                    timer: 3500
                }).then(() => {

                });
            }else{
                Swal.fire({
                    icon: "danger",
                    title: "¡Error al intentar enviar los datos!",
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