<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <?php include './Vista/Layout/Link.html' ?>
    <link rel="stylesheet" href="./Vista/css/carousel.css">
</head>
<body>
<div class="container-fluid d-none d-sm-block" style="background-color:#252b42 ">
    <div class="row text-light pt-4 pb-3">
        <div class="col-4 text-start">
            <span class="ps-2"><i class="fa-solid fa-phone pe-2"></i>(506) 2543-7654</span>
            <span class="ps-4"><i class="fa-solid fa-envelope pe-2"></i>megasuper@gmail.com</span>
        </div>
        <div class="col-4 text-center">
            <span> Follow Us  and get a chance to win 80% off</span>
        </div>
        <div class="col-4 text-end">
            <span> Follow US : </span>
            <span class="ps-2 pe-2"><i class="fa-brands fa-instagram"></i></span>
            <span class="ps-2 pe-2"><i class="fa-brands fa-youtube"></i></span>
            <span class="ps-2 pe-2"><i class="fa-brands fa-facebook"></i></span>
            <span class="ps-2 pe-2"><i class="fa-brands fa-x-twitter"></i></span>
        </div>
    </div>
</div>

<div class="container-fluid">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./Vista/img/LogoHome.png" alt="Bootstrap">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ps-lg-4 text-black" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Shop
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-disabled="true" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-disabled="true" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-disabled="true" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-disabled="true" href="#">Pages</a>
                    </li>
                </ul>
                <form class="d-flex text-info" role="search">
                        <span class="pe-2 "><a href="./index.php?controlador=index&accion=login" class="text-decoration-none text-info"><i
                                        class="fa-solid fa-user pe-2"></i> Login/Register</a></span>
                    <span class="ps-2 pe-2"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <span class="ps-2"><i class="fa-solid fa-cart-shopping"></i></span>
                </form>
            </div>
        </div>
    </nav>
</div>

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>

    </div>
    <div class="carousel-inner">
        <div class="carousel-item active"
             style="background-image: url('./Vista/img/carousel-item-1.png'); background-size: cover;">
            <div class="container">
                <div class="carousel-caption text-start">
                    <p>SUMMER 2024</p>
                    <h1>NEW COLLECTION</h1>
                    <p>We know how large objects will act,
                        but things on a small scale.</p>
                    <p><a class="btn btn-lg text-light" style="background-color:#2dc071 " href="#">SHOP NOW</a></p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container-fluid " style="background-color: #fafafa">
    <div class="container">
        <div class="row pb-5">
            <div class="col-12 text-center">
                <h3>EDITOR'S PICK</h3>
                <p>Problems trying to resolve the conflict between</p>
            </div>
            <div class="col-lg-6 col-sm-12"
                 style="background-image: url('./Vista/img/card-item-1.png'); background-size: cover;  ">
                <div class="btn btn-light btn-lg text-center ms-3 mb-2 ps-5 pe-5" style="margin-top: 400px">MEN</div>
            </div>
            <div class="col-lg-3 col-sm-12"
                 style="background-image: url('./Vista/img/card-item-2.png'); background-size: cover; height: 100% ">
                <div class="btn btn-light btn-lg text-center ms-3 mb-2 ps-5 pe-5" style="margin-top: 400px">WOMEN</div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div style="background-image: url('./Vista/img/card-item-3.png'); background-size: cover; height: 50% ">

                </div>
                <div style="background-image: url('./Vista/img/card-item-4.png'); background-size: cover; height: 50% ">

                </div>
            </div>
        </div>
    </div>

</div>

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>

    </div>
    <div class="carousel-inner">
        <div class="carousel-item active"
             style="background-image: url('./Vista/img/carrousel2.png'); background-size: cover;">
            <div class="container">
                <div class="carousel-caption text-start">
                    <p>SUMMER 2024</p>
                    <h1>Vita Classic</h1>
                    <h1>Product</h1>
                    <p>We know how large objects will act, We know how are objects will act, We know</p>
                    <p><a class="btn btn-lg text-light ps-5 pe-5" style="background-color:#2dc071 " href="#">SHOP </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container-fluid mb-3">
    <div class="row">
        <div class="col-lg-6 text-lg-end text-center">
            <img src="./Vista/img/Home1.png" class="img-fluid ps-lg-5" alt="..." style="max-width: 100%; height: auto;">
        </div>
        <div class="col-lg-6 text-lg-start pt-5">
            <p style="color: #c1c1c1">SUMER 2024</p>

            <h1 class="pt-5">Part of the Neural Universe</h1>

            <p class="pt-5 fs-4">
                We know how large objects will act, but things on a small scale.
            </p>


            <div class="d-flex flex-nowrap pt-5">
                <div class="btn btn-lg text-center  ps-5 pe-5 text-light" style="background-color: #2dc071;">BUY NOW</div>
                <div class="btn btn-lg text-center ms-3 ps-5 pe-5" style="border-color: #2dc071; color: #2dc071;">READ MORE</div>

            </div>

        </div>
    </div>
</div>

<div class="container-fluid pt-5 pb-5" style="background-color: #fafafa">
    <div class="row">
        <div class="col-6 text-center">
            <img src="./Vista/img/LogoHome.png" alt="">
        </div>
        <div class="col-6 text-info text-center" style="font-size: 25px">
            <span class="ps-2 pe-2"><i class="fa-brands fa-instagram"></i></span>
            <span class="ps-2 pe-2"><i class="fa-brands fa-facebook"></i></span>
            <span class="ps-2 pe-2"><i class="fa-brands fa-x-twitter"></i></span>
        </div>
    </div>
</div>



</body>
</html>
