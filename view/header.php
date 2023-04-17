<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <title>Fashion</title>



</head>

<body>
    <div class="container-fluid">
        <div class="row bg-dark py-2 px-xl-5" style="justify-content: end;">
            <div class="col-lg-2 text-end ">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center m-0">
            <div class="col-lg-3 col d-none d-lg-block ">
                <a href="index.php"><img src="../img/logo/logo.png"
                        style="width: 150px; height: 80px; margin-left:50px;"></a>
            </div>
            <div class=" col-lg-7 text-left">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-dark me-2" type="submit"> <i class="fa fa-search"></i></button>
                    <a href="index.php?act=viewcart" class="btn btn-outline-dark me-2 ">
                        <i class="fas fa-shopping-cart text-dark"></i>
                    </a>
                    <a href="index.php" class="btn btn-outline-dark  ">
                        <i class="fa fa-home" aria-hidden="true"></i>

                    </a>
                </form>
            </div>
            <div class="col-lg-2 d-flex" style="justify-content: end;">
                <a href="">
                    <ul class="nav">
                        <?php
                        if (isset($_SESSION['username']) && ($_SESSION['username'] != "")) {
                            echo '<li class="nav-item">
                    <a style="color: black;" class="nav-link" href="index.php?act=userinfo">' . $_SESSION['username'] . '
                    </a></li>';
                            echo '<li class="nav-item">
                    <a style="color: black;" class="nav-link" href="index.php?act=thoat">Thoát
                    </a></li>';
                        } else {
                            ?>
                        </ul>
                        <ul class="nav">
                            <li class="nav-item">
                                <a style="color: black;" class="nav-link" href="index.php?act=login">Login</a>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="nav-item">
                                <a style="color: black;" class="nav-link" href="index.php?act=register">Register</a>
                            </li>
                        </ul>
                    <?php } ?>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <nav>
            <div class="row justify-content-center ">
                <div class="col-auto ">
                    <ul class="nav">
                        <li class="nav-item navbar-dark navbar-brand">
                            <a style="color: black;" class="nav-link active " href="index.php">HOME</a>
                        </li>
                        <li class="nav-item dropdown navbar-dark">
                            <a class="nav-link dropdown-toggle navbar-dark " style="color: rgb(10, 10, 10);"
                                data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">PRODUCT</a>
                            <ul class="dropdown-menu">
                                <?php
                                foreach ($dsdm as $dm) {
                                    echo '<li><a class="dropdown-item" href="index.php?act=product&id=' . $dm['id'] . '">' . $dm['tendm'] . '</a></li>';
                                }
                                ?>
                            </ul>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a style="color: black;" class="nav-link" href="index.php?act=contract">CONTRACT</a>
                        <li class="nav-item">
                            <a style="color: black;" class="nav-link " href="index.php?act=about">ABOUT</a>
                        </li>
                    </ul>
                </div>
        </nav>
    </div>