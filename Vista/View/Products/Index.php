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
            <div class="container text-center mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <h2>Lista de productos</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-3">
                <div class="row">
                    <div class="col-12 text-end">
                        <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#newProduct">Nuevo Producto<i class="fa-solid fa-plus ps-2"></i></button>
                    </div>
                </div>
            </div>



            <div class="container mt-5">
                <div class="table-responsive">
                    <table class="table text-center table-hover" id="productTable">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                            if($products != null)
                            {
                        ?>
                                <?php foreach ($products as $e) { ?>
                                <tr>
                                    <td><?php echo $e->getName(); ?></td>
                                    <td><?php echo $e->getDescription(); ?></td>
                                    <td><?php echo $e->getPrice(); ?></td>
                                    <td><?php echo $e->getCategory(); ?></td>
                                    <td><?php echo $e->getSupplier(); ?></td>
                                    <td><img src="<?php echo $e->getImagePath(); ?>" width="80px"  class="img-fluid"></td>
                                    <td>
                                        <button class="btn btn-warning edit ms-2" data-bs-toggle="modal" data-bs-target="#editProduct" data-id="<?php echo $e->getIdProduct(); ?>" id="getProduct">
                                            <i class="fa-solid fa-user-pen text-white"></i>
                                        </button>
                                        <button class="btn btn-danger delete ms-2" data-bs-toggle="modal" data-bs-target="#deleteProducts" data-id="<?php echo $e->getIdProduct(); ?>">
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



<!--modales-->

<!--Modal de nuevo producto-->
<div class="modal fade" id="newProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nombre del producto</label>
                                <input type="text" class="form-control" id="nameProduct">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Description del producto</label>
                                <input type="text" class="form-control" id="descriptionProduct">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Precio del producto</label>
                                <input type="number" class="form-control" id="priceProduct">
                            </div>

                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">Categoria</label>
                                <select id="categorySelect" class="form-select">
                                    <option>Disabled select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">Proveedor</label>
                                <select id="proveedorSelect" class="form-select">
                                    <option>Disabled select</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">Imagen del producto</label>
                                <input type="file" class="form-control" id="imageProduct" name="imageProduct">
                                <img id="previewImage" src="#" style="width:383px; height: 172px "  class="d-none">
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="plusProduct">Agregar</button>
            </div>
        </div>
    </div>
</div>


<!--modal de editar-->
<div class="modal fade" id="editProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form >
                    <div class="row">
                        <div class="col-6">
                            <input type="hidden" id="idProductView">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nombre del producto</label>
                                <input type="text" class="form-control" id="nameProductView">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Description del producto</label>
                                <input type="text" class="form-control" id="descriptionProductView">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Precio del producto</label>
                                <input type="number" class="form-control" id="priceProductView">
                            </div>

                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">Categoria</label>
                                <select id="categorySelectView" class="form-select">
                                    <option>Disabled select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">Proveedor</label>
                                <select id="proveedorSelectView" class="form-select">
                                    <option>Disabled select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning text-light" id="editeProductButton">Editar</button>
            </div>
        </div>
    </div>
</div>

<!--modal de desactivar-->

<div class="modal fade" id="deleteProducts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Descativar Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idDelete">
                <p>Esta seguro que desea desactivar este producto</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" id="deleteP">Desactivar</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="./Vista/js/scripts.js"></script>
<script src="./Vista/js/Products/main.js"></script>
</body>
</html>


