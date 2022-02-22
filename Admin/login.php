<?php

session_start();
include("../includes/db.php");
?>
<html>
<head><title>Admin portal</title>


</head>
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
<body>
<div class="main">
    <form action="login.php" method="post">
<div class="title">
<h3>Log in</h3>
</div><div class="container1">
        <input type="text" name="username" id="text" placeholder="username" required>
</div>
<div class="container1">
        <input type="password" id="text" name="password" placeholder="password" required>
</div>
<div class="container1">
        <input type="submit" name="login" value="Log In">
</div>
<div class=container1>
    <a href="forgotpassword.php">forgot password</a>
    <a href="farmerReg.php">Create Account</a>
</div>

</form>
</div>
</div>
</body>

    </html>

    <?php
    if(ISSET($_POST["login"])){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $query="SELECT * FROM admin where username='$username' and password='$password'";
        
        $run_query=mysqli_query($con, $query);
        $count_rows=mysqli_num_rows($run_query);
        if($count_rows==0){
            echo"<script> alert('please enter your correct details');</script>";
        }
        while ($row=mysqli_fetch_array($run_query)){
            $id=$row['adminID'];
        }

        $_SESSION['username'] = $username;
        echo "<script>window.open('../Admin/AdminHomepage.php','_self')</script>";
    
        
        }
        
        ?>