<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inicio</title>
    <link href="./Vista/css/styles.css" rel="stylesheet" />
    <?php include './Vista/Layout/Link.html' ?>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">Supermercado<i class=" ps-2 fa-solid fa-cart-shopping"></i></a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    Input para buscar

    <!-- Navbar-->
    <ul class="navbar-nav d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
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
            <div class="accordion container mt-5 " id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Crear Venta
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Cliente</label>
                                        <select id="clientSelect" class="form-select">
                                            <option>Disabled select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">SubTotal de la venta</label>
                                        <input type="number" class="form-control" id="subTotalsales" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Iva de la venta</label>
                                        <input type="number" class="form-control" id="ivasales" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Total de la venta</label>
                                        <input type="number" class="form-control" id="totalsales" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 text-md-start text-center mt-3 mt-md-0">
                                    <button type="button" class="btn btn-success" id="addSales">Crear Factura <i class="fa-solid fa-plus ps-2"></i></button>
                                </div>

                                <div class="col-md-6 text-md-end text-center mt-3 mt-md-0">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#listproducts" id="addProduct" disabled>Agregar producto <i class="fa-solid fa-cart-plus ps-2"></i></button>
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="table-responsive">
                                        <table class="table" id="productsSales">
                                            <thead>
                                            <tr>
                                                <th scope="col">Imagen</th>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">SubTotal</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container mt-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3 class="card shadow">Lista de ventas</h3>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="table-responsive">
                            <table class="table" id="SalesTable">
                                <thead>
                                <tr>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Total de venta</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($sales != null)
                                {
                                    ?>
                                    <?php foreach ($sales as $e) { ?>
                                    <tr>
                                        <td><?php echo $e["FIRSTNAME"]." ". $e["LASTNAME"]; ?></td>
                                        <td><?php echo $e["SALEDATE"]; ?></td>
                                        <td><?php echo $e["TOTALSALE"]; ?></td>
                                        <td>
                                            <button class="btn btn-primary getBill ms-2" data-bs-toggle="modal" data-bs-target="#viewBill" data-id="<?php echo $e["ID_SALE"]; ?>" id="getProduct">
                                                <i class="fa-solid fa-file-lines"></i>
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


                </div>
            </div>
        </main>
    </div>
</div>

<div class="modal fade" id="listproducts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Lista de Productos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <input type="text" class="form-control" id="serch" aria-describedby="emailHelp" placeholder="Buscar producto">
                    <table class="table" id="tableproducts">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewBill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Informacion de la factura</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Cliente</label>
                            <select id="clientSelectView" class="form-select" disabled></select>
                        </div>
                    </div>
                    <div class="col-md-2 text-center">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">SubTotal de la venta</label>
                            <input type="number" class="form-control" id="subTotalsalesView" disabled>
                        </div>
                    </div>
                    <div class="col-md-2 text-center">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Iva de la venta</label>
                            <input type="number" class="form-control" id="ivasalesView" disabled>
                        </div>
                    </div>
                    <div class="col-md-2 text-center">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Total de la venta</label>
                            <input type="number" class="form-control" id="totalsalesView" disabled>
                        </div>
                    </div>

                    <div class="col-12">
                        <p>Fecha de la venta: <span id="dateView"></span></p>
                    </div>

                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table" id="productsSalesView">
                                <thead>
                                <tr>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">SubTotal</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="./Vista/js/scripts.js"></script>
<script src="./Vista/js/Sales/main.js"></script>
</body>
</html>


