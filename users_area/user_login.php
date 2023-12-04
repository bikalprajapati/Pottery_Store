<?php include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body {
        overflow-x: hidden;
    }
</style>

<body>
    <div class="container-fluid my-3 ps-0">
        <h2 class="text-center mb-4">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6 mt-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <!-- Username Field -->
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your Username"
                            autocomplete="off" required="required" name="user_username" />
                    </div>

                    <div class="form-outline mb-4">
                        <!-- Password Field -->
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your Password"
                            autocomplete="off" required="required" name="user_password" />
                    </div>


                    <div class="mt-4 pt-2"><input type="submit" value="Login" class="bg-info px-3 py-2 border-0"
                            name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an acoount?<a href="user_registration.php"
                                class="text-danger mx-2">Register</a>
                        </P>
                        <div>
                </form>
            </div>
        </div>
    </div>


    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>

</body>

</html>

<?php

if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "Select * from `user_table` where username='$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    //cart item
    $select_query_cart = "Select * from `cart_details` where ip_address='$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);

    if ($row_count > 0) {
        $_SESSION['username'] = $user_username;
        if (password_verify($user_password, $row_data['user_password'])) {
            // echo "<script>alert(' Login Successful')</script>";
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['username'] = $user_username;
                echo "<script>alert(' Login Successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";


            } else {
                $_SESSION['username'] = $user_username;
                echo "<script>alert(' Login Successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }

        } else {
            echo "<script>alert('Incorrect Password')</script>";

        }
    } else {
        echo "<script>alert('invalid credentials')</script>";
    }

}

?>