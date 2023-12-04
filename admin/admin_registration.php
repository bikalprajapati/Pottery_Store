<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Regisrtration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Regisrtration</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5">
                <img src="../image/admin.png" alt="Admin Registrstion" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4 mt-5">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">
                            Username
                        </label>
                        <input type="text" id="username" name="username" placeholder="Enter your username"
                            required="required" class="form-control">

                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">
                            Email
                        </label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required="required"
                            class="form-control">

                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">
                            Password
                        </label>
                        <input type="password" id="password" name="password" placeholder="Enter your password"
                            required="required" class="form-control">

                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">
                            Confirm Password
                        </label>
                        <input type="password" id="confirm_password" name="confirm_password"
                            placeholder="Enter your confirm password" required="required" class="form-control">

                    </div>
                    <div>
                        <input type="submit" class="bg-info px-3 py-2 border-0" name="admin_registration"
                            value="register">
                        <p class="small fw-bold mt-2 pt-1">Do you already have an account?
                            <a href="admin_login.php" class="link-danger">login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<!-- php code -->
<?php
if (isset($_POST['admin_registration'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];

    //select query
    $select_query = "Select * from `admin_table` where admin_name='$username' or admin_email='$email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('Username or email already exist')</script>";

    } else if ($password != $confirm_password) {
        echo "<script>alert('password not matched')</script>";

    } else {
        $insert_query = "INSERT INTO `admin_table` (admin_name, admin_email, admin_password) VALUES ('$username', '$email', '$hash_password')";
        $sql_execute = mysqli_query($con, $insert_query);

        if ($sql_execute) {
            echo "<script>alert('Admin registered successfully')</script>";
        } else {
            echo "<script>alert('Error: Unable to register admin')</script>";
        }
    }
}
?>