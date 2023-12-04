<?php
if (isset($_GET['delete_users'])) {
    $delete_user = $_GET['delete_users'];
    // echo $delete_user;

    $delete_user_query = "Delete from `user_table` where 
     user_id=$delete_user";
    $result_user = mysqli_query($con, $delete_user_query);
    if ($result_user) {
        echo "<script>alert('users has been deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_users','_self')</script>";
    }
}
?>