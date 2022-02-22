<?php
include("../functions/function.php");

global $con;
$username = $_SESSION['username'];

$get_items = "Delete from cart where username = '$username'";
$run_items =  mysqli_query($con, $get_items);

echo "<script>window.open('cartpage.php','_self')</script>"
?>