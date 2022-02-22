<?php
    session_start();
    include("../includes/db.php");
    

    $username = $_SESSION['username'];
    $farmer_sql = "SELECT * FROM farmerregistration where username = '$username' ";
    $farmer_query = mysqli_query($con, $farmer_sql);
    while($row = mysqli_fetch_array($farmer_query)){
        $id = $row['farmersID'];
    }
    $sql = "SELECT * FROM farmerregistration WHERE NOT farmersID = $id" ;
    $query = mysqli_query($con, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>