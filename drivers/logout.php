<?php
session_start();
include("../includes/db.php");
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $status = 'Offline';
    

}
session_destroy();
echo"<script>window.open('home.php','_self')</script>";


?>
