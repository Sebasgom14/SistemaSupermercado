<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Inicio</title>
    <link href="./Vista/css/styles.css" rel="stylesheet"/>
    <?php include './Vista/Layout/Link.html' ?>
</head>

<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">Supermercado<i class=" ps-2 fa-solid fa-cart-shopping"></i></a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    Input para buscar

    <!-- Navbar-->
    <ul class="navbar-nav d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
               aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li>
                    <hr class="dropdown-divider"/>
                </li>
                <li><a class="dropdown-item" href="#!">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Opciones</div>
                    <a class="nav-link" href="./index.php?controlador=index&accion=Principal">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Inicio
                    </a>

                    <a class="nav-link" href="./index.php?controlador=Employees&accion=Principal">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Empleados
                    </a>

                    <a class="nav-link" href="./index.php?controlador=Costumers&accion=Principal">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users-between-lines"></i></div>
                        Clientes
                    </a>

                    <a class="nav-link" href="./index.php?controlador=EmployeePosition&accion=Principal">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                        Posiciones
                    </a>

                    <a class="nav-link" href="./index.php?controlador=Inventory&accion=Principal">
                        <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                        Inventario
                    </a>

                    <a class="nav-link" href="./index.php?controlador=InventoryTransactions&accion=Principal">
                        <div class="sb-nav-link-icon"><i class="fas fa-exchange-alt"></i></div>
                        Transciones de inventario
                    </a>

                    <a class="nav-link" href="./index.php?controlador=Category&accion=Principal">
                        <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
                        Categorias
                    </a>

                    <a class="nav-link" href="./index.php?controlador=Products&accion=Principal">
                        <div class="sb-nav-link-icon"><i class="fas fa-cube"></i></div>
                        Producto
                    </a>

                    <a class="nav-link" href="./index.php?controlador=Sales&accion=Principal">
                        <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                        Ventas
                    </a>

                    <a class="nav-link" href="./index.php?controlador=Promotions&accion=Principal">
                        <div class="sb-nav-link-icon"><i class="fas fa-gift"></i></div>
                        Promociones
                    </a>

                    <a class="nav-link" href="./index.php?controlador=TypePromotions&accion=Principal">
                        <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                        Tipo promociones
                    </a>

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                        Proveedores
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="./index.php?controlador=Supplier&accion=Principal">Lista proveedores</a>
                            <a class="nav-link" href="./index.php?controlador=OrderP&accion=Principal">Ordenes de compra</a>
                        </nav>
                    </div>

                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card shadow">
                            <div class="row">
                                <div class="col-12 text-center mt-3">
                                    <h3>Datos personales</h3>
                                    <input id="idprofile" type="hidden">
                                    <input id="idposition" type="hidden">
                                    <input id="salaryprofile" type="hidden">
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 ms-md-2">
                                        <label for="exampleInputPassword1" class="form-label">Cedula</label>
                                        <input type="number" class="form-control" id="cedulaprofile" disabled maxlength="9">
                                    </div>

                                    <div class="mb-3 ms-md-2">
                                        <label for="exampleInputPassword1" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nameprofile" disabled>
                                    </div>

                                    <div class="mb-3 ms-md-2">
                                        <label for="exampleInputPassword1" class="form-label">Apellidos</label>
                                        <input type="text" class="form-control" id="apellidosprofile" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 me-md-2">
                                        <label for="exampleInputPassword1" class="form-label">Posicion</label>
                                        <input type="text" class="form-control" id="positionprofile" disabled>
                                    </div>

                                    <div class="mb-3 me-md-2">
                                        <label for="exampleInputPassword1" class="form-label">Fecha de contratacion</label>
                                        <input type="date" class="form-control form-control-plaintext" id="dateprofile" disabled>
                                    </div>

                                    <div class="mb-3 me-md-2">
                                        <label for="exampleInputPassword1" class="form-label">Correo</label>
                                        <input type="email" class="form-control" id="emailprofile" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3 text-center">
                        <div class="d-grid gap-2">
                            <button class="btn btn-success text-light d-none" type="button" id="updateProfile">Actualizar Datos<i class="ps-2 fa-solid fa-pen-to-square"></i></button>
                            <div class="btn-group" role="group" id="">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Opciones
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" id="updateData">Actualizar Datos <i class="ps-2 fa-solid fa-pen-to-square"></i></a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#updatePassword">Actualizar contrasena <i class="ps-1 fa-solid fa-key"></i></a></li>

                                </ul>
                            </div>
                        </div>


                        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="rounded-circle mt-2" alt="..." width="50%">

                    </div>
                </div>
            </div>
        </main>
    </div>
</div>


<div class="modal fade" id="updatePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar contraseña</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input type="hidden" value="<?php echo $_SESSION['idUsuario'];?>" id="idPassUser">
                    <label for="exampleInputPassword1" class="form-label">Ingrese su contraseña anterior</label>
                    <input type="text m " class="form-control" id="OldPass">
                </div>

                <label for="exampleInputPassword1" class="form-label">Nueva contraseña</label>
                <div class="mb-3 d-flex align-items-center">
                    <input type="text" class="form-control" id="NewPass" disabled>
                    <button type="button" class="btn btn-primary ms-2 " id="RandomPass" disabled><i class="fa-solid fa-shuffle"></i></button>
                </div>


                <div class="mb-3 ">
                    <label for="exampleInputPassword1" class="form-label">Confirmar contraseña</label>
                    <input type="text" class="form-control " id="confirmedPass" disabled>
                    <div id="validationPass" class="invalid-feedback d-none">
                        Las contraseñas con coinciden
                    </div>

                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="updatePass">Cambiar contraseña</button>
            </div>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="./Vista/js/scripts.js"></script>
<script src="./Vista/js/Employee/userProfile.js"></script>

</body>
</html>


