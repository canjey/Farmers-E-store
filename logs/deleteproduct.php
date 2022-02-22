<?php
include("../includes/db.php");
include("../functions/function.php");

if(isset($_GET['id'])){
    $product_id = $_GET['id'];
    $query = "DELETE FROM `product` WHERE `product`.`PID` = $product_id";
    $sql = mysqli_query($con, $query);

    echo"<script>alert('Successful deleted product')</script>";
    echo"<script>window.open('myproduct.php', '_self')</script>";
}



