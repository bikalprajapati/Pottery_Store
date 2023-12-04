<?php
include('./includes/connect.php');
include('./functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <style>
        /* .footer {
            position: fixed;
            bottom: 0px;
            left: 0;
            width: 100%;
        } */
        .card {
            /* box-shadow: 5px 10px #888888; */
            box-shadow: 10px 10px 5px #aaaaaa;
        }

        body {
            overflow-x: hidden;
        }
    </style>



</head>

<body>
    <div class="container-fluid ">
        <nav class="navbar navbar-expand-sm navbar-dark bg-info">
            <a class="navbar-brand" href="#"><img class="logo" src="image/logo.png" alt=""></a>
            <button class="navbar-toggler d-lg-none bg-dark" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php" aria-current="page">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="display_all.php">Products</a>
                    </li>
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo " <li class='nav-item'>
                        <a class='nav-link' href='./users_area/profile.php'>My Account</a>
                    </li>";
                    } else {
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
                    </li>";

                    }


                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup>1</sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Price:
                            <?php toatal_cart_price(); ?>/-
                        </a>
                    </li>

                </ul>
                <form class="d-flex my-2 my-lg-0" action="search_product.php" method="get">
                    <input class="form-control me-sm-2" type="text" placeholder="Search" name="search_data">
                    <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                </form>
            </div>
        </nav>

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
                <a class='nav-link' href='./users_area/user_login.php'>Login</a>
            </li>";
                } else {
                    echo "<li class='nav-item'>
                <a class='nav-link' href='./users_area/logout.php'>Logout</a>
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
            <div class=col-md-10>
                <!-- products -->
                <div class="row productfooter">
                    <!-- fetching produts -->
                    <?php
                    //calling functions
                    get_all_products();
                    get_uniquecategories();





                    ?>

                </div>
                <!-- //row end -->
            </div>
            <!-- column end -->

            <!-- Categories -->
            <div class="col-md-2 bg-secondary p-0">
                <ul class="navbar-nav text-center me-auto">
                    <li class="nav-item bg-info"><a class="nav-link text-light" href="#">
                            <h4>Categories</h4>
                        </a></li>
                    <?php
                    getcategories();
                    // $select_categories = "Select * from `categories`";
                    // $result_categories = mysqli_query($con, $select_categories);
                    // // $row_data = mysqli_fetch_assoc($result_categories);
                    // // echo $row_data['category_title'];
                    // while ($row_data = mysqli_fetch_assoc($result_categories)) {
                    //     $category_title = $row_data['category_title'];
                    //     $category_id = $row_data['category_id'];
                    //     // echo $category_title;
                    //     echo "<li class='nav-item'>
                    //     <a class='nav-link text-light' href='index.php?category=$category_id'>
                    //     $category_title
                    // </a></li>";
                    // }
                    ?>



                </ul>
            </div>



        </div>
        <!-- including footer -->
        <?php include("./includes/footer.php")
            ?>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>


</body>

</html>