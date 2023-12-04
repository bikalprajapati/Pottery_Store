<?php
include('../includes/connect.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../style.css">



</head>
<style>
    .footer {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
    }
</style>

<body>
    <div class="container-fluid ps-0">
        <nav class="navbar navbar-expand-sm navbar-dark bg-info">
            <a class="navbar-brand" href="#"><img class="logo" src="../image/logo.png" alt=""></a>
            <button class="navbar-toggler d-lg-none bg-dark" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="../index.php" aria-current="page">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_registration.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>



                </ul>
                <form class="d-flex my-2 my-lg-0" action="search_product.php" method="get">
                    <input class="form-control me-sm-2" type="text" placeholder="Search" name="search_data">
                    <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                </form>
            </div>
        </nav>

        <!-- calling cart function -->


        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <ul class="navbar-nav me-auto">

                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
<a class='nav-link' href='#'>Welcome Guest</a>
</li>";

                } else {
                    echo "<li class='nav-item'>
<a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
</li>";
                }
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
<a class='nav-link' href='./user_login.php'>Login</a>
</li>";

                } else {
                    echo "<li class='nav-item'>
<a class='nav-link' href='Logout.php'>Logout</a>
</li>";
                }
                ?>

            </ul>

            <!-- second child -->

        </nav>

        <!-- Third Child -->
        <div class="container">
            <h3 class="text-center bg-light">Pottery Shop</h3>
        </div>
        <!-- </div> -->

        <!-- fourth child -->
        <!-- <div class="container"> -->

        <div class="row px-3 ">
            <div class=col-md-12>
                <!-- products -->
                <div class="row">
                    <?php
                    if (!isset($_SESSION['username'])) {
                        include('user_login.php');
                    } else {
                        include('payment.php');

                    }
                    ?>

                </div>
                <!-- //row end -->
            </div>




        </div>
        <div class="footer">
            <!-- include footer -->
            <?php include("../includes/footer.php")
                ?>
        </div>

    </div>






    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>


</body>

</html>