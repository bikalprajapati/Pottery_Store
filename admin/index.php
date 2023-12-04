<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

?>
<?php
// ... (existing code)

// Fetch admin name from the database based on the logged-in admin's credentials
$admin_name = ''; // Initialize to an empty string
if (isset($_SESSION['admin_name'])) {
    $admin_name = $_SESSION['admin_name'];
}
if (!isset($_SESSION['admin_name'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <style>
        /* .footer {
            position: relative;
            bottom: 0;
            left: 0;
            width: 100%;
        } */
        .footer {
            width: 100%;
            background-color: #f0f0f0;
            text-align: center;
            padding: 10px;
        }

        /* .footer {
            width: 100%;
            background-color: #f0f0f0;
            text-align: center;
            padding: 10px;
            bottom: 0;
        } */
        /* .footer {
            width: 100%;
            background-color: #f0f0f0;
            text-align: center;
            padding: 0px;
            position: absolute;
            bottom: 0;
        } */

        .product_img {
            width: 100px;
            object-fit: contain;
        }

        .a {
            min-height: 60vh;

        }

        /* body {
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            min-height: 100vh;

        } */


        body {
            overflow-x: hidden;
            min-height: 100vh;



        }
    </style>


</head>

<body>
    <!-- nav-bar -->
    <div class="container-fluid">
        <!-- first-child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../image/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">

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

                            ?>
                        </li>
                        <li> <a class="p-3  text-dark" href="admin_logout.php"><i class="fa fa-sign-out"
                                    aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">
                manage details</h3>
            </h3>
        </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center px-4">
                <div class="p-0 mx-5">
                    <a href="#"><img src="../image/building.png" alt="" class="admin-image"></a>
                    <p class="text-align text-center">
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo "<li class='nav-item'>
<a class='nav-link' href='#'>admin name</a>
</li>";

                        } else {
                            echo "<li class='nav-item'>
<a class='nav-link' href='#'>Hello" . $_SESSION['username'] . "</a>
</li>";
                        }

                        ?>
                    </p>
                </div>
                <div class="button text-center w-100">
                    <button><a href="insert_product.php" class="nav-link p-2  my-0">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link p-2  my-0">View Product</a></button>
                    <button><a href="index.php?insert_category" class="nav-link p-2  my-0">Insert
                            Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link p-2  my-0">View Categories</a></button>
                    <button><a href="index.php?list_orders" class="nav-link p-2  my-0">All Orders</a></button>
                    <button><a href="index.php?list_payments" class="nav-link p-2  my-0">All Payments</a></button>
                    <button><a href="index.php?list_users" class="nav-link p-2  my-0">List Users</a></button>
                    <button><a href="" class="nav-link p-2  my-0">Logout</a></button>
                </div>
            </div>
            <!-- fourth child -->
            <div class="container-fluid w-90 px-5 py-3 my-2 a">
                <?php
                if (isset($_GET['insert_category'])) {
                    include('insert_categories.php');
                }
                if (isset($_GET['view_products'])) {
                    include('view_products.php');
                }
                if (isset($_GET['edit_products'])) {
                    include('edit_products.php');
                }
                if (isset($_GET['delete_product'])) {
                    include('delete_product.php');
                }
                if (isset($_GET['view_categories'])) {
                    include('view_categories.php');
                }
                if (isset($_GET['edit_category'])) {
                    include('edit_category.php');
                }
                if (isset($_GET['delete_category'])) {
                    include('delete_category.php');
                }
                if (isset($_GET['list_orders'])) {
                    include('list_orders.php');
                }
                if (isset($_GET['delete_orders'])) {
                    include('delete_orders.php');
                }
                if (isset($_GET['list_payments'])) {
                    include('list_payments.php');
                }
                if (isset($_GET['delete_payments'])) {
                    include('delete_payments.php');
                }
                if (isset($_GET['list_users'])) {
                    include('list_users.php');
                }
                if (isset($_GET['delete_users'])) {
                    include('delete_users.php');
                }
                // if (isset($_GET['insert_product'])) {
                //     include('insert_product.php');
                // }
                ?>
            </div>

            <!-- include footer -->
            <?php include("../includes/footer.php")
                ?>

        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
</body>

</html>