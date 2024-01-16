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
                    <p class="mt-4 Text2" >Olvido su contraseña!!!</p>
                    <h3 class="mt-4 Text3">Restaurar contraseña</h3>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Digite su cedula</label>
                            <input type="number" class="form-control" name="userRestore" aria-describedby="emailHelp" id="cedulaRestore">
                        </div>
                        <div class="text-center mt-3 mb-5">
                            <button  class="btn rounded-pill text-light ps-5 pe-5" style="background-color: #F47458" id="SubmitPassword">
                                Enviar solicitud
                                <i class="ps-2  fa-solid fa-arrow-right"></i>
                            </button>
                        </div>


                </div>
            </div>
        </div>
        <div class="col-4 d-none d-sm-block" style="background-color:#ffede1; min-height: 100vh;">
            <img src="./Vista/img/login.png" alt="">
        </div>

    </div>
</div>

<script src="./Vista/js/Login/main.js"></script>


</body>
</html>
