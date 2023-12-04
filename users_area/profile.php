<?php
include('../includes/connect.php');
include('../functions/common_function.php');
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
    <link rel="stylesheet" href="../style.css">
    <style>
        .card {
            /* box-shadow: 5px 10px #888888; */
            box-shadow: 10px 10px 5px #aaaaaa;
        }

        .footer {
            position: relative;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        body {
            overflow-x: hidden;
        }

        .profile_img {
            width: 90%;
            /* height: 100px; */
            margin: auto;
            display: block;
            object-fit: contain;
        }

        .edit_image {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>



</head>

<body>
    <div class="container-fluid">
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
                        <a class="nav-link" href="profile.php">My Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup>
                                <?php cart_item(); ?>
                            </sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Price:
                            <?php toatal_cart_price(); ?>/-
                        </a>
                    </li>


                </ul>
                <form class="d-flex my-2 my-lg-0" action="../search_product.php" method="get">
                    <input class="form-control me-sm-2" type="text" placeholder="Search" name="search_data">
                    <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                </form>
            </div>
        </nav>

        <!-- calling cart function -->
        <?php
        cart();

        ?>

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
<a class='nav-link' href='Logout.php'>logout</a>
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

        <!--Fourth Child -->
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                    <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="#">
                            <h4>Your Profile</h4>
                        </a>
                    </li>

                    <?php
                    $username = $_SESSION['username'];
                    $user_image = "Select * from `user_table` where username='$username'";
                    $user_image = mysqli_query($con, $user_image);
                    $row_image = mysqli_fetch_array($user_image);
                    $user_image = $row_image['user_image'];
                    echo " <li class='nav-item'>
                        <img src='./user_images/$user_image' class='profile_img  my-4' alt=''>
                    </li>";
                    ?>


                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php">
                            Pending orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php?edit_account">
                            Edit Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php?my_orders">
                            My Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php?delete_account">
                            Delete Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="logout.php">
                            Logout
                        </a>
                    </li>
                </ul>

            </div>
            <div class="col-md-10 text-center">
                <?php
                get_user_order_details();
                if (isset($_GET['edit_account'])) {
                    include('edit_account.php');
                }
                if (isset($_GET['my_orders'])) {
                    include('user_orders.php');
                }
                if (isset($_GET['delete_account'])) {
                    include('delete_account.php');
                }
                ?>
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