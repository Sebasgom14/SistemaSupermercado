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
                <li><a class="dropdown-item" href="./index.php?controlador=employees&accion=userProfile">Settings</a>
                </li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li>
                    <hr class="dropdown-divider"/>
                </li>
                <li><a class="dropdown-item" href="./index.php?controlador=index&accion=Cerrar">Logout</a></li>
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
                            <h2>Lista de Promociones</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-3">
                <div class="row">
                    <div class="col-12 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#newPromotions">Nueva Promocion<i class="fa-solid fa-plus ps-2"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="table-responsive">
                    <table class="table  table-hover" id="PromotionsTable">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tipo Promocion</th>
                            <th scope="col">Descuento</th>
                            <th scope="col">Cantidad Minima</th>
                            <th scope="col">Fecha de incion</th>
                            <th scope="col">Fecha de fin</th>
                            <th scope="col" class="text-center">Estado</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if ($promotions != null) {
                            ?>
                            <?php foreach ($promotions as $e) { ?>
                                <tr>
                                    <td><?php echo $e->getName(); ?></td>
                                    <td><?php echo $e->getTypePromotions(); ?></td>
                                    <td><?php echo $e->getDiscount(); ?></td>
                                    <td><?php echo $e->getMinimumQuantity(); ?></td>
                                    <td><?php echo $e->getStartDate(); ?></td>
                                    <td><?php echo $e->getEndDate(); ?></td>
                                    <td class="text-center">
                                        <?php if ($e->getEstade()) {
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
                                    <td class="text-center">
                                        <button class="btn btn-warning edit ms-2" data-bs-toggle="modal"
                                                data-bs-target="#viewPromotions"
                                                data-id="<?php echo $e->getId(); ?>" id="getProduct">
                                            <i class="fa-solid fa-user-pen text-white"></i>
                                        </button>
                                        <button class="btn btn-danger delete ms-2" data-bs-toggle="modal"
                                                data-bs-target="#deletePromotions"
                                                data-id="<?php echo $e->getId(); ?>">
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


<div class="modal fade" id="newPromotions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Opciones Promocion</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true" href="#"
                                   onclick="showContent('newPromotion')"
                                   id="newPromotionsItem">Nueva Promocion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="showContent('addPromotionsProduct')"
                                   id="addPromotionsProductItem">Agregar promocion a producto</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div id="addPromotionsProduct" style="display: none;">
                            <div class="row text-center">
                                <div class="col-12 text-center">
                                    <h3>Agregar promocion</h3>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Producto</label>
                                        <select id="ProductSelect" class="form-select">
                                            <option>Disabled select</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Promocion</label>
                                        <select id="PromotionSelect" class="form-select">
                                            <option>Disabled select</option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <button type="button" class="btn btn-success" id="addProductoPromotions">Agregar promocion al producto
                                            <i class="fa-solid fa-plus ms-2"></i></button>
                                    </div>
                                </div>



                            </div>
                        </div>
                        <div id="newPromotion">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h3>Nueva promocion</h3>
                                </div>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    Si la promocion es de 2x1 o similar porfavor dejar la cantidad minima en 0
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <div class="alert alert-info alert-dismissible" role="alert">
                                    Si la promocion es de un descuento porfavor dejar el descuento en 0
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nombre de la
                                            promocion</label>
                                        <input type="text" class="form-control" id="namePromotions"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Descuento</label>
                                        <input type="number" class="form-control" id="discount"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Cantidad minima de
                                            productos</label>
                                        <input type="number" class="form-control" id="minimumQuantity"
                                               aria-describedby="emailHelp">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Cantidad maxima de
                                            productos</label>
                                        <input type="number" class="form-control" id="max"
                                               aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Tipo de promocion</label>
                                        <select id="typeSelect" class="form-select">
                                            <option>Disabled select</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="datetimepicker" class="form-label">Fecha de inicio de la
                                            promocion</label>
                                        <input type="date" id="starDate" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="datetimepicker" class="form-label">Fecha de fin de la
                                            promocion</label>
                                        <input type="date" id="endDate" class="form-control">
                                    </div>

                                    <div class="mb-3 mt-5 d-grid gap-2">
                                        <button type="button" class="btn btn-success" id="addPromotions">Agregar Promocion
                                            <i class="fa-solid fa-plus ms-2"></i></button>
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


<div class="modal fade" id="viewPromotions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Promocion</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idPromotionsView">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre de la promocion</label>
                            <input type="text" class="form-control" id="namePromotionsView"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Descuento</label>
                            <input type="number" class="form-control" id="discountView" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Cantidad minima de productos</label>
                            <input type="number" class="form-control" id="minimumQuantityView"
                                   aria-describedby="emailHelp">
                        </div>


                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Cantidad maxima de
                                productos</label>
                            <input type="number" class="form-control" id="maxView"
                                   aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Tipo de promocion</label>
                            <select id="typeSelectView" class="form-select">
                                <option>Disabled select</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="datetimepicker" class="form-label">Fecha de inicio de la promocion</label>
                            <input type="date" id="starDateView" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="datetimepicker" class="form-label">Fecha de fin de la promocion</label>
                            <input type="date" id="endDateView" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning text-light" id="UpdatePromotions">Editar promocion</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deletePromotions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar  promocion</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idDeleteView">
                <p>Esta seguro que desea desactivar esta promocion?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" id="deletePromotionsButton">Eliminar</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="./Vista/js/Promotions/main.js"></script>
</body>
</html>

