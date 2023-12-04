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
    <title>Cart Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <style>
        .footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        .cart_img {
            height: 100px;
            width: 100px;
            object-fit: contain;

        }
    </style>



</head>

<body>
    <div class="container-fluid">
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
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup>
                                <?php cart_item(); ?>
                            </sup></a>
                    </li>



                </ul>

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


        <!--fourthChild-->
        <div class="container mt-3">
            <div class="row ">
                <form action="" method="post">
                    <div class="table-responsive ">
                        <table class="table table-primary text-center ">


                            <!--php code display dynamic cart data-->
                            <?php

                            $get_ip_add = getIPAddress();
                            $total_price = 0;
                            $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                            $result = mysqli_query($con, $cart_query);
                            $result_count = mysqli_num_rows($result);
                            if ($result_count > 0) {
                                echo "<thead>
                                    <tr>
                                        <th scope='col'>Product Title</th>
                                        <th scope='col'>Product Image</th>
                                        <th scope='col'>Quantity</th>
                                        <th scope='col'>Quantity</th>
                                        <th scope='col'>Remove</th>
                                        <th scope='col' colspan='2'>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>";



                                while ($row = mysqli_fetch_array($result)) {
                                    $product_id = $row['product_id'];
                                    $select_products = "Select * from `products` where product_id='$product_id'";
                                    $result_products = mysqli_query($con, $select_products);
                                    while ($row_product_price = mysqli_fetch_array($result_products)) {
                                        $product_price = array($row_product_price['product_price']);
                                        $price_table = $row_product_price['product_price'];
                                        $product_title = $row_product_price['product_title'];
                                        $product_image1 = $row_product_price['product_image1'];
                                        $product_values = array_sum($product_price);
                                        $total_price += $product_values;



                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $product_title ?>
                                            </td>
                                            <td><img class="cart_img" src="./admin./product_images/<?php echo $product_image1 ?>"
                                                    alt=""></td>
                                            <td><input type="text" name="qty" id="" class="w-50"></td>
                                            <?php

                                            $get_ip_add = getIPAddress();
                                            if (isset($_POST['update_cart'])) {
                                                $quantities = $_POST['qty'];
                                                $update_cart = "update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                                                $result_products_quantity = mysqli_query($con, $update_cart);
                                                $total_price = $total_price * $quantities;
                                            }

                                            ?>
                                            <td>
                                                <?php echo $price_table ?> /-
                                            </td>
                                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>">
                                            </td>
                                            <td>
                                                <!-- <button class="bg-info p-2 border-0 mx-2">Update</button> -->
                                                <input type="submit" value="Update Cart" class="bg-info p-2 border-0 mx-2"
                                                    name="update_cart">



                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            } else {
                                echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                            }
                            ?>


                            </tbody>
                        </table>
                        <!--subtotal-->
                        <div class="d-flex mt-4">
                            <?php
                            $get_ip_add = getIPAddress();
                            $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                            $result = mysqli_query($con, $cart_query);
                            $result_count = mysqli_num_rows($result);
                            if ($result_count > 0) {
                                echo "<h4 class='px-3'> Subtotal:<strong class='px-3 text-info'>$total_price/-</strong></h4>
                                <input type='submit' value='Continue Shopping' class='bg-info p-2 border-0 mb-3'
                                name='continue_shopping' >
                        <button class='bg-secondary mx-4 p-2 text-light border-0 mb-3'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>
                        <input type='submit' value='Remove Cart' class='bg-info p-2 border-0 mb-3'
                            name='remove_cart' >";
                            } else {
                                echo "<input type='submit' value='Continue Shopping' class='bg-info p-2 border-0 mb-3'
                                name='continue_shopping' >";
                            }
                            if (isset($_POST['continue_shopping'])) {
                                echo "<script>window.open('index.php','_self')</script>";
                            }
                            ?>


                        </div>
                    </div>
                </form>
                <!-- function to remove items from cart -->
                <?php
                function remove_cart_item()
                {
                    global $con;
                    if (isset($_POST['remove_cart'])) {
                        foreach ($_POST['removeitem'] as $remove_id) {
                            echo $remove_id;
                            $delete_query = "Delete from `cart_details` where product_id=$remove_id";
                            $run_delete = mysqli_query($con, $delete_query);
                            if ($run_delete) {
                                echo "<script>window.open('cart.php','_self')</script>";
                            }

                        }
                    }
                }
                echo $remove_item = remove_cart_item();
                ?>

            </div>

        </div>





    </div>
    <div class="bg-info p-3 text-center footer ">
        <p class="mt-2">
            All Rights Reserverd ©- Designed by Bikal-2023
        </p>
    </div>


    </div>






    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>


</body>

</html>