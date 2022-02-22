<?php
include("../functions/function.php");
$username = $_SESSION['username'];

if(isset($_GET['id'])){
    $product_id = $_GET['id'];
    $delete_product = "delete from cart where PID = '$product_id' ";
    $run_delete = mysqli_query($con, $delete_product);

    echo"<script>window.open('cartpage.php','_self')</script>";
}