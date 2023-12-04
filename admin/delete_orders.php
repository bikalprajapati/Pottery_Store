<?php
if (isset($_GET['delete_orders'])) {
    $delete_order = $_GET['delete_orders'];
    // echo $delete_order;

    $delete_query = "Delete from `user_orders` where 
     order_id=$delete_order";
    $result_order = mysqli_query($con, $delete_query);
    if ($result_order) {
        echo "<script>alert('orders has been deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_orders','_self')</script>";
    }
}
?>