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
                <li><a class="dropdown-item" href="./index.php?controlador=employees&accion=userProfile">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
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

                    <a class="nav-link" href="./index.php?controlador=Supplier&accion=Principal">
                        <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                        Proveedores
                    </a>

                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Inicio</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Inicio</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Primary Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Warning Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Success Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Danger Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Bar Chart Example
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="./Vista/js/scripts.js"></script>
<script src="./Vista/js/charts/chart-area-demo.js"></script>
<script src="./Vista/js/charts/chart-bar-demo.js"></script>
<script>
    var ddtableProduct = $('#datatablesSimple').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
        },
        "theme": "bootstrap",
    });

</script>
</body>
</html>
