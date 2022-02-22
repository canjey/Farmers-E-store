<?php
session_start();

$con=mysqli_connect("localhost","root","","soko");

if(mysqli_connect_errno()){
    echo"Error in connection".mysqli_connect_error();
}
?>

<html>

<head><title>Farmer Login</title>
</head>
<body>
    <form action="famerlogin.php" method="post">
    <div class="container1">
        <input type="text" name="username" placeholder="username" required>
</div>
<div class="container1">
        <input type="password" name="password" placeholder="password" required>
</div>
<div class="container1">
        <input type="submit" name="farmer_login" value="Log In">
</div>
</form>
</div>
</body>
</html>
<?php

if(isset($_POST['farmer_login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM farmerregistration where username='$username' and farmer_password='$farmer_password'";
    $query=mysqli_query($con, $sql);
    $count_rows=mysqli_num_rows($query);
    if($count_rows==0){
        echo"<script>alert('Enter the correct details');</script>";
    }
    while($row=mysqli_fetch_array($search)){
        $id=$row['farmerID'];
    }
        $_SESSION['username']=$username;
        echo "<script>window.open('farmerHomepage.php','_self')</script>";
 
}


?>