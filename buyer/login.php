<?php
session_start();
include("../includes/db.php");


?>

<html>

<head><title>Login
</title>
<style>
.main{
height:200px;
width:300px;
margin-left:auto;
margin-right:auto;
margin-top:100px;
border-style:groove;
border-radius:.5em;

}
.title{
    border-style:groove;
    border-radius:.5em;
    text-align:center;
    background-color:#f0f0ff;
}
.container1{
margin:10px 20px;
}
#text{
    
    width:120px;
    height:25px;
}
</style>

</head>

<body>
<div class="main">
    <form action="login.php" method="post">
<div class="title">
<h3>Log in</h3>
</div><div class="container1">
        <input type="text" name="username" id="text" placeholder="username" required>
</div>
<div class="container1">
        <input type="password" id="text" name="buyer_password" placeholder="password" required>
</div>
<div class="container1">
        <input type="submit" name="login" value="Log In">
</div>
<div class=container1>
    <a href="forgotpassword.php">forgot password</a>
    <a href="Buyerregistration.php">Create Account</a>
</div>

</form>
</div>
</div>
</body>



</html>

<?php

if(ISSET($_POST["login"])){
    $username=$_POST['username'];
    $buyer_password=$_POST['buyer_password'];

    $sql="SELECT * FROM buyerregistration where username='$username' and buyer_password='$buyer_password'";
    $query=mysqli_query($con, $sql);
    $count_rows=mysqli_num_rows($query);
    if($count_rows==0){
        echo"<script>alert('Enter the correct details');</script>";
        echo"<script>window.open('login.php','_self')</script>";
    }
    while($row=mysqli_fetch_array($query)){
        $id=$row['buyer_id'];
        
        }
        $_SESSION['username']=$username;
        $status = 'Online';
        $sql1 = "UPDATE buyerregistration set status = '$status' where username = '$username' ";
        $query = mysqli_query($con, $sql1);
         echo "<script>window.open('home.php','_self')</script>";
   
}


?>