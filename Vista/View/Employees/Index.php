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
            <div class="container text-center mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <h2>Lista de empleados</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-3">
                <div class="row">
                    <div class="col-12 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#newEmployee">Nuevo empleado<i class="fa-solid fa-plus ps-2"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="table-responsive">
                    <table class="table  table-hover" id="employeeTable">
                        <thead>
                        <tr>
                            <th scope="col">Identificacion</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Posicion</th>
                            <th scope="col">Correo</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if ($employee != null) {
                            ?>
                            <?php foreach ($employee as $e) { ?>
                                <tr>
                                    <td><?php echo $e->getIDENTIFICATION(); ?>

                                        <?php
                                        if (!($e->getESTADE())) {
                                            ?>
                                            <i class="fa-solid fa-user-lock text-danger" ></i>
                                        <?php } ?>

                                    </td>
                                    <td><?php echo $e->getFIRSTNAME() . " " . $e->getLASTNAME(); ?></td>
                                    <td><?php echo $e->getPOSITION(); ?></td>
                                    <td><?php echo $e->getEMAIL_EMPLOYEES(); ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-warning edit ms-2" data-bs-toggle="modal"
                                                data-bs-target="#editEmployeeView"
                                                data-id="<?php echo $e->getID_EMPLOYEE(); ?>" id="getProduct">
                                            <i class="fa-solid fa-user-pen text-white"></i>
                                        </button>

                                        <?php
                                        if ($e->getESTADE()) {
                                            ?>
                                            <button class="btn btn-danger delete ms-2" data-bs-toggle="modal"
                                                    data-bs-target="#deteleEmployee"
                                                    data-id="<?php echo $e->getID_EMPLOYEE(); ?>">
                                                <i class="fa-solid fa-user-lock"></i>
                                            </button>
                                        <?php } ?>


                                    </td>
                                </tr>
                            <?php } ?>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>


<div class="modal fade" id="deteleEmployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Bloquear empleado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idDeleteEmpleyeeView">
                <p>Esta seguro que desea bloquear este empleado</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" id="desactivarEmpleado">Bloquear</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="newEmployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo empleado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nameEmployee" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="ApellidoEmployee" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Identificacion</label>
                            <input type="text" class="form-control" id="IdentificationEmployee"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 ">
                            <label for="disabledSelect" class="form-label">Posicion</label>
                            <select id="positionSelect" class="form-select">
                                <option>Disabled select</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Salario</label>
                            <input type="number" class="form-control" id="salaryEmployee" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Fecha contratacion</label>
                            <input type="date" class="form-control" id="dateEmployee" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="emailEmployee" aria-describedby="emailHelp">
                        </div>
                        <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                        <div class="mb-3 input-group">
                            <input type="text" class="form-control" id="passEmployee" aria-describedby="emailHelp">
                            <button class="btn btn-primary" type="button" id="generatePassword"
                                    title="Generar contrasena"><i class="fa-solid fa-shuffle"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="addEmployee">Agregar empleado</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editEmployeeView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true" href="#" onclick="showContent('edit')"
                                   id="editItem">Editar empleado</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="showContent('editpassword')" id="passItem">Cambiar
                                    contraseña</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div id="editpassword" style="display: none;">
                            <div class="row text-center">
                                <div class="col-12 pt-3 pb-3">
                                    <h3 class="text-center">Cambiar contrasena</h3>
                                </div>

                                <div class="col-12">
                                    <input type="hidden" class="form-control" id="idPass">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Contrasena</label>
                                        <input type="text" class="form-control" id="firstPass">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Confirmar
                                            Contrasena</label>
                                        <input type="text" class="form-control" id="CheckPassword">
                                    </div>
                                </div>

                                <div class="col-6 ">
                                    <button type="button" class="btn btn-secondary text-light" id="GenerarEditPass">
                                        Generar Contrasena
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-warning text-light" id="savePass">
                                        Cambiar Contrasena
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="edit">
                            <div class="row">

                                <div class="col-12 pt-3 pb-3">
                                    <h3 class="text-center">Editar Empleado</h3>
                                </div>

                                <div class="col">
                                    <input type="hidden" class="form-control" id="idEmployeeView"
                                           aria-describedby="emailHelp">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nameEmployeeView"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                                        <input type="text" class="form-control" id="ApellidoEmployeeView"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Identificacion</label>
                                        <input type="text" class="form-control" id="IdentificationEmployeeView"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="disabledSelect" class="form-label">Posicion</label>
                                        <select id="positionSelectView" class="form-select">
                                            <option>Disabled select</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Salario</label>
                                        <input type="number" class="form-control" id="salaryEmployeeView"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Fecha contratacion</label>
                                        <input type="date" class="form-control" id="dateEmployeeView"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Correo</label>
                                        <input type="email" class="form-control" id="emailEmployeeView"
                                               aria-describedby="emailHelp">
                                    </div>

                                    <div class="mt-5">
                                        <div class="d-grid gap-2">
                                            <button type="button" class="btn btn-warning text-light" id="editEmployee">
                                                Editar empleado
                                            </button>

                                            <div id="butonActive" class="d-none">
                                                <button type="button" class="btn btn-success text-light" id="ActiveEmployee">
                                                    Activar empleado
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="./Vista/js/scripts.js"></script>
<script src="./Vista/js/Employee/main.js"></script>
<script src="./Vista/js/Employee/edit.js"></script>
</body>
</html>

