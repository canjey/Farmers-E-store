<?php
session_start();
include("../includes/db.php");
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $status = 'Offline';
    $sql = "UPDATE farmerregistration set status = '$status' where username = '$username' ";
    $query = mysqli_query($con, $sql);


}
session_destroy();
echo"<script>window.open('farmerHomepage.php','_self')</script>";


?>
