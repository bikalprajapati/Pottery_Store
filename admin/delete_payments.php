<?php
if (isset($_GET['delete_payments'])) {
    $delete_payment = $_GET['delete_payments'];
    // echo $delete_payment;

    $delete_payment_query = "Delete from `user_payments` where 
     payment_id=$delete_payment";
    $result_payment = mysqli_query($con, $delete_payment_query);
    if ($result_payment) {
        echo "<script>alert('payments has been deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_payments','_self')</script>";
    }
}
?>