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

                    <a class="nav-link" href="./index.php?controlador=Supplier&accion=Principal">
                        <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                        Proveedores
                    </a>
                    <a class="nav-link" href="./index.php?controlador=Promotions&accion=Principal">
                        <div class="sb-nav-link-icon"><i class="fas fa-gift"></i></div>
                        Promociones
                    </a>

                    <a class="nav-link" href="./index.php?controlador=TypePromotions&accion=Principal">
                        <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                        Tipo promociones
                    </a>
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
                            <h2>Lista de Categorias</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-3">
                <div class="row">
                    <div class="col-12 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#newCategoria">Nueva Categoria<i class="fa-solid fa-plus ps-2"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="table-responsive">
                    <table class="table text-center table-hover" id="categoryTable">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if ($category != null) {
                            ?>
                            <?php foreach ($category as $e) { ?>
                                <tr>
                                    <td><?php echo $e->getCategoryName(); ?></td>
                                    <td>
                                        <?php if ($e->getStatus()) {
                                            ?>
                                            <div class="card bg-success text-center text-light">
                                                <div class="p-1"><i class="fa-solid fa-check">
                                                    </i><span class="ps-1">Activo</span>
                                                </div>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="card bg-danger text-center text-light">
                                                <div class="p-1"><i class="fa-solid fa-xmark">
                                                    </i><span class="ps-1">Inactivo</span>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>


                                    </td>
                                    <td>
                                        <button class="btn btn-warning edit ms-2" data-bs-toggle="modal"
                                                data-bs-target="#editCategoryView"
                                                data-id="<?php echo $e->getIdCategory(); ?>" id="getProduct">
                                            <i class="fa-solid fa-user-pen text-white"></i>
                                        </button>
                                        <button class="btn btn-danger delete ms-2" data-bs-toggle="modal"
                                                data-bs-target="#deteleCategory"
                                                data-id="<?php echo $e->getIdCategory(); ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
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


<!--Modales-->

<div class="modal fade" id="newCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Categoria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre categoria</label>
                    <input type="text" class="form-control" id="nameCategoria" aria-describedby="emailHelp">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="addCategory">Agregar Categoria</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editCategoryView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Categoria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input type="hidden" class="form-control" id="idCategoryView" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label">Nombre categoria</label>
                    <input type="text" class="form-control" id="nameCategoriaView" aria-describedby="emailHelp">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning text-light" id="editCategory">Editar Categoria</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="deteleCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar categoria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idDeleteCategoryView">
                <p>Esta seguro que desea desactivar esta categoria</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" id="desactivarCategoria">Eliminar</button>
            </div>
        </div>
    </div>
</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="./Vista/js/scripts.js"></script>
<script src="./Vista/js/Category/main.js"></script>
</body>
</html>


