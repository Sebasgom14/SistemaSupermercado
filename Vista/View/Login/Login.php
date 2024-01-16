<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <?php include './Vista/Layout/Link.html' ?>
    <link rel="stylesheet" href="./Vista/css/login.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-8 d-flex align-items-center justify-content-center"
             style="background: linear-gradient(180deg, #FFF 31.21%, rgba(255, 255, 255, 0.00) 55.66%);">
            <div class="rounded-3 shadow ps-5 mt-5" style="width: 45rem;">
                <div class="card-body">
                    <h1 class="mt-4 Text1">SuperMarket</h1>
                    <p class="mt-4 Text2" >Bienvenido de regreso!!!</p>
                    <h1 class="mt-4 Text3">Iniciar sesión</h1>
                    <form class="me-3" action="./index.php?controlador=index&accion=ingresar" method="post" onsubmit="return validarFormulario()">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Usuario</label>
                            <input type="text" class="form-control" name="user" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <label for="exampleInputPassword1" class="form-label text-start">Contraseña</label>
                                <a href="./index.php?controlador=index&accion=PasswordRestore" class="text-decoration-none text-end">¿Olvidó su contraseña?</a>
                            </div>
                            <input type="password" class="form-control" name="pass">
                        </div>

                        <div class="text-center mt-3 mb-5">
                            <button type="submit" class="btn rounded-pill text-light ps-5 pe-5" style="background-color: #F47458">
                                Ingresar
                                <i class="ps-2  fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-4 d-none d-sm-block" style="background-color:#ffede1; min-height: 100vh;">
            <img src="./Vista/img/login.png" alt="">
        </div>

    </div>
</div>

<script>
    function validarFormulario() {
        // Puedes agregar aquí alguna validación adicional si es necesario
        return true;
    }
</script>


</body>
</html>
